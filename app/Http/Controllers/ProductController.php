<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'trader']);
    }

    public function index(){
        $products = auth()->user()->product()->latest()->get();
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        $productTypes = auth()->user()->productType->sortDesc();
        $discounts = auth()->user()->discount->sortDesc();
        return view('products.create', ['discounts' => $discounts, 'productTypes' => $productTypes]);
    }

    public function store(ProductRequest $request){
        $product = Product::create([
            'name' => $request->name,
            'product_type_id' => $request->product_type_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'minimum' => $request->minimum,
            'maximum' => $request->maximum,
            'allergy_info' => $request->allergy_info,
            'image' => $request->image->store('uploads', 'public'),
            'status' => 1
        ]);
        $product->discount()->attach($request->discount_id);
        return redirect()->route('products.index')->with('message', alert('Product Created Successfully', 'primary'));
    }

    public function show($id){}

    public function edit($id){
        $product = auth()->user()->product()->findOrFail($id);
        $productTypes = auth()->user()->productType->sortDesc();
        $discounts = auth()->user()->discount->sortDesc();
        return view('products.edit', ['product' => $product, 'discounts' => $discounts, 'productTypes' => $productTypes]);
    }

    public function update(UpdateProductRequest $request, $id){
        $product = auth()->user()->product()->findOrFail($id);
        $product->name = $request->name;
        $product->product_type_id = $request->product_type_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->minimum = $request->minimum;
        $product->maximum = $request->maximum;
        $product->allergy_info = $request->allergy_info;
        $product->status = 1;
        if($request->hasFile('image')){
            Storage::delete('public/' . $product->image);
            $product->image = $request->image->store('uploads', 'public');
        }
        $product->update();
        $product->discount()->sync($request->discount_id);
        return redirect()->route('products.index')->with('message', alert('Product Updated Successfully', 'primary'));
    }

    public function destroy($id){
        auth()->user()->product()->findOrFail($id)->delete();
        return redirect()->route('products.index')->with('message', alert('Product Deleted Successfully', 'primary'));
    }
}
