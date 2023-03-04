<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publikasi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $news = News::all();
        $publikasi = Publikasi::all();
        $user = User::all();
        return view('dashboard.index', [
            "total_News" => $news->count(),
            "total_Publikasi" => $publikasi->count(),
            "total_User" => $user->count()
        ]);
    }
}
