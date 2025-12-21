<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'frontend.index')->name('frontend.home');
Route::view('/produk', 'frontend.produk')->name('frontend.produk');
Route::view('/cart', 'frontend.cart')->name('frontend.cart');
Route::view('/kontak', 'frontend.kontak')->name('frontend.kontak');
Route::view('/bantuan', 'frontend.bantuan')->name('frontend.bantuan');
Route::view('/tentang', 'frontend.tentang')->name('frontend.tentang');

Route::view('/welcome', 'welcome')->name('welcome');
