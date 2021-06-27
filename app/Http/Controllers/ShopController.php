<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'trader']);
    }

    public function index(){
        $shops = auth()->user()->shop->sortDesc();
        return view('shops.index', ['shops' => $shops]);
    }

    public function create(){
        return view('shops.create');
    }

    public function store(ShopRequest $request){
        if(auth()->user()->shop->count() >= 10){
            return back()->with('message', alert('You have reached maximum quota for shops'));
        }
        $shop = new Shop();
        $shop->name = $request->shop_name;
        $shop->status = 1;
        $shop->user_id = auth()->user()->id;
        if($request->hasFile('image')){
            $image = $request->image->store('uploads', 'public');
            $shop->image = $image;
        }
        $shop->save();
        return redirect()->route('shops.index')->with('message', alert('Shop Created Successfully', 'primary'));
    }

    public function show($id){}

    public function edit($id){
        $shop = auth()->user()->shop()->findOrFail($id);
        return view('shops.edit', ['shop' => $shop]);
    }

    public function update(UpdateShopRequest $request, $id){
        $shop = auth()->user()->shop()->findOrFail($id);
        $shop->name = $request->shop_name;
        if($request->hasFile('image')){
            Storage::delete('public/' . $shop->image);
            $image = $request->image->store('uploads', 'public');
            $shop->image = $image;
        }
        $shop->save();
        return redirect()->route('shops.index')->with('message', alert('Shop Updated Successfully', 'primary'));
    }

    public function destroy($id){
        if(auth()->user()->shop->count() <= 1){
            return back()->with('message', alert('You must have atleast have one shop'));
        }

        if(auth()->user()->productType->count() <= 1 && auth()->user()->productType()->firstOrFail()->shop_id == $id){
            return back()->with('message', alert('There is only one Product Type associated with this Shop'));
        }

        $shop = Shop::findOrFail($id);
        Storage::delete('public/' . $shop->image);
        $shop->delete();
        return back()->with('message', alert('Shop Deleted Successfully', 'primary'));
    }
}
