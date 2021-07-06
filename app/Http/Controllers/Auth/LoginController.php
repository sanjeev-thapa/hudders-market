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
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        if(!auth()->validate($request->only('username', 'password'))){
            return redirect()->route('login')->with('message', alert('Invalid Username or Password'));
        }

        $user = User::where('username', strtolower($request->username))->first();
        if($user->status == 2){
            return redirect()->route('login')->with('message', alert('Please verify your email to login or <a class="link-info font-weight-bold" href="'. url("/verify/resend/$user->id") .'">Resend Email</a>'));
        } elseif($user->role == 1 && $user->status > 0){
            return redirect()->route('login')->with('message', alert('Your account has been verified but you cannot login until admin approves it.'));
        }

        $basket = basket();
        auth()->attempt($request->only('username', 'password'));

        if(!$this->transferBasket($basket)) return redirect()->intended()->with('message', toastr('Quantity Limit Exceeded', '', 'error'));
        return redirect()->intended();
    }

    private function transferBasket($basket){
        if(get_basket_quantity() + $basket->basketItem()->sum('quantity') > 20) return false;
        foreach($basket->basketItem as $basketItem){
            if(basket()->basketItem()->where('product_id', $basketItem->product_id)->count() == 0){
                $basket->basketItem()->find($basketItem->id)->update(['basket_id' => basket()->id]);
            }
        }
        $basket->delete();
        return true;
    }
}
