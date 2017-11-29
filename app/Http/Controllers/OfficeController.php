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
        // dd($request->all());
        $data = $this->getUser();
        $offices = \Client::setEndpoint('offices')
            ->setHeaders([
                'Authorization' => $data['token'],
                'pn' => $data['pn']
            ])->setQuery([
                'distance' => $request->input('distance'),
                'long' => $request->input('long'),
                'lat' => $request->input('lat'),
                'page' => $request->input('page'),
                'name' => $request->input('name'),
            ])->get();
            // dd(json_encode($offices));

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
                'Authorization' => $data['token'],
                'pn' => $data['pn']
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
}
