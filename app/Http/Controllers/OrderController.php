<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'customer']);
    }

    public function index(){
        $orders = auth()->user()->order()->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function invoice($id){
        $order = auth()->user()->order()->findOrFail($id);
        $pdf = \PDF::loadView('orders.invoice', compact('order'));
        return $pdf->stream("Invoice #$id.pdf");
    }
}
