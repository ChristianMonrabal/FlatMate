<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate en FlatMate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/icon-fm.png')}}" type="image/x-icon">
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <h2>Únete a FlatMate</h2>
            <br>
            <div class="features">
                <div class="feature">
                    <i class="fas fa-check-circle"></i>
                    <span>Crea tu perfil en minutos</span>
                </div>
                <div class="feature">
                    <i class="fas fa-check-circle"></i>
                    <span>Encuentra compañeros compatibles</span>
                </div>
                <div class="feature">
                    <i class="fas fa-check-circle"></i>
                    <span>Explora pisos y comparte gastos</span>
                </div>
            </div>
        </div>

        <div class="login-right">
            <img src="{{ asset('img/icon-fm.png')}}" class="logo">
            <h1>Crear cuenta</h1>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lastname" id="lastname" placeholder="Apellido" value="{{ old('lastname') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Correo electrónico" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Contraseña">
                        <i class="fas fa-eye toggle-password show-eye"></i>
                        <i class="fas fa-eye-slash toggle-password hide-eye" style="display: none;"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña">
                        <i class="fas fa-eye toggle-password show-eye"></i>
                        <i class="fas fa-eye-slash toggle-password hide-eye" style="display: none;"></i>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="errors">
                        <p>{{ $errors->first() }}</p>
                    </div>
                @endif

                <button type="submit" class="signin">Registrarse</button>
            </form>

            <a href="{{ route('google.login') }}" class="google-login">
                <i class="fab fa-google"></i>
            </a>

            <p>¿Ya tienes cuenta? <a href="{{ route('login.form') }}" id="register">Inicia sesión</a></p>
        </div>
    </div>

    <script src="{{ asset('js/auth/register.js')}}"></script>
    <script src="{{ asset('js/auth/toggle-password.js')}}"></script>
</body>
</html>
