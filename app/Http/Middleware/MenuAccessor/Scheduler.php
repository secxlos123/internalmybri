<?php

namespace App\Http\Middleware\MenuAccessor;

use Closure;

class Scheduler
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
        $users = session()->get('user')['contents']['role'];
        
        if(($users == 'ao') || ($users == 'admin-bri')){
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            }
        }else{
            return redirect()->guest('/');
        }
        return $next($request);
    }
}
