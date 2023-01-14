<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
   public function index()
   {
	  return view('perfil.index');
   }
   
   public function store(PerfilRequest $request)
   {
	  //todo agregar password con reconfirmación
	  $request->validated();
	  if ($request->imagen) {
		 $imagen = $request->file('imagen');
		 
		 $nombreImagen = Str::uuid() . '.' . $imagen->extension();
		 $imagenServidor = Image::make($imagen)->fit(400, 400, null, 'center');
		 $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
		 $imagenServidor->save($imagenPath);
		 //elimina la imagen anterior
		 unlink(public_path('perfiles') . '/' . auth()->user()->imagen);
	  }
	  $usuario = User::find(auth()->user()->id);
	  $usuario->username = $request->username;
	  $usuario->email = $request->email;
	  $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
	  $usuario->save();
	  
	  return redirect()->route('dashboard.index', $usuario->username)->with('success', 'Perfil actualizado correctamente');
   }
}
