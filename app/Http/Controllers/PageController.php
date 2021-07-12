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

    public function search(){
        $shops = Shop::where('status', 0)->latest()->get();
        $productTypes = ProductType::whereIn('shop_id', $shops->pluck('id'))->where('status', 0)->latest()->get();
        $products = $this->searchProduct(request()->only('q', 'shop', 'product_type', 'minimum', 'maximum', 'rating', 'filter'));

        return view('pages.search', compact('shops', 'productTypes', 'products'));
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

    private function searchProduct($search){
        if(!empty($search['filter'])){
            $whereShop = Shop::where('status', 0)->pluck('id');
            $whereType = ProductType::where('status', 0)->whereIn('shop_id', $whereShop)->pluck('id');
            $products = Product::where('status', 0)->whereIn('product_type_id', $whereType)->latest()->get();

            if($search['filter'] == 'deals'){
                return Product::has('discount')->where('status', 0)->whereIn('product_type_id', $whereType)->get()->sortByDesc(function($value){
                    return ($value->price - $value->getPrice()) / ($value->getPrice() != 0 ? $value->getPrice()*100 : 1);
                })->values();
            }
            if($search['filter'] == 'top_rated'){
                return Product::has('review')->whereIn('product_type_id', $whereType)->get()->sortByDesc(function($value) {
                    return $value->getRating();
                })->values();
            }
        }

        $products = new Product();
        if(!empty($search['q'])){
            $q = strtolower('%' . $search['q'] . '%');
            $products = $products->whereRaw("(lower(name) like '$q' OR lower(description) like '$q')");
        }
        if(!empty($search['shop'])){
            $shop = $search['shop'];
            $productId = Shop::where('id', $shop)->first()->product->pluck('id');
            $products = $products->whereIn('id', $productId);
        }
        if(!empty($search['product_type'])){
            $productType = $search['product_type'];
            $products = $products->where('product_type_id', $productType);
        }
        $products = $products->where('status', 0)->get();
        if(!empty($search['minimum'])){
            $minimum = $search['minimum'];
            $products = $products->filter(function($value) use($minimum){
                return $value->getPrice() >= $minimum;
            })->values();
        }
        if(!empty($search['maximum'])){
            $maximum = $search['maximum'];
            $products = $products->filter(function($value) use($maximum){
                return $value->getPrice() <= $maximum;
            })->values();
        }
        if(!empty($search['rating'])){
            $rating = $search['rating'];
            $products = $products->filter(function($value) use($rating){
                return $value->getRating() == $rating;
            })->values();
        }
        return $products;
    }
}
