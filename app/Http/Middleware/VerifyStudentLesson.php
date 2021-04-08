<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifyStudentLesson
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
        $subject=$request->route('lesson')->section->subject->id;
        foreach ($user->stu_subjects as $subject_stu) {
            if($subject_stu->id==$subject){
                return $next($request);
            }
        }
        return redirect()->back(); 
    }
}
