<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Produk;
use App\Models\Publikasi;
use App\Models\Projek;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view("home", [
            "carousel" => News::where('is_carousel', 1)->first(),
            "news" => News::take(6)->latest()->get(),
            "publikasi" => Publikasi::take(6)->latest()->get(),
            "produk" => Produk::take(6)->latest()->get(),
            "projek" => Projek::take(6)->latest()->get(),
        ]);
    }
}
