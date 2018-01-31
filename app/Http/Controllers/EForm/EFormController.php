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
    public function index(Request $request)
    {

        $data = $this->getUser();
        // dd(env('APP_ENV'));
        if($data['role'] == 'ao'){
            $form_notif = [];
            if(@$request->get('ref_number') && @$request->get('slug')){
                /*
                * redirect to eform with id and ref_number
                */
                $eforms = Client::setEndpoint('eforms/'.@$request->get('slug').'/'.@$request->get('ref_number').' ')
                    ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                        // , 'auditaction' => 'action name'
                        , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                        , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                    ])->setQuery([
                        'ref_number' => $request->get('ref_number'),
                        'ids' => $request->get('slug'),
                    ])->get();
                $form_notif = $eforms['contents'];
                $form_notif['ref_number'] = strtoupper($form_notif['ref_number']);
                $form_notif['customer_name'] = strtoupper($form_notif['customer_name']);
                $form_notif['created_at'] = date_format(date_create($form_notif['created_at']),"Y-m-d");
                // $form_notif['product_type'] = strtoupper($form_notif['product_type']);
                $form_notif['request_amount'] = 'Rp '.number_format($form_notif['nominal'], 2, ",", ".");
                $form_notif['created_at'] = $form_notif['created_at'];
                $form_notif['appointment_date'] = '<p style="font-size: .8em;">Tanggal: '.$form_notif['created_at'].'<br/><br/>Di: <br/>'.$form_notif['address'].'<p>';

                // $verify = $form_notif['customer']['is_verified'];
                $verify = $form_notif['response_status'] == 'approve' ? true : false;
                $visit = $form_notif['is_visited'];
                $status = $form_notif['response_status'];
                    $text = '-';
                    if ($status == 'approve') {
                        $text = 'Telah Disetujui';

                    } else if($status == 'reject') {
                        $text = 'Belum Disetujui';

                    } else if($status == 'unverified') {
                        $text = 'Dalam Proses';
                    }

                $form_notif['respon_statused'] = $text;

                $form_notif['prescreening_status'] = view('internals.layouts.actions', [
                  'prescreening_status' => route('getLKN', $form_notif['id']),
                  'prescreening_result' => $form_notif['prescreening_status'],
                ])->render();

                $form_notif['action'] = view('internals.layouts.actions', [
                    'verified' => $verify,
                    'visited' => $visit,
                    'response_status' => $status,
                    'verification' => route('getVerification', $form_notif['id']),
                    'approval' => $form_notif['is_approved'],
                    'eform_id' => $form_notif['id'],
                    'preview' => route('getDetail', $form_notif['id']),
                    'lkn' => route('getLKN', $form_notif['id']),
                    'screening_result' => 'view',
                ])->render();
                /*
                * mark read the notification
                */
                $reads = Client::setEndpoint('users/notification/read/'.@$request->get('slug').'/'.@$request->get('type'))
                       ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                        , 'branch_id' => $data['branch']
                        // , 'auditaction' => 'action name'
                        , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                        , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                    ])->get();
            }

            return view('internals.eform.index-ao', compact('data','form_notif'));
        } elseif (($data['role'] == 'mp') || ($data['role'] == 'pinca')) {
            $form_notif = [];
            if(@$request->get('ref_number') && @$request->get('slug')){
               /*
                * redirect to eform with id and ref_number
                */
                $eforms = Client::setEndpoint('eforms/'.@$request->get('slug').'/'.@$request->get('ref_number').' ')
                    ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                        // , 'auditaction' => 'action name'
                        , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                        , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                    ])->setQuery([
                        'ref_number' => $request->get('ref_number'),
                        'ids' => $request->get('slug'),
                    ])->get();
                $form_notif = $eforms['contents'];
                $form_notif['ref'] = strtoupper($form_notif['ref_number']);
                $form_notif['customer_name'] = strtoupper($form_notif['customer_name']);
                $form_notif['request_amount'] = 'Rp '.number_format($form_notif['nominal'], 2, ",", ".");
                $form_notif['ao'] = $form_notif['ao_name'];

                $verify = $form_notif['customer']['is_verified'];
                $visit = $form_notif['is_visited'];

                $form_notif['prescreening_status'] = view('internals.layouts.actions', [
                  'prescreening_status' => route('getLKN', $form_notif['id']),
                  'prescreening_result' => $form_notif['prescreening_status'],
                ])->render();

                $form_notif['action'] = view('internals.layouts.actions', [
                                                    'dispose' => $form_notif['ao_name'],
                                                    'submited' => ($form_notif['is_approved'] && $verify),
                                                    'dispotition' => $form_notif,
                                                    'approve' => $form_notif,
                                                    'visited' => $visit,
                                                    'status' => $form_notif['status_eform'],
                                                ])->render();
                /*
                * mark read the notification
                */
                $reads = Client::setEndpoint('users/notification/read/'.@$request->get('slug').'/'.@$request->get('type'))
                    ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                        , 'branch_id' => $data['branch']
                        // , 'auditaction' => 'action name'
                        , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                        , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                    ])->get();
            }

            return view('internals.eform.index', compact('data','form_notif'));
        } else{
            return view('internals.eform.create', compact('data'));
        }
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
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'nik' => $request->input('nik'),
                'page' => $request->input('page'),
                'eform' => $request->has('eform') ? $request->input('eform') : true
            ])
            ->get();

        foreach ($customers['contents']['data'] as $key => $cust) {

            $cust['text'] = $cust['nik'];
            $cust['id'] = $cust['nik'];
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
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page'),
                'branch_id' => $request->input('offices'),
            ])
            ->get();
            // echo json_encode($officers['contents']);exit();

        $aoId = $request->input('aoId');


        foreach ($officers['contents']['data'] as $key => $ao) {
            if ($ao['id'] != $aoId) {
                $ao['text'] = $ao['name'];
                $officers['contents']['data'][$key] = $ao;
            }
        }

        return response()->json(['officers' => $officers['contents']]);
    }

    public function detailCustomer(Request $request)
    {
        $data = $this->getUser();
        // $customerData = $this->getCustomer($request);
        // echo json_encode($request->input('id'));die();
         /* GET Role Data */
        $customerData = Client::setEndpoint('customer/'.$request->input('nik'))
                        ->setHeaders([
                            'Authorization' => $data['token']
                            , 'pn' => $data['pn']
                            // , 'auditaction' => 'action name'
                            , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                            , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                        ])->get();
        $dataCustomer = $customerData['contents'];
        // echo json_encode($dataCustomer['data']);die();

        if(($customerData['code'])==200){
            $view = (String)view('internals.eform.detail-customer')
                ->with('dataCustomer', $dataCustomer)
                ->render();

            return response()->json(['view' => $view]);
        } else {
            $view = (String)view('internals.eform.error')
                ->with('dataCustomer', $dataCustomer)
                ->render();

            return response()->json(['view' => $view]);
            // return view('internals.eform.detail-customer')
            //     ->with('dataCustomer', $dataCustomer);
        }
    }

    public function getData(Request $request)
    {
        $data = $this->getUser();

        $customerData = Client::setEndpoint('customer')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setQuery([
                'nik' => $request->input('nik')
            ])
            ->get();

        $dataCustomer = $customerData['contents']['data'][0];

        $userData = array_merge($dataCustomer, $data);
        // echo json_encode($userData);die();

        return response()->json(['data' => $userData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getUser();

        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', 'http://freegeoip.net/json/');

            $getIP = json_decode( '[' . $res->getBody()->getContents() . ']' )[0];
            $long = $getIP->longitude;
            $lat = $getIP->latitude;

        } catch (\Exception $e) {
            \Log::info($e);
            $getIP = null;
            $long = env('DEF_LONG', '106.81350');
            $lat = env('DEF_LAT', '-6.21670');

        }

        $offices = Client::setEndpoint('offices')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'branch' => $data['branch'],
                'distance' => 1,
                'long' => $long,
                'lat' => $lat
            ])
            ->get();

        if(!empty($offices['contents']['data'])){
            $office = $offices['contents']['data'][0];

        } else {
            $office = array(
                'branch' => $data['branch'],
                'unit' => $data['uker'],
                'address' => $data['uker'],
                'lat' => $lat,
                'long' => $long
            );
        }

        return view('internals.eform.create', compact('data', 'office'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDispotition($id, $ref_number)
    {
        // dd($id);
        $data = $this->getUser();
         /* GET Form Data */
        $formDetail = Client::setEndpoint('eforms/'.$id)
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->get();

        $detail = $formDetail['contents'];
        // dd($detail);

        return view('internals.eform.dispotition', compact('data', 'id', 'ref_number', 'detail'));
    }

    /**
     * List of request needed for input to eform
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function eformRequest($request, $data)
    {
        $allReq = $request->except(['request_amount', 'price', '_token', 'dp', 'down_payment']);;
        foreach ($allReq as $index => $req) {
            $inputData[] = [
                      'name'     => $index,
                      'contents' => $req
                    ];
        }

        $moneyInput = array(
                [
                    'name'    => 'request_amount',
                    'contents' => str_replace(',', '', $request->request_amount)
                ],
                [
                    'name'    => 'price',
                    'contents' => str_replace(',', '', $request->price)
                ],
                [
                    'name'    => 'dp',
                    'contents' => str_replace(',', '', $request->dp)
                ],
                [
                    'name'    => 'down_payment',
                    'contents' => str_replace(',', '', $request->down_payment)
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
        $role = $data['role'];
        $newForm = $this->eformRequest($request, $data);
        // dd(json_encode($newForm));

        // $validator = $this->generalRules($request->all());
        // if ($validator->fails()) {
        //     \Session::flash("error", "Data yang anda masukan tidak valid");
        //     return redirect()->back()->withErrors($validator->errors())->withInput();
        // }

        if ($request->product_type == "kpr") {
            // $validator = $this->kprRules($request->all());
            // if ($validator->fails()) {
            //     \Session::flash("error", "Data yang anda masukan tidak valid");
            //     return redirect()->back()->withErrors($validator->errors())->withInput();
            // }

                $client = Client::setEndpoint('eforms')
                   ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                        , 'auditaction' => 'pengajuan kredit via '.$role
                        , 'long' => $request['hidden-long']
                        , 'lat' => $request['hidden-lat']
                    ])->setBody($newForm)
                   ->post('multipart');
                // dd($client);

                if($client['code'] == 201){
                    \Session::flash('success', $client['descriptions']);
                    return redirect()->route('eform.index');
                }else{
                    $error = reset($client['contents']);
                    \Session::flash('error', $client['descriptions'].' '.$error);
                    return redirect()->back()->withInput($request->input());
                }
        }
    }

    /**
     * Get prescreening detail data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detailPrescreening( Request $request )
    {
        $data = $this->getUser();

        $client = Client::setEndpoint('eforms/prescreening')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setBody([
                'eform' => $request->input('eform')
            ])
            ->post();

        return response()->json(['response' => $client]);
    }

    /**
     * Post prescreening data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPrescreening(Request $request)
    {
        $data = $this->getUser();

        $client = Client::setEndpoint('eforms/submit-screening')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setBody([
                'eform_id' => $request->input('eform_id')
                , 'sicd' => $request->input('sicd')
                , 'dhn' => $request->input('dhn')
                , 'pefindo' => $request->input('pefindo')
                , 'selected_dhn' => $request->input('selected_dhn')
                , 'selected_sicd' => $request->input('selected_sicd')
            ])
            ->post();

        return response()->json(['response' => $client]);
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
        // dd($request->all());

        $dispotition = [
            'ao_id' => $request->name,
        ];

        $client = Client::setEndpoint('eforms/'.$id.'/disposition')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                , 'branch_id' => $data['branch']
                , 'role' => $data['role']
                , 'auditaction' => $request['auditaction']
                , 'long' => $request['hidden-long']
                , 'lat'  => $request['hidden-lat']
            ])->setBody($dispotition)
            ->post();

        if($client['code'] == 201){
            \Session::flash('success', 'Disposisi Berhasil Dilakukan');
            return redirect()->route('eform.index');
        }else{
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
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
                    'start_date'=> $request->input('start_date'),
                    'end_date'  => $request->input('end_date'),
                    'status'    => $request->input('status'),
                    'branch_id' => $data['branch'],
                    'ref_number' => $request->input('ref_number'),
                    'customer_name' => $request->input('customer_name'),
                    'prescreening' => $request->input('prescreening'),
                    'product' => $request->input('product'),
                    'name' => $request->input('name')
                ])->get();

            // dd($eforms);
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

            if($form['is_recontest'] == 1){
              $recontest = route('getApprovalRecontest', $form['id']);
            }else{
              $recontest = [];
            }
            $form['action'] = view('internals.layouts.actions', [

                'dispose' => $form['ao_name'],
                'submited' => ($form['is_approved'] && $verify),
                'dispotition' => $form,
                'response_status' => $form['response_status'],
                'is_screening' => $form['is_screening'],
                // 'screening' => route('eform.show', $form['id']),
                'approve' => $form,
                // 'verified' => $verify,
                'visited' => $visit,
                'status' => $form['status_eform'],
                'recontest' => $recontest,
                // 'verification' => route('getVerification', $form['user_id']),
                // 'lkn' => route('getLKN', $form['id']),
                'screening_result' => 'view',
                'is_verified' => $verify,
            ])->render();
            $eforms['contents']['data'][$key] = $form;
        }

        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];

        return response()->json($eforms['contents']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $data = $this->getUser();

        $eform_id = [
            'eform_id' => $request->id,
        ];

        $client = Client::setEndpoint('eforms/'.$request->id.'/delete')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setBody($eform_id)
            ->post();

         return response()->json(['response' => $client]);
    }

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
    public function brigunaRules($request)
    {
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
    public function britamaRules($request)
    {
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
    public function kurRules($request)
    {
        $rules = [
            'kur_application' => 'required',
            'kur_time_periode' => 'required',
        ];

        $validator = Validator::make($request, $rules);
        return $validator;
    }
}
