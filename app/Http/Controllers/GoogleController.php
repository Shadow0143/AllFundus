<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
   
    public function handleGoogleCallback()
    {
        try {
            $user                               = Socialite::driver('google')->user();
            $finduser                           = User::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');
            } else {
                $newUser                        = User::create([
                    'name'                      => $user->name,
                    'email'                     => $user->email,
                    'google_id'                 => $user->id,
                    'role'                      => 'visitor',
                    'password'                  => encrypt('password'),
                ]);
                Auth::login($newUser);
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect('/')->withError('Something went wrong! ' . $e->getMessage());
        }
    }
}
