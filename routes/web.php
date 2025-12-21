<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'frontend.index')->name('frontend.home');
Route::view('/produk', 'frontend.produk')->name('frontend.produk');
Route::view('/cart', 'frontend.cart')->name('frontend.cart');
Route::view('/kontak', 'frontend.kontak')->name('frontend.kontak');
Route::view('/bantuan', 'frontend.bantuan')->name('frontend.bantuan');
Route::view('/tentang', 'frontend.tentang')->name('frontend.tentang');

// AUTH (Blade + JWT via API)
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::get('/register', fn () => view('auth.register'))->name('register');

// DASHBOARD (protected by token di frontend)
Route::get('/dashboard', fn () => view('dashboard.index'))->name('dashboard');

// OPTIONAL
Route::view('/welcome', 'welcome')->name('welcome');
