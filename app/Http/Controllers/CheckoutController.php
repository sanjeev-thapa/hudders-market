<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Day;
use App\Models\Time;
use App\Http\Requests\CheckoutRequest;
use App\Helpers\Classes\Paypal;
use App\Helpers\Classes\Stripe;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Order;
use App\Models\CollectionSlot;

class CheckoutController extends Controller
{
    private $currentDay;
    private $currentHour;

    public function __construct(){
        $this->middleware(['auth', 'customer']);
        $this->currentDay = now()->format('l');
        $this->currentHour = now()->format('H');
    }

    public function index(){
        if(basket()->basketItem()->sum('quantity') == 0) return redirect()->route('baskets.index');

        $days = $this->getDay();
        $times = Time::orderBy('start_time')->get();
        return view('checkouts.index', compact('days', 'times'));
    }

    private function getDay(){
        $times = Time::orderBy('start_time')->get();
        $days = Day::get()->sortBy(function($value){
            return day_num($value['day']);
        })->values();
        foreach($days as $id => $day){
            $day['disabled'] = $days[$id]['disabled'] ?? false;
            $day['selected'] = false;
            if(strtolower($this->currentDay) == strtolower($day->day)){
                if(isset($days[$id+1])){
                    if($days[$id+1] == $days->last() && $this->currentHour == $times->last()->end_time){
                        $days->first()['selected'] = true;
                    } else {
                        for($i = $id; $i >= 0; $i--){
                            $days[$i]['disabled'] = true;
                        }
                        if($this->currentHour >= $times->last()->end_time){
                            $days[$id+1]['disabled'] = true;
                        }
                    }
                }
            }
        }
        return $days;
    }

    public function timeApi($day){
        $times = Time::orderBy('start_time')->get();
        foreach($times as $time){
            $time['disabled'] = false;
        }
        if(strtolower($day) == next_day_lower($this->currentDay)){
            if($this->currentHour >= $times[2]->end_time){
                if(strtolower($day) != 'friday'){
                    $times[0]['disabled'] = true;
                    $times[1]['disabled'] = true;
                    $times[2]['disabled'] = true;
                }
            } elseif($this->currentHour >= $times[2]->start_time){
                $times[0]['disabled'] = true;
                $times[1]['disabled'] = true;
            } elseif($this->currentHour >= $times[1]->start_time){
                $times[0]['disabled'] = true;
            }
        }
        return $times;
    }

    public function store(CheckoutRequest $request){
        session()->put($request->only('time_id', 'day_id'));

        if($request->payment_method == 0){
            return Paypal::create($this->getTotal());
        } elseif($request->payment_method == 1){
            return Stripe::create($this->getTotal());
        }
    }

    public function paypal($status){
        $dayTime = session()->only(['time_id', 'day_id']);

        if($status == "success"){
            $response = json_decode(Paypal::execute($this->getTotal()), true);
            return $this->success($dayTime, 0, $response['id'], $response['transactions'][0]['amount']['total']);
        } elseif($status == "cancel"){
            return $this->cancel(0);
        } else {
            abort(400);
        }
    }

    public function stripe($status){
        $dayTime = session()->only(['time_id', 'day_id']);

        if($status == "success"){
            $response = Stripe::execute();
            return $this->success($dayTime, 1, $response->id, $response->amount_total/100);
        } elseif($status == "cancel"){
            return $this->cancel(1);
        } else {
            abort(400);
        }
    }

    private function getTotal(){
        $total = 0;
        foreach(basket()->basketItem as $basketItem){
            $total += $basketItem->product->getPrice() * $basketItem->quantity;
        }
        return $total;
    }

    private function success($dayTime, $gateway, $transactionId, $amount){
        $collectionSlot = CollectionSlot::create($dayTime);
        $order = auth()->user()->order()->create([
            'status' => 1,
            'collection_slot_id' => $collectionSlot->id
        ]);
        foreach(basket()->basketItem as $basketItem){
            $basketItem->product()->decrement('stock', $basketItem->quantity);
            $product = $basketItem->product;
            $order->product()->attach($product->id, ['name' => $product->name, 'price' => $product->getPrice(), 'quantity' => $basketItem->quantity]);
        }
        auth()->user()->payment()->create([
            'gateway' => $gateway,
            'transaction_id' => $transactionId,
            'amount' => $amount,
            'order_id' => $order->id
        ]);
        basket()->basketItem()->delete();
        session()->forget(['time_id', 'day_id']);
        $gatewayName = $gateway == 0 ? 'PayPal' : 'Stripe';
        return redirect()->route('orders.index')->with('message', alert("$gatewayName Payment Made Successfully", 'primary'));
    }

    private function cancel($gateway){
        session()->forget(['time_id', 'day_id']);
        $gatewayName = $gateway == 0 ? 'PayPal' : 'Stripe';
        return redirect()->route('checkouts.index')->with('message', alert("$gatewayName Payment was Cancelled"));
    }
}
