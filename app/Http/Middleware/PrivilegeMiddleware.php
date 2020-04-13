<?php

namespace App\Http\Middleware;

use Closure;
use  App\Http\Controllers\CheckAllowedPrivileges;
use Auth;

class PrivilegeMiddleware
{
    /**
     * Handle an incoming request.
     *middleware checks to be sure user has granted privilege to create a privilege and privilege is not revoked
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  /**/
        if(Auth::user() && CheckAllowedPrivileges::checkUserHasPrivilege(Auth::user()->role_id,9)) {
            if (CheckAllowedPrivileges::checkRevokedPrivilege(Auth::user()->user_id,9)) {
                return 'Unauthorized: You no longer have this privilege';
            }
            return $next($request);
        }
        if(Auth::user()){
            return "Unauthorized 401";
        }
        else{
            return redirect('/auth/user/login');
        }
    }
}
