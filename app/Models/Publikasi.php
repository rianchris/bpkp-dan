<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Publikasi extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
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
