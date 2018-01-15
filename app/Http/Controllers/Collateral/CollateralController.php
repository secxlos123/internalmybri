<?php

namespace App\Http\Controllers\Collateral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class CollateralController extends Controller
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
        'status_label',
        'action',
    ];

    protected $columnNonIndex = [
        'first_name',
        'home_location',
        'mobile_phone',
        'staff_name',
        'status_label',
        'action',
    ];

    protected $columnType = [
        'name',
        'building',
        'ground',
        'certificate',
        'image',
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
        return view('internals.collateral.manager.index', compact('data'));
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
    public function detail($dev_id, $prop_id)
    {
        $data = $this->getUser();

        if ( $dev_id == 1 ) {
            $type = 'nonindex';
            $collateral = $this->getDetailNonIndex($dev_id, $prop_id, $data);
            $id = $collateral['eform_id'];
            //get data eform
            $EformDetail = Client::setEndpoint('eforms/'.$id)
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                ])
                ->get();

            $detail = $EformDetail['contents'];

            $dataCustomer = Client::setEndpoint('customer/'.$detail['user_id'])
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                ])
                ->get();

            $customer = $dataCustomer['contents'];

        } else {
            $type = '';
            $collateral = $this->getDetail($dev_id, $prop_id, $data);

        }


        // dd($collateral);
        return view('internals.collateral.manager.detail', compact('data', 'collateral', 'detail', 'customer', 'type'));
    }

    /**
     * Display a form of assignment to staff appraisal.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignment($dev_id, $prop_id)
    {
        $data = $this->getUser();
        // echo json_encode($collateral);die();
        // $type = ($dev_id == 1 ? 'nonindex' : '');
        if($dev_id == 1){
            $type = 'nonindex';
            $collateral = $this->getDetailNonIndex($dev_id, $prop_id, $data);
        }else{
            $type = '';
            $collateral = $this->getDetail($dev_id, $prop_id, $data);
        }
        // dd($collateral);

        return view('internals.collateral.manager.assignment-collateral', compact('data', 'collateral', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAssignment(Request $request, $id)
    {
        $data = $this->getUser();

        $disposition = [
            'staff_id' => (isset($request->ao_select) ? $request->ao_id : $request->staff_id)
        ,   'staff_name' => (isset($request->ao_select) ? $request->ao_name : $request->staff_name)
        ,   'remark' => $request->remark
        ,   'is_staff' => (isset($request->ao_select) ? 0 : 1)
        ];
        // dd($disposition);

        $client = Client::setEndpoint('collateral/disposition/'.$id)
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                , 'auditaction' => 'disposisi collateral'
                , 'long' => $request['hidden-long']
                , 'lat'  => $request['hidden-lat']
            ])->setBody($disposition)
            ->post();

        if($client['code'] == 200){
            \Session::flash('success', 'Penugasan Berhasil Dilakukan');
            return redirect()->route('collateral.index');
        }else{
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display a form of assignment to staff appraisal.
     *
     * @return \Illuminate\Http\Response
     */
    public function approval($dev_id, $prop_id)
    {
        $data = $this->getUser();
        $collateral = $this->getDetail($dev_id, $prop_id, $data);

        // $type = ($dev_id == 1 ? 'nonindex' : '');
        if($dev_id == 1){
            $type = 'nonindex';
            $collateral = $this->getDetailNonIndex($dev_id, $prop_id, $data);
        }else{
            $type = '';
            $collateral = $this->getDetail($dev_id, $prop_id, $data);
        }
        // dd($collateral);
        return view('internals.collateral.manager.approval-collateral', compact('data', 'collateral', 'type'));
    }

    /**
     * Display a detail collateral
     *
     * @return \Illuminate\Http\Response
     */
    public function detailCollateral(Request $request)
    {
        $data = $this->getUser();
        $dev_id = $request->input('dev_id');
        $prop_id = $request->input('prop_id');

         /* GET Data */
        if($dev_id == 1){
            $type = 'nonindex';
            $collateral = $this->getDetailNonIndex($dev_id, $prop_id, $data);
        }else{
            $type = '';
            $collateral = $this->getDetail($dev_id, $prop_id, $data);
        }

        // $collateral = $this->getDetail($dev_id, $prop_id, $data);
        return response()->json(['data' => $collateral['data']['0']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postApprovalCollateral(Request $request, $id)
    {
        $data = $this->getUser();

        $reqs = [
            'eform_id' => $request->has('eform_id')? $request->eform_id : false
            , 'remark' => $request->input('remark')
            , 'approved_by' => $data['pn']
        ];

        $approve = $request->is_approved;
        if($approve == 'true'){
            $client = Client::setEndpoint('collateral/approve/'.$id)
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'auditaction' => 'approval collateral'
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->setBody($reqs)
                ->post();
            $response = 'Pengajuan Properti Baru telah Disetujui';
        } else {
            $client = Client::setEndpoint('collateral/reject/'.$id)
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                    , 'auditaction' => 'reject collateral'
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->setBody($reqs)
                ->post();
            $response = 'Pengajuan Properti Baru telah Ditolak';
        }

        if(($client['contents']['status'] == 'disetujui')){
            $color = 'success';
        }elseif($client['contents']['status'] == 'ditolak'){
            $color = 'success';
        }else{
            $color = 'error';
        }

        if($client['code'] == 200){
            \Session::flash($color, $response);
            return redirect()->route('collateral.index');
        }else{
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Get View Monitoring
     *
     */
    public function getMonitoring($dev_id, $prop_id)
    {
        $data = $this->getUser();
        $collateral = $this->getDetail($dev_id, $prop_id, $data);
        $detailCollateral = Client::setEndpoint('collateral/otsdoc/'.$collateral['id'])
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->get();
            //count percentage
            $keys = 0 ;
            $findme   = 'noimage.jpg';
            if(!empty($detailCollateral['contents']['ots_doc'])){
                foreach ($detailCollateral['contents']['ots_doc'] as $key => $value) {
                    $found = strpos($value, $findme);
                    if ($found) {
                        $keys++;
                    }else{
                        continue;
                    }
                }
                $all =  13-$keys;
                $percent = ($all/13)*100;
            }else{
                $percent = 0;
            }


        return view('internals.collateral.manager.monitoring', compact('data', 'collateral', 'detailCollateral','percent'));
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
            // echo json_encode($collateral);exit();

        foreach ($collateral['contents']['data'] as $key => $form) {
            $form['prop_name'] = strtoupper($form['property']['name']);
            $form['prop_city_name'] = strtoupper($form['property']['city']['name']);
            $form['prop_pic_name'] = strtoupper($form['property']['pic_name']);
            $form['prop_pic_phone'] = strtoupper($form['property']['pic_phone']);
            $form['staff_name'] = strtoupper($form['staff_name']);
            $form['prop_types'] = count($form['property']['propertyTypes']);
            $form['prop_items'] = count($form['property']['propertyItems']);
            if (($form['status'] == 'baru') && (!empty($form['remark']))){
                $form['status_label'] = ucwords($form['status']).' '.'<i class="fa fa-warning text-danger" title="Penugasan ditolak" aria-hidden="true"></i>';
            }else{
                $form['status_label'] = ucwords($form['status']);
            }

            $form['action'] = view('internals.layouts.actions', [
                'status' => $form['status'],
                'detail' => url('collateral/detail/'.$form['developer']['id'].'/'.$form['property']['id']),
                'dispose_collateral' => url('collateral/assignment/'.$form['developer']['id'].'/'.$form['property']['id']),
                'approval_collateral' => url('collateral/approval-collateral/'.$form['developer']['id'].'/'.$form['property']['id']),
                'monitoring' => url('collateral/monitoring/'.$form['developer']['id'].'/'.$form['property']['id']),
            ])->render();
            $collateral['contents']['data'][$key] = $form;
        }

        $collateral['contents']['draw'] = $request->input('draw');
        $collateral['contents']['recordsTotal'] = $collateral['contents']['total'];
        $collateral['contents']['recordsFiltered'] = $collateral['contents']['total'];

        return response()->json($collateral['contents']);
    }

    /**
     * Get Datatables
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
            if (($form['status'] == 'baru') && (!empty($form['remark']))){
                $form['status_label'] = ucwords($form['status']).' '.'<i class="fa fa-warning text-danger" title="Penugasan ditolak" aria-hidden="true"></i>';
            }else{
                $form['status_label'] = ucwords($form['status']);
            }

            $form['action'] = view('internals.layouts.actions', [
                'status' => $form['status'],
                'detail' => url('collateral/detail/'.$form['developer_id'].'/'.$form['property_id']),
                'dispose_collateral' => url('collateral/assignment/'.$form['developer_id'].'/'.$form['property_id']),
                'approval_collateral' => url('collateral/approval-collateral/'.$form['developer_id'].'/'.$form['property_id']),
                'monitoring' => url('collateral/monitoring/'.$form['developer_id'].'/'.$form['property_id']),
            ])->render();
            $collateral['contents']['data'][$key] = $form;
        }

        $collateral['contents']['draw'] = $request->input('draw');
        $collateral['contents']['recordsTotal'] = $collateral['contents']['total'];
        $collateral['contents']['recordsFiltered'] = $collateral['contents']['total'];

        return response()->json($collateral['contents']);
    }

    /**
     * Get Datatables
     * @param $request
     */
    public function datatableType(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $dev_id = $request->dev_id;
        $prop_id = $request->prop_id;

        $collateral = $this->getDetail($dev_id, $prop_id, $data);

        // $collateral = Client::setEndpoint('collateral')
        //         ->setHeaders([
        //             'Authorization' => $data['token']
        //             , 'pn' => $data['pn']
        //             // , 'auditaction' => 'action name'
        //             , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
        //             , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
        //         ])->setQuery([
        //             'limit'     => $request->input('length'),
        //             'search'    => $request->input('search.value'),
        //             'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
        //             'page'      => (int) $request->input('page') + 1,
        //             // 'status'    => $request->input('status'),
        //             // 'branch_id' => $data['branch']
        //         ])->get();
        // echo json_encode($collateral['property']['propertyTypes']);exit();
        foreach ($collateral['property']['propertyTypes'] as $key => $form) {
            $form['name'] = strtoupper($form['name']);
            $form['building'] = strtoupper($form['building_area']);
            $form['ground'] = strtoupper($form['surface_area']);
            $form['certificate'] = strtoupper($form['certificate']);
            $form['image'] = strtoupper($form['certificate']);

            $collateral['property']['propertyTypes'][$key] = $form;
        }

        // $collateral['contents']['draw'] = $request->input('draw');
        // $collateral['contents']['recordsTotal'] = count($collateral['property']['propertyTypes']);
        // $collateral['contents']['recordsFiltered'] = count($collateral['property']['propertyTypes']);

        return response()->json($collateral['property']['propertyTypes']);
    }
}
