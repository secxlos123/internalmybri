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
        'status',
        'action',
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
    public function detail($dev_id, $prop_id)
    {
        $data = $this->getUser();
        $collateral = $this->getDetail($dev_id, $prop_id, $data);
        // dd($collateral);
        return view('internals.collateral.manager.detail', compact('data', 'collateral'));
    }
    
    /**
     * Display a form of assignment to staff appraisal.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignment($dev_id, $prop_id)
    {
        $data = $this->getUser();
        $collateral = $this->getDetail($dev_id, $prop_id, $data);
        // echo json_encode($collateral);die();

        return view('internals.collateral.manager.assignment-collateral', compact('data', 'collateral'));
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
            'staff_id' => $request->staff_id
        ,   'staff_name' => $request->staff_name
        ,   'remark' => $request->remark
        ];
        // dd($disposition);

        $client = Client::setEndpoint('collateral/disposition/'.$id)
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                ])->setBody($disposition)
                ->post();
        // dd($client);

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
        // dd($collateral);
        return view('internals.collateral.manager.approval-collateral', compact('data', 'collateral'));
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

            // dd($collateral);
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
                'detail' => url('collateral/detail/'.$form['developer']['id'].'/'.$form['property']['id']),
                'dispose_collateral' => url('collateral/assignment/'.$form['developer']['id'].'/'.$form['property']['id']),
                'approval_collateral' => url('collateral/approval-collateral/'.$form['developer']['id'].'/'.$form['property']['id']),
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
    public function datatableItem(Request $request)
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

            // dd($collateral);
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
                'detail' => url('collateral/detail/'.$form['developer']['id'].'/'.$form['property']['id']),
                'dispose_collateral' => url('collateral/assignment/'.$form['developer']['id'].'/'.$form['property']['id']),
                'approval_collateral' => route('getApproval', $form['property']['id']),
            ])->render();
            $collateral['contents']['data'][$key] = $form;
        }

        $collateral['contents']['draw'] = $request->input('draw');
        $collateral['contents']['recordsTotal'] = $collateral['contents']['total'];
        $collateral['contents']['recordsFiltered'] = $collateral['contents']['total'];

        return response()->json($collateral['contents']);
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
