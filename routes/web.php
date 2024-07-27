<?php

use App\Models\Post;
use App\Http\Controllers\PostController;
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


