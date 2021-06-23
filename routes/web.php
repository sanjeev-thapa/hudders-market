<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AccountController;


Route::get('/', [PageController::class, 'index']);

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::Class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/verify/resend/{id}', [VerificationController::class, 'resend'])->name('verify.resend');
Route::get('/verify/{code}', [VerificationController::class, 'index'])->name('verify');
Route::get('/logout', function(){ abort(400); });
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Account
Route::get('/account', [AccountController::class, 'index'])->name('accounts.index');
Route::post('/account', [AccountController::class, 'update'])->name('accounts.update');
Route::get('/account/change-password', [AccountController::class, 'changePassword'])->name('accounts.changePassword');
Route::post('/account/change-password', [AccountController::class, 'updatePassword'])->name('accounts.updatePassword');
