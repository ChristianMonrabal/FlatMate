<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" value="{{ $email }}" readonly>
    <input type="password" name="password" placeholder="Nueva contraseña">
    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña">
    <button type="submit">Restablecer contraseña</button>
</form>
