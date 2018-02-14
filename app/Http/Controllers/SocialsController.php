<?php

namespace App\Http\Controllers;
use SocialAuth;
use Illuminate\Http\Request;

class SocialsController extends Controller
{
    public function auth($provider)
    {
       return SocialAuth::authorize($provider);
    }

    public function auth_callback($provider)
    {
        SocialAuth::login($provider, function ($user, $detalis){

            $user->avatar = $detalis->avatar;
            $user->email  = $detalis->email;
            $user->name   = $detalis->full_name;

            $user->save();
        });

        return redirect('/home');
    }
}
