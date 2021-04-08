<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifyStudentLibrarySubject
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
        if($user->role_id==3){
            foreach ($user->stu_subjects as $subject_stu) {
                if($subject_stu->id==$request->route('id')){
                    return $next($request);
                }
            }
        }
        if($user->role_id==2){
            foreach ($user->subjects as $subject_stu) {
                if($subject_stu->id==$request->route('id')){
                    return $next($request);
                }
            }
        }
        if($user->role_id==1){
            return $next($request);
        }
        return redirect()->back(); 
    }
}
