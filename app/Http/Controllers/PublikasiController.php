<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use App\Http\Controllers\Controller;

class PublikasiController extends Controller
{
    public function index()
    {
        return view('publikasi', [
            "navbar_active" => "publikasi",
            "page_title" => "Publikasi",
            // "blog" => Post::all() // untuk menampilkan semua post
            "publikasi" => Publikasi::latest()->get()
        ]);
    }
    public function show(Publikasi $publikasi)
    {
        return view('publikasi_single', [
            "navbar_active" => "publikasi",
            "page_title" => $publikasi->title,
            "title" => "Publikasi",
            "publikasi" => $publikasi
        ]);
    }
}
