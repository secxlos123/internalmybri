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
        $users = session()->get('user');
        
        if(!empty($users)){
            foreach ($users as $key ) {
                $data = $key;
            }

            /**
             * Lisda ini buat apa iya? ini ga bisa create customer itu gara2 ada logic ini.
             */
            // if ($request->ajax()) {
            //     return response('Unauthorized.', 401);
            // }
        }else{
            return redirect()->guest('/login');
        }
        return $next($request);
    }

}
