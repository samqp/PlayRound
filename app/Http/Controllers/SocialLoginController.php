<?php

namespace App\Http\Controllers;

use Socialite;
use Auth;

use Illuminate\Http\Request;

class SocialLoginController extends Controller
{
    //
    public function redirectToNetwork(){
    	return Socialite::driver('google')->redirect();
    }
     public function handleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        dd($user);
     
    }

}
