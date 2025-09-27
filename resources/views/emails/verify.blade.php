<h1>Hola, {{ $user->name }}!</h1>
<p>Por favor verifica tu correo haciendo click en el botón:</p>

<a href="{{ url('/verify-email/'.$token) }}" 
    style="display:inline-block;padding:10px 20px;background-color:#4CAF50;color:white;text-decoration:none;">
    Verificar correo
</a>
