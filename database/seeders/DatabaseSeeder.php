<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use App\Models\Publikasi;
use App\Models\Projek;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 1,
            'is_periset' => 1
        ]);
        User::create([
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345'),
            'is_periset' => 1
        ]);


        User::factory(3)->create(); // untuk memasukkan data dummy kedalam tabel user
        Category::create([
            'name' => 'Event',
            'slug' => 'event'
        ]);

        Category::create([
            'name' => 'Gallery',
            'slug' => 'gallery'
        ]);

        Category::create([
            'name' => 'Student Opportunities',
            'slug' => 'student-opportunities'
        ]);


        News::factory(20)->create();
        Projek::factory(20)->create();
        Publikasi::factory(15)->create();
    }
}
