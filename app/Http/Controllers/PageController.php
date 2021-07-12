<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ProductType;
use App\Models\Discount;

class PageController extends Controller
{
    public function index(){
        $whereShop = Shop::where('status', 0)->pluck('id');
        $whereProductType = Product::groupBy('product_type_id')->where('status', 0)->pluck('product_type_id');
        $productTypes = ProductType::whereIn('id', $whereProductType)->whereIn('id', $whereShop)->where('status', 0)->orderByDesc('id')->limit(6)->get();

        $whereType = ProductType::where('status', 0)->whereIn('shop_id', $whereShop)->pluck('id');
        $products = Product::where('status', 0)->whereIn('product_type_id', $whereType)->latest()->get();

        $deals = Product::has('discount')->where('status', 0)->whereIn('product_type_id', $whereType)->get()->sortByDesc(function($value, $key){
            return ($value->price - $value->getPrice()) / ($value->getPrice() != 0 ? $value->getPrice()*100 : 1);
        })->values()->take(5);

        $ratings = Product::has('review')->whereIn('product_type_id', $whereType)->get()->sortByDesc(function($value) {
            return $value->getRating();
        })->values()->take(5);

        return view('landing', compact('productTypes', 'products', 'deals', 'ratings'));
    }
}
