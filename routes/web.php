<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post; //klik kanan -> import all clasees = untuk menggunakan model yang belum terhubung
use App\Models\Category;
use App\Models\User;

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
        "title" => "Home"
    ]);
});

Route::get('hubungi', function () {
    return view('hubungi', [
        "title" => "Hubungi Kami"
    ]);
});

Route::get('profile', function () {
    return view('profile', [
        "title" => "Profile",
        "name" => "Rian Chris",
        "email" => "chrissesario.rian@gmail.com",
        "umur" => 23,
        "foto" => "pas foto.png"
    ]); //mengirim data ke view profile melalui routes menggunakan array associative
});


Route::get('/blog', [PostController::class, 'index']);
//halaman single blog
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('category', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blog', [
        'page_title' => "Post By Caregory : $category->name",
        'blog' => $category->post->load('category', 'author')
    ]);
});

Route::get('/author/{author:username}', function (User $author) {
    return view('blog', [
        'page_title' => "Post By Author : $author->name",
        'blog' => $author->posts->load('category', 'author') //untuk mengatasi masalah n+1, lazy eager load untuk route di web.php
    ]);
});
