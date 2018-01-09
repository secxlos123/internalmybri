<?php

namespace App\Http\Controllers\AuditRail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class AuditRailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = getUser();

        return view('internals.audit-rail.index', compact('data'));
    }

    /**
     * Get Datatables Data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $eforms = Client::setEndpoint('eforms')
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
                  'start_date'=> $request->input('start_date'),
                  'end_date'  => $request->input('end_date'),
                  'status'    => $request->input('status'),
                  'ref_number'=> $request->input('ref_number'),
                  'customer_name'=> $request->input('customer_name'),
                  'branch_id' => $data['branch'],
                  'prescreening' => $request->input('prescreening'),
                  'product' => $request->input('product')
                ])->get();
                // echo json_encode($request->input('customer_name'));exit();

        foreach ($eforms['contents']['data'] as $key => $form) {
            $form['ref_number'] = strtoupper($form['ref_number']);
            $form['customer_name'] = strtoupper($form['customer_name']);
            $form['created_at'] = date_format(date_create($form['created_at']),"Y-m-d");
            // $form['product_type'] = strtoupper($form['product_type']);
            $form['request_amount'] = 'Rp '.number_format($form['nominal'], 2, ",", ".");
            $form['created_at'] = $form['created_at'];

            // $verify = $form['customer']['is_verified'];
            $verify = $form['response_status'] == 'approve' ? true : false;
            $visit = $form['is_visited'];
            $status = $form['response_status'];

            $form['prescreening_status'] = view('internals.layouts.actions', [
              'prescreening_status' => route('getLKN', $form['id']),
              'prescreening_result' => $form['prescreening_status'],
            ])->render();

            $form['action'] = view('internals.layouts.actions', [
              'verified' => $verify,
              'visited' => $visit,
              'response_status' => $status,

              'verification' => route('getVerification', $form['id']),
              'approval' => $form['is_approved'],
              'eform_id' => $form['id'],
              'preview' => route('getDetail', $form['id']),
              'lkn' => route('getLKN', $form['id']),
            ])->render();
            $eforms['contents']['data'][$key] = $form;
        }

        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];

        return response()->json($eforms['contents']);
    }
}
