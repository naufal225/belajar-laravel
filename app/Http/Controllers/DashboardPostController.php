<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            "posts" => Post::where("user_id", Auth::user()->id)->latest()->get()
        ]);
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
        $validate = $request->validate([
            "title" => "required|max:255",
            "slug" => "required|unique:posts",
            "category_id" => "required",
            "image" => "required|file",
            "body" => "required"
        ]);

        $validate['image'] = $request->file('image')->store('post-images');
        $validate['user_id'] = Auth::user()->id;
        $validate['excerpt'] = Str::limit($request->body, 100, "...");

        Post::create($validate);

        return redirect('/dashboard/posts')->with("success", "New post has been added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            "post" => $post
        ]);
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
    public function update(Request $request, Post $post) {
        $rules = [
            "title" => "required|max:255",
            "category_id" => "required",
            "body" => "required",
            "image" => "nullable|file"
        ];
    
        if ($post->slug != $request->slug) {
            $rules["slug"] = "required|unique:posts";
        }
    
        $validate = $request->validate($rules);
    
        if($request->file("image")) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file("image")->store("post-images");
        }
    
        $post->update($validate);
    
        return redirect('/dashboard/posts')->with("success", "One post has been updated");
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard')->with("success", "Post has been deleted");
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json([
            "slug" => $slug
        ]);
    }

    public function showAllPosts(Request $request) {
        return view('dashboard.index', [
            "posts" => Post::latest()->paginate(10)
        ]);
    }
}
