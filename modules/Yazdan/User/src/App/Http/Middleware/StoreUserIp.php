<?php

namespace Yazdan\User\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StoreUserIp
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if(auth()->check() && $user->ip != $request->ip()){
            $user->ip = $request->ip();
            $user->save();
        }
        if(auth()->check() && ($user->status == 'ban' || $user->status == 'inactive')){
            return abort(403);
        };
        return $next($request);
    }
}
