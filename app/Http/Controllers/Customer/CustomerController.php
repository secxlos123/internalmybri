<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use Client;

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('leads', ['except' => ['datatables']]);
    // }

    protected $columns = [
        'nik',
        'name',
        'email',
        'city_id',
        'phone',
        'gender',
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
        /* GET UserLogin Data */
        $data = $this->getUser();
        // dd(session()->get('user.contents'));

        /* GET Role Data */
        $customerData = Client::setEndpoint('customer')
                      ->setQuery(['limit' => 100])
                      ->setHeaders([
                          'Authorization' => $data['token'],
                          'pn' => $data['pn']
                      ])->get();
        $dataCustomer = $customerData['contents']['data'];
        // dd($dataCustomer);

        return view('internals.customers.index', compact('data', 'dataCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getUser();

        return view('internals.customers.create', compact('data'));
    }

    // uses regex that accepts any word character or hyphen in last name
    function split_name($request) {
        $name = trim($request->full_name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
        return array($first_name, $last_name);
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */

    public function customerRequest($request)
    {
        $first_name = $this->split_name($request)['0'];
        $last_name = $this->split_name($request)['1'];
        $name = array(
            [
              'name'     => 'first_name',
              'contents' => $first_name,
            ],
            [
              'name'     => 'last_name',
              'contents' => $last_name,
            ],
          );

        $moneyInput = array(
                [
                    'name'    => 'salary',
                    'contents' => intval(preg_replace('(\D+)', '', $request->salary))
                ],
                [
                    'name'    => 'other_salary',
                    'contents' => intval(preg_replace('(\D+)', '', $request->other_salary))
                ],
                [
                    'name'    => 'loan_installment',
                    'contents' => intval(preg_replace('(\D+)', '', $request->loan_installment))
                ]
            );

        $npwpReq = $request->npwp;
          $npwp_path = $npwpReq->getPathname();
            $npwp_mime = $npwpReq->getmimeType();
            $npwp_name = $npwpReq->getClientOriginalName();
            $npwp[] = [
                  'name'     => 'npwp',
                  'filename' => $npwp_name,
                  'Mime-Type'=> $npwp_mime,
                  'contents' => fopen( $npwp_path, 'r' ),
                ];

        $legal_documentReq = $request->legal_document;
          $legal_document_path = $npwpReq->getPathname();
            $legal_document_mime = $npwpReq->getmimeType();
            $legal_document_name = $npwpReq->getClientOriginalName();
            $legal_document[] = [
                  'name'     => 'legal_document',
                  'filename' => $legal_document_name,
                  'Mime-Type'=> $legal_document_mime,
                  'contents' => fopen( $legal_document_path, 'r' ),
                ];

        $salary_slipReq = $request->salary_slip;
          $salary_slip_path = $npwpReq->getPathname();
            $salary_slip_mime = $npwpReq->getmimeType();
            $salary_slip_name = $npwpReq->getClientOriginalName();
            $salary_slip[] = [
                  'name'     => 'salary_slip',
                  'filename' => $salary_slip_name,
                  'Mime-Type'=> $salary_slip_mime,
                  'contents' => fopen( $salary_slip_path, 'r' ),
                ];

        $bank_statementReq = $request->bank_statement;
          $bank_statement_path = $npwpReq->getPathname();
            $bank_statement_mime = $npwpReq->getmimeType();
            $bank_statement_name = $npwpReq->getClientOriginalName();
            $bank_statement[] = [
                  'name'     => 'bank_statement',
                  'filename' => $bank_statement_name,
                  'Mime-Type'=> $bank_statement_mime,
                  'contents' => fopen( $bank_statement_path, 'r' ),
                ];

        $family_cardReq = $request->family_card;
          $family_card_path = $npwpReq->getPathname();
            $family_card_mime = $npwpReq->getmimeType();
            $family_card_name = $npwpReq->getClientOriginalName();
            $family_card[] = [
                  'name'     => 'family_card',
                  'filename' => $family_card_name,
                  'Mime-Type'=> $family_card_mime,
                  'contents' => fopen( $family_card_path, 'r' ),
                ];

        $marrital_certificateReq = $request->marrital_certificate;
          $marrital_certificate_path = $npwpReq->getPathname();
            $marrital_certificate_mime = $npwpReq->getmimeType();
            $marrital_certificate_name = $npwpReq->getClientOriginalName();
            $marrital_certificate[] = [
                  'name'     => 'marrital_certificate',
                  'filename' => $marrital_certificate_name,
                  'Mime-Type'=> $marrital_certificate_mime,
                  'contents' => fopen( $marrital_certificate_path, 'r' ),
                ];

        if($request->diforce_certificate){
          $imgReq = $request->diforce_certificate;
            $image_path = $imgReq->getPathname();
              $image_mime = $imgReq->getmimeType();
              $image_name = $imgReq->getClientOriginalName();
              $couple[] = [
                    'name'     => 'diforce_certificate',
                    'filename' => $image_name,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen( $image_path, 'r' ),
                    ];
          $allReq = $request->except(['npwp', '_token', 'diforce_certificate', 'legal_document', 'salary_slip', 'bank_statement', 'family_card', 'marrital_certificate', 'diforce_certificate', 'salary', 'other_salary', 'loan_installment']);
            foreach ($allReq as $index => $req) {
              $inputData[] = [
                        'name'     => $index,
                        'contents' => $req
                      ];
            }
            $newCustomer = array_merge($npwp, $inputData, $legal_document, $bank_statement, $family_card, $marrital_certificate, $diforce_certificate, $name, $salary_slip);
        }else{
          $allReq = $request->except(['npwp', '_token', 'legal_document', 'salary_slip', 'bank_statement', 'family_card', 'marrital_certificate', 'diforce_certificate', '_token', 'full_name', 'salary', 'other_salary', 'loan_installment']);
            foreach ($allReq as $index => $req) {
              $inputData[] = [
                        'name'     => $index,
                        'contents' => $req
                      ];
            }

            $newCustomer = array_merge($npwp, $inputData, $bank_statement, $legal_document, $family_card, $marrital_certificate, $name, $moneyInput, $salary_slip);
        }
        return $newCustomer;
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function dataRequest($request)
    {
        $first_name = $this->split_name($request)['0'];
        $last_name = $this->split_name($request)['1'];

        $name = array(
            [
              'name'     => 'first_name',
              'contents' => $first_name,
            ],
            [
              'name'     => 'last_name',
              'contents' => $last_name,
            ],
          );

        $imgReq = $request->identity;
          $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
                  'name'     => 'identity',
                  'filename' => $image_name,
                  'Mime-Type'=> $image_mime,
                  'contents' => fopen( $image_path, 'r' ),
                ];

        if($request->couple_identity){
          $imgReq = $request->couple_identity;
            $image_path = $imgReq->getPathname();
              $image_mime = $imgReq->getmimeType();
              $image_name = $imgReq->getClientOriginalName();
              $couple[] = [
                    'name'     => 'couple_identity',
                    'filename' => $image_name,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen( $image_path, 'r' ),
                  ];
        $allReq = $request->except(['identity', '_token', 'couple_identity', 'full_name']);
          foreach ($allReq as $index => $req) {
            $inputData[] = [
                      'name'     => $index,
                      'contents' => $req
                    ];
          }
          $newCustomer = array_merge($image, $inputData, $couple, $name);
        }else{
          $allReq = $request->except(['identity', '_token', 'full_name']);
          foreach ($allReq as $index => $req) {
            $inputData[] = [
                      'name'     => $index,
                      'contents' => $req
                    ];
          }

          $newCustomer = array_merge($image, $inputData, $name);
        }

        return $newCustomer;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $data = $this->getUser();

        $newCustomer = $this->dataRequest($request);
        // dd($newCustomer);
        $client = Client::setEndpoint('customer')
         ->setHeaders([
              'Authorization' => $data['token'],
              'pn' => $data['pn']
          ])->setBody($newCustomer)
         ->post('multipart');
         // dd($client);
         // if($client['code'] == 200){
         //    \Session::flash('success', $client['descriptions']);
         //    return redirect()->back();
         // }else{
         //    \Session::flash('error', $client['descriptions']);
         //    return redirect()->back();
         // }

        $codeResponse = $client['code'];
        $codeDescription = $client['descriptions'];

        if($codeResponse == 201){
            // session()->put('user', $client);
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse, 'data' => $client['contents']]);
        }elseif($codeResponse == 422){
            return response()->json($client);
        }elseif($codeResponse == 404){
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }else{
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
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
        $data = $this->getUser();

         /* GET Role Data */
        $customerData = Client::setEndpoint('customer/'.$id)
                        ->setQuery(['limit' => 100])
                        ->setHeaders(['Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                        ->get();

        $dataCustomer = $customerData['contents'];
        // dd($dataCustomer);
        // dd(($dataCustomer['personal']['status'] == 0) ? 'Lajang' : '');

        return view('internals.customers.detail', compact('data', 'dataCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->getUser();

         /* GET Role Data */
        $customerData = Client::setEndpoint('customer/'.$id)->setQuery(['limit' => 100])->setHeaders(['Authorization' => $data['token']])->get();

        $dataCustomer = $customerData['data'];
        return view('internals.customers.edit', compact('data', 'dataCustomer', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $data = $this->getUser();

        $newCustomer = $this->customerRequest($request);

        $client = Client::setEndpoint('customer/'.$id)
          ->setHeaders([
              'Authorization' => $data['token'],
              'pn' => $data['pn']
          ])->setBody($newCustomer)
          ->put('multipart');

        if($client['code'] == 200){
            \Session::flash('success', 'Data berhasil diubah!');
            return redirect()->route('eform.index');
        }else{
            \Session::flash('error', 'Lengkapi data Anda!');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifyCustomer(Request $request, $eform_id, $customer_id)
    {
        $data = $this->getUser();
        // dd($request->all());

        $newCustomer = $this->customerRequest($request);
        // dd($newCustomer);

        $client = Client::setEndpoint('customer/'.$customer_id)
         ->setHeaders([
              'Authorization' => $data['token'],
              'pn' => $data['pn']
          ])
         ->setBody($newCustomer)
         ->put('multipart');
         // dd($client);

        if($client['code'] == 200){
            \Session::flash('success', 'Data berhasil dilengkapi!');
            return redirect()->route('getVerification', $eform_id);
        }else{
            \Session::flash('error', 'Lengkapi data Anda!');
            return redirect()->back();
        }
    }

    public function datatables(Request $request)
    {
      // dd($request->input('city_id'));
        $sort = $request->input('order.0');
        $data = $this->getUser();

        $customers = Client::setEndpoint('customer')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'name'      => $request->input('name'),
                    'nik'      => $request->input('nik'),
                    'city_id'   => $request->input('city_id'),
                    'page'      => (int) $request->input('page') + 1,
                ])->get();
        foreach ($customers['contents']['data'] as $key => $customer) {
            $customer['name'] = $customer['first_name'].' '.$customer['last_name'];
            $customer['city_id'] = $customer['city'];
            if ($customer['application_status'] == "Tidak Ada Pengajuan") {
              $customer['application_status'] = '<p class="text-danger">'.$customer['application_status'].'</p>';
            }
            $customer['action'] = view('internals.layouts.actions', [
                'show' => route('customers.show', $customer['id']),
            ])->render();
            $customers['contents']['data'][$key] = $customer;
        }

        $customers['contents']['draw'] = $request->input('draw');
        $customers['contents']['recordsTotal'] = $customers['contents']['total'];
        $customers['contents']['recordsFiltered'] = $customers['contents']['total'];

        return response()->json($customers['contents']);
    }
}
