<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function post()
    {
        return $this->hasMany(Post::class); //kategori menampilkan banyak post
    }
    public function news()
    {
        return $this->hasMany(News::class); //kategori menampilkan banyak post
    }
}
