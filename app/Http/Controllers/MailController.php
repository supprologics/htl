<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function studentsignup($name, $mail, $verification_code){
        $data=[
            'name'=>$name,
            'verification_code'=>$verification_code,

        ];
        
        \Mail::to($mail)->send(new \App\Mail\StudentSignUp($data));

    }
    
    public static function passwordreset($name, $mail, $verification_code){
        $data=[
            'name'=>$name,
            'verification_code'=>$verification_code,

        ];
        
        \Mail::to($mail)->send(new \App\Mail\PasswordReset($data));

    }
}
