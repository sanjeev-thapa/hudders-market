<?php

namespace App\Helpers\Classes;

class Stripe{

    private $apiKey;

    public function __construct(){
        $this->apiKey = env('STRIPE_SECRET');
    }

    public function getApiKey(){
        return $this->apiKey;
    }

    public static function create($amount){
        $stripe = new Stripe();
        \Stripe\Stripe::setApiKey($stripe->getApiKey());

        $payment = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                    'price_data' => [
                    'currency' => 'gbp',
                    'unit_amount' => number_format($amount, 2, '.', '')*100,
                    'product_data' => [ 'name' => 'Stubborn Attachments'],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('stripe/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('stripe/cancel'),
        ]);

        return redirect($payment->url);
    }

    public static function execute(){
        $stripeObj = new Stripe();
        $stripe = new \Stripe\StripeClient($stripeObj->getApiKey());
        return $stripe->checkout->sessions->retrieve(request('session_id'),[]);
    }

}
