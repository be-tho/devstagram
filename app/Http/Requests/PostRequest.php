<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
		 'titulo' => 'required|min:5',
		 'descripcion' => 'required',
		 'imagen' => 'required',
	  ];
   }
   
   public function messages()
   {
	  return [
		 'titulo.required' => 'El campo titulo es obligatorio',
		 'titulo.min' => 'El campo titulo debe tener al menos 5 caracteres',
		 'descripcion.required' => 'El campo descripcion es obligatorio',
		 'imagen.required' => 'El campo imagen es obligatorio',
	  ];
   }
}
