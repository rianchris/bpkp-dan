<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Http\Controllers\Controller;

class ProjekController extends Controller
{
    public function index()
    {
        return view('projek', [
            "projek" => Projek::latest()->get()
        ]);
    }
    public function show(Projek $projek)
    {
        return view('projek_single', [
            "projek" => $projek
        ]);
    }
}
