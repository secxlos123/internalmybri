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

    public function postLogin(Request $request)
    {
        $data = [
            'pn' => $request->pn,
            'password' => $request->password
        ];

        $client = Client::setEndpoint('auth/login')
            ->setHeaders([
                'pn' => $request->pn
                , 'auditaction' => 'login internal'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setBody($data)
            ->post();

        if(env('APP_ENV') == 'local'){
            if($request->pn == '66777'){
                $role = ['role' => 'ao'];
                $uker = ['uker' => 'KC'];
            }else if($request->pn == '68881' || $request->pn == '72220'){
                $role = ['role' => 'mp'];
                $uker = ['uker' => 'KC'];
            }else if($request->pn == '16181' || $request->pn == '14762'){
                $role = ['role' => 'pinca'];
                $uker = ['uker' => 'KC'];
            }else if($request->pn == '70828'){
                $role = ['role' => 'collateral'];
                $uker = ['uker' => 'other'];
            }else if($request->pn == '137746'){
                $role = ['role' => 'collateral-appraisal'];
                $uker = ['uker' => 'other'];
            }else{
                $role = ['role' => 'staff'];
                $uker = ['uker' => 'other'];
            }

            $user =array_merge($client['contents'], $uker, $role);
        }
        $codeResponse = $client['code'];
        $codeDescription = $client['descriptions'];

        if($codeResponse == 200){
            session()->put('user', $client);
            if(env('APP_ENV') == 'local'){
                session()->put('user.contents', $user);
            }
            return response()->json(['url' => route('dashboard'), 'message' => $codeDescription, 'code' => $codeResponse]);
        }elseif($codeResponse == 422){
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }elseif($codeResponse == 404){
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }else{
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
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
        $data = getUser();

        $logout = Client::setEndpoint('auth/logout')->setHeaders([
            'Authorization' => $data['token']
            , 'pn' => $data['pn']
            , 'auditaction' => 'logout internal'
            , 'long' => $request['hidden-long']
            , 'lat' => $request['hidden-lat']
        ])->deleted();

        session()->flush();

        return redirect()->route('login');
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
