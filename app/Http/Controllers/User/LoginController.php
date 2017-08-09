<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthLogin;
use App\Http\Requests\User\ForgotPassword;
use Client;

class LoginController extends Controller
{

    /**
    * Show the view of login
    *
    * @return \Illuminate\Http\Response
    */
    public function getLogin()
    {
        return view('internals.auth.login');
    }

    /**
    * Admin Handle login request.
    *
    * @param  \App\Http\Requests\Auth\WebLoginRequest  $request
    * @return \Illuminate\Http\Response
    */

    public function postLogin(AuthLogin $request)
    {
        return $request->all();
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $client = Client::setEndpoint('auth/login')->setBody($data)->post();
        if($client){
            session()->put('userLogin', $client);
            return response()->json(['url' => url('/'), 'message' => 'Login sukses']);
        }else{
            return response()->json(['message' => 'Login gagal']);
        }

    }

    /**
    * Show the view of login
    *
    * @return \Illuminate\Http\Response
    */
    public function logout()
    {
        // Client::setEndpoint('auth/logout')->setHeaders()->deleted();
        session()->flush();
        return view('internals.auth.logout');
    }

    /**
    * Show the view of login
    *
    * @return \Illuminate\Http\Response
    */
    public function getForgotPassword()
    {
        return view('internals.auth.forgot-password');
    }

    /**
    * Admin Handle forgot password request.
    *
    * @param  \App\Http\Requests\Auth\WebLoginRequest  $request
    * @return \Illuminate\Http\Response
    */

    public function postForgotPassword(ForgotPassword $request)
    {
        $data = [
            'email' => $request->email
        ];

        $client = Client::setEndpoint('password/reset')->setBody($data)->post();
        if($client){
            return response()->json(['url' => url('/email-sent'), 'message' => 'Email Terkirim', 'email' => $request->email]);
        }else{
            return response()->json(['message' => 'Email Salah']);
        }

    }
}
