<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterTraderRequest;
use App\Models\User;
use App\Models\Verification;
use App\Models\Shop;
use App\Models\ProductType;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $user = User::create([
            'username' => strtolower($request->username),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->date_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => \Hash::make($request->password),
            'role' => 2,
            'status' => 2,
        ]);

        $verification = Verification::create([
            'link' => url('/verify/' . md5(rand() . '-' . time())),
            'user_id' => $user->id
        ]);

        $user->basket()->create();

        Mail::to($user->email)->send(new VerifyMail($user->first_name, $verification->link));

        return redirect()
                ->route('login')
                ->with('message', alert('Please verify your email to login or <a class="link-info font-weight-bold" href="'. url("/verify/resend/$user->id") .'">Resend Email</a>'));
    }

    public function trader(){
        return view('auth.trader');
    }

    public function registerTrader(RegisterTraderRequest $request){
        $user = User::create([
            'username' => strtolower($request->username),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->date_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => \Hash::make($request->password),
            'role' => 1,
            'status' => 2,
        ]);

        $shop = Shop::create([
            'name' => $request->shop_name,
            'status' => 1,
            'user_id' => $user->id
        ]);

        ProductType::create([
            'name' => $request->product_type,
            'status' => 1,
            'shop_id' => $shop->id
        ]);

        $verification = Verification::create([
            'link' => url('/verify/' . md5(rand() . '-' . time())),
            'user_id' => $user->id
        ]);

        $user->basket()->create();

        Mail::to($user->email)->send(new VerifyMail($user->first_name, $verification->link));

        return redirect()
                ->route('login')
                ->with('message', alert('Please verify your email to login or <a class="link-info font-weight-bold" href="'. url("/verify/resend/$user->id") .'">Resend Email</a>'));
    }
}
