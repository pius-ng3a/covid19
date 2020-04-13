<?php

namespace App\Http\Middleware;
use App\Http\Controllers\CheckAllowedPrivileges;
use Closure;
use Auth;

class UserAccountMiddleware
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
        if(Auth::check() && CheckAllowedPrivileges::checkUserHasPrivilege(Auth::user()->role_id,1)) {
            if (CheckAllowedPrivileges::checkRevokedPrivilege(Auth::user()->user_id,2)) {
                return trans('english.privilege_revoked');
            }
            return $next($request);
        }
        if(Auth::check()){
            return "Unauthorized 401";
        }
        else{
            return redirect('/auth/user/login');
        }
    }
}
