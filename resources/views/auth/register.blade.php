<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Carpeta de Proyectos') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-900 font-sans">
    <div id="app">
        <!-- Botón Volver -->
        <div class="absolute top-4 left-4">
            <a href="{{ url('/') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-700 transition duration-200">
                ⬅ Volver al inicio
            </a>
        </div>

        <main>
            <div class="min-h-screen flex items-center justify-center">
                <div class="w-full max-w-md bg-gray-800 rounded-2xl shadow-2xl p-8 border border-gray-700">
                    <!-- Título -->
                    <h2 class="text-3xl font-bold text-center text-cyan-400 mb-6">Registro</h2>
                    <p class="text-center text-gray-400 mb-6">Crea tu cuenta en Carpeta de Proyectos</p>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300">Nombre</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:border-cyan-400 focus:ring-cyan-400 sm:text-sm py-2 px-3 @error('name') border-red-500 @enderror">
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300">Correo electrónico</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:border-cyan-400 focus:ring-cyan-400 sm:text-sm py-2 px-3 @error('email') border-red-500 @enderror">
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300">Contraseña</label>
                            <input id="password" type="password" name="password" required
                                class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:border-cyan-400 focus:ring-cyan-400 sm:text-sm py-2 px-3 @error('password') border-red-500 @enderror">
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password-confirm" class="block text-sm font-medium text-gray-300">Confirmar contraseña</label>
                            <input id="password-confirm" type="password" name="password_confirmation" required
                                class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:border-cyan-400 focus:ring-cyan-400 sm:text-sm py-2 px-3">
                        </div>

                        <!-- Botón Register -->
                        <button type="submit" class="w-full py-2 px-4 bg-cyan-500 hover:bg-cyan-600 text-white font-semibold rounded-lg shadow-lg transition duration-200">
                            Registrarse
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="my-6 flex items-center">
                        <div class="flex-grow border-t border-gray-700"></div>
                        <span class="mx-2 text-gray-500 text-sm">o</span>
                        <div class="flex-grow border-t border-gray-700"></div>
                    </div>

                    <!-- Ir a login -->
                    <p class="text-center text-sm text-gray-400">
                        ¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="text-cyan-400 hover:text-cyan-300 font-medium">
                            Inicia sesión
                        </a>
                    </p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
