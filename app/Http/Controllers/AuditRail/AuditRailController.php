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
                  'username'  => $request->input('username'),
                  'modul_name'=> $request->input('modul_name'),
                  'ref_number'=> $request->input('ref_number')
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
            $form['action_location'] = $this->getDataArray(json_decode($form['action_location']));

            // $client = new \GuzzleHttp\Client();
            //   try {
            //     $location = json_decode('['. $form['action_location'] .']')[0];
            //       $latitude = $location->latitude;
            //       $longitude = $location->longitude;

            //       $res = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude.'&key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE');

            //       $getIP = json_decode( '[' . $res->getBody()->getContents() . ']' )[0];
            //       foreach ($getIP->results as $index=>$value) {
            //         $form['action_location'] = $value->formatted_address;
            //         break;
            //       }

            //   } catch (\Exception $e) {
            //       \Log::info($e);
            //   }

            $audits['contents']['data'][$key] = $form;
        }

        $audits['contents']['draw'] = $request->input('draw');
        $audits['contents']['recordsTotal'] = $audits['contents']['total'];
        $audits['contents']['recordsFiltered'] = $audits['contents']['total'];

        return response()->json($audits['contents']);
    }

    //Get data old value
    public function oldData($type, $form){
      if(!empty($form['old_values'])){
        if(($type == 'property') || ($type == 'agendev') || ($type == 'admindev')){
          $name = (isset($form['old_values']['name']) ? 'Nama Proyek : '. $form['old_values']['name'] .'<br>' : '');
          $pks = (isset($form['old_values']['pks_number']) ? 'Nomor PKS : '. $form['old_values']['pks_number'] .'<br>': '');
          $pic = (isset($form['old_values']['pic_name']) ? 'Nama PIC : ' . $form['old_values']['pic_name'].'<br>': '');
          $pic_phone = (isset($form['old_values']['pic_phone']) ? 'No. Telp PIC : '.$form['old_values']['pic_phone'] .'<br>': '');
          $longitude = (isset($form['old_values']['longitude']) ? 'Latitude : '.$form['old_values']['longitude'] .'<br>': '');
          $latitude = (isset($form['old_values']['latitude']) ? 'Longitude : '.$form['old_values']['latitude'].'<br>' : '');
          $address = (isset($form['old_values']['address']) ? 'Alamat : '.$form['old_values']['address'] .'<br>': '');
          $description = (isset($form['old_values']['description']) ? 'Deskripsi : '.$form['old_values']['description'] .'<br>': '');
          $facilities = (isset($form['old_values']['facilities']) ? 'Fasilitas : '.$form['old_values']['facilities'].'<br>' : '');
          $mobile_phone = (isset($form['old_values']['mobile_phone']) ? 'Nomor Telepon : '.ucwords($form['old_values']['mobile_phone']).'<br>' : '');
          $email = (isset($form['old_values']['email']) ? 'Alamat Email : '.ucwords($form['old_values']['email']).'<br>' : '');
          $first_name = (isset($form['old_values']['first_name']) ? 'Nama : '.ucwords($form['old_values']['first_name'].' '.$form['old_values']['last_name']).'<br>' : '');
          $form = $name.$pks.$pic.$pic_phone.$latitude.$longitude.$address.$description.$facilities.$first_name.$email.$mobile_phone;
        }elseif($type == 'edit'){
          $form = json_encode($form['old_values'], JSON_PRETTY_PRINT);  
        }else{
            (isset($form['old_values']['product_type']) ? 'Tipe Produk : '.strtoupper($form['old_values']['product_type']) : '').'<br>   
            NIK : '.($form['old_values']['nik']).'<br> 
            ID AO : '.($form['old_values']['ao_id']).'<br>
            Tanggal Perjanjian : '.($form['old_values']['appointment_date']).'<br> 
            Latitude : '.($form['old_values']['latitude']).'<br>
            Longitude : '.($form['old_values']['longitude']).'<br>
            Alamat : '.($form['old_values']['address']).'<br>
            Kantor Cabang : '.($form['old_values']['branch']).'<br>'.
            (isset($form['old_values']['ref_number']) ? 'Nomor Referensi : '.($form['old_values']['ref_number']) : '').'<br> ';  
        }
      }else{
        $form = '';
      }

      return $form;
    }

    //Get data new value
    public function newData($type, $form){
      if(!empty($form['new_values'])){
        if(($type == 'property') || ($type == 'agendev') || ($type == 'admindev')){
          $name = (isset($form['new_values']['name']) ? 'Nama Proyek : '. ucwords($form['new_values']['name']) .'<br>' : '');
          $pks = (isset($form['new_values']['pks_number']) ? 'Nomor PKS : '. $form['new_values']['pks_number'] .'<br>': '');
          $pic = (isset($form['new_values']['pic_name']) ? 'Nama PIC : ' . ucwords($form['new_values']['pic_name']).'<br>': '');
          $pic_phone = (isset($form['new_values']['pic_phone']) ? 'No. Telp PIC : '.$form['new_values']['pic_phone'] .'<br>': '');
          $longitude = (isset($form['new_values']['longitude']) ? 'Latitude : '.$form['new_values']['longitude'] .'<br>': '');
          $latitude = (isset($form['new_values']['latitude']) ? 'Longitude : '.$form['new_values']['latitude'].'<br>' : '');
          $address = (isset($form['new_values']['address']) ? 'Alamat : '.$form['new_values']['address'] .'<br>': '');
          $description = (isset($form['new_values']['description']) ? 'Deskripsi : '.ucwords($form['new_values']['description']) .'<br>': '');
          $facilities = (isset($form['new_values']['facilities']) ? 'Fasilitas : '.ucwords($form['new_values']['facilities']).'<br>' : '');
          $mobile_phone = (isset($form['new_values']['mobile_phone']) ? 'Nomor Telepon : '.ucwords($form['new_values']['mobile_phone']).'<br>' : '');
          $email = (isset($form['new_values']['email']) ? 'Alamat Email : '.ucwords($form['new_values']['email']).'<br>' : '');
          $first_name = (isset($form['new_values']['first_name']) ? 'Nama : '.ucwords($form['new_values']['first_name'].' '.$form['new_values']['last_name']).'<br>' : '');
          $form = $name.$pks.$pic.$pic_phone.$latitude.$longitude.$address.$description.$facilities.$first_name.$email.$mobile_phone;
        }elseif($type == 'edit'){
          $form = json_encode($form['new_values'], JSON_PRETTY_PRINT);  
        }else{
          $form = 
            (isset($form['new_values']['product_type']) ? 'Tipe Produk : '.strtoupper($form['new_values']['product_type']) : '').'<br>   
            NIK : '.($form['new_values']['nik']).'<br> 
            ID AO : '.($form['new_values']['ao_id']).'<br>
            Tanggal Perjanjian : '.($form['new_values']['appointment_date']).'<br> 
            Latitude : '.($form['new_values']['latitude']).'<br>
            Longitude : '.($form['new_values']['longitude']).'<br>
            Alamat : '.($form['new_values']['address']).'<br>
            Kantor Cabang : '.($form['new_values']['branch']).'<br>'.
            (isset($form['new_values']['ref_number']) ? 'Nomor Referensi : '.($form['new_values']['ref_number']) : '').'<br> ';  
        }
      }else{
        $form = '';
      }

      return $form;
    }


    public function getDataArray($dataArray){
         $form ='';
          if(!empty($dataArray)){
              foreach ($dataArray as $key => $value) {
                if(!empty($key) && !empty($value)){                    
                  $data = ucwords($key).' : '.ucwords($value);
                 $form .= $data .'<br/>';
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
                (isset($form['old_values']['title']) ? 'Judul : '.($form['old_values']['title']) : '').'<br> 
                 Tanggal Perjanjian : '.($form['old_values']['appointment_date']).'<br>'. 
                 (isset($form['old_values']['ao_id']) ? 'ID AO : '.($form['old_values']['ao_id']) : '').'<br> 
                 Latitude : '.($form['old_values']['latitude']).'<br>
                 Longitude : '.($form['old_values']['longitude']).'<br>
                 Alamat : '.($form['old_values']['address']).'<br>'.
                 (isset($form['old_values']['ref_number']) ? 'Nomor Referensi : '.($form['old_values']['ref_number']) : '').'<br> ';  
            }else{
              $form['old_values'] = '';
            }

            if(!empty($form['new_values'])){
              $form['new_values'] = 
                (isset($form['new_values']['title']) ? 'Judul : '.($form['new_values']['title']) : '').'<br> 
                 Tanggal Perjanjian : '.($form['new_values']['appointment_date']).'<br> '.
                 (isset($form['new_values']['ao_id']) ? 'ID AO : '.($form['new_values']['ao_id']) : '').'<br> 
                 Latitude : '.($form['new_values']['latitude']).'<br>
                 Longitude : '.($form['new_values']['longitude']).'<br>
                 Alamat : '.($form['new_values']['address']).'<br>'.
                 (isset($form['new_values']['ref_number']) ? 'Nomor Referensi : '.($form['new_values']['ref_number']) : '').'<br> ';
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
                    ])->setQuery([ 'created_at'=> $request->input('action_date')])
                    ->get();

        foreach ($audits['contents']['data'] as $key => $form) {
            $form['username'] = ucwords($form['username']);
            $form['modul_name'] = ucwords($form['modul_name']);
            $form['old_values'] = $this->getDataArray($form['old_values']);
            $form['new_values'] = $this->getDataArray($form['new_values']);
            $form['action_location'] = $this->getDataArray(json_decode($form['action_location']));
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
}
