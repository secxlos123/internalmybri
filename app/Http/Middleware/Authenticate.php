<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
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
        $users = session()->get('userLogin');
        
        if(!empty($users)){
            foreach ($users as $key ) {
                $data = $key;
            }
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            }
        }else{
            return redirect()->guest('/login');
        }
        return $next($request);
    }

}
