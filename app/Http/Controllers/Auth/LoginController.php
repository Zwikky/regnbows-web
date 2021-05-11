<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
        // if (method_exists($this, 'redirectTo')) {
        //     return $this->redirectTo();
        // }

        if (Auth::user()->user_rights === 'admin') {
            return route('dashboard');
        }
        if (Auth::user()->user_rights === 'user') {
            return route('user-dashboard');
        }

        // return property_exists($this, 'redirectTo') ? $this->redirectTo : '/places';
        // return route('user-dashboard');
    }
}