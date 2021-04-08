<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

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
    public function redirectTo() {
        $role = Auth::user()->role_id; 
        $first_login = Auth::user()->first_login; 
        switch ($role) {
          case '1':
            return '/home-admin';
            break;
          case '2':
            return '/home-lecturer';
            break; 
          case '3':
            if (Session::get('subject')) {
              return '/enroll-subject-web';
            }
            if ($first_login!=1) {
              return '/medium-grade';
            }
            if ($first_login==1) {
              return '/my-subjects';
            }
            break; 
      
          default:
            return '/'; 
          break;
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'),['is_verified'=>1]);
    }
}
