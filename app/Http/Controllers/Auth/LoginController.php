<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        $previous = explode('?', url()->previous())[0];
        if($previous != url()->current() && $previous != route('register')){
            session()->put('redirectLogin', url()->previous());
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        if(!auth()->validate($request->only('username', 'password'))){
            return back()->with('message', alert('Invalid Username or Password'));
        }

        $user = User::where('username', strtolower($request->username))->first();
        if($user->status == 2){
            return back()->with('message', alert('Please verify your email to login or <a class="link-info font-weight-bold" href="'. url("/verify/resend/$user->id") .'">Resend Email</a>'));
        } elseif($user->role == 1 && $user->status > 0){
            return back()->with('message', alert('Your account has been verified but you cannot login until admin approves it.'));
        }

        auth()->attempt($request->only('username', 'password'));
        $redirectUrl = session('redirectLogin') ?? url('');
        session()->forget('redirectLogin');
        return redirect($redirectUrl);
    }
}
