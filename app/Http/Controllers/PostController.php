<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            "title" => "Blog",
            "blog" => Post::all()
        ]);
    }
    public function show($id)
    {
        return view('post', [
            "title" => "Blog",
            "post" => Post::find($id)
        ]);
    }
}