<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
					'name' => 'required|string|max:30',
	        'username' => 'required|string|max:30|unique:users|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
          'email' => 'required|string|email|max:60|unique:users',
          'password' => 'required|min:8|confirmed',
          ];
    }
		
		public function messages()
		{
				return [
						'name.required' => 'El campo nombre es obligatorio',
						'name.string' => 'El campo nombre debe ser una cadena de texto',
						'name.max' => 'El campo nombre no debe ser mayor a 30 caracteres',
						'username.required' => 'El campo nombre de usuario es obligatorio',
						'username.string' => 'El campo nombre de usuario debe ser una cadena de texto',
						'username.max' => 'El campo nombre de usuario no debe ser mayor a 60 caracteres',
						'username.unique' => 'El nombre de usuario ya se encuentra en uso',
						'username.regex' => 'El nombre de usuario debe ser un slug',
						'email.required' => 'El campo email es obligatorio',
						'email.string' => 'El campo email debe ser una cadena de texto',
						'email.email' => 'El campo email debe ser un email válido',
						'email.max' => 'El campo email no debe ser mayor a 100 caracteres',
						'email.unique' => 'El email ya se encuentra registrado',
						'password.required' => 'El campo contraseña es obligatorio',
						'password.min' => 'El campo contraseña debe tener al menos 8 caracteres',
						'password.confirmed' => 'Las contraseñas no coinciden',
						//
				];
		}
}
