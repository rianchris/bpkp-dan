<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'excerpt', 'body']; //untuk memasukkan data dengan metode mass asignment, kelemahannya jika ada tambahan kolom maka harus ditambah lagi kedalam $fillable, bisa gunakan $guarded supaya otomatis tanpa harus menambah lagi
    protected $guarded = ['id']; //artinya semua  data mass asignment bisa masuk kecuali data id


}
