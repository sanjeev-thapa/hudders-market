<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Http\Requests\BasketRequest;
use App\Http\Requests\UpdateBasketRequest;

class BasketController extends Controller
{
    public function index(){
        return view('baskets.index', ['basket' => basket()]);
    }

    public function store(BasketRequest $request){
        if(get_basket_quantity() + $request->quantity > 20) return back()->with('message', toastr('Quantity Limit Exceeded', '', 'error'));
        basket()->basketItem()->create($request->only('quantity', 'product_id'));
        return back()->with('message', toastr('Product Added to Basket'));
    }

    public function update(UpdateBasketRequest $request, $id){
        $basket = basket()->basketItem()->findOrFail($id);
        if(get_basket_quantity() - $basket->quantity + $request->quantity > 20) return back()->with('message', toastr('Quantity Limit Exceeded', '', 'error'));
        $basket->update($request->only('quantity'));
        return redirect()->route('baskets.index')->with('message', toastr('Quantity Updated'));
    }

    public function show($id){}

    public function destroy($id){
        $basketItem = basket()->basketItem()->findOrFail($id);
        $basketItem->delete();
        return redirect()->route('baskets.index')->with('message', toastr('Product Removed from Basket'));
    }
}
