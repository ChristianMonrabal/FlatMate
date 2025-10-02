<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FlatMate</title>
    <link rel="shortcut icon" href="{{ asset('img/icon-fm.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('img/icon-fm.png') }}" alt="FlatMate" class="w-10 h-10">
                <span class="text-xl font-bold text-indigo-600">FlatMate</span>
            </a>

            <div>
                @auth
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Hola, {{ Auth::user()->name }}</span>
                        @if(Auth::user()->profile_photo)
                            <img src="{{ Auth::user()->profile_photo }}" 
                                 alt="Foto de perfil" 
                                 class="w-10 h-10 rounded-full border border-gray-300">
                        @else
                            <i class="fas fa-user-circle text-3xl text-gray-500"></i>
                        @endif

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" 
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                @endauth

                @guest
                    <div class="space-x-3">
                        <a href="{{ route('login.form') }}" 
                           class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                           Iniciar sesión
                        </a>
                        <a href="{{ route('register.form') }}" 
                           class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                           Registrarse
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
