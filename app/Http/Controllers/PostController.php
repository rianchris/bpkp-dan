<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // untuk menampilkan semua post berdasarkan tanggal terbaru

        return view('posts', [
            "navbar_active" => "post",
            "page_title" => "All Post",
            // "blog" => Post::all() // untuk menampilkan semua post
            "blog" => Post::latest()->filter(request(['search', 'category']))->get()
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
