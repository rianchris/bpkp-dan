<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        // untuk menampilkan semua post berdasarkan tanggal terbaru

        return view('news', [
            "navbar_active" => "post",
            "page_title" => "All Post",
            // "blog" => Post::all() // untuk menampilkan semua post
            "blog" => News::latest()->filter(request(['search', 'category']))->get()
        ]);
    }
    public function gallery()
    {
        return "Ini halaman Galery";
    }
    public function student()
    {
        return "ini Halam Student";
    }
}
