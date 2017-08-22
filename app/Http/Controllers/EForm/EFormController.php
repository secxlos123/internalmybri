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
        'customer_name',
        'request_amount',
        'office',
        'ao',
        'prescreening_status',
        'application_status',
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
        // dd($data);
        
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
                'nik' => $request->input('name'),
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAO(Request $request)
    {
        $data = $this->getUser();

        $officers = Client::setEndpoint('account-officers')
            ->setHeaders(['Authorization' => $data['token']])
            ->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($officers['account_officers']['data'] as $key => $ao) {
            // $cust['text'] = $cust['first_name'].' '.$cust['last_name'];
            $ao['text'] = $ao['name'];
            $officers['account_officers']['data'][$key] = $ao;
        }

        return response()->json(['officers' => $officers['account_officers']]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDispotition($id)
    {
        $data = $this->getUser();
        
        return view('internals.eform.dispotition', compact('data', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVerification($id)
    {
        $data = $this->getUser();
        
        return view('internals.eform.verification', compact('data', 'id'));
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
        // dd($request);

        if($request->image){
            foreach ($request->image as $index => $img) {
                # code...
                $image_path = $img->getPathname();
                $image_mime = $img->getmimeType();
                $image_name = $img->getClientOriginalName();
                $image[] = [
                      'name'     => 'images['.$index.']',
                      'filename' => $image_name,
                      'Mime-Type'=> $image_mime,
                      'contents' => fopen( $image_path, 'r' ),
                    ];
            }
        }else{
          $allImage = '';
        }

        //get Requests
        $req = [
                "product_type"      => $request->product_type,
                "request_amount"    => $request->request_amount,
                "year"              => $request->year,
                "home_location"     => $request->home_location,
                "active_kpr"        => $request->active_kpr,
                "price"             => $request->price,
                "down_payment"      => $request->down_payment,
                "building_area"     => $request->building_area
               ];

        $newForm = array(
                [
                  'name'     => 'nik',
                  'contents' => $nik
                ],
                [
                  'name'     => 'office_id',
                  'contents' => '544'
                ],
                [
                  'name'     => 'product',
                  'contents' => json_encode($req)
                ],
                [
                  'name'     => 'appointment_date',
                  'contents' => $request->date
                ],
                [
                  'name'     => 'longitude',
                  'contents' => $request->lng
                ],
                [
                  'name'     => 'latitude',
                  'contents' => $request->lat
                ]
            );

        $new = array_merge($newForm, $image);

        return $new;
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
        // dd($newForm);

        $client = Client::setEndpoint('eforms')
           ->setHeaders(['Authorization' => $data['token']])
           ->setBody($newForm)
           ->post('multipart');
        
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDispotition(Request $request, $id)
    {
        $data = $this->getUser();

        $dispotition = [
            'ao_id' => $request->name,
        ];

        $client = Client::setEndpoint('eforms/'.$id.'/disposition')->setHeaders(['Authorization' => $data['token']])->setBody($dispotition)->post();

        if($client['status']['succeded'] == true){
            \Session::flash('error', 'Disposisi Pengajuan berhasil disimpan!');
            return redirect()->route('eform.index');
        }else{
            \Session::flash('error', 'Disposisi Pengajuan gagal disimpan!');
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
                    'customer_name' => $request->input('search.value'),
                ])->get();

        foreach ($eforms['eforms']['data'] as $key => $form) {
            $form['ref'] = strtoupper($form['ref_number']);
            $form['customer_name'] = strtoupper($form['customer_name']);
            $form['request_amount'] = $form['nominal'];
            $form['prescreening_status'] = '0';
            $form['application_status'] = '0';
            $form['office'] = $form['office'];
            $form['ao'] = $form['ao_name'];

            $form['action'] = view('internals.layouts.actions', [
                'dispotition' => route('getDispotition', $form['id']),
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
