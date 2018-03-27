<?php

namespace App\Http\Controllers\Screening;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Screening\ScreeningRequest;
use Client;
use Validator;

class ScreeningController extends Controller
{

    protected $columns = [
        'ref_number',
        'customer_name',
        'request_amount',
        'created_at',
        'branch_id',
        'prescreening_status',
        'ao_name',
        'status',
        'created_at',
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

        return view('internals.screening.index-ao', compact('data'));
    }

    /**
     * Get Datatables
     * @param $request
     */
    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $eforms = Client::setEndpoint('eforms')
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'      => (int) $request->input('page') + 1,
                    'start_date'=> $request->input('start_date'),
                    'end_date'  => $request->input('end_date'),
                    'status'    => $request->input('status'),
                    'branch_id' => $data['branch']
                ])->get();

        foreach ($eforms['contents']['data'] as $key => $form) {
            $form['ref'] = strtoupper($form['ref_number']);
            $form['customer_name'] = strtoupper($form['customer_name']);
            $form['request_amount'] = 'Rp '.number_format($form['nominal'], 2, ",", ".");
            $form['branch_id'] = $form['branch_id'];
            $form['ao'] = $form['ao_name'];

            $verify = $form['customer']['is_verified'];
            $visit = $form['is_visited'];

            $form['action'] = view('internals.layouts.actions', [

                'dispose' => $form['ao_name'],
                'submited' => $form['is_approved'],
                'dispotition' => $form,
                'approve' => $form,
                'visited' => $visit,
            ])->render();
            $eforms['contents']['data'][$key] = $form;
        }

        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];

        return response()->json($eforms['contents']);
    }
}
