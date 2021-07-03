<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Discount;

class PageController extends Controller
{
    public function index(){
        $whereProductType = Product::groupBy('product_type_id')->where('status', 0)->pluck('product_type_id');
        $productTypes = ProductType::whereIn('id', $whereProductType)->where('status', 0)->orderByDesc('id')->limit(6)->get();

        $products = Product::where('status', 0)->latest()->get();

        $deals = Product::has('discount')->get()->sortByDesc(function($value, $key){
            return ($value->price - $value->getPrice())/$value->getPrice()*100;
        })->values()->take(5);

        return view('landing', compact('productTypes', 'products', 'deals'));
    }
}
