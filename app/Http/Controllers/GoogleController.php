<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Session;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        $segment                                = request()->segment(1);
        Session::put('segment', $segment);
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

                // if(!session()->has('url.intended'))
                // {
                //     session(['url.intended' => url()->previous(2)]);
                // }

            } else {
                $newUser                            = new User();
                $newUser->name                      = $user->name;
                $newUser->email                     = $user->email;
                $newUser->google_id                 = $user->id;
                $newUser->avatar                    = $user->avatar;
                $newUser->role                      = 'visitor';
                $newUser->password                  = encrypt('password');
                $newUser->save();
                Auth::login($newUser);
                return redirect('/');

                // if(!session()->has('url.intended'))
                // {
                //     session(['url.intended' => url()->previous(2)]);
                // }

            }
        } catch (Exception $e) {
            return redirect('/')->withError('Something went wrong! ' . $e->getMessage());
        }
    }
}
