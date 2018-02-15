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
        $checkToken = $this->generateToken();
        $this->redirectLogin( $checkToken );
        $cek = isset($checkToken['contents']['refreshed']) ? true : false;
        if ( $cek == true ) {
            session()->put('user.contents.token', $checkToken['contents']['token']);
            $this->generateToken();
        }

        return $next($request);
    }

    /**
     * Redirect function
     *
     * @param array $checkToken
     * @return mixed
     **/
    public function redirectLogin( $checkToken )
    {
        if ( $checkToken['code'] == 404 ) {
            return redirect()->guest('/login');
        }
    }

    /**
     * Generate Token
     *
     * @return array
     **/
    public function generateToken()
    {
        return \Client::setEndpoint('check-token')
            ->setHeaders(
                array(
                    'Authorization' => session()->get('user.contents.token')
                    ,'pn' => session()->get('user.contents.pn')
                )
            )->get();
    }
}
