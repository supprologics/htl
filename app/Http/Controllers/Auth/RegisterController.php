<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\UpdatePassword;

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
    public function redirectTo() {
        $role = Auth::user()->role_id; 
        switch ($role) {
          case '1':
            return '/home-admin';
            break;
          case '2':
            return '/home-lecturer';
            break; 
          case '3':
            return '/my-subjects';
            break; 
      
          default:
            return '/home'; 
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'month' => ['required', 'numeric', 'max:2'],
            'day' => ['required', 'numeric', 'max:2'],
            'year' => ['required', 'numeric','digits:4'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function register(Request $request)
    {
      

      $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
        'month' => ['required', 'numeric', 'digits_between:1,2'],
        'day' => ['required', 'numeric', 'digits_between:1,2'],
        'year' => ['required', 'numeric','digits:4'],
      ];

      $customMessages = [
        'password.regex' => 'Password contain at least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 Specical Character. !',
      ];
      $this->validate($request, $rules, $customMessages);

        if(strlen($request->day)!=2){
          $request->day='0'.$request->day;
        }
        if(strlen($request->month)!=2){
          $request->month='0'.$request->month;
        }
        $dob=$request->month.'/'.$request->day.'/'.$request->year;
        $time = strtotime($dob);
        $newformat = date('Y-m-d',$time);
        $user=User::create([
            'role_id' => 3,
            'name' => $request->name,
            'first_name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code'=>sha1(time()),
            'is_verified' => 0,
            'dob' =>$newformat,
        ]);

        if ($user!=null) {
          MailController::studentsignup($user->name,$user->email,$user->verification_code);
          $info = 'success';
          return view('auth.resendverify',compact('info','user'));
        }
        $info = 'error';
        return view('auth.resendverify',compact('info'));
    }

    
    public function resendverify(Request $request)
    {
        $user=User::where('email',$request->resend_email)->first();
      
        MailController::studentsignup($user->name,$user->email,$user->verification_code);
        $info = 'success';
        $again='yes';
        return view('auth.resendverify',compact('info','user','again'));
    }

    public function verifyEmail(Request $request){
      
      $verification_code= \Illuminate\Support\Facades\Request::get('code');
      $user=User::where('verification_code',$verification_code)->first();
      if ($user!=null) {
        $user->update([
          'is_verified' => 1,
        ]);

        $info = 'success';
        return view('auth.login',compact('info'));
      }

      $info = 'error';
      return view('auth.login',compact('info'));
    }

    
    public function passwordresetmail(Request $request)
    {
        $user=User::where('email',$request->email_reset)->first();

        if ($user!=null) {
          $user->update([
            'verification_code'=>sha1(time()),
          ]);
          MailController::passwordreset($user->name,$user->email,$user->verification_code);
          
          $info = 'sent';
          return view('auth.login',compact('info'));
        }

        $info = 'noaccount';
        return view('auth.login',compact('noaccount'));


    }
    
    public function passwordreset(Request $request){
      
      $verification_code= \Illuminate\Support\Facades\Request::get('code');
      $user=User::where('verification_code',$verification_code)->first();
      if ($user!=null) {
        $email = $user->email;
        return view('auth.reset',compact('email'));
      }

      $info = 'error';
      return view('auth.login',compact('info'));
    }

    
    public function passwordupdate(UpdatePassword $request)
    {
      $user=User::where('email',$request->email_reset)->first();
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        $info = 'changed';
        return redirect(route('login'));
    }

}
