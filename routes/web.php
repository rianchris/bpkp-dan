<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardNewsController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPublikasiController;
use App\Http\Controllers\AdminProjekController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/publikasi', [PublikasiController::class, 'index']);
Route::get('/publikasi/{publikasi:slug}', [PublikasiController::class, 'show']);

Route::get('/projek', [PublikasiController::class, 'index']);
Route::get('/produk', [PublikasiController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{news:slug}', [NewsController::class, 'show']);

Route::get('/news/category/{category:slug}', function (Category $category) {
    return view('news', [
        "title" => "News by Category : $category->name",
        "category" => Category::all(),
        "terbaru" => $category->news
    ]);
}); //route model binding
Route::get('/news/authors/{author:username}', function (User $author) {
    return view('news', [
        "title" => "News by Author : $author->name",
        "category" => Category::all(),
        "terbaru" => $author->news
    ]);
});

Route::get('/dashboard',  [DashboardController::class, 'index'])->middleware('auth');


Route::get('/dashboard/news/checkSlug', [DashboardNewsController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/publikasi/checkSlug', [AdminPublikasiController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/projek/checkSlug', [AdminProjekControlelr::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/news', DashboardNewsController::class)->middleware('auth');
Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin'); //middleware untuk memberi limit halaman hanya biksa diakses jika sudah login
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin'); //except untuk tidak 
Route::resource('/dashboard/publikasi', AdminPublikasiController::class)->middleware('periset'); //except untuk tidak 
Route::resource('/dashboard/projek', AdminProjekController::class)->middleware('periset'); //except untuk tidak 
Route::resource('/dashboard/produk', AdminProdukController::class)->middleware('periset');//except untuk tidak 