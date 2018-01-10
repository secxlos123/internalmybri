<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $role)
    {
        if(env('APP_ENV') == 'local')
        {
            return $next($request);
        }
        $data = $this->getUser();
        if (!in_array($data['role'],$role)){
            return redirect()->route('dashboard');
        }
        return $next($request);
    }

    public function getUser(){

     /* GET UserLogin Data */
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return $data;
    }
}
