<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AccountController;


Route::get('/', [PageController::class, 'index']);

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::Class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Account
Route::get('/account', [AccountController::class, 'index'])->name('accounts.index');
Route::post('/account', [AccountController::class, 'store'])->name('accounts.store');
