<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view("home", [
            "event" => News::where('category_id', 1)->take(10)->latest()->get(),
            "gallery" => News::where('category_id', 2)->take(10)->latest()->get(),
            "student" => News::where('category_id', 3)->take(10)->latest()->get()
        ]);
    }
}
