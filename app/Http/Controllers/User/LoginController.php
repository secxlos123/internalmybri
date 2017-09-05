<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthLogin;
use App\Http\Requests\User\ForgotPassword;
use Client;

class LoginController extends Controller
{

    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return $data;
    }

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
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $client = Client::setEndpoint('auth/login')
                ->setBody($data)
                ->post();

        $codeResponse = $client['code'];

        if($codeResponse == 200){
            session()->put('user', $client);
            return response()->json(['url' => route('dashboard'), 'message' => 'Login sukses', 'code' => 200]);
        }else{
            return response()->json(['message' => 'Email atau Kata Sandi Salah', 'code' => 400]);
        }

    }

    /**
    * Show the view of login
    *
    * @return \Illuminate\Http\Response
    */
    public function logout(Request $request)
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        $logout = Client::setEndpoint('auth/logout')->setHeaders(['Authorization' => $data['token']])->deleted();
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
