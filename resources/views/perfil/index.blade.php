@extends('layouts.app')
@section('titulo')
	Editar perfil: {{ auth()->user()->username }}
@endsection
@section('content')
<div class="md:flex md:justify-center">
	<div class="md:w-1/2 bg-white shadow p-6">
		<form action="{{ route('perfil.store') }}" class="mt-10 md:mt-0" method="post" enctype="multipart/form-data">
			@method('POST')
			@csrf
			<div class="mb-3">
				<label for="username"  class="mb-2 block uppercase text-gray-500 font-bold">
					Username
				</label>
				<input type="text" name="username" id="username" class="w-full border-2 border-gray-200 p-3 rounded-lg mb-3 @error('username') border-red-500 @enderror"
				       value="{{auth()->user()->username}}" placeholder="Tu Nombre de usuario">
				@error('username')
				<div class="text-red-500 text-sm">
					<div class="flex items-center gap-2 py-1 px-2 text-red-600 rounded">
						<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg>
						{{ $message }}
					</div>
				</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="email"  class="mb-2 block uppercase text-gray-500 font-bold">
					Email
				</label>
				<input type="text" name="email" id="email" class="w-full border-2 border-gray-200 p-3 rounded-lg mb-3 @error('email') border-red-500 @enderror"
				       value="{{auth()->user()->email}}" placeholder="Tu Nombre de usuario">
				@error('email')
				<div class="text-red-500 text-sm">
					<div class="flex items-center gap-2 py-1 px-2 text-red-600 rounded">
						<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg>
						{{ $message }}
					</div>
				</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="imagen"  class="mb-2 block uppercase text-gray-500 font-bold">
					Imagen Perfil
				</label>
				<input
					type="file"
					name="imagen"
					id="imagen"
					class="w-full border-2 border-gray-200 p-3 rounded-lg mb-3 "
					accept=".jpg, .jpeg, .png">
				@error('imagen')
				<div class="text-red-500 text-sm">
					<div class="flex items-center gap-2 py-1 px-2 text-red-600 rounded">
						<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg>
						{{ $message }}
					</div>
				</div>
				@enderror
			</div>
			<input
				type="submit"
				value="Guardar cambios"
				class="w-full bg-sky-600 hover:bg-sky-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 cursor-pointer uppercase"
			>
		</form>
	
	</div>
	
</div>
@endsection