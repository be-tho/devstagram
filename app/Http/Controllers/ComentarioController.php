<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentarioRequest;
use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;

class ComentarioController extends Controller
{
    //
    public function store(ComentarioRequest $request,User $user,Post $post)
	{
	   $request->validated();
	   Comentario::create([
		  'user_id' => auth()->user()->id,
		  'post_id' => $post->id,
		  'comentario' => $request->comentario,
	   ]);
	   
	   return back()->with('success', 'Comentario agregado correctamente');
	}
}
