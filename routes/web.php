<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('hubungi', function() {
    return view('hubungi');
});

Route::get('profile', function(){ 
    return view('profile', [
        "name" => "Rian Chris",
        "email" => "chrissesario.rian@gmail.com",
        "umur" => 23,
        "foto" => "pas foto.png"
    ]); //mengirim data ke view profile melalui routes menggunakan array associative
});
