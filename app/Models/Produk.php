<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;

class Produk extends Model
{
    use Sluggable;
    use HasFactory;
    // protected $fillable = ['title', 'excerpt', 'body']; //untuk memasukkan data dengan metode mass asignment, kelemahannya jika ada tambahan kolom maka harus ditambah lagi kedalam $fillable, bisa gunakan $guarded supaya otomatis tanpa harus menambah lagi
    protected $guarded = ['id']; //artinya semua  data mass asignment bisa masuk kecuali data id
    protected $with = ['author']; //with: untuk mengatasi masalah n+1 query, eager loading untuk route di post controller

    const LIMIT = 30;
    public function limit()
    {
        return Str::limit($this->excerpt, Post::LIMIT);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); //mengaliaskan foreign key user id menjadi author
    }

    public function getRouteKeyName() //agar route dashboard/news/slug bisa dibuatkan model bindingnya
    {
        return 'slug';
    }

    public function sluggable(): array //untuk membuat otomatis title menjadi slug
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
