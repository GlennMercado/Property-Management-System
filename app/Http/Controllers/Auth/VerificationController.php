<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use App\Mail\VerifyEmail;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::welcome;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('signed')->only('verify');
    //     $this->middleware('throttle:6,1')->only('verify', 'resend');
    // }
    public function verify($token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return redirect('/login')->withStats(__('Invalid Verification Token.'));
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->withStatus(__('Account Successfully Verified!'));
    }
    public function resendVerificationLinkForm()
    {
        return view('auth.verify-email-resend');
    }

    public function sendEmailVerificationNotification(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        //Generate Token
        $token = Str::random(60);
   
        if (!$user) {
            return redirect('/login')->withStats(__('Invalid Verification Token.'));
        }
        elseif($user->email_verified_at != null)
        {
            return redirect('/login')->withStats(__('Your account is already verified.'));
        }

        // Update the user's token in the database
        $user->forceFill([
            'email_verification_token' => $token,
        ])->save();

        // Send the verification email with the updated token
        Mail::to($user->email)->send(new VerifyEmail($user, $token));

        return redirect('/login')->withStatus(__('Verification Link Sent.'));
    }

    
}
