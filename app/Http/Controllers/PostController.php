<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            "page_title" => "All Post",
            // "blog" => Post::all() // untuk menampilkan semua post
            "blog" => Post::with('author', 'category')->latest()->get() // untuk menampilkan semua post berdasarkan tanggal terbaru
            //with: untuk mengatasi masalah n+1 query, eager loading untuk route di controller
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            "page_title" => $post->title,
            "title" => "Blog",
            "post" => $post
        ]);
    }
}
