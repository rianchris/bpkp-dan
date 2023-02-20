<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // User::create([
        //     'name' => 'Rian Chris Sesario Sinaga',
        //     'email' => 'chrissesario.rian@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        // User::create([
        //     'name' => 'Boaston Sinaga',
        //     'email' => 'boastonsinaga@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        User::factory(3)->create(); // untuk memasukkan data dummy kedalam tabel user
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Android Programming',
            'slug' => 'android-programming'
        ]);

        Category::create([
            'name' => 'Microsoft Programming',
            'slug' => 'Microsoft-programming'
        ]);


        Post::factory(20)->create(); // untuk memasukkan data dummy kedalam tabel user
        //     Post::create([
        //         'title' => 'Judul Pertama',
        //         'slug' => 'judul-pertama',
        //         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //         'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis error commodi laboriosam exercitationem ea aut incidunt inventore quos a, id numquam, minima harum veritatis nulla repellat ipsum accusantium illum. Temporibus nisi necessitatibus odit pariatur mollitia deleniti iste. </p> <p> Amet, cum sequi, assumenda ab ad tempore sint earum est possimus quis incidunt doloribus reiciendis molestiae iure illum. </p><p>Cupiditate, corporis ea et odit, eaque illo adipisci ab accusamus consequuntur eligendi ullam dolorem enim alias eius mollitia dignissimos laboriosam! Adipisci consequuntur fugiat, magni dolorem similique animi dignissimos corrupti reiciendis architecto est facere commodi rerum sed, porro rem, repudiandae tempore sapiente nam excepturi provident. Aut.</p>',
        //         'category_id' => 1,
        //         'user_id' => 1
        //     ]);
        //     Post::create([
        //         'title' => 'Judul Kedua',
        //         'slug' => 'judul-ke-dua',
        //         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //         'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis error commodi laboriosam exercitationem ea aut incidunt inventore quos a, id numquam, minima harum veritatis nulla repellat ipsum accusantium illum. Temporibus nisi necessitatibus odit pariatur mollitia deleniti iste. </p> <p> Amet, cum sequi, assumenda ab ad tempore sint earum est possimus quis incidunt doloribus reiciendis molestiae iure illum. </p><p>Cupiditate, corporis ea et odit, eaque illo adipisci ab accusamus consequuntur eligendi ullam dolorem enim alias eius mollitia dignissimos laboriosam! Adipisci consequuntur fugiat, magni dolorem similique animi dignissimos corrupti reiciendis architecto est facere commodi rerum sed, porro rem, repudiandae tempore sapiente nam excepturi provident. Aut.</p>',
        //         'category_id' => 1,
        //         'user_id' => 1
        //     ]);
        //     Post::create([
        //         'title' => 'Judul Ketiga',
        //         'slug' => 'judul-ke-tiga',
        //         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //         'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis error commodi laboriosam exercitationem ea aut incidunt inventore quos a, id numquam, minima harum veritatis nulla repellat ipsum accusantium illum. Temporibus nisi necessitatibus odit pariatur mollitia deleniti iste. </p> <p> Amet, cum sequi, assumenda ab ad tempore sint earum est possimus quis incidunt doloribus reiciendis molestiae iure illum. </p><p>Cupiditate, corporis ea et odit, eaque illo adipisci ab accusamus consequuntur eligendi ullam dolorem enim alias eius mollitia dignissimos laboriosam! Adipisci consequuntur fugiat, magni dolorem similique animi dignissimos corrupti reiciendis architecto est facere commodi rerum sed, porro rem, repudiandae tempore sapiente nam excepturi provident. Aut.</p>',
        //         'category_id' => 2,
        //         'user_id' => 2
        //     ]);
        //     Post::create([
        //         'title' => 'Judul Keempat',
        //         'slug' => 'judul-ke-empat',
        //         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //         'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis error commodi laboriosam exercitationem ea aut incidunt inventore quos a, id numquam, minima harum veritatis nulla repellat ipsum accusantium illum. Temporibus nisi necessitatibus odit pariatur mollitia deleniti iste. </p> <p> Amet, cum sequi, assumenda ab ad tempore sint earum est possimus quis incidunt doloribus reiciendis molestiae iure illum. </p><p>Cupiditate, corporis ea et odit, eaque illo adipisci ab accusamus consequuntur eligendi ullam dolorem enim alias eius mollitia dignissimos laboriosam! Adipisci consequuntur fugiat, magni dolorem similique animi dignissimos corrupti reiciendis architecto est facere commodi rerum sed, porro rem, repudiandae tempore sapiente nam excepturi provident. Aut.</p>',
        //         'category_id' => 2,
        //         'user_id' => 2
        //     ]);
    }
}
