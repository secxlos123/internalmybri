<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\EForm\EFormRequest;
use Client;
use Validator;

class EFormController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('eform', ['except' => ['datatables', 'getCustomer', 'detailCustomer']]);
    // }

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

        // if($data['role'] == 'ao'){
            return view('internals.eform.index-ao', compact('data'));   
        // } elseif ($data['role'] == 'admin') {
            // return view('internals.eform.index', compact('data'));
            # code...
        // }     
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
            ->setHeaders([
                'Authorization' => $data['token'],
                'pn' => $data['pn']
            ])->setQuery([
                'nik' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($customers['contents']['data'] as $key => $cust) {

            $cust['text'] = $cust['nik'];
            $customers['contents']['data'][$key] = $cust;
        }

        return response()->json(['customers' => $customers['contents']]);
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
            ->setHeaders([
                'Authorization' => $data['token'],
                'pn' => $data['pn']
            ])
            ->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($officers['contents']['data'] as $key => $ao) {
            $ao['text'] = $ao['name'];
            $officers['contents']['data'][$key] = $ao;
        }

        return response()->json(['officers' => $officers['contents']]);
    }

    public function detailCustomer(Request $request)
    {
        $data = $this->getUser();

         /* GET Role Data */
        $customerData = Client::setEndpoint('customer/'.$request->id)
                        ->setQuery(['limit' => 100])
                        ->setHeaders([
                            'Authorization' => $data['token'],
                            'pn' => $data['pn']
                        ])->get();
        
        $dataCustomer = $customerData['contents'];

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
    public function getDispotition($id)
    {
        $data = $this->getUser();
        
        return view('internals.eform.dispotition', compact('data', 'id'));
    }

    /**
     * List of request needed for input to eform
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function eformRequest($request, $data)
    {       
        if(!empty($request->nik)){
            /* GET Customer Data */
            $customerData = Client::setEndpoint('customer/'.$request->nik)
                            ->setQuery(['limit' => 100])
                            ->setHeaders([
                                'Authorization' => $data['token'],
                                'pn' => $data['pn']
                            ])
                            ->get();
            
            $nik = $customerData['contents']['personal']['nik'];
        }else{
            \Session::flash("error", "NIK harus diisi");
            return redirect()->back()->withInput();
        }

        $allReq = $request->except(['request_amount', 'price', '_token']);;
        foreach ($allReq as $index => $req) {
            $inputData[] = [
                      'name'     => $index,
                      'contents' => $req
                    ];
        }
            $moneyInput = array(
                    [
                        'name'    => 'request_amount',
                        'contents' => intval(preg_replace('(\D+)', '', $request->request_amount))
                    ],
                    [
                        'name'    => 'price',
                        'contents' => intval(preg_replace('(\D+)', '', $request->price))
                    ]
                );
        $new = array_merge($inputData, $moneyInput);

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
// 
        $newForm = $this->eformRequest($request, $data);
        // dd($newForm);

        // $validator = $this->generalRules($request->all());
        // if ($validator->fails()) {
        //     \Session::flash("error", "Data yang anda masukan tidak valid");
        //     return redirect()->back()->withErrors($validator->errors())->withInput();
        // }

        if ($request->product_type == "kpr") {
            $validator = $this->kprRules($request->all());
            if ($validator->fails()) {
                \Session::flash("error", "Data yang anda masukan tidak valid");
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

                $client = Client::setEndpoint('eforms')
                   ->setHeaders([
                        'Authorization' => $data['token'],
                        'pn' => $data['pn']
                    ])->setBody($newForm)
                   ->post('multipart');
                // dd($client);
                
                if($client['code'] == 201){
                    \Session::flash('success', $client['descriptions']);
                    return redirect()->route('eform.index');
                }else{
                    \Session::flash('error', $client['descriptions']);
                    return redirect()->back();
                }
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

        $client = Client::setEndpoint('eforms/'.$id.'/disposition')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                ])->setBody($dispotition)
                ->post();

        if($client['code'] == 201){
            \Session::flash('error', 'Disposisi Pengajuan berhasil disimpan!');
            return redirect()->route('eform.index');
        }else{
            \Session::flash('error', 'Disposisi Pengajuan gagal disimpan!');
            return redirect()->back();
        }

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
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'office_id' => $request->input('search.value'),
                    'customer_name' => $request->input('search.value'),
                    'page'      => (int) $request->input('page') + 1
                ])->get();
            // dd($eforms);

        foreach ($eforms['contents']['data'] as $key => $form) {
            $form['ref'] = strtoupper($form['ref_number']);
            $form['customer_name'] = strtoupper($form['customer_name']);
            $form['request_amount'] = $form['nominal'];
            $form['prescreening_status'] = '0';
            $form['application_status'] = '0';
            $form['office'] = $form['office'];
            $form['ao'] = $form['ao_name'];

            $form['action'] = view('internals.layouts.actions', [
                'dispotition' => $form,
                'screening' => route('eform.show', $form['id']),
                'approve' => $form,
            ])->render();
            $eforms['contents']['data'][$key] = $form;
        }

        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];

        return response()->json($eforms['contents']);
    }

     /**
     * Validation general
     * @param $request
     */
    // public function generalRules($request)
    // {
    //     $rules = [
    //                 'name' => 'required',
    //                 'date' => 'required|date|after_or_equal:today',
    //                 'location' => 'required',
    //                 'cities' => 'required',
    //                 'office_name' => 'required',
    //             ];

    //     $validator = Validator::make($request, $rules);
    //     return $validator;
    // }

    /**
     * Validation KPR
     * @param $request
     */

    public function kprRules($request)
    {
        $rules = [
                   'product_type' => 'required|in:kpr',
                   'status_property' => 'required_if:product_type,kpr,required|in:new,second',
                   'developer' => 'required_if:product_type,kpr,required_if:status_property,new',
                   'property' => 'required_if:product_type,kpr,required_if:status_property,new',
                   'price' => 'required_if:product_type,kpr,required',
                   'building_area' => 'required_if:product_type,kpr,required|numeric',
                   'home_location' => 'required_if:product_type,kpr,required',
                   'year' => 'required_if:product_type,kpr,required|numeric',
                   'active_kpr' => 'required_if:product_type,kpr,required|numeric',
                   'dp' => 'required_if:product_type,kpr,required',
                   'request_amount' => 'required_if:product_type,kpr,required',
                   'nik' => 'required',
                   'office_id' => 'required',
                   'appointment_date' => 'required|date',
                   'address' => 'required',
                   'longitude' => 'required',
                   'latitude' => 'required'
                ];

        $validator = Validator::make($request, $rules);
        return $validator;
    }

    /**
     * Validation KKB
     * @param $request
     */

    public function kkbRules($request)
    {
        $rules = [
                    'kkb_application' => 'required',
                    'kkb_time_periode' => 'required',
                    'vehicle_condition' => 'required',
                    'vehicle_brand' => 'required',
                    'vehicle_price' => 'required',
                    'kkb_payment' => 'required',
                    'vehicle_type' => 'required',
                    'production_year' => 'required',
                ];

        $validator = Validator::make($request, $rules);
        return $validator;
    }

    /**
     * Validation briguna
     * @param $request
     */

    public function brigunaRules($request) {
        $rules = [
                    'briguna_application' => 'required',
                    'briguna_time_periode' => 'required',
                    'loan_status' => 'required',
                ];

        $validator = Validator::make($request, $rules);
        return $validator;
    }

    /**
     * Validation britama
     * @param $request
     */

    public function britamaRules($request) {
        $rules = [
                    'deposit_amount' => 'required',
                    'ebanking_fasility' => 'required',
                    'purpose_utilization' => 'required',
                ];

        $validator = Validator::make($request, $rules);
        return $validator;
    }

    /**
     * Validation KUR
     * @param $request
     */

    public function kurRules($request) {
        $rules = [
                    'kur_application' => 'required',
                    'kur_time_periode' => 'required',
                ];

        $validator = Validator::make($request, $rules);
        return $validator;
    }
}
