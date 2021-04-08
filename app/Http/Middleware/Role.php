<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role {

  public function handle($request, Closure $next, String $role) {
    if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
      return redirect('/welcome');

    $user = Auth::user();
    if($user->role_id!=1){
      if($user->role_id == $role)
        return $next($request);
  
      return redirect()->back();
    }
    return $next($request);
  }
}