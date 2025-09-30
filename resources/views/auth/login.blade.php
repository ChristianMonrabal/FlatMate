<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión en FlatMate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/icon-fm.png')}}" type="image/x-icon">
</head>
<body>
    <div class="theme-toggle">
        <i class="fas fa-sun"></i>
        <label class="switch">
            <input type="checkbox" id="darkModeToggle">
            <span class="slider"></span>
        </label>
        <i class="fas fa-moon"></i>
    </div>

    <div class="login-container">
        <div class="login-left">
            <h2>Bienvenido a FlatMate</h2>
            <br>
            <div class="features">
                <div class="feature">
                    <i class="fas fa-check-circle"></i>
                    <span>Accede a nuestra plataforma gratuita</span>
                </div>
                <div class="feature">
                    <i class="fas fa-check-circle"></i>
                    <span>Encuentra a tu compañer@ ideal</span>
                </div>
                <div class="feature">
                    <i class="fas fa-check-circle"></i>
                    <span>Explora y encuentra tu nuevo hogar fácilmente</span>
                </div>
            </div>
        </div>

        <div class="login-right">
            <img src="{{ asset('img/icon-fm.png')}}" class="logo">
            <h1>Inicia sesión en FlatMate</h1>

            <form action="{{ route('login') }}" method="POST">
                @csrf

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

                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Recuérdame</label>
                </div>

                <br>

                @if ($errors->any())
                    <div class="errors">
                        <p>{{ $errors->first() }}</p>
                    </div>
                @endif

                <button type="submit" class="signin">Iniciar sesión</button>
            </form>

            <a href="{{ route('google.login') }}" class="google-login">
                <i class="fab fa-google"></i>
            </a>

            <p>¿Has olvidado tu contraseña? <a href="{{ route('password.request') }}" class="link">Recupérala</a></p>

            <p>¿No tienes cuenta? <a href="{{ route('register.form') }}" class="link">Regístrate</a></p>
        </div>
    </div>

    <script src="{{ asset ('js/auth/login.js')}}"></script>
    <script src="{{ asset('js/auth/toggle-password.js')}}"></script>
    <script src="{{ asset('js/auth/dark-mode.js')}}"></script>
</body>
</html>
