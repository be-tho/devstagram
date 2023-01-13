@extends('layouts.app')
@section('titulo', 'Crear una nueva Publicación')
@push('style')
	<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('content')
	<div class="md:flex md:items-center">
		<div class="md:w-1/2 px-10">
			<form action="{{route('images.store')}}" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center @error('imagen') border-red-500 @enderror "  enctype="multipart/form-data" method="post">
			@csrf
			@method('POST')
			</form>
		</div>
		<div class="md:w-1/2 bg-white p-8 rounded-lg shadow-xl mt-10 md:mt-6">
			<form action="{{ route('posts.store') }}" method="post">
				@method('POST')
				@csrf
				<div class="mb-3">
					<label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
						Titulo
					</label>
					<input type="text" name="titulo" id="titulo" class="w-full border-2 border-gray-200 p-3 rounded-lg mb-3 @error('titulo') border-red-500 @enderror" value="{{old('titulo')}}" placeholder="Titulo de la Publicación">
					@error('titulo')
					<div class="text-red-500 text-sm">
						<div class="flex items-center gap-2 py-1 px-2 text-red-600 rounded">
							<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg>
							{{ $message }}
						</div>
					</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
						Descripción
					</label>
					<textarea name="descripcion" id="descripcion" class="w-full border-2 border-gray-200 p-3 rounded-lg mb-3 @error('descripcion') border-red-500 @enderror" placeholder="Descripción de la Publicación">{{old('descripcion')}}</textarea>
					@error('descripcion')
					<div class="text-red-500 text-sm">
						<div class="flex items-center gap-2 py-1 px-2 text-red-600 rounded">
							<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg>
							{{ $message }}
						</div>
					</div>
					@enderror
				</div>
				<div class="mb-3">
					<input
						name="imagen"
						type="hidden"
						value="{{old('imagen')}}"
					>
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
					value="Crear Publicación"
					class="w-full bg-sky-600 hover:bg-sky-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 cursor-pointer uppercase"
				>
			</form>
		</div>
	</div>
@endsection