<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Verification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;

class VerificationController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index($code){
        $verification = Verification::where('link', url("/verify/$code"))->firstOrFail();
        $user = $verification->user()->where('status', 2)->firstOrFail();
        $user->update(['status' => 1]);
        if($user->role == 1){
            return redirect()->route('login')->with('message', alert('Your account has been verified but you cannot login until admin approves it.'));
        }
        auth()->login($user);
        return redirect()->intended();
    }

    public function resend($id){
        $user = User::where('id', $id)->where('status', 2)->firstOrFail();
        $verification = $user->verification->last() ?? abort(404);
        Mail::to($user->email)->send(new VerifyMail($user->first_name, $verification->link));
        return redirect()->route('login')->with('message', alert('Email has been resent'));
    }
}
