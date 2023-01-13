<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index()
   {
	  return view('auth.login');
   }
   
   public function store(LoginRequest $request)
   {
	  $credentials = $request->only(['email', 'password']);
   
	  if (Auth::attempt($credentials, $request->remember)) return to_route('home.index')->with('success', 'Login realizado com exito');
   
	  return back()->with([
		 'error' => 'Credenciales incorrectas'
	  ]);
   }
}
