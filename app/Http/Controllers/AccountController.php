<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('accounts.index', ['user' => auth()->user()]);
    }

    public function store(AccountRequest $request){
        $request['dob'] = $request->date_of_birth;
        auth()->user()->update($request->only('first_name', 'last_name', 'dob', 'gender', 'phone', 'email'));
        return back()->with('message', alert('Account Updated Successfully', 'primary'));
    }
}
