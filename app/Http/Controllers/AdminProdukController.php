<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProdukController extends Controller
{
    public function index()
    {

        if (auth()->user()->is_admin == 0) {
            $produk = Produk::where('user_id', auth()->user()->id)->latest()->get();
        } else {
            $produk = Produk::latest()->get();
        }
        return view('dashboard.produk.index', [
            "produk" => $produk
        ]);
    }

    public function create()
    {
        return view('dashboard.produk.create', [
            "author" => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $slug = SlugService::createSlug(Produk::class, 'slug', $request['title']);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'deskripsi' => 'required',
            'member' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('produk-image');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = $slug;
        Produk::create($validatedData);
        return redirect('/dashboard/produk')->with('success', 'Produk has been added');
    }

    public function edit(Produk $produk)
    {
        return view('dashboard.produk.edit', [
            'produk' => $produk,
        ]);
    }

    public function update(Request $request, Produk $produk)
    {
        $slug = SlugService::createSlug(Produk::class, 'slug', $request['title']);
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'deskripsi' => 'required',
            'member' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage); //untuk menghapus gambar yang lama ketika gambar di edit
            }
            $validatedData['image'] = $request->file('image')->store('produk-image');
        }
        $validatedData['slug'] = $slug;
        $validatedData['user_id'] = auth()->user()->id;
        Produk::where('id', $produk->id)->update($validatedData);
        return redirect('/dashboard/produk')->with('success', 'Produk has been updated');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->image) {
            Storage::delete($produk->image); //untuk menghapus gambar yang lama ketika gambar di edit
        }
        Produk::destroy($produk->id);
        return redirect('/dashboard/produk')->with('success', 'Produk has been deleted!');
    }
}
