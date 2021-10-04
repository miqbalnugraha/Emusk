<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$level)
    {
        $roleIds = ['master' => 'Master', 'admin' => 'Admin', 'user' => 'User'];
        $allowedRoleIds = [];
        foreach ($level as $role)
        {
           if(isset($roleIds[$role]))
           {
               $allowedRoleIds[] = $roleIds[$role];
           }
        }
        $allowedRoleIds = array_unique($allowedRoleIds); 

        if(Auth::check()) {
          if(in_array(Auth::user()->level, $allowedRoleIds)) {
            return $next($request);
          }
        }

        return redirect('/');

    }
}
