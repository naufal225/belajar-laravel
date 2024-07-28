<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // private static $blog_posts = [
    //     [
    //         "judul" => "Lorem Ipsum",
    //         "slug" => "lorem-ipsum",
    //         "author" => "saya",
    //         "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda pariatur explicabo, ratione illo alias neque natus facere deserunt expedita iure. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, molestiae sed tenetur blanditiis impedit, nulla necessitatibus nihil quo, quasi voluptatibus recusandae. Possimus labore error, a distinctio neque dignissimos minima natus quidem officiis!"
    //     ],
    //     [
    //         "judul" => "Dolor Sit Amet",
    //         "slug" => "dolor-sit-amet",
    //         "author" => "saya",
    //         "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda pariatur explicabo, ratione illo alias neque natus facere deserunt expedita iure. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, molestiae sed tenetur blanditiis impedit, nulla necessitatibus nihil quo, quasi voluptatibus recusandae. Possimus labore error, a distinctio neque dignissimos minima natus quidem officiis!"
    //     ],
    // ];

    // public static function allPosts() {
    //     return collect(self::$blog_posts);
    // }

    // public static function find($slug) {
    //     $posts = static::allPosts();

    //     return $posts->firstWhere('slug', $slug);
    // }

    protected $fillable = [
        'title',
        'category_id',
        'user_id',
        'slug',
        'excerpt',
        'body',
        'author',
        'published_at',
    ];

    protected $with = ['category', 'user'];

    protected $load = ['category', 'user'];

    public function category() {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
}
