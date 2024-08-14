<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('post-images');

        $fileName = basename($path);

        $validate = $request->validate([
            "title" => "required|max:255",
            "slug" => "required|unique:posts",
            "category_id" => "required",
            "body" => "required"
        ]);

        $validate['user_id'] = Auth::user()->id;
        $validate['excerpt'] = Str::limit($request->body, 100, "...");

        Post::create($validate);

        return redirect('/dashboard')->with("success", "New post has been added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            "post" => $post
        ]);

        // return $post;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            "post" => $post,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            "title" => "required|max:255",
            "category_id" => "required",
            "body" => "required"
        ];

        if($post->slug != $request->slug) {
            $rules["slug"] = "required|unique:posts";
        }

        $validate = $request->validate($rules);

        Post::where("id", $request->id)
            ->update($validate);

        return redirect('/dashboard')->with("success", "One post has been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect('/dashboard')->with("success", "Post has been deleted");
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json([
            "slug" => $slug
        ]);
    }
}
