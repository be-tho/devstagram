<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    //
	public function index()
	{
		return view('auth.register');
	}
	
	public function store(RegisterRequest $request)
	{
		
		$request->validated();
		//crear usuario
		User::create([
			'name' => $request->name,
			'username' => Str::slug($request->username),
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);
		
		auth()->attempt($request->only('email', 'password'));
		
		return redirect()->route('home.index')->with('success', 'Usuario creado correctamente');
	}
}
