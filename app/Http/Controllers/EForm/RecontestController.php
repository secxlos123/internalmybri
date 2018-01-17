<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class RecontestController extends Controller
{
    /* GET UserLogin Data */
    public function getUser(){
        $users = session()->get('user')['contents'];
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRecontest($id)
    {
        $data = $this->getUser();

        $eforms = Client::setEndpoint('eforms/'.$id)
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    // , 'auditaction' => 'action name'
                    // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->get();
        $eformData = $eforms['contents'];
        $client = new \GuzzleHttp\Client();
        // dd($eformData);
        try {
            $res = $client->request('GET', 'http://freegeoip.net/json/');

            $getIP = json_decode( '[' . $res->getBody()->getContents() . ']' )[0];
            $eformData['longitude'] = $getIP->longitude;
            $eformData['latitude'] = $getIP->latitude;

        } catch (\Exception $e) {
            \Log::info($e);

        }

        if(!empty($eformData['recontest'])){
            $recontest = 0;
        }else{
            $recontest = 1;
        }
        return view('internals.eform.lkn.index', compact('data', 'id', 'eformData', 'recontest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getApprovalRecontest($id)
    {
        $data = $this->getUser();

        $eforms = Client::setEndpoint('eforms/'.$id)
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    // , 'auditaction' => 'action name'
                    // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->get();
        $detail = $eforms['contents'];
        $client = new \GuzzleHttp\Client();
        // dd($detail);
        try {
            $res = $client->request('GET', 'http://freegeoip.net/json/');

            $getIP = json_decode( '[' . $res->getBody()->getContents() . ']' )[0];
            $detail['longitude'] = $getIP->longitude;
            $detail['latitude'] = $getIP->latitude;

        } catch (\Exception $e) {
            \Log::info($e);

        }

        if(!empty($detail['recontest'])){
            $recontest = 0;
        }else{
            $recontest = 1;
        }

        $type = 'fill';

        return view('internals.eform.approval.index', compact('data', 'id', 'detail', 'recontest', 'type'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
