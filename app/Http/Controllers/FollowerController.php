<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowerController extends Controller
{
    public function store(User $user)
	{
	   $user->followers()->attach( auth()->user()->id );
	   return back()->with('success', 'Estas siguiendo a ' . $user->name);
	}
	public function destroy(User $user)
	{
	   $user->followers()->detach( auth()->user()->id );
	   return back()->with('success', 'Dejaste de seguir a ' . $user->name);
	}
}
