<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DevsTagram - @yield('titulo')</title>
	@stack('style')
	@vite('resources/css/app.css')
	@livewireStyles
</head>
<body class="bg-gray-100">
<header class="p-5 border-b bg-white shadow">
	<div class="container mx-auto flex justify-between items-center">
		<a href="{{ route('home.index') }}" class="text-3xl font-bold text-black">DevsTagram</a>
		<nav class="flex gap-3 items-center">
{{--			si esta authenticado no mostrar crear cuenta --}}
			@guest()
				<a class="font-bold uppercase text-gray-600" href="{{route('login.index')}}">Login</a>
				<a class="font-bold uppercase text-gray-600" href="{{ route('auth.index') }}">Crear Cuenta</a>
			@endguest
			@auth()
{{--				boton crear con icono publicación --}}
				<a href="{{ route('posts.create') }}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
					</svg>
					Crear
				</a>
				<a class="font-bold uppercase text-gray-600" href="{{ route('dashboard.index', auth()->user()->username) }}">{{ auth()->user()->name }}</a>
				<form action=" {{route('logout.store')}}" method="post">
					@method('POST')
					@csrf
					<button class="font-bold uppercase text-gray-600">Cerrar sesión</button>
				</form>
			@endauth
		</nav>
	</div>
</header>
	<main class="container mx-auto mt-10">
{{--		mensajes de session globales --}}
		@if(session('success'))
			@vite('resources/js/notifications.js')
			<div class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded relative session" role="alert">
				<strong class="font-bold">Exito!</strong>
				<span class="block sm:inline">{{ session('success') }}</span>
				<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
					<svg id="msj" class="fill-current h-6 w-6 text-green-500 " role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
				</span>
			</div>
		@endif
		@if(session('error'))
			@vite('resources/js/notifications.js')
			<div class="bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded relative session" role="alert">
				<strong class="font-bold">Error!</strong>
				<span class="block sm:inline">{{ session('error') }}</span>
				<span class="absolute top-0 bottom-0 right-0 px-4 py-3" >
					<svg id="msj" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
				</span>
			</div>
		@endif
		<h2 class="font-black text-center text-3xl mb-8">
			@yield('titulo')
		</h2>
		@yield('content')
	</main>
	<footer class="text-center p-5 text-gray-500 font-bold uppercase">
		DevsTagram - Todos los derechos reservados {{ now()->year }}
	</footer>
@vite('resources/js/app.js')
@livewireScripts
</body>
</html>