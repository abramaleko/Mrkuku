<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class GoogleSignInController extends Controller
{
    //This controller is used to direct to oauth provider and
    //authorize google sign-ins


    public function redirectUser()
    {
        return Socialite::driver('google')->redirect();

    }

    public function authorizeUser()
    {
        //get the user details from the oauth provider
        $getInfo = Socialite::driver('google')->user();
        $name=$getInfo->getName();
        $email=$getInfo->getEmail();

        /*
           Find the user in the user model if found
           authenticate user if not register a new
           user and assign role of investor.
        */
        
        $user=User::firstWhere('email',$email);

        if (! $user) {
            $user=User::create([
                    'name' =>$name,
                    'email' => $email,
                    'password' => Hash::make(Str::random(30)),
                    'email_verified_at' => Carbon::now()->toDateTimeString(),
                ]
            );
            $user->assignRole('Investors');
        }

         Auth::login($user, $remember = true);

         return redirect()->route('dashboard');

    }
}
