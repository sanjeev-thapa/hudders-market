<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request){
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT
                ? redirect()->route('password.request')->with(['message' => alert(__($status))])
                : redirect()->route('password.request')->withErrors(['email' => __($status)]);
    }

    public function reset(Request $request){
        return view('auth.reset-password', compact('request'));
    }

    public function update(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = \Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('message', alert(__($status)))
                    : redirect()->route('password.reset')->withErrors(['email' => [__($status)]]);
    }
}
