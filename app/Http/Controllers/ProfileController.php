<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function admin_edit()
    {
        return view('Admin.profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
        */
        public function update(Request $request)
        {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = time() . '-' . auth()->user()->name . '.' . $file->getClientOriginalExtension();
                $path = $file->move('profile_pics/', $filename);
        
                auth()->user()->profile_pic = $path;
            }
        
            auth()->user()->save();
        
            return back()->withStatus(__('Profile successfully updated.'));
        }


    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        // if (auth()->user()->id == 1) {
        //     return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        // }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
