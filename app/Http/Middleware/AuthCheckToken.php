<?php

namespace App\Http\Middleware;

use Closure;

class AuthCheckToken
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
        $checkToken = \Client::setEndpoint('check-token')
                      ->setHeaders(['Authorization' => session()->get('user.contents.token'),
                                    'pn' => session()->get('user.contents.pn')
                      ])->get();
        // dd($checkToken);

        if($checkToken['code'] == 404){
            return redirect()->guest('/login');
        }

        if($checkToken['contents']['refreshed'] == true){
            session()->put('user.contents.token', $checkToken['contents']['token']);
        }else{
            return $next($request);
        }

        return $next($request);
    }
}
