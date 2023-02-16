<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Rian Chris",
            "slug" => "judul-post-pertama",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat doloribus, itaque, temporibus ut cupiditate eaque facere ex molestias laudantium obcaecati ducimus recusandae, expedita commodi! Amet incidunt numquam perferendis ad, ipsa consequatur quam qui culpa repellat optio? Cupiditate, laboriosam voluptatibus! Placeat illum optio quo labore pariatur aut possimus, animi, voluptates vitae facilis nulla consequuntur deserunt accusamus nisi dicta adipisci quas, corrupti debitis deleniti dolores! Odio, error delectus! Harum consectetur exercitationem excepturi earum, in inventore, dolores optio ea iure numquam repudiandae voluptate?"
        ],
        [
            "title" => "Judul Post Rian Chris",
            "author" => "Rasmi",
            "slug" => "judul-post-kedua",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate minus, quis repudiandae nesciunt tenetur, debitis voluptatem temporibus voluptates est pariatur illum error recusandae facilis incidunt natus aspernatur laudantium facere! Est rem nesciunt excepturi, laboriosam corrupti perferendis officiis rerum incidunt voluptate eaque, repudiandae ea, neque similique quam maiores provident accusantium iusto. Veniam, esse soluta! Quidem iste quam autem sint laudantium fugit inventore quibusdam saepe quaerat optio, placeat distinctio hic ipsam id provident odio explicabo? Asperiores at, deleniti, quia repellendus ipsa et dignissimos possimus molestiae, accusantium libero reiciendis qui ex sapiente! Adipisci."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
