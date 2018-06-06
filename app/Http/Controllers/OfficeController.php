<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeController extends Controller
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
        $offices = \Client::setEndpoint('offices')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'distance' => $request->input('distance'),
                'long' => $request->input('longitude'),
                'lat' => $request->input('latitude'),
                'page' => $request->input('page'),
                'name' => $request->input('name'),
            ])->get();

        foreach ($offices['contents']['data'] as $key => $office) {
            $office['text'] = $office['unit'];
            $office['id'] = $office['branch'];
            $offices['contents']['data'][$key] = $office;
        }

        return response()->json(['offices' => $offices['contents']]);
    }

    /**
     * Get Staff Collateral
     *
     * @return \Illuminate\Http\Response
     */
    public function getKanwil(Request $request)
    {
        $data = $this->getUser();

        $kanwil = \Client::setEndpoint('kanwil-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($kanwil['contents']['data'] as $key => $region) {
            if ($region['id'] = $region['region_id']) {
                $region['text'] = $region['region_name'];
                $kanwil['contents']['data'][$key] = $region;
            }
        }

        return response()->json(['kanwil' => $kanwil['contents']]);
    }

    /**
     * Get Kanwil For Auditrail
     *
     * @return \Illuminate\Http\Response
     */
    public function getKanwil2(Request $request)
    {
        $data = $this->getUser();

        $kanwil = \Client::setEndpoint('kanwil-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($kanwil['contents']['data'] as $key => $region) {
            if ($region['id'] = $region['branch_id']) {
                $region['text'] = $region['region_name'];
                $kanwil['contents']['data'][$key] = $region;
            }
        }

        return response()->json(['kanwil' => $kanwil['contents']]);
    }
}
