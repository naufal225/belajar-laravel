<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view("home", [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view("about", [
        "title" => "About",
        "name" => "Naufal Ma'ruf Ashrori",
        "email" => "naufalmarufashrori225@gmail.com",
        "profil" => "logo.png"
    ]);
});


Route::get('/blog', function () {
    $blog_posts = [
        [
            "judul" => "Lorem Ipsum",
            "slug" => "lorem-ipsum",
            "author" => "saya",
            "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda pariatur explicabo, ratione illo alias neque natus facere deserunt expedita iure. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, molestiae sed tenetur blanditiis impedit, nulla necessitatibus nihil quo, quasi voluptatibus recusandae. Possimus labore error, a distinctio neque dignissimos minima natus quidem officiis!"
        ],
        [
            "judul" => "Dolor Sit Amet",
            "slug" => "dolor-sit-amet",
            "author" => "saya",
            "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda pariatur explicabo, ratione illo alias neque natus facere deserunt expedita iure. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, molestiae sed tenetur blanditiis impedit, nulla necessitatibus nihil quo, quasi voluptatibus recusandae. Possimus labore error, a distinctio neque dignissimos minima natus quidem officiis!"
        ],
    ];
    
    return view("blog", [
        "title" => "Blog",
        "posts" => $blog_posts
    ]);
});

Route::get('/blog/{slug}', function($slug){

    $blog_posts = [
        [
            "judul" => "Lorem Ipsum",
            "slug" => "lorem-ipsum",
            "author" => "saya",
            "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda pariatur explicabo, ratione illo alias neque natus facere deserunt expedita iure. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, molestiae sed tenetur blanditiis impedit, nulla necessitatibus nihil quo, quasi voluptatibus recusandae. Possimus labore error, a distinctio neque dignissimos minima natus quidem officiis!"
        ],
        [
            "judul" => "Dolor Sit Amet",
            "slug" => "dolor-sit-amet",
            "author" => "saya",
            "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda pariatur explicabo, ratione illo alias neque natus facere deserunt expedita iure. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, molestiae sed tenetur blanditiis impedit, nulla necessitatibus nihil quo, quasi voluptatibus recusandae. Possimus labore error, a distinctio neque dignissimos minima natus quidem officiis!"
        ],
    ];

    $new_post = [];
    foreach($blog_posts as $post) {
        if($post['slug'] == $slug) {
            $new_post = $post;
        }
    }

    return view("post", [
        "post" => $new_post,
        "title" => $new_post['slug']
    ]);
});


