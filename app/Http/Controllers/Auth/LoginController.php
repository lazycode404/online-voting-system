<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function authenticated()
    {
        $voted = DB::table('users')->where('id',Auth::user()->id)->first();
        if($voted->voter_status == '1')
        {
            Auth::logout();
            session()->flash('error', 'You already cast your vote. Thank you!');
            return redirect('/login');
        }
        else
        {
            return redirect('/home');
        }
    }
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    public function username()
    {
        return 'code';
    }
}
