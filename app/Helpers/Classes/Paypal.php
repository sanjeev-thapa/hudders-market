<?php

namespace App\Helpers\Classes;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\Details;
use PayPal\Api\PaymentExecution;

class Paypal{

    private $apiContext;

    public function __construct(){
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_CLIENT') ,  // ClientID
                env('PAYPAL_SECRET')    // ClientSecret
            )
        );
    }

    private function getApiContext(){
        return $this->apiContext;
    }

    public static function create($total){
        $paypal = new Paypal();
        $apiContext = $paypal->apiContext;

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($total);
        $amount->setCurrency('GBP');

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(url('paypal/success'))
                    ->setCancelUrl(url('paypal/cancel'));

        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);
        try {
            $payment->create($apiContext);
            return redirect($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if(env('APP_DEBUG')){
                echo $ex->getData();
            } else {
                abort(500);
            }
        }
    }

    public static function execute($total){
        $paypal = new Paypal();
        $apiContext = $paypal->apiContext;

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setSubtotal($total);

        $amount->setCurrency('GBP');
        $amount->setTotal($total);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        try {
            return $payment;
        }catch (Exception $ex) {
            return $ex;
        }
    }

}
