<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        // untuk menampilkan semua post berdasarkan tanggal terbaru

        return view('news', [
            "page_title" => "All Post",
            // "blog" => Post::all() // untuk menampilkan semua post
            "news" => News::latest()->filter(request(['search', 'category']))->get()
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

    public function show(News $news)
    {
        return view('news_single', [
            "news" => $news,
            "comment" => News::find($news['id'])->comment,
            "category" => Category::get()
        ]);
    }
}
