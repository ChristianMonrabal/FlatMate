<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class EmailVerificationController extends Controller
{
    public function verify($token)
    {
        $userId = base64_decode($token);
        $user = User::find($userId);

        if(!$user) {
            return redirect('/')->with('error', 'Usuario no encontrado.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('success', 'Correo verificado correctamente.');
    }
}
