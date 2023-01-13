@extends('layouts.app')
@section('titulo')
	{{ $post->titulo }}
@endsection
@section('content')
	<div class="container mx-auto flex">
		<div class="md:w-1/2">
			<img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{$post->titulo}}">
			<div class="p-3">
				<p>0 Likes</p>
			</div>
			<div class="p-3">
				<p class="font-bold">{{ $post->user->username }}</p>
				<p class="text-sm text-gray-500">
					{{ $post->created_at->diffForHumans() }}
				</p>
				<p class="mt-5">
					{{ $post->descripcion }}
				</p>
			</div>
		</div>
		<div class="md:w-1/2 px-5 pb-5">
			<div class="shadow bg-white p-5 mb-5">
				<p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>
				<form action="">
					<div class="mb-3">
						<label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
							Comentario
						</label>
						<textarea name="comentario" id="comentario" class="w-full border-2 border-gray-200 p-3 rounded-lg mb-3 @error('comentario') border-red-500 @enderror" placeholder="Agregar un comentario">{{old('comentario')}}</textarea>
						@error('comentario')
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
						value="Comentar"
						class="w-full bg-sky-600 hover:bg-sky-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 cursor-pointer uppercase"
					>
				</form>
			</div>
		</div>
	</div>
@endsection