<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Correo electrónico">
    <button type="submit">Enviar enlace de recuperación</button>
</form>
