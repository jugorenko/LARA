<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
    $posts = Post::get();
    return view('posts.index',
    [
        'posts' => $posts
    ]);

   }

   public function create()
   {
       return view('posts.create');

   }

   public function store(PostCreateRequest $request)
   {
       //dd($request);

       $validatedData = $request->validated([
            // 'title' => 'required|unique:posts|max:255',
            // 'body' => 'required',
            // 'author_name' => 'nullable',
       ]);

    //    $requestData = $request->all();
      // dd($validatedData);

      $validatedData = $request->validated();

       $post = Post::create([
           'title' => $validatedData['title'],
           'body' => $validatedData['body'],
           'author_name' => $validatedData['author_name'],
       ]);

       $post->save();

      // return redirect()->back();
      return redirect()->route('posts.show', ['post' => $post]);
   }

   public function show(Post $post)
   {
       //$post = Post::findOrfail($id);
       //dd{$id};
       return view('posts.show', [
           'post' => $post,
       ]);
   }

   public function edit(Post $post)
   {
       return view('posts.edit', [
           'post' => $post,
       ]);
   }

   public function update(PostUpdateRequest $request, Post $post)
   {
    $validatedData = $request->validated();
        // 'title' => 'required|max:255',
        // 'body' => 'required',
        // 'author_name' => 'nullable',
   

    
      // $requestData = $request->all();

       $post->title = $validatedData['title'];
       $post->body = $validatedData['body'];
       $post->author_name = $validatedData['author_name'];

       $post ->save();

       return redirect()->route('posts.show', ['post' => $post]);
   }

   public function destroy(Post $post)
   {
    $post->delete();
    return redirect()->route('posts.index');
   }

}
