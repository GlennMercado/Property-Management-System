<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Mail;
use App\Mail\VerifyEmail;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\Models\User
    //  */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'profile_pic' => 'nvdcpics\user2.png',
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
    
    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     event(new Registered($user = $this->create($request->all())));

    //     //Alert::Success('Success', 'Account Created Successfully!');
    //     /*return $this->registered($request, $user)
    //         ?: redirect($this->redirectPath());*/
    //         return redirect()->route('login')->withStatus(__('Account Created Successfully!'));
    // }

    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_pic' => 'nullable|image|max:2048'
        ]);

        //---Generate Token
        $token = Str::random(60);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'profile_pic' => 'nvdcpics/user2.png',
            'email_verification_token' => $token
        ]);


        // Send the verification email
        Mail::to($user->email)->send(new VerifyEmail($user, $token));

        return redirect('/login')->withStatus(__('Click the link in your email to verify your account!'));
    }
}
