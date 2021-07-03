<?php

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

?>
