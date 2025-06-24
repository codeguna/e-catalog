<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()

    {
        return Socialite::driver('google')->redirect();
    }

    /** 
     * Create a new controller instance. 
     * 
     * @return void 
     */

    public function handleGoogleCallback()

    {

        try {
            $user      = Socialite::driver('google')->user();
            $finduser  = User::where('google_id', $user->id)->first();
            $getAvatar = $user->getAvatar();
            // only allow people with @company.com to login
            if (explode("@", $user->email)[1] !== 'gmail.com') {
                return redirect()->to('/')->with('error', 'Gunakan akun email @gmail.com untuk akses ke Sistem ini');
            }
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/admin/home');
            } else {

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'avatar' => $getAvatar,
                    'password' => encrypt('p@ssW0RdAn7jayy')
                ]);
                //  $newUser->assignRole('GUEST');
                //  $newUser->givePermissionTo('view_profile');
                //  $newUser->givePermissionTo('view_attendances');

                Auth::login($newUser);
                return redirect('/admin/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
