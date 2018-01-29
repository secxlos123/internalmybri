<?php

namespace App\Http\Controllers\AuditRail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class AuditRailController extends Controller
{
    protected $columns = [
      'created_at',
      'modul_name',
      'username',
      'ref_number',
      // 'branch_id',
      'old_values',
      'new_values',
      'ip_address',
      'action_location'
    ];

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
    public function index()
    {
        $data = $this->getUser();

        return view('internals.audit-rail.index', compact('data'));
    }

    /**
     * Get Datatables Data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request, $type)
    {
      // var_dump($request->all());
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $eforms = Client::setEndpoint('auditrail/'.$type)
                ->setHeaders([
                  'Authorization' => $data['token']
                  , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])
                ->setQuery([
                  'limit'     => $request->input('length'),
                  'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                  'search'    => $request->input('search.value'),
                  'page'      => (int) $request->input('page') + 1,
                  'created_at'=> $request->input('action_date'),
                  'username'  => $request->input('username'),
                  'modul_name'=> $request->input('modul_name'),
                  'ref_number'=> $request->input('ref_number')
                ])->get();

        foreach ($eforms['contents']['data'] as $key => $form) {
            $form['created_at'] = date_format(date_create($form['created_at']),"Y-m-d");
            $form['modul_name'] = strtoupper($form['modul_name']);
            $form['username'] = strtoupper($form['username']);
            $form['ref_number'] = ($form['ref_number']);
            if(!empty($form['old_values'])){
              $form['old_values'] = 
                'Tipe Produk : '.strtoupper($form['old_values']['product_type']).'<br> 
                 NIK : '.($form['old_values']['nik']).'<br> 
                 ID AO : '.($form['old_values']['ao_id']).'<br>
                 Tanggal Perjanjian : '.($form['old_values']['appointment_date']).'<br> 
                 Latitude : '.($form['old_values']['latitude']).'<br>
                 Longitude : '.($form['old_values']['longitude']).'<br>
                 Alamat : '.($form['old_values']['address']).'<br>
                 Kantor Cabang : '.($form['old_values']['branch']).'<br>
                 No. Referensi : '.($form['old_values']['ref_number']).'<br>';  
            }else{
              $form['old_values'] = '';
            }

            if(!empty($form['new_values'])){
              $form['new_values'] = 
                'Tipe Produk : '.strtoupper($form['new_values']['product_type']).'<br> 
                 NIK : '.($form['new_values']['nik']).'<br> 
                 ID AO : '.($form['new_values']['ao_id']).'<br>
                 Tanggal Perjanjian : '.($form['new_values']['appointment_date']).'<br> 
                 Latitude : '.($form['new_values']['latitude']).'<br>
                 Longitude : '.($form['new_values']['longitude']).'<br>
                 Alamat : '.($form['new_values']['address']).'<br>
                 Kantor Cabang : '.($form['new_values']['branch']).'<br>
                 No. Referensi : '.($form['new_values']['ref_number']).'<br>';
            }else{
              $form['new_values'] = '';
            }

            // $form['action_location'] = 
            //     ucwords(str_replace(['"', '{', '}'], ' ', (str_replace(',', '<br>', $form['action_location']))));

            $client = new \GuzzleHttp\Client();
              try {
                $location = json_decode('['. $form['action_location'] .']')[0];
                  $latitude = $location->latitude;
                  $longitude = $location->longitude;

                  $res = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude.'&key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE');

                  $getIP = json_decode( '[' . $res->getBody()->getContents() . ']' )[0];
                  foreach ($getIP->results as $index=>$value) {
                    $form['action_location'] = $value->formatted_address;
                    break;
                  }

              } catch (\Exception $e) {
                  \Log::info($e);
              }

            $eforms['contents']['data'][$key] = $form;
        }

        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];

        return response()->json($eforms['contents']);
    }
}
