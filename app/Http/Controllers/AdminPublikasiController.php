<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Publikasi;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPublikasiController extends Controller
{
    public function index()
    {

        if (auth()->user()->is_admin == 0) {
            $publikasi = Publikasi::where('user_id', auth()->user()->id)->latest()->get();
        } else {
            $publikasi = Publikasi::latest()->get();
        }

        return view('dashboard.publikasi.index', [
            "publikasi" => $publikasi
        ]);
    }

    public function create()
    {
        return view('dashboard.publikasi.create', [
            'publikasi' => Publikasi::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'publisher' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('publikasi-file'); //store data ke penyimpanan file
        }

        $validatedData['user_id'] = auth()->user()->id;
        Publikasi::create($validatedData);
        return redirect('/dashboard/publikasi')->with('success', 'Publikasi has been added');
    }


    public function edit(Publikasi $publikasi)
    {
        return view('dashboard.publikasi.edit', [
            'publikasi' => $publikasi
        ]);
    }

    public function update(Request $request, Publikasi $publikasi)
    {
        $rules = [
            'title' => 'required|max:255',
            // 'slug' => 'required|unique:news',
            'publisher' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx'
        ];

        if ($request->slug != $publikasi->slug) {
            $rules['slug'] = 'required|unique:news';
        }

        $validatedData = $request->validate($rules);


        $validatedData['file'] = $request->file('file')->store('file'); //store data ke penyimpanan file
        $validatedData['user_id'] = auth()->user()->id;
        Publikasi::where('id', $publikasi->id)
            ->update($validatedData);
        return redirect('/dashboard/publikasi')->with('success', 'Publikasi has been updated');
    }

    public function destroy(Publikasi $publikasi)
    {
        if ($publikasi->file) {
            Storage::delete($publikasi->news);
        }
        Publikasi::destroy($publikasi->id);
        return redirect('/dashboard/publikasi')->with('success', 'Publikasi has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Publikasi::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
