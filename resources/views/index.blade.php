<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FlatMate</title>
</head>
<body>
    <h1>Welcome to FlatMate</h1>
    <p>Your go-to platform for finding the perfect flatmate!</p>

    @auth
        <p>Hola, {{ Auth::user()->name }}!</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    @else
        <p>
            <a href="{{ route('login.form') }}">Iniciar sesión</a> |
            <a href="{{ route('register.form') }}">Registrarse</a>
        </p>
    @endauth
</body>
</html>
