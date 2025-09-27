<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (empty($email) && empty($password)) {
            return back()->withErrors([
                'login' => 'Todos los campos son obligatorios.'
            ])->onlyInput('email');
        }

        if (empty($email)) {
            return back()->withErrors([
                'login' => 'El correo es obligatorio.'
            ])->onlyInput('email');
        }

        if (empty($password)) {
            return back()->withErrors([
                'login' => 'La contraseña es obligatoria.'
            ])->onlyInput('email');
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Has iniciado sesión correctamente.');
        }

        return back()->withErrors([
            'login' => 'Las credenciales no son correctas.'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Sesión cerrada.');
    }
}
