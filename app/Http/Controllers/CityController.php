<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $this->getUser();
        $cities = \Client::setEndpoint('cities')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($cities['contents']['data'] as $key => $city) {
            $city['text'] = $city['name'];
            $cities['contents']['data'][$key] = $city;
        }

        return response()->json(['cities' => $cities['contents']]);
    }
}
