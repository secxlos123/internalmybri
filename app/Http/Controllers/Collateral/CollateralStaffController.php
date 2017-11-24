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
    public function show($id)
    {
        $data = $this->getUser();
        return view('internals.collateral.staff.detail-property', compact('data'));
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
     * Show the form for LKN Agunan.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLKNAgunan($dev_id, $prop_id)
    {
        $data = $this->getUser();
        $collateral = $this->getDetail($dev_id, $prop_id, $data);
        return view('internals.collateral.staff.lkn-collateral.index', compact('data', 'collateral'));
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
        // dd($baseName);
      $excludeNumber = ['surface_area', 'distance', 'distance_of_position', 'surface_area_by_letter', 'count', 'spacious', 'north_limit', 'east_limit', 'south_limit', 'west_limit', 'distance_from_transportation'];
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

        foreach ($request->except('_token') as $field => $value) {
            foreach ($value as $index => $data) {
            $baseName = $field . '[' . $index . ']';
                $return = $this->returnContent( $baseName, $data, $index );
                    if ($return != null) {
                    $application[] = $this->returnContent( $baseName, $data, $index );
                }
            }
        }

    
        return $application;
    }

     /**
     * Show the form for creating a new resource.
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
            return redirect()->route('eform.index');
        }else{
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
        }

        return view('internals.eform.lkn', compact('data'));
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
            $form['staff_name'] = strtoupper($form['property']['staff_name']);
            $form['prop_types'] = count($form['property']['propertyTypes']);
            $form['prop_items'] = count($form['property']['propertyItems']);

            $form['action'] = view('internals.layouts.actions', [
                'status' => $form['status'],
                'detail_collateral' => url('staff-collateral/get-detail/'.$form['developer']['id'].'/'.$form['property']['id']),
                'assignment_collateral' => url('staff-collateral/get-assignment/'.$form['developer']['id'].'/'.$form['property']['id']),
            ])->render();
            $collateral['contents']['data'][$key] = $form;
        }

        $collateral['contents']['draw'] = $request->input('draw');
        $collateral['contents']['recordsTotal'] = $collateral['contents']['total'];
        $collateral['contents']['recordsFiltered'] = $collateral['contents']['total'];

        return response()->json($collateral['contents']);
    }
}
