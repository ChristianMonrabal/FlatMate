<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Mail\VerifyEmailMail;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Todos los campos son obligatorios.',
            'lastname.required' => 'Todos los campos son obligatorios.',
            'email.required' => 'Todos los campos son obligatorios.',
            'password.required' => 'Todos los campos son obligatorios.',
            'email.unique' => 'Este email ya está en uso.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $name = ucwords(strtolower($request->name));
        $lastname = collect(explode(' ', $request->lastname))
            ->map(fn($part) => ucfirst(strtolower($part)))
            ->implode(' ');

        $user = User::create([
            'name' => $name,
            'lastname' => $lastname,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user));
        Mail::to($user->email)->send(new VerifyEmailMail($user));

        Auth::login($user);

        return redirect('/')->with('success', 'Registro completado, ¡bienvenido!');
    }
}
