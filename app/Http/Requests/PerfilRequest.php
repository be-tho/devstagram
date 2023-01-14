<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
{
   /**
	* Determine if the user is authorized to make this request.
	*
	* @return bool
	*/
   public function authorize()
   {
	  return true;
   }
   
   /**
	* Get the validation rules that apply to the request.
	*
	* @return array<string, mixed>
	*/
   public function rules()
   {
	  return [
		 'username' => 'unique:users,username,' . auth()->user()->id, 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|not_in:twitter,facebook,instagram,editar-perfil|min:3|max:20',
		 'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
		 'email' => 'email|unique:users,email,' . auth()->user()->email,
	  ];
   }
   
   public function messages()
   {
	  return [
		 'username.unique' => 'El nombre de usuario ya está en uso',
		 'username.regex' => 'El nombre de usuario solo puede contener letras minúsculas, números y guiones',
		 'username.not_in' => 'El nombre de usuario no puede ser twitter, facebook, instagram o editar-perfil',
		 'username.min' => 'El nombre de usuario debe tener al menos 3 caracteres',
		 'username.max' => 'El nombre de usuario no puede tener más de 20 caracteres',
		 'imagen.image' => 'El archivo debe ser una imagen',
		 'imagen.mimes' => 'El archivo debe ser una imagen con formato jpeg, png, jpg, gif, svg o webp',
		 'imagen.max' => 'El archivo debe pesar menos de 2MB',
		 'email.email' => 'El email no es válido',
		 'email.unique' => 'El email ya está en uso',
	  ];
   }
}
