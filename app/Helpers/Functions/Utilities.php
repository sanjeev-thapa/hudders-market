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

    function set_basket_cookie(){
        $deleted = \App\Models\Basket::where('cookie_id', $_COOKIE['basket'] ?? '')->count() == 0;
        if(!isset($_COOKIE['basket']) || $deleted){
            setcookie('basket', $basket = md5(rand().time().rand()), time() + 365*24*60*60, "/", "", true, true);
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

    function day_num($day){
        $number = 0;
        switch (strtolower($day)){
            case 'sunday':
                $number = 1;
                break;
            case 'monday':
                $number = 2;
                break;
            case 'tuesday':
                $number = 3;
                break;
            case 'wednesday':
                $number = 4;
                break;
            case 'thursday':
                $number = 5;
                break;
            case 'friday':
                $number = 6;
                break;
            default:
                $number = 0;
        }
        return $number;
    }

    function num_day($number){
        $day = "";
        switch ($number){
            case 1:
                $day = 'sunday';
                break;
            case 2:
                $day = 'monday';
                break;
            case 3:
                $day = 'tuesday';
                break;
            case 4:
                $day = 'wednesday';
                break;
            case 5:
                $day = 'thursday';
                break;
            case 6:
                $day = 'friday';
                break;
            default:
                $day = '';
        }
        return ucfirst($day);
    }

    function get_collection_day(){
        $days = \App\Models\Day::get()->sortBy(function($value){
            return day_num($value['day']);
        })->values();
        $id = $days->search(function($value){
            return strtolower($value['day']) == strtolower(now()->format('l'));
        });

        $times = \App\Models\Time::orderBy('start_time')->get();
        if(now()->format('H') > $times->last()->end_time){
            return next_day($days[$id]);
        }
        return $days[$id];
    }

    function next_day($day){
        if(strtolower($day) == "wednesday"){
            return "Thursday";
        } elseif(strtolower($day) == "thursday"){
            return "Friday";
        } else {
            return "Wednesday";
        }
    }

    function disabled_days(){
        $disabled = [];
        if(now()->format('l') == "Thursday"){
            if(now()->format('H') > 19){
                $disabled[] = "Thursday";
            }
            $disabled[] = "Wednesday";
        } elseif(now()->format('l') == "Friday"){
            if(now()->format('H') > 19){
                $disabled[] = "Friday";
            } else {
                $disabled[] = "Wednesday";
                $disabled[] = "Thursday";
            }
        }

        // Delete This
        elseif(now()->format('l') == "Monday"){
            $disabled[] = "Wednesday";
            $disabled[] = "Friday";
        }
        return $disabled;
    }

    function disabled_days_string(){
        $disabled = disabled_days();
        return implode(',', $disabled);
    }

    function has_disabled_days($day){
        $disabledDays = disabled_days();
        if(in_array($day, $disabledDays)){
            return "disabled";
        } else {
            return "";
        }
    }

    function get_collection_time(){
        $times = \App\Models\Time::orderBy('start_time')->get();
        $id = $times->search(function($value){
            return $value['start_time'] <= now()->format('H') && $value['end_time'] > now()->format('H');
        });
        return $times[$id];
    }

    function no_url($string){
        $withoutW = str_replace('www.', '', url($string));
        $withoutHttp = str_replace('http://', '', $withoutW);
        return str_replace('https://', '', $withoutHttp);
    }

    function get_rating_badge($rating, $align = 'left'){
        $badge = "<div class='text-$align'>";
        for($i = 1; $i <= 5; $i++){
            if($i <= $rating){
                $badge .= "<i class='fas fa-star text-warning'></i>";
            } else {
                $badge .= "<i class='far fa-star'></i>";
            }
        }
        $badge .= "</div>";
        return $badge;
    }

    function productTypes(){
        $shopId = \App\Models\Shop::has('productType')->where('status', 0)->pluck('id');
        return \App\Models\ProductType::whereIn('shop_id', $shopId)->where('status', 0)->get();
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
