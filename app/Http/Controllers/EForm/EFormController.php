<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use Client;

class EFormController extends Controller
{
    protected $columns = [
        'ref',
        'fullname',
        'request_amount',
        'office_name',
        'ao',
        'prescreening_status',
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
        
        return view('internals.eform.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCustomer(Request $request)
    {
        $data = $this->getUser();

        $customers = Client::setEndpoint('customer')
            ->setHeaders(['Authorization' => $data['token']])
            ->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($customers['customers']['data'] as $key => $cust) {
            // $cust['text'] = $cust['first_name'].' '.$cust['last_name'];
            $cust['text'] = $cust['nik'];
            $customers['customers']['data'][$key] = $cust;
        }

        return response()->json(['customers' => $customers['customers']]);
    }

    public function detailCustomer(Request $request)
    {
        $data = $this->getUser();

         /* GET Role Data */
        $customerData = Client::setEndpoint('customer/'.$request->id)->setQuery(['limit' => 100])->setHeaders(['Authorization' => $data['token']])->get();
        
        $dataCustomer = $customerData['data'];

        if(!empty($dataCustomer)){
            $view = (String)view('internals.eform.detail-customer')
                ->with('dataCustomer', $dataCustomer)
                ->render();

            return response()->json(['view' => $view]);
        } else {
            return view('internals.eform.detail-customer')
                ->with('dataCustomer', $dataCustomer);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getUser();
        
        return view('internals.eform.create', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLKN()
    {
        $data = $this->getUser();
        
        return view('internals.eform.lkn', compact('data'));
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function eformRequest($request, $data)
    {
        /* GET Role Data */
        $customerData = Client::setEndpoint('customer/'.$request->name)->setQuery(['limit' => 100])->setHeaders(['Authorization' => $data['token']])->get();
        
        $nik = $customerData['data']['personal']['nik'];
        // dd($nik);

        // if($request->images){
        //     $image_path = $request->images->getPathname();
        //     $image_mime = $request->images->getmimeType();
        //     $image_name = $request->images->getClientOriginalName();
        //     $image = [
        //           'name'     => 'image',
        //           'filename' => $image_name,
        //           'Mime-Type'=> $image_mime,
        //           'contents' => fopen( $image_path, 'r' ),
        //         ];
        // }else{
        //   $image = [
        //           'name'    => "",
        //           'contents'=> ""
        //         ];
        // }

        //get Requests
        $req = [
                "request_amount"    => $request->request_amount,
                "year"              => $request->year,
                "home_location"     => $request->home_location,
                "active_kpr"        => $request->active_kpr,
                "price"             => $request->price,
                "down_payment"      => $request->down_payment,
                "building_area"     => $request->building_area
               ];

        $newForm = [
                    'nik'                   => $nik,
                    'office_id'             => '544',
                    'product'               => json_encode($req),
                    "appointment_date"      => $request->date,
                    "longitude"             => $request->lng,
                    "latitude"              => $request->lat
                ];

        return $newForm;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->getUser();

        $newForm = $this->eformRequest($request, $data);

        $client = Client::setEndpoint('eforms')
           ->setHeaders(['Authorization' => $data['token']])
           ->setBody($newForm)
           ->post('form_params');
        
        if($client['status']['succeded'] == true){
            // dd($client);
            \Session::flash('success', 'Data sudah disimpan.');
            return redirect()->route('eform.index');
        }else{
            dd($client);
            \Session::flash('error', 'Kesalahan input.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $eforms = Client::setEndpoint('eforms')
                ->setHeaders(['Authorization' => $data['token']])
                ->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'office_id' => $request->input('search.value'),
                ])->get();

        foreach ($eforms['eforms']['data'] as $key => $form) {
            $form['ref'] = strtoupper($form['nik']);
            $form['fullname'] = strtoupper($form['nik']);
            $form['request_amount'] = '200000000';
            $form['prescreening_status'] = 'green';
            $form['ao'] = 'Foo';

            $form['action'] = view('internals.layouts.actions', [
                'assign' => route('eform.edit', $form['id']),
                'screening' => route('eform.show', $form['id']),
            ])->render();
            $eforms['eforms']['data'][$key] = $form;
        }

        $eforms['eforms']['draw'] = $request->input('draw');
        $eforms['eforms']['recordsTotal'] = $eforms['eforms']['total'];
        $eforms['eforms']['recordsFiltered'] = $eforms['eforms']['per_page'];

        return response()->json($eforms['eforms']);
    }
}
