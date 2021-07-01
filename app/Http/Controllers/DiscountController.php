<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;

class DiscountController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'trader']);
    }

    public function index(){
        $discounts = auth()->user()->discount()->get();
        return view('discounts.index', ['discounts' => $discounts]);
    }

    public function create(){
        return view('discounts.create');
    }

    public function store(DiscountRequest $request){
        auth()->user()->discount()->create([
            'name' => $request->discount_name,
            'type' => $request->type,
            'amount' => $request->amount,
            'expiry_date' => $request->date
        ]);
        return redirect()->route('discounts.index')->with('message', alert('Discount Created Successfully', 'primary'));
    }

    public function show($id){}

    public function edit($id){
        $discount = auth()->user()->discount()->findOrFail($id);
        return view('discounts.edit', ['discount' => $discount]);
    }

    public function update(UpdateDiscountRequest $request, $id){
        $discount = auth()->user()->discount()->findOrFail($id);
        $discount->update([
            'name' => $request->discount_name,
            'type' => $request->type,
            'amount' => $request->amount,
            'expiry_date' => $request->date
        ]);
        return redirect()->route('discounts.index')->with('message', alert('Discount Updated Successfully', 'primary'));
    }

    public function destroy($id){
        auth()->user()->discount()->findOrFail($id)->delete();
        return redirect()->route('discounts.index')->with('message', alert('Discount Deleted Successfully', 'primary'));
    }
}
