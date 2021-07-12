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
    public function __construct(){
        $this->middleware(['auth', 'customer']);
    }

    public function index(){
        if(basket()->basketItem()->sum('quantity') == 0) return redirect()->route('baskets.index');

        $days = Day::get()->sortBy(function($value){
            return day_num($value['day']);
        })->values();
        $times = Time::orderBy('start_time')->get();
        return view('checkouts.index', compact('days', 'times'));
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
