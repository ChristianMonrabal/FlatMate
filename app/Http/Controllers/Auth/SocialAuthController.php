<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\WelcomeMail;
use App\Mail\VerifyEmailMail;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // $googleUser = Socialite::driver('google')->user();
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => Hash::make(Str::random(16)),
            ]
        );

        if ($user->wasRecentlyCreated) {
            Mail::to($user->email)->send(new WelcomeMail($user));
            Mail::to($user->email)->send(new VerifyEmailMail($user));
        }

        Auth::login($user, true);

        return redirect('/')->with('success', 'Has iniciado sesión con Google');
    }
}
