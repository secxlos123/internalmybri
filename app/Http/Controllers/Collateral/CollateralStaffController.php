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
                'Authorization' => $data['token'],
                'pn' => $data['pn']
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
        $collateral = $this->getDetail($dev_id, $prop_id, $data);
        return view('internals.collateral.staff.detail-property', compact('data', 'collateral'));
    }

    /**
     * Show the form for Assignment Agunan.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAssignmentAgunan($dev_id, $prop_id)
    {
        $data = $this->getUser();
        $collateral = $this->getDetail($dev_id, $prop_id, $data);
        return view('internals.collateral.staff.assignment', compact('data', 'collateral'));
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

          $client = Client::setEndpoint('collateral/reject/'.$id)
           ->setHeaders([
                'Authorization' => $data['token'],
                'pn' => $data['pn']
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
    public function getLKNAgunan($dev_id, $prop_id)
    {
        $data = $this->getUser();
        $collateral = $this->getDetail($dev_id, $prop_id, $data);
        // dd($collateral);
        if($collateral['property']['category'] == 0){
            $category_name = 'Rumah Tapak';
        }elseif($collateral['property']['category'] == 1){
            $category_name = 'Rumah Susun/Apartment';
        }else{
            $category_name = 'Rumah Toko';
        }
        // dd($collateral['property']['category']);
        return view('internals.collateral.staff.lkn-collateral.index', compact('data', 'collateral', 'category_name'));
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
        $excludeNumber = ['npw_land', 'nl_land', 'pnpw_land', 'pnl_land', 'npw_building', 'nl_building', 'pnpw_building', 'pnl_building', 'npw_all', 'nl_all', 'pnpw_all', 'pnl_all'];
        // $excludeNumber = [];
        $excludeImage = ['image_condition_area'];

        if ( in_array($baseName, $excludeNumber) ) {
            $values = str_replace(',', '.', str_replace('.', '', $values));
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
        foreach ($request->except('_token', 'collateral_type') as $field => $value) {
            foreach ($value as $index => $data) {
            $baseName = $field . '[' . $index . ']';
                $return = $this->returnContent( $baseName, $data, $index );
                    if ($return != null) {
                    $application[] = $this->returnContent( $baseName, $data, $index );
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
        // dd($newForm);

          $client = Client::setEndpoint('collateral/ots/'.$id)
           ->setHeaders([
                'Authorization' => $data['token'],
                'pn' => $data['pn']
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
        return view('internals.collateral.staff.upload-doc', compact('data', 'collateral'));
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
                'Authorization' => $data['token'],
                'pn' => $data['pn']
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
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
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
}
