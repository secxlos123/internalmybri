<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
// use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use Client;
// use Validator;

class ADKController extends Controller
{
    protected $columns = [
        'ref_number',
        'customer_name',
        'request_amount',
        'created_at',
        // 'branch_id',
        'prescreening_status',
        'ao_name',
        'status',
        'created_at',
        'action',
    ];

    public function getUser() {
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
        // print_r($data);exit();
        // dd(env('APP_ENV'));

        if($data['role'] == 'ao'){
            return view('internals.eform.adk.index', compact('data'));
        } elseif (($data['role'] == 'mp') || ($data['role'] == 'pinca')) {
            return view('internals.eform.index', compact('data'));
        } else{
            return view('internals.eform.create', compact('data'));
        }
    }

    public function datatables(Request $request)
    {
        // print_r($request->input());exit();
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $eforms = Client::setEndpoint('eforms')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn'            => $data['pn']
                ])->setQuery([
                    'limit'         => $request->input('length'),
                    'search'        => $request->input('search.value'),
                    'sort'          => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'          => (int) $request->input('page') + 1,
                    'start_date'    => $request->input('start_date'),
                    'end_date'      => $request->input('end_date'),
                    'status'        => $request->input('status'),
                    'branch_id'     => $data['branch'],
                    'ref_number'    => $request->input('ref_number'),
                    'customer_name' => $request->input('customer_name'),
                    'prescreening'  => $request->input('prescreening'),
                    'product'       => $request->input('product')
                ])->get();

            dd($eforms);
        foreach ($eforms['contents']['data'] as $key => $form) {
            $form['ref'] = strtoupper($form['ref_number']);
            $form['customer_name'] = strtoupper($form['customer_name']);
            $form['request_amount'] = 'Rp '.number_format($form['nominal'], 2, ",", ".");
            // $form['product_type'] = strtoupper($form['product_type']);
            // $form['branch_id'] = $form['branch_id'];
            $form['ao'] = $form['ao_name'];

            $verify = $form['customer']['is_verified'];
            $visit = $form['is_visited'];

            $form['prescreening_status'] = view('internals.layouts.actions', [
              'prescreening_status' => route('getLKN', $form['id']),
              'prescreening_result' => $form['prescreening_status'],
            ])->render();

            $form['action'] = view('internals.layouts.actions', [
                'dispose' => $form['ao_name'],
                'submited' => ($form['is_approved'] && $verify),
                'dispotition' => $form,
                // 'screening' => route('eform.show', $form['id']),
                'approve' => $form,
                // 'verified' => $verify,
                'visited' => $visit,
                'status' => $form['status_eform'],
                // 'verification' => route('getVerification', $form['user_id']),
                // 'lkn' => route('getLKN', $form['id']),
            ])->render();
            $eforms['contents']['data'][$key] = $form;
        }

        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];

        return response()->json($eforms['contents']);
    }
}