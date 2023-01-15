<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
	  if(auth()->user() === null) {
		 return redirect()->route('login.index')->with('error', 'Debes iniciar sesion para acceder a esta pagina');
	  }else{
		 $ids = auth()->user()->followings->pluck('id')->toArray();
		 $posts = Post::whereIn('user_id', $ids)->with('user')->latest()->paginate(5);
		 return view('sections.home', [
			'posts' => $posts,
		 ]);
	  }
   }
}
