<?php

use App\Http\Controllers\PostController;
use App\Models\Fastfood;
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

//Route::get('/posts',[PostController::class,'index']);

Route::get('/hello', [PostController::class, 'index']);

// Route::get('/greetings', function () {
//     $name = 'orange';
//     return view('greetings' , [
//         'name'=> $name,
//     ]);
// });

//--just added my own fasfood model

// Route::get('/fastfood', function () {
//     $posts = Post::get();
//     dd($posts);
// });

Route::controller(PostController::class)->group(function(){
    Route::prefix('posts')->group(function() {
        Route::get('/','index')->name('posts.index');
        Route::get('/create', 'create')->name('posts.create');
        Route::post('/create', 'store')->name('posts.store');
        Route::get('/edit/{post}','edit')->name('posts.edit');
        Route::post('/edit/{post}','update')->name('posts.update');
        Route::get('/show/{post}','show')->name('posts.show');
        Route::get('/destroy/{post}','destroy')->name('posts.destroy');
    });
});
