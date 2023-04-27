<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email'=> 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $input['email'])->first();
        
        // Check if the user's email has been verified
        if ($user) 
        {
            if (!$user->email_verified_at) 
            {
                return back()->withStats(__('Your email has not been verified yet.'));
            }
        } 
        else 
        {
            return back()->withStats(__('Login Failed.'));
        }
        
        if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])))
        {

            if(auth()->user()->IsArchived == 0)
            {
                if(auth()->user()->User_Type == 'Admin' && auth()->user()->IsDisabled == 0)
                {
                    return redirect('home');
                }
                elseif(auth()->user()->User_Type == 'Guest' && auth()->user()->IsDisabled == 0)
                {
                    return redirect('welcome');
                }
                elseif(auth()->user()->User_Type == 'Sales and Marketing' && auth()->user()->IsDisabled == 0)
                {
                    return redirect('HotelReservationForm');
                }
                elseif(auth()->user()->User_Type == 'Inventory Manager' && auth()->user()->IsDisabled == 0)
                {
                    return redirect('StockCount');
                }
                elseif(auth()->user()->User_Type == 'Operations Manager' && auth()->user()->IsDisabled == 0)
                {
                    return redirect('OperationDashboard');
                }
                elseif(auth()->user()->User_Type == 'Operations Manager' && auth()->user()->IsDisabled == 0)
                {
                    return redirect('OperationDashboard');
                }
                elseif(auth()->user()->User_Type == 'Finance' && auth()->user()->IsDisabled == 0)
                {
                    return redirect('DailyReport');
                }
                elseif(auth()->user()->User_Type == 'Housekeeping Supervisor')
                {
                    return redirect('Housekeeping_Dashboard');
                }
                else
                {
                    auth()->logout();
                    return redirect('/login')->withStats(__('User Access Disabled.'));
                }
            }
            else
            {
                auth()->logout();
                return redirect('/login')->withStats(__('Login Failed.'));
            }
        }
        else
        {
            return back()->withStats(__('Login Failed.'));
        }
    }
}
