<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('hubungi', function () {
    return view('hubungi', [
        "title" => "Hubungi Kami"
    ]);
});

Route::get('profile', function () {
    return view('profile', [
        "title" => "Profile",
        "name" => "Rian Chris",
        "email" => "chrissesario.rian@gmail.com",
        "umur" => 23,
        "foto" => "pas foto.png"
    ]); //mengirim data ke view profile melalui routes menggunakan array associative
});




Route::get('blog', function () {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Rian Chris",
            "slug" => "judul-post-pertama",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat doloribus, itaque, temporibus ut cupiditate eaque facere ex molestias laudantium obcaecati ducimus recusandae, expedita commodi! Amet incidunt numquam perferendis ad, ipsa consequatur quam qui culpa repellat optio? Cupiditate, laboriosam voluptatibus! Placeat illum optio quo labore pariatur aut possimus, animi, voluptates vitae facilis nulla consequuntur deserunt accusamus nisi dicta adipisci quas, corrupti debitis deleniti dolores! Odio, error delectus! Harum consectetur exercitationem excepturi earum, in inventore, dolores optio ea iure numquam repudiandae voluptate?"
        ],
        [
            "title" => "Judul Post Kedua",
            "author" => "Rasmi",
            "slug" => "judul-post-kedua",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate minus, quis repudiandae nesciunt tenetur, debitis voluptatem temporibus voluptates est pariatur illum error recusandae facilis incidunt natus aspernatur laudantium facere! Est rem nesciunt excepturi, laboriosam corrupti perferendis officiis rerum incidunt voluptate eaque, repudiandae ea, neque similique quam maiores provident accusantium iusto. Veniam, esse soluta! Quidem iste quam autem sint laudantium fugit inventore quibusdam saepe quaerat optio, placeat distinctio hic ipsam id provident odio explicabo? Asperiores at, deleniti, quia repellendus ipsa et dignissimos possimus molestiae, accusantium libero reiciendis qui ex sapiente! Adipisci."
        ]
    ];
    return view('blog', [
        "title" => "Blog",
        "blog" => $blog_posts
    ]);
});



//halaman single blog
Route::get('blog/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Rian Chris",
            "slug" => "judul-post-pertama",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat doloribus, itaque, temporibus ut cupiditate eaque facere ex molestias laudantium obcaecati ducimus recusandae, expedita commodi! Amet incidunt numquam perferendis ad, ipsa consequatur quam qui culpa repellat optio? Cupiditate, laboriosam voluptatibus! Placeat illum optio quo labore pariatur aut possimus, animi, voluptates vitae facilis nulla consequuntur deserunt accusamus nisi dicta adipisci quas, corrupti debitis deleniti dolores! Odio, error delectus! Harum consectetur exercitationem excepturi earum, in inventore, dolores optio ea iure numquam repudiandae voluptate?"
        ],
        [
            "title" => "Judul Post Kedua",
            "author" => "Rasmi",
            "slug" => "judul-post-kedua",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate minus, quis repudiandae nesciunt tenetur, debitis voluptatem temporibus voluptates est pariatur illum error recusandae facilis incidunt natus aspernatur laudantium facere! Est rem nesciunt excepturi, laboriosam corrupti perferendis officiis rerum incidunt voluptate eaque, repudiandae ea, neque similique quam maiores provident accusantium iusto. Veniam, esse soluta! Quidem iste quam autem sint laudantium fugit inventore quibusdam saepe quaerat optio, placeat distinctio hic ipsam id provident odio explicabo? Asperiores at, deleniti, quia repellendus ipsa et dignissimos possimus molestiae, accusantium libero reiciendis qui ex sapiente! Adipisci."
        ]
    ];

    $new_post = [];
    foreach ($blog_posts as $blogs) {
        if ($blogs["slug"] === $slug) {
            $new_post = $blogs;
        }
    }

    return view('post', [
        "title" => "Blog",
        "post" => $new_post
    ]);
});
