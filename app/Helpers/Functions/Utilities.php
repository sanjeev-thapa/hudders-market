<?php

    use \App\Models\Basket;

    function alert(String $message, String $type = "danger") {
        return "<div class='alert alert-$type fade show' role='alert'>
            $message
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    }

    function discount_product_price($product){
        $discount = $product->discount->first();
        if(empty($discount)){
            return $product->price;
        }
        $amount = 0;
        if($discount->type == 0){
            $amount = $product->price - $discount->amount;
        } elseif($discount->type == 1){
            $amount = $product->price - (($product->price * $discount->amount)/100);
        }
        return $amount > 0 ? number_format($amount, 2) : 0;
    }

    function set_basket_cookie(){
        $deleted = \App\Models\Basket::where('cookie_id', $_COOKIE['basket'] ?? '')->count() == 0;
        if(!isset($_COOKIE['basket']) || $deleted){
            setcookie('basket', $basket = md5(rand().time().rand()), time() + 365*24*60*60, "", "", true, true);
            App\Models\Basket::create([
                'cookie_id' => $basket
            ]);
            header("Location: " . url()->full());
            exit();
        }
    }

    function basket(){
        set_basket_cookie();
        if(auth()->check()){
            return auth()->user()->basket->last();
        } else {
            return \App\Models\Basket::where('cookie_id', $_COOKIE['basket'])->firstOrFail();
        }
    }

    function get_basket_quantity(){
        return basket()->basketItem()->sum('quantity');
    }

    function toastr($title, $message = "", $type = "success"){
        return " <script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>
            <script>
                toastr.options = {
                    'closeButton': true,
                    'debug': false,
                    'newestOnTop': false,
                    'progressBar': true,
                    'positionClass': 'toast-bottom-right',
                    'preventDuplicates': true,
                    'onclick': null,
                    'showDuration': '300',
                    'hideDuration': '1000',
                    'timeOut': '5000',
                    'extendedTimeOut': '1000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut'
                }
                toastr['$type']('$message', '$title');
            </script>";
    }

?>
