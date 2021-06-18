<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        if(!auth()->attempt($request->only('username', 'password'))){
            return back()->with('message', alert('Invalid Username or Password'));
        }
        return redirect('/');
    }
}
