<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk', [
            "produk" => Produk::latest()->get()
        ]);
    }
    public function show(Produk $produk)
    {
        return view('produk_single', [
            "produk" => $produk
        ]);
    }
}
