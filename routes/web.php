<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;


Route::get('/', [PageController::class, 'index']);

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::Class, 'login']);
Route::get('/register/customer', [RegisterController::class, 'index'])->name('register');
Route::post('/register/customer', [RegisterController::class, 'register']);
Route::get('/register/trader', [RegisterController::class, 'trader'])->name('register.trader');
Route::post('/register/trader', [RegisterController::class, 'registerTrader']);
Route::get('/verify/resend/{id}', [VerificationController::class, 'resend'])->name('verify.resend');
Route::get('/verify/{code}', [VerificationController::class, 'index'])->name('verify');
Route::get('/logout', function(){ abort(400); });
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Account
Route::get('/account', [AccountController::class, 'index'])->name('accounts.index');
Route::post('/account', [AccountController::class, 'update'])->name('accounts.update');
Route::get('/account/change-password', [AccountController::class, 'changePassword'])->name('accounts.changePassword');
Route::post('/account/change-password', [AccountController::class, 'updatePassword'])->name('accounts.updatePassword');

// Shops
Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
Route::get('/shops/create', [ShopController::class, 'create'])->name('shops.create');
Route::post('/shops', [ShopController::class, 'store'])->name('shops.store');
Route::get('/shops/{id}', [ShopController::class, 'show'])->name('shops.show');
Route::get('/shops/{id}/edit', [ShopController::class, 'edit'])->name('shops.edit');
Route::put('/shops/{id}', [ShopController::class, 'update'])->name('shops.update');
Route::delete('/shops/{id}', [ShopController::class, 'destroy'])->name('shops.destroy');

// Product Types
Route::get('/product-types', [ProductTypeController::class, 'index'])->name('product-types.index');
Route::get('/product-types/create', [ProductTypeController::class, 'create'])->name('product-types.create');
Route::post('/product-types', [ProductTypeController::class, 'store'])->name('product-types.store');
Route::get('/product-types/{id}', [ProductTypeController::class, 'show'])->name('product-types.show');
Route::get('/product-types/{id}/edit', [ProductTypeController::class, 'edit'])->name('product-types.edit');
Route::put('/product-types/{id}', [ProductTypeController::class, 'update'])->name('product-types.update');
Route::delete('/product-types/{id}', [ProductTypeController::class, 'destroy'])->name('product-types.destroy');

// Discounts
Route::get('/discounts', [DiscountController::class, 'index'])->name('discounts.index');
Route::get('/discounts/create', [DiscountController::class, 'create'])->name('discounts.create');
Route::post('/discounts', [DiscountController::class, 'store'])->name('discounts.store');
Route::get('/discounts/{id}', [DiscountController::class, 'show'])->name('discounts.show');
Route::get('/discounts/{id}/edit', [DiscountController::class, 'edit'])->name('discounts.edit');
Route::put('/discounts/{id}', [DiscountController::class, 'update'])->name('discounts.update');
Route::delete('/discounts/{id}', [DiscountController::class, 'destroy'])->name('discounts.destroy');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Reviews
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

// Baskets
Route::get('/baskets', [BasketController::class, 'index'])->name('baskets.index');
Route::post('/baskets', [BasketController::class, 'store'])->name('baskets.store');
Route::get('/baskets/{id}', [BasketController::class, 'show'])->name('baskets.show');
Route::put('/baskets/{id}', [BasketController::class, 'update'])->name('baskets.update');
Route::delete('/baskets/{id}', [BasketController::class, 'destroy'])->name('baskets.destroy');

// Checkouts
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkouts.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkouts.store');
Route::get('/paypal/{status}', [CheckoutController::class, 'paypal'])->name('paypal.status');
Route::get('/stripe/{status}', [CheckoutController::class, 'stripe'])->name('paypal.status');

// Orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/invoices/{id}', [OrderController::class, 'invoice'])->name('orders.invoice');

// Pages
Route::get('/search', [PageController::class, 'search'])->name('search');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
