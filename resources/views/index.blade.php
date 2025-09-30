@extends('layouts.header')

@section('content')
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
@endsection