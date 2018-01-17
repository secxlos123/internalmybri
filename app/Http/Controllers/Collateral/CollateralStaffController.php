<?php

namespace App\Http\Controllers\Collateral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class CollateralStaffController extends Controller
{
  protected $columns = [
    'prop_name',
    'prop_city_name',
    'prop_types',
    'prop_items',
        // 'branch_id',
    'prop_pic_name',
    'prop_pic_phone',
    'staff_name',
    'status',
    'action',
  ];

  protected $columnNonIndex = [
    'first_name',
    'home_location',
    'mobile_phone',
    'staff_name',
    'status',
    'action',
  ];

  /* GET UserLogin Data */
  public function getUser(){
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
      return view('internals.collateral.staff.index', compact('data'));
    }

    /**
     * Get detail of collateral.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDetail($dev_id, $prop_id, $data)
    {
      $detailCollateral = Client::setEndpoint('collateral/'.$dev_id.'/'.$prop_id)
      ->setHeaders([
        'Authorization' => $data['token']
        , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
      ])->get();

      return $detailCollateral['contents'];
    }

    /**
     * Get detail of collateral.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDetailNonIndex($dev_id, $prop_id, $data)
    {
      $detailCollateral = Client::setEndpoint('collateral/nonindex/'.$dev_id.'/'.$prop_id)
      ->setHeaders([
        'Authorization' => $data['token']
        , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
      ])->get();

      return $detailCollateral['contents'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dev_id, $prop_id)
    {
      $data = $this->getUser();
      
      if($dev_id == 1){
        $type = 'nonindex';
        $collateral = $this->getDetailNonIndex($dev_id, $prop_id, $data);
        $id = $collateral['eform_id'];
        //get data eform
        $EformDetail = Client::setEndpoint('eforms/'.$id)
          ->setHeaders([
            'Authorization' => $data['token']
            ,          'pn' => $data['pn']
            ])->get();
        
        $detail = $EformDetail['contents'];

        $dataCustomer = Client::setEndpoint('customer/'.$detail['user_id'])
          ->setHeaders([
            'Authorization' => $data['token']
            ,          'pn' => $data['pn']   
            ])->get();

        $customer = $dataCustomer['contents'];

      }else{
        $type = '';
        $collateral = $this->getDetail($dev_id, $prop_id, $data);
      }
      // dd($collateral);
      return view('internals.collateral.staff.detail-property', compact('data', 'collateral', 'detail', 'customer', 'type'));
    }

    /**
     * Show the form for Assignment Agunan.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAssignmentAgunan($dev_id, $prop_id)
    {
      $data = $this->getUser();
        // $collateral = $this->getDetail($dev_id, $prop_id, $data);
      if($dev_id == 1){
        $type = 'nonindex';
        $collateral = $this->getDetailNonIndex($dev_id, $prop_id, $data);
      }else{
        $type = '';
        $collateral = $this->getDetail($dev_id, $prop_id, $data);
      }
      return view('internals.collateral.staff.assignment', compact('data', 'collateral', 'type'));
    }

    /**
     * Reject the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejectAssignment(Request $request, $id)
    {
      $data = $this->getUser();
      $remark = [
        'remark' => $request->remark
      ];
      $auditaction = $request['auditaction'].' via '.$data['role'];
      $client = Client::setEndpoint('collateral/reject/'.$id)
      ->setHeaders([
        'Authorization' => $data['token']
        , 'pn'          => $data['pn']
        , 'auditaction' => $auditaction
        , 'long'        => $request['hidden-long']
        , 'lat'         => $request['hidden-lat']
      ])
      ->setBody($remark)
      ->post();
           // dd($client);

      if($client['code'] == 200){
        \Session::flash('success', 'Form Penilaian Agunan telah berhasil disimpan.');
        return redirect()->route('staff-collateral.index');
      }else{
        $error = reset($client['contents']);
        \Session::flash('error', $client['descriptions'].' '.$error);
        return redirect()->back()->withInput($request->input());
      }
    }

    /**
     * Show the form for LKN Agunan.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLKNAgunan(Request $request, $dev_id, $prop_id)
    {
    //  dd($request->all());
      $data = $this->getUser();

      if($dev_id == 1){
        $type = 'nonindex';
        $collateral = $this->getDataNonIndex($request, $dev_id, $prop_id, $data);
       // dd($collateral);
      }else{
        $type = '';
        $collateral = $this->getDataIndex($request, $dev_id, $prop_id, $data);
            // dd($collateral);
      }
      if($collateral['property']['category'] == 0){
        $category_name = 'Rumah Tapak';
      }elseif($collateral['property']['category'] == 1){
        $category_name = 'Rumah Susun/Apartment';
      }else{
        $category_name = 'Rumah Toko';
      }
        // dd($collateral);
      return view('internals.collateral.staff.lkn-collateral.index', compact('data', 'collateral', 'category_name', 'type'));
    }

    /**
     * Reformat image request
     *
     * @param  \Illuminate\Http\Request  $image
     * @param  String  $name
     */
    public function reformatImage( $name, $image )
    {
      return [
        'name' => $name
        , 'contents' => fopen($image->getRealPath(), 'r')
        , 'filename' => $image->getClientOriginalName()
        , 'Mime-Type'=> $image->getmimeType()
      ];
    }

    /**
     * Reformat content request
     *
     * @param  \Illuminate\Http\Request  $value
     * @param  String  $name
     */
    public function reformatContent( $name, $value )
    {
      return [
        'name' => $name
        , 'contents' => $value
      ];
    }

    /**
     * Get return content
     *
     * @param  \Illuminate\Http\Request  $value
     * @param  String  $name
     */
    public function returnContent( $field, $values, $baseName )
    {
      $excludeNumber = ['npw_land', 'nl_land', 'pnpw_land', 'pnl_land', 'npw_building', 'nl_building', 'pnpw_building', 'pnl_building', 'npw_all', 'nl_all', 'pnpw_all', 'pnl_all', 'liquidation_realization', 'fair_market', 'liquidation', 'fair_market_projection', 'liquidation_projection', 'njop', 'binding_value', 'paripasu_bank', 'insurance_value'];
        // $excludeNumber = [];
      $excludeImage = ['image_area'];

      if ( in_array($baseName, $excludeNumber) ) {
        $values = str_replace(',', '', $values);
      }

      if ( in_array($baseName, $excludeImage) ) {
        if ($values != "") {
          $return = $this->reformatImage( $field, $values );
        } else {
          $return = null;
        }
      } else {
        $return = $this->reformatContent( $field, $values );
      }

      return $return;
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function otsRequest($request)
    {
      $application = [];

        // $pln = ($request->designated_pln ? $request->designated_pln.',' : '');
        // $phone = ($request->designated_phone ? $request->designated_phone.',' : '');
        // $pam = ($request->designated_pam ? $request->designated_pam.',' : '');
        // $telex = ($request->designated_telex ? $request->designated_telex : '');
        // $designated[] = [
        //     'name' => 'environment[designated]'
        //     , 'contents' => $pln.''.$phone.''.$pam.''.$telex
        // ];

      \Log::info($request->all());
      foreach ($request->except('_token', 'collateral_type','hidden-long','hidden-lat') as $field => $value) {
        foreach ($value as $index => $data) {
          if ( $index == 'image_area' ) {
            foreach ($data as $photos => $photo) {
              foreach ($photo as $key => $values) {
                $baseName = $field . '[' . $index . ']'. '['. $photos .']'. '['. $key .']';
                $return = $this->returnContent( $baseName, $values, $index );
                  if ($return != null) {
                    $application[] = $this->returnContent( $baseName, $values, $index );
                  }
              }
            }
          }else{
            $baseName = $field . '[' . $index . ']';
            $return = $this->returnContent( $baseName, $data, $index );
            if ($return != null) {
              $application[] = $this->returnContent( $baseName, $data, $index );
            }
          }
        }
      }

      $reqs = array_merge($application);

      return $reqs;
    }

    /**
     * Post the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLKNAgunan(Request $request, $id)
    {
      $data = $this->getUser();
      $newForm = $this->otsRequest($request);

      $client = Client::setEndpoint('collateral/ots/'.$id)
      ->setHeaders([
        'Authorization' => $data['token']
        , 'pn'          => $data['pn']
        , 'auditaction' => 'Simpan Form Penilaian Agunan'
        , 'long'        => $request['hidden-long']
        , 'lat'         => $request['hidden-lat']
      ])
      ->setBody($newForm)
      ->post('multipart');
           // dd($client);

      if($client['code'] == 200){
        \Session::flash('success', 'Form Penilaian Agunan telah berhasil disimpan.');
        return redirect()->route('staff-collateral.index');
      }else{
        $error = reset($client['contents']);
        \Session::flash('error', $client['descriptions'].' '.$error);
        return redirect()->back()->withInput($request->input());
      }
    }

    /**
     * Get View UploadDoc
     *
     */
    public function getUploadDoc($dev_id, $prop_id)
    {
      $data = $this->getUser();
      $collateral = $this->getDetail($dev_id, $prop_id, $data);
        // dd($collateral);
      return view('internals.collateral.staff.upload-doc', compact('data', 'collateral'));
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function docsRequest($request)
    {
      $application = [];

      // dd($request->all());
      foreach ($request->except('_token','hidden-lat', 'hidden-long') as $field => $value) {
        $application[] = [
          'name' => $field
          , 'contents' => fopen($value->getRealPath(), 'r')
          , 'filename' => $value->getClientOriginalName()
          , 'Mime-Type'=> $value->getmimeType()
        ];
      }

      $reqs = array_merge($application);

      return $reqs;
    }

    /**
     * Post the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postUploadDoc(Request $request, $id)
    {
      $data = $this->getUser();
      $newForm = $this->docsRequest($request);
      // dd($newForm);
      $role = $data['role'];
      $client = Client::setEndpoint('collateral/otsdoc/'.$id)
      ->setHeaders([
        'Authorization' => $data['token']
        , 'pn'          => $data['pn']
        , 'auditaction' => 'unggah dokumen checklist via '.$role
        , 'long'        => $request['hidden-long']
        , 'lat'         => $request['hidden-lat']
      ])
      ->setBody($newForm)
      ->post('multipart');
           // dd($client);

      if($client['code'] == 201){
        \Session::flash('success', 'Form Penilaian Agunan telah berhasil disimpan.');
        return redirect()->route('staff-collateral.index');
      }else{
        $error = reset($client['contents']);
        \Session::flash('error', $client['descriptions'].' '.$error);
        return redirect()->back()->withInput($request->input());
      }
    }

    /**
     * Get Datatables
     * @param $request
     */
    public function datatables(Request $request)
    {
      $sort = $request->input('order.0');
      $data = $this->getUser();
      $collateral = Client::setEndpoint('collateral')
      ->setHeaders([
        'Authorization' => $data['token']
        , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
        , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
        , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
      ])->setQuery([
        'limit'     => $request->input('length'),
        'search'    => $request->input('search.value'),
        'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
        'page'      => (int) $request->input('page') + 1,
                // 'status'    => $request->input('status'),
                // 'branch_id' => $data['branch']
      ])->get();

      foreach ($collateral['contents']['data'] as $key => $form) {
        $form['prop_name'] = strtoupper($form['property']['name']);
        $form['prop_city_name'] = strtoupper($form['property']['city']['name']);
        $form['prop_pic_name'] = strtoupper($form['property']['pic_name']);
        $form['prop_pic_phone'] = strtoupper($form['property']['pic_phone']);
        $form['staff_name'] = strtoupper($form['staff_name']);
        $form['prop_types'] = count($form['property']['propertyTypes']);
        $form['prop_items'] = count($form['property']['propertyItems']);
        $form['status'] = ucwords($form['status']);

        $form['action'] = view('internals.layouts.actions', [
          'status' => $form['status'],
          'detail_collateral' => url('staff-collateral/get-detail/'.$form['developer']['id'].'/'.$form['property']['id']),
          'assignment_collateral' => url('staff-collateral/get-assignment/'.$form['developer']['id'].'/'.$form['property']['id']),
          'upload_doc' => url('staff-collateral/upload-doc/'.$form['developer']['id'].'/'.$form['property']['id']),
        ])->render();
        $collateral['contents']['data'][$key] = $form;
      }

      $collateral['contents']['draw'] = $request->input('draw');
      $collateral['contents']['recordsTotal'] = $collateral['contents']['total'];
      $collateral['contents']['recordsFiltered'] = $collateral['contents']['total'];

      return response()->json($collateral['contents']);
    }

    /**
     * Get Datatables Non Kerjasama
     * @param $request
     */
    public function datatableNonIndex(Request $request)
    {
      $sort = $request->input('order.0');
      $data = $this->getUser();
      $collateral = Client::setEndpoint('collateral/nonindex')
      ->setHeaders([
        'Authorization' => $data['token']
        , 'pn' => $data['pn']
                    // , 'auditaction' => 'action name'
        , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
        , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
      ])->setQuery([
        'limit'     => $request->input('length'),
        'search'    => $request->input('search.value'),
        'sort'      => $this->columnNonIndex[$sort['column']] .'|'. $sort['dir'],
        'page'      => (int) $request->input('page') + 1,
                    // 'status'    => $request->input('status'),
                    // 'branch_id' => $data['branch']
      ])->get();
                // echo json_encode($collateral);exit();
      foreach ($collateral['contents']['data'] as $key => $form) {
        $form['first_name'] = strtoupper($form['first_name'].' '.$form['last_name']);
        $form['home_location'] = strtoupper($form['home_location']);
        $form['mobile_phone'] = strtoupper($form['mobile_phone']);
        $form['staff_name'] = strtoupper($form['staff_name']);
        $form['status'] = ucwords($form['status']);
            // if (($form['status'] == 'baru') && (!empty($form['remark']))){
            //     $form['status_label'] = ucwords($form['status']).' '.'<i class="fa fa-warning text-danger" title="Penugasan ditolak" aria-hidden="true"></i>';
            // }else{
            //     $form['status_label'] = ucwords($form['status']);
            // }

        $form['action'] = view('internals.layouts.actions', [
          'status' => $form['status'],
          'detail_collateral' => url('staff-collateral/get-detail/'.$form['developer_id'].'/'.$form['property_id']),
          'assignment_collateral' => url('staff-collateral/get-assignment/'.$form['developer_id'].'/'.$form['property_id']),
          'upload_doc' => url('staff-collateral/upload-doc/'.$form['developer_id'].'/'.$form['property_id']),
        ])->render();
        $collateral['contents']['data'][$key] = $form;
      }

      $collateral['contents']['draw'] = $request->input('draw');
      $collateral['contents']['recordsTotal'] = $collateral['contents']['total'];
      $collateral['contents']['recordsFiltered'] = $collateral['contents']['total'];

      return response()->json($collateral['contents']);
    }

     /**
     * Get detail NonIndex of collateral for getLKNagunan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDataNonIndex($request, $dev_id, $prop_id, $data)
    {
    //  dd($request->all());
      $role = $data['role'];
      $long = number_format(floatval($request['hidden-long']), 5);
      $detailCollateral = Client::setEndpoint('collateral/notifotsnonindex/'.$dev_id.'/'.$prop_id)
      ->setHeaders([
        'Authorization' => $data['token']
        , 'pn'          => $data['pn']
        , 'auditaction' =>  $request['ket'].' via '.$role
        , 'long'        => $long
        , 'lat'         => $request['hidden-lat']
      ])->get();

      return $detailCollateral['contents'];
    }

    /**
     * Get detail of collateral.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDataIndex($request, $dev_id, $prop_id, $data)
    {
   //   dd($request->all());
      $role = $data['role'];
      $long = number_format(floatval($request['hidden-long']), 5);
      $detailCollateral = Client::setEndpoint('collateral/notifots/'.$dev_id.'/'.$prop_id)
      ->setHeaders([
        'Authorization' => $data['token']
        , 'pn'          => $data['pn']
        , 'auditaction' => $request['ket'].' via '.$role
        , 'long'        => $long
        , 'lat'         => $request['hidden-lat']
      ])->get();

      return $detailCollateral['contents'];
    }
  }
