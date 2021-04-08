<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifyStudentSubject
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        foreach ($user->stu_subjects as $subject_stu) {
            if($subject_stu->id==$request->route('subject')->id){
                return $next($request);
            }
        }
        return redirect()->back(); 
    }
}
