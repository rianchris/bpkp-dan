<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            "navbar_active" => "post",
            "page_title" => "All Post",
            // "blog" => Post::all() // untuk menampilkan semua post
            "blog" => Post::latest()->get() // untuk menampilkan semua post berdasarkan tanggal terbaru
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            "navbar_active" => "post",
            "page_title" => $post->title,
            "title" => "Blog",
            "post" => $post
        ]);
    }
}
