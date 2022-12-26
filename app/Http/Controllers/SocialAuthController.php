<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function googleRedirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallaback(Request $request)
    {
        try {
            $userdata = Socialite::driver('google')->user(); 

            //check login 
            $user = User::where('email', $userdata->email)->first();
            if($user)
            {
                Auth::login($user);
                return Redirect("user")->with('message', 'Successfully logged in');
            } else {
                //do register
                $uuid = Str::uuid()->toString();
                $user =new User();
                $user->first_name = $userdata->name;
                $user->last_name = '    ';
                $user->email  = $userdata->email;
                $user->password =Hash::make($uuid.now());
                $user->auth_type ='google';
                $user->gender = 'male';
                $user->date_of_birth = 'Enter your birth date';
                $user->phone = 'Enter your phone number';
                $user->secondary_phone = 'Enter your secondary phone number';
                $user->country = 'Enter your country';
                $user->isResident = 'yes';
                $user->street = 'Enter your street';
                $user->city = 'Enter your city';
                $user->town = 'Enter your town';
                $user->division = 'Enter your division';
                $user->postal_address = 'Enter your postal code';
                $user->tin = 'Enter your tin';
                $user->vaccination_ref_number = 'Enter your vaccination number';
                $user->image = 'Insert your image';                
                $user->save();  
                Auth::login($user);
                return Redirect('user/dashboard');
            }
        } catch (\Throwable $th) {
            return Redirect("user")->with('error', $th->getMessage());
            // dd('Something Went Wrong'.$th->getMessage());
        }
    }

    public function facebookRedirect(Request $request)
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallaback(Request $request)
    {
        // dd('here');
        try {
            $userdata = Socialite::driver('facebook')->user();
            $user = User::where('email', $userdata->email)->first();
            if($user)
            {
                Auth::login($user);
                return redirect('user/dashboard');
            } else {
                //do register
                $uuid = Str::uuid()->toString();
                $user =new User();
                $user->first_name = $userdata->name;
                $user->last_name = '    ';
                $user->email  = $userdata->email;
                $user->password =Hash::make($uuid.now());
                $user->auth_type ='facebook';
                $user->gender = 'male';
                $user->date_of_birth = 'Enter your birth date';
                $user->phone = 'Enter your phone number';
                $user->secondary_phone = 'Enter your secondary phone number';
                $user->country = 'Enter your country';
                $user->isResident = 'yes';
                $user->street = 'Enter your street';
                $user->city = 'Enter your city';
                $user->town = 'Enter your town';
                $user->division = 'Enter your division';
                $user->postal_address = 'Enter your postal code';
                $user->tin = 'Enter your tin';
                $user->vaccination_ref_number = 'Enter your vaccination number';
                $user->image = 'Insert your image';
                $user->save();
                Auth::login($user);
                return Redirect('user/dashboard');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
