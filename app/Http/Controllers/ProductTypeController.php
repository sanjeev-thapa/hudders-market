<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Http\Requests\ProductTypeRequest;
use App\Http\Requests\UpdateProductTypeRequest;
use Illuminate\Support\Facades\Storage;

class ProductTypeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'trader']);
    }

    public function index(){
        $productTypes = auth()->user()->productType->sortDesc();
        return view('product-types.index', ['productTypes' => $productTypes]);
    }

    public function create(){
        $shops = auth()->user()->shop()->latest()->get();
        return view('product-types.create', ['shops' => $shops]);
    }

    public function store(ProductTypeRequest $request){
        $productType = new ProductType();
        $productType->name = $request->product_type;
        $productType->status = 1;
        $productType->shop_id = $request->shop;
        if($request->hasFile('image')){
            $image = $request->image->store('uploads', 'public');
            $productType->image = $image;
        }
        $productType->save();
        return redirect()->route('product-types.index')->with('message', alert('Product Type Created Successfully', 'primary'));
    }

    public function show($id){}

    public function edit($id){
        $productType = auth()->user()->productType()->findOrFail($id);
        $shops = auth()->user()->shop()->latest()->get();
        return view('product-types.edit', ['productType' => $productType, 'shops' => $shops]);
    }

    public function update(UpdateProductTypeRequest $request, $id){
        $productType = auth()->user()->productType()->findOrFail($id);
        $productType->name = $request->product_type;
        $productType->status = 1;
        $productType->shop_id = $request->shop;
        if($request->hasFile('image')){
            Storage::delete('public/' . $productType->image);
            $image = $request->image->store('uploads', 'public');
            $productType->image = $image;
        }
        $productType->update();
        return redirect()->route('product-types.index')->with('message', alert('Product Updated Sucessfully', 'primary'));
    }

    public function destroy($id){
        if(auth()->user()->productType()->count() <= 1){
            return back()->with('message', alert('You must have atleast have one product type'));
        }

        $productType = auth()->user()->productType()->findOrFail($id);
        Storage::delete('public/' . $productType->image);
        $productType->delete();
        return back()->with('message', alert('Product Type Deleted Successfully', 'primary'));
    }
}
