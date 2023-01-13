<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
   //
   public function index(User $user)
   {
	  //traer los posts del usuario
	  $posts = Post::where('user_id', $user->id)->paginate(8);
	  
	  return view('sections.dashboard', [
		 'user' => $user,
		 'posts' => $posts
	  ]);
   }
   
   public function create()
   {
	  return view('posts.create');
   }
   
   public function store(PostRequest $request)
   {
	  $request->validated();
	  
	  Post::create([
		 'user_id' => auth()->user()->id,
		 'titulo' => $request->titulo,
		 'descripcion' => $request->descripcion,
		 'imagen' => $request->imagen,
	  ]);
	  
	  return redirect()->route('dashboard.index', auth()->user()->username);
   }
   
   public function show(User $user , Post $post)
   {
	  return view('posts.show', [
		 'post' => $post,
		 'user' => $user
	  ]);
   }
}
