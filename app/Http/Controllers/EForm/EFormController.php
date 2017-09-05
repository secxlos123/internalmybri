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
    public function __construct()
    {
        $this->middleware('eform', ['except' => ['datatables']]);
    }

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

        if($data['role'] == 'ao'){
            return view('internals.eform.index-ao', compact('data'));   
        } elseif ($data['role'] == 'admin') {
            return view('internals.eform.index', compact('data'));
            # code...
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
            ->setHeaders(['Authorization' => $data['token']])
            ->setQuery([
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
            ->setHeaders(['Authorization' => $data['token']])
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
                        ->setHeaders(['Authorization' => $data['token']])
                        ->get();
        
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
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function eformRequest($request, $data)
    {       
        if(!empty($request->name)){
            /* GET Customer Data */
            $customerData = Client::setEndpoint('customer/'.$request->name)
                            ->setQuery(['limit' => 100])
                            ->setHeaders(['Authorization' => $data['token']])
                            ->get();
            
            $nik = $customerData['contents']['personal']['nik'];
        }else{
            \Session::flash("error", "NIP harus diisi");
            return redirect()->back()->withInput();
        }

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
          \Session::flash("error", "Foto Dokumen harus diisi");
            return redirect()->back()->withInput();
        }

        //get Requests
        $req = [
                "product_type"      => $request->product_type,
                "request_amount"    => intval(preg_replace('(\D+)', '', $request->request_amount)),
                "year"              => $request->year,
                "home_location"     => $request->home_location,
                "active_kpr"        => $request->active_kpr,
                "price"             => intval(preg_replace('(\D+)', '', $request->price)),
                "down_payment"      => intval(preg_replace('(\D+)', '', $request->down_payment)),
                "building_area"     => $request->building_area
               ];

        $newForm = array(
                [
                  'name'     => 'nik',
                  'contents' => $nik
                ],
                [
                  'name'     => 'office_id',
                  'contents' => $request->office_name
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
// 
        $newForm = $this->eformRequest($request, $data);

        $validator = $this->generalRules($request->all());
        if ($validator->fails()) {
            \Session::flash("error", "Data yang anda masukan tidak valid");
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->product_type == "kpr") {
            $validator = $this->kprRules($request->all());
            if ($validator->fails()) {
                \Session::flash("error", "Data yang anda masukan tidak valid");
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            if (!isset($request->image['collateral_document']) || !isset($request->image['salary_slip']) || !isset($request->image['bank_statement']) || !isset($request->image['family_card']) || !isset($request->image['marriage_certificate']) || !isset($request->image['bussiness_document']) || !isset($request->image['deed'])) {
                \Session::flash("error", "Foto Dokumen tidak boleh ada yang kosong");
                return redirect()->back()->withInput();
            }

                $client = Client::setEndpoint('eforms')
                   ->setHeaders(['Authorization' => $data['token']])
                   ->setBody($newForm)
                   ->post('multipart');
                
                if($client['code'] == 201){
                    \Session::flash('success', 'Data sudah disimpan.');
                    return redirect()->route('eform.index');
                }else{
                    \Session::flash('error', 'Kesalahan input.');
                    return redirect()->back();
                }
            } elseif ($request->product_type == "kkb") {
                $validator = $this->kkbRules($request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors());
                }

            } elseif ($request->product_type == "briguna") {
                $validator = $this->brigunaRules($request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors());
                }

            } elseif ($request->product_type == "britama") {
                $validator = $this->britamaRules($request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors());
                }

            } elseif ($request->product_type == "kur") {
                $validator = $this->kurRules($request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors());
                }

            } elseif ($request->product_type == "kartu") {
                $rules = [
                            'card_type' => 'required',
                        ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors());
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
                ->setHeaders(['Authorization' => $data['token']])
                ->setBody($dispotition)
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
                ->setHeaders(['Authorization' => $data['token']])
                ->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'office_id' => $request->input('search.value'),
                    'customer_name' => $request->input('search.value'),
                    'page'      => (int) $request->input('page') + 1
                ])->get();

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

        return response()->json($eforms['eforms']);
    }

     /**
     * Validation general
     * @param $request
     */
    public function generalRules($request)
    {
        $rules = [
                    'name' => 'required',
                    'date' => 'required|date|after_or_equal:today',
                    'location' => 'required',
                    'cities' => 'required',
                    'office_name' => 'required',
                ];

        $validator = Validator::make($request, $rules);
        return $validator;
    }

    /**
     * Validation KPR
     * @param $request
     */

    public function kprRules($request)
    {
        $rules = [
                    'request_amount' => 'required_if:product_type,kpr',
                    'year' => 'required_if:product_type,kpr',
                    'home_location' => 'required_if:product_type,kpr',
                    'active_kpr' => 'required_if:product_type,kpr',
                    'price' => 'required_if:product_type,kpr',
                    'down_payment' => 'required_if:product_type,kpr',
                    'building_area' => 'required_if:product_type,kpr',
                    'image.*' => 'mimes:jpeg,jpg,png,gif,docx,pdf|max:10000',
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
