<?php

namespace App\Http\Controllers\Public\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $google_user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('public.auth.login')->with('error', 'Authentication failed.');
        }

        $user = User::updateOrCreate([
            'email' => $google_user->email,
        ], [
            'name' => $google_user->name,
            'google_id' => $google_user->id,
            'google_token' => $google_user->token,
            'google_refresh_token' => $google_user->refreshToken,
            'avatar' => $google_user->avatar,
        ]);

        Auth::login($user);

        return redirect()->intended('dashboard');
    }
}
