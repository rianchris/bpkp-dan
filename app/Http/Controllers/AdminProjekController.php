<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProjekController extends Controller
{
    public function index()
    {

        if (auth()->user()->is_admin == 0) {
            $projek = Projek::where('user_id', auth()->user()->id)->latest()->get();
        } else {
            $projek = Projek::latest()->get();
        }
        return view('dashboard.projek.index', [
            "projek" => $projek
            // "projek" => projek::get()
        ]);
    }

    public function create()
    {
        return view('dashboard.projek.create', [
            "author" => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $slug = SlugService::createSlug(Projek::class, 'slug', $request['title']);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'deskripsi' => 'required',
            'partner' => 'required',
            'budget' => 'required',
            'kontak' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('projek-image');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = $slug;
        Projek::create($validatedData);
        return redirect('/dashboard/projek')->with('success', 'projek has been added');
    }

    public function edit(Projek $projek)
    {
        return view('dashboard.projek.edit', [
            'projek' => $projek,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Projek $projek)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ];

        if ($request->slug != $projek->slug) {
            $rules['slug'] = 'required|unique:projek';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage); //untuk menghapus gambar yang lama ketika gambar di edit
            }
            $validatedData['image'] = $request->file('image')->store('projek-image');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 200));
        Projek::where('id', $projek->id)
            ->update($validatedData);
        return redirect('/dashboard/projek')->with('success', 'projek has been updated');
    }

    public function destroy(Projek $projek)
    {
        if ($projek->image) {
            Storage::delete($projek->image); //untuk menghapus gambar yang lama ketika gambar di edit
        }
        Projek::destroy($projek->id);
        return redirect('/dashboard/projek')->with('success', 'projek has been deleted!');
    }
}
