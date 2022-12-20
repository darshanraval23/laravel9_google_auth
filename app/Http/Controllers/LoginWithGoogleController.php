<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginWithGoogleController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        //get user details
            // $user = Socialite::driver($provider)->user();
            // dd($user);
        try {

            $user = Socialite::driver($provider)->user();
            $finduser = User::where('provider_id', $user->id)->orwhere('email',$user->email)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider'=>$provider,
                    'provider_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /*
    We need to create a callback method in the controller created earlier on for Twitter because the AbstractProvider for the TwitterProvider does not implement stateless (Stateless just means there is no sessions stored.)
    */
    public function TwitterCallback()
    {
        $twitterSocial =   Socialite::driver('twitter')->user();
        $users       =   User::where(['email' => $twitterSocial->getEmail()])->first();
        if ($users) {
            Auth::login($users);
            return redirect('/home');
        } else {
            $user = User::firstOrCreate([
                'name'          => $twitterSocial->getName(),
                'email'         => $twitterSocial->getEmail(),
                'image'         => $twitterSocial->getAvatar(),
                'provider_id'   => $twitterSocial->getId(),
                'provider'      => 'twitter',
            ]);
            return redirect()->route('home');
        }
    }

    public function test(){
        //we  can not get user details using thare provider_id
        // $user = Socialite::driver('google')->userFromToken('105274305770744157095');
        // $user = Socialite::driver('google')->userFromTokenAndSecret('105274305770744157095');
        // dd($user);
    }
   
}
