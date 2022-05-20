<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = Post::get();
    dd($posts);
});

Route::get('/hello', [PostController::class, 'index']);

Route::get('/greetings', function () {
    $name = 'orange';
    return view('greetings',[
        'name'=> $name,
    ]);
});