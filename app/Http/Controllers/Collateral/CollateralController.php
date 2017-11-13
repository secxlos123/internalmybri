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
     * Display a form of assignment to staff appraisal.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignment($id)
    {
        $data = $this->getUser();
        $detailCollateral = Client::setEndpoint('collateral/'.$id)
                        ->setHeaders([
                            'Authorization' => $data['token'],
                            'pn' => $data['pn']
                        ])->get();
        $dataCollateral = $detailCollateral['contents'][0];
        // echo json_encode($detailCollateral['contents']);die();

        return view('internals.collateral.manager.assignment-collateral', compact('data', 'dataCollateral'));
    }

    /**
     * Display a form of assignment to staff appraisal.
     *
     * @return \Illuminate\Http\Response
     */
    public function approval()
    {
        $data = $this->getUser();
        return view('internals.collateral.manager.approval-collateral', compact('data'));
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
                    // 'start_date'=> $request->input('start_date'),
                    // 'end_date'  => $request->input('end_date'),
                    // 'status'    => $request->input('status'),
                    // 'branch_id' => $data['branch']
                ])->get();

            // dd($collateral);
        foreach ($collateral['contents']['data'] as $key => $form) {
            $form['prop_name'] = strtoupper($form['prop_name']);
            // $form['customer_name'] = strtoupper($form['customer_name']);
            // $form['request_amount'] = 'Rp '.number_format($form['nominal'], 2, ",", ".");
            // // $form['product_type'] = strtoupper($form['product_type']);
            // $form['branch_id'] = $form['branch_id'];
            // $form['ao'] = $form['ao_name'];
        
            // $verify = $form['customer']['is_verified'];
            // $visit = $form['is_visited'];

            $form['action'] = view('internals.layouts.actions', [

                // 'dispose' => $form['ao_name'],
                // 'submited' => $form['is_approved'],
                // 'dispotition' => $form,
                // // 'screening' => route('eform.show', $form['id']),
                // 'approve' => $form,
                // // 'verified' => $verify,
                // 'visited' => $visit,
                'detail' => route('collateral.show', $form['prop_id']),
                'dispose_collateral' => route('getAssignment', $form['prop_id']),
                'approval_collateral' => route('getApproval', $form['prop_id']),
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->getUser();
        return view('internals.collateral.manager.detail', compact('data'));
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
