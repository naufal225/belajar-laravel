<?php

use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/blog', [PostController::class, "index"]);

Route::get('/blog/{post:slug}', [PostController::class, "show"]);

Route::get('/categories', function() {
    return view('categories', [
        "title" => "Post Categories",
        "categories" => Category::all()
    ]);
});

Route::get('/author/{user:name}', [PostController::class, "author"]);

Route::get('/category/{category:slug}', [PostController::class, "detail"]);

Route::get('/login', [LoginController::class, "index"])->middleware('guest');

Route::get('/register', [RegisterController::class, "index"]);

Route::post('/register', [RegisterController::class, "store"]);

Route::post('/login', [LoginController::class, "authenticate"]);

Route::post('/logout', [LoginController::class, "logout"]);

Route::get('/dashboard', function() {
    return view('dashboard.index', [
        "title" => "Dashboard",
        "active" => "dashboard",
        "posts" => Post::where('user_id', Auth::user()->id)->latest()->get()
    ]);
})->middleware("auth");

Route::get('/dashboard/posts', function() {
    return view('dashboard.posts.index', [
        "title" => "Dashboard",
        "active" => "posts",
        "posts" => Post::where('user_id', Auth::user()->id)->latest()->get()
    ]);
})->middleware("auth");

Route::get('/dashboard/posts/checkslug', [DashboardPostController::class, "checkSlug"])->middleware("auth");

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware("auth");