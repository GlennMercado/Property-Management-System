<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

     /**
     * Obtain the user information from Google.
     * 
     * @return \Illuminate\Http\Response
     */
    public function handleCallback(){
        try{
            $user = Socialite::driver('google')->user();
            $profilePicUrl = $user->avatar_original;
        }catch (\Exception $e) {
            return redirect('/login')->withStats(__('User is not authorized by Google'));
        }
        // dd($profilePicUrl);
        $existingUser = User::where('google_id', $user->id)->first();

        if($existingUser) {
            Auth::login($existingUser, true);
        }
        else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'profile_pic' => $profilePicUrl,
            ]);

            Auth::login($newUser, true);
        }
        if(auth()->user()->IsDisabled == 0){
            return redirect()->to('welcome');
        }else
        {
            auth()->logout();
            return redirect('/login')->withStats(__('User access is disabled.'));
        }
    }
}
