<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardNewsController extends Controller
{
    public function index()
    {

        if (auth()->user()->is_admin == 0) {
            $news = News::where('user_id', auth()->user()->id)->latest()->get();
        } else {
            $news = News::latest()->get();
        }
        return view('dashboard.news.index', [
            "news" => $news

            // "news" => News::get()
        ]);
    }

    public function create()
    {
        return view('dashboard.news.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024', // file untuk validasi batas ukuran
            'body' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('news-image');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 200));
        News::create($validatedData);
        return redirect('/dashboard/news')->with('success', 'News has been added');
    }

    public function show(News $news)
    {
        return view('dashboard.news.show', [
            'news' => $news
        ]);
    }

    public function edit(News $news)
    {
        return view('dashboard.news.edit', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            // 'slug' => 'required|unique:news',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ];

        if ($request->slug != $news->slug) {
            $rules['slug'] = 'required|unique:news';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage); //untuk menghapus gambar yang lama ketika gambar di edit
            }
            $validatedData['image'] = $request->file('image')->store('news-image');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 200));
        News::where('id', $news->id)
            ->update($validatedData);
        return redirect('/dashboard/news')->with('success', 'News has been updated');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::delete($news->image); //untuk menghapus gambar yang lama ketika gambar di edit
        }
        News::destroy($news->id);
        return redirect('/dashboard/news')->with('success', 'News has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(News::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
