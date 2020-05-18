<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        $user = User::find(Auth::id());
        if(sizeof($user->permissions->where('name','=',$permission)) == 0){
            return redirect(route("home"));
        }
        return $next($request);
    }
}
