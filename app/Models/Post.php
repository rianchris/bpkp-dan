<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'excerpt', 'body']; //untuk memasukkan data dengan metode mass asignment, kelemahannya jika ada tambahan kolom maka harus ditambah lagi kedalam $fillable, bisa gunakan $guarded supaya otomatis tanpa harus menambah lagi
    protected $guarded = ['id']; //artinya semua  data mass asignment bisa masuk kecuali data id
    protected $with = ['author', 'category']; //with: untuk mengatasi masalah n+1 query, eager loading untuk route di post controller

    const LIMIT = 30;
    public function limit()
    {
        return Str::limit($this->excerpt, Post::LIMIT);
    }

    //untuk menghubungkan ke tabel categories
    public function category()
    {
        return $this->belongsTo(Category::class); //1 post memiliki 1 kategori
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); //mengaliaskan foreign key user id menjadi author
    }
}
