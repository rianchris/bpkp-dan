<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublikasiController;
use App\Models\Post; //klik kanan -> import all clasees = untuk menggunakan model yang belum terhubung

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
    return view('home', [
        "navbar_active" => "home",
        "page_title" => "Home"
    ]);
});

Route::get('/publikasi', [PublikasiController::class, 'index']);
Route::get('/publikasi/{publikasi:slug}', [PublikasiController::class, 'show']);

Route::get('/projek', [PublikasiController::class, 'index']);
Route::get('/produk', [PublikasiController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);

Route::get('/news/{news:slug}', [NewsController::class, 'show']);


Route::get('/blog', [PostController::class, 'index']);
//halaman single blog
Route::get('/blog/{post:slug}', [PostController::class, 'show']);




Route::get('/categories', function () {
    return view('category', [
        'navbar_active' => 'categories',
        'page_title' => 'categories',
        'categories' => Category::all()
    ]);
});


Route::get('/categories/{category:slug}', function (Category $category) {
    return view('news', [
        'navbar_active' => 'categories',
        'page_title' => "Post By Category : $category->name",
        'blog' => $category->news->load('category', 'author')
    ]);
});

Route::get('/author/{author:username}', function (User $author) {
    return view('news', [
        'navbar_active' => 'post',
        'page_title' => "Post By Author : $author->name",
        'blog' => $author->news->load('category', 'author') //untuk mengatasi masalah n+1, lazy eager load untuk route di web.php
    ]);
});


// Route::get('profile', function () {
//     return view('profile', [
//         "navbar_active" => "profile",
//         "page_title" => "Profile",
//         "name" => "Rian Chris",
//         "email" => "chrissesario.rian@gmail.com",
//         "umur" => 23,
//         "foto" => "pas foto.png"
//     ]); //mengirim data ke view profile melalui routes menggunakan array associative
// });
