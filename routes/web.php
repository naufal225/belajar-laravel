<?php

use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Models\Category;
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


