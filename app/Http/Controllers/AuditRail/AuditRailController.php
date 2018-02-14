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
      // 'role',
      // 'ref_number',
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
      // var_dump($type);
      // die();
    $userOrAgen = $request->input('username') ? $request->input('username') : $request->input('agent_developer');
    \Log::info('=====================get request=========================');
    \Log::info($userOrAgen);
    \Log::info($request->all());
        $sort = $request->input('order.0');
        $data = $this->getUser(); 
        $audits = Client::setEndpoint('auditrail/'.$type)
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
                  'username'  => $userOrAgen,
                  'modul_name'=> $request->input('modul_name'),
                  'company_name'=> $request->input('company_name'),
                  'developer'=> $request->input('developer'),
                  'staff_penilai'=> $request->input('staff_penilai'),
                  'project_name'=> $request->input('project_name'),
                  'company_name'=> $request->input('company_name'),
                  'ref_number'=> $request->input('ref_number'),
                ])->get();
                // print_r($audits);exit();

        foreach ($audits['contents']['data'] as $key => $form) {
            $form['created_at'] = date_format(date_create($form['created_at']),"Y-m-d");
            $form['modul_name'] = strtoupper($form['modul_name']);
            $form['username'] = strtoupper($form['username']);
            $form['role'] = strtoupper($form['role']);
            $form['old_values'] = $this->getDataArray($form['old_values']);
            $form['new_values'] = $this->getDataArray($form['new_values']);

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
                  $form['action_location'] = $this->getDataArray(json_decode($form['action_location']));
              }

            $audits['contents']['data'][$key] = $form;
        }

        $audits['contents']['draw'] = $request->input('draw');
        $audits['contents']['recordsTotal'] = $audits['contents']['total'];
        $audits['contents']['recordsFiltered'] = $audits['contents']['total'];

        return response()->json($audits['contents']);
    }

    public function getDataArray($dataArray){
         $form ='';
          if(!empty($dataArray)){
              foreach ($dataArray as $key => $value) {
                if(!empty($key) && !empty($value)){       
                  if(is_array($value)){
                     $value = json_encode($value,JSON_PRETTY_PRINT);
                  }             
                  $data = ucwords($key).' : '.ucwords($value);
                 $form .= $data .'<br/>';
                }else if ($key=='is_actived' && empty($value)){
                   $form .= $key.' : '. 'false <br/>';
                }
              }
          }
          return $form;
    }
    /**
     * Get Datatables Data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datatableSchedule(Request $request)
    {
      // var_dump($request->all());
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $audits = Client::setEndpoint('auditrail/appointment')
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
                // print_r($audits);exit();

        foreach ($audits['contents']['data'] as $key => $form) {
            $form['created_at'] = date_format(date_create($form['created_at']),"Y-m-d");
            $form['modul_name'] = strtoupper($form['modul_name']);
            $form['username'] = strtoupper($form['username']);
            $form['ref_number'] = ($form['ref_number']);
            if(!empty($form['old_values'])){
              $form['old_values'] = 
                (isset($form['old_values']['title']) ? 'Judul : '.($form['old_values']['title']) : '').'<br>'.
                (isset($form['old_values']['appointment_date']) ? 'Tangal Perjanjian : '.($form['old_values']['appointment_date']) : '').'<br> '. 
                 // Tanggal Perjanjian : '.($form['old_values']['appointment_date']).'<br>'. 
                 (isset($form['old_values']['ao_id']) ? 'ID AO : '.($form['old_values']['ao_id']) : '').'<br>'. 
                 (isset($form['old_values']['latitude']) ? 'Latitude : '.($form['old_values']['latitude']) : '').'<br>'.
                 (isset($form['old_values']['longitude']) ? 'Longitude : '.($form['old_values']['longitude']) : '').'<br>'.
                 (isset($form['old_values']['address']) ? 'Alamat : '.($form['old_values']['address']) : '').'<br>'.
                 // Longitude : '.isset($form['old_values']['longitude']).'<br>
                 // Alamat : '.isset($form['old_values']['address']).'<br>'.
                 (isset($form['old_values']['ref_number']) ? 'Nomor Referensi : '.($form['old_values']['ref_number']) : '').'<br> '.
                 (isset($form['old_values']['desc']) ? 'Deskripsi : '.($form['old_values']['desc']) : '').'<br> ';  
            }else{
              $form['old_values'] = '';
            }

            if(!empty($form['new_values'])){
              $form['new_values'] = 
                (isset($form['new_values']['title']) ? 'Judul : '.($form['new_values']['title']) : '').'<br>'.
                (isset($form['new_values']['appointment_date']) ? 'Tangal Perjanjian : '.($form['new_values']['appointment_date']) : '').'<br> '. 
                 // Tanggal Perjanjian : '.($form['new_values']['appointment_date']).'<br> '.
                 (isset($form['new_values']['ao_id']) ? 'ID AO : '.($form['new_values']['ao_id']) : '').'<br>'. 
                (isset($form['new_values']['latitude']) ? 'Latitude : '.($form['new_values']['latitude']) : '').'<br>'.
                 (isset($form['new_values']['longitude']) ? 'Longitude : '.($form['new_values']['longitude']) : '').'<br>'.
                 (isset($form['new_values']['address']) ? 'Alamat : '.($form['new_values']['address']) : '').'<br>'.
                 // Alamat : '.($form['new_values']['address']).'<br>'.
                 (isset($form['new_values']['ref_number']) ? 'Nomor Referensi : '.($form['new_values']['ref_number']) : '').'<br> '.
                 (isset($form['new_values']['desc']) ? 'Deskripsi : '.($form['new_values']['desc']) : '').'<br> ';
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

            $audits['contents']['data'][$key] = $form;
        }

        $audits['contents']['draw'] = $request->input('draw');
        $audits['contents']['recordsTotal'] = $audits['contents']['total'];
        $audits['contents']['recordsFiltered'] = $audits['contents']['total'];

        return response()->json($audits['contents']);
    }

    /**
     * Get Datatables Data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datatableUserActivity(Request $request)
    {
      // var_dump($request->all());
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $audits = Client::setEndpoint('auditrail/useractivity')
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
                  'username'  => $request->input('username'),
                ])->get();
                // print_r($audits);exit();

        foreach ($audits['contents']['data'] as $key => $form) {
            $form['username'] = strtoupper($form['username']);

            $form['action'] = view('internals.layouts.actions', [
                'detailActivity' => route('auditrail-detail', $form['user_id']),
            ])->render();
             
            //get address location
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
                  $form['action_location'] = $this->getDataArray(json_decode($form['action_location']));
              }

            $audits['contents']['data'][$key] = $form;
        }

        $audits['contents']['draw'] = $request->input('draw');
        $audits['contents']['recordsTotal'] = $audits['contents']['total'];
        $audits['contents']['recordsFiltered'] = $audits['contents']['total'];

        return response()->json($audits['contents']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailActivity($id)
    {
        $data = $this->getUser();
        $user_id = $id;

        return view('internals.audit-rail.detail', compact('data', 'user_id'));
    }

    /**
     * Get Datatables Data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datatableDetail(Request $request)
    {
      // var_dump($request->all());
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $audits = Client::setEndpoint('auditrail/activity_detail/'.$request->id)
                    ->setQuery(['limit' => 100])
                    ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                        // , 'auditaction' => 'action name'
                        // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                        // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                    ])->setQuery([ 
                      'created_at'=> $request->input('action_date'),
                      'limit'     => $request->input('length'),
                      'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                      'search'    => $request->input('search.value'),
                      'page'      => (int) $request->input('page') + 1,
                      ])
                      ->get();

        foreach ($audits['contents']['data'] as $key => $form) {
            $form['username'] = ucwords($form['username']);
            $form['modul_name'] = ucwords($form['modul_name']);
            $form['old_values'] = $this->getDataArray($form['old_values']);
            $form['new_values'] = $this->getDataArray($form['new_values']);
            $form['action_location'] = $this->getDataArray(json_decode($form['action_location']));
              $form['created_at'] = date_format(date_create($form['created_at']),"Y-m-d");
            //get address location
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

            $audits['contents']['data'][$key] = $form;
        }

        $audits['contents']['draw'] = $request->input('draw');
        $audits['contents']['recordsTotal'] = $audits['contents']['total'];
        $audits['contents']['recordsFiltered'] = $audits['contents']['total'];

        return response()->json($audits['contents']);
    }

    /**
     * Get Datatables Data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datatableDocument(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $nik = isset($request->nik) ? $request->nik : '0';

        $audits = Client::setEndpoint('auditrail/getEformCustomer/'.$nik)
                    ->setQuery(['limit' => 100])
                    ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                        // , 'auditaction' => 'action name'
                        // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                        // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                    ])->setQuery([ 
                      'created_at'=> $request->input('action_date'),
                      'limit'     => $request->input('length'),
                      'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                      'search'    => $request->input('search.value'),
                      'page'      => (int) $request->input('page') + 1,
                      ])
                      ->get();
          foreach ($audits['contents']['data'] as $key => $form) {
              $form['ref_number'] = ucwords($form['ref_number']);
              $form['customer_name'] = ucwords($form['customer_name']);
              $form['nominal'] = 'Rp'.number_format($form['nominal'], 2, ',', '.');
              $form['status_eform'] = ($form['status_eform']);
              $form['action'] = view('internals.layouts.actions', [
                  'detailActivity' => route('detailDocument', $form['nik']),
              ])->render();
              $audits['contents']['data'][$key] = $form;
          }

          $audits['contents']['draw'] = $request->input('draw');
          $audits['contents']['recordsTotal'] = $audits['contents']['total'];
          $audits['contents']['recordsFiltered'] = $audits['contents']['total'];

          return response()->json($audits['contents']);
        }
    }

    public function detailDocument(Request $request, $nik)
    {
        $data = $this->getUser();
        // $customerData = $this->getCustomer($request);
        // echo json_encode($request->input('id'));die();
         /* GET Role Data */
        $customerData = Client::setEndpoint('auditrail/customers/'.$nik)
                        ->setHeaders([
                            'Authorization' => $data['token']
                            , 'pn' => $data['pn']
                            // , 'auditaction' => 'action name'
                            , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                            , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                        ])->get();
        $dataCustomer = $customerData['contents'];
        // echo json_encode($dataCustomer['data']);die();

        if(($customerData['code'])==200){
          return view('internals.audit-rail._detailDocumentCredit', compact('dataCustomer', 'data'));
            // $view = (String)view('internals.audit-rail._detailDocumentCredit')
            //     ->with('dataCustomer', $dataCustomer)
            //     ->render();

            // return response()->json(['view' => $view]);
        } 
        // else {
        //     $view = (String)view('internals.eform.error')
        //         ->with('dataCustomer', $dataCustomer)
        //         ->render();

        //     return response()->json(['view' => $view]);
        //     // return view('internals.eform.detail-customer')
        //     //     ->with('dataCustomer', $dataCustomer);
        // }
    }
}
