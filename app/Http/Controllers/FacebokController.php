<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebokController extends Controller
{
    public function loginUsingFacebook()
    {
       return Socialite::driver('facebook')->redirect();
    }
   
    public function callbackFromFacebook()
    {
     try {
          $user                     = Socialite::driver('facebook')->user();
          $saveUser                 = User::updateOrCreate([
              'facebook_id'         => $user->getId(),
          ],[
              'name'                => $user->getName(),
              'email'               => $user->getEmail(),
              'role'                => 'visitor',
              'password'            => encrypt('password'),
               ]);
   
          Auth::loginUsingId($saveUser->id);
   
          return redirect('/');
          } catch (\Throwable $th) {
             throw $th;
          }
      }
}
