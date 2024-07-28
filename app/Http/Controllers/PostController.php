<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog_posts = Post::with(['user', 'category'])->latest()->get();

        return view("blog", [
            "title" => "Blog",
            "posts" => $blog_posts
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view("post", [
            "post" => $post,
            "title" => $post->slug
        ]);
    }

    public function detail(Category $category) {
        return view('blog', [
            "title" => $category->name,
            "category" => $category,
            "posts" => $category->posts
        ]);
    }

    public function author(User $user) {
        return view('blog', [
            'title' => "Author Posts",
            'posts' => $user->posts,
            "author" => $user->name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
