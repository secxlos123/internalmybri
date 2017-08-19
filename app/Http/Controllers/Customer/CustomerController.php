<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use Client;

class CustomerController extends Controller
{
    protected $columns = [
        'nik',
        'fullname',
        'email',
        'city',
        'mobile_phone',
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
        /* GET Role Data */
        $customerData = Client::setEndpoint('customer')->setQuery(['limit' => 100])->setHeaders(['Authorization' => $data['token']])->get();
            foreach ($customerData as $role) {
                $role = $role;
            }
        $dataCustomer = $role['data'];

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

        if($request->npwp){
          $npwp_path = $request->npwp->getPathname();
          $npwp_mime = $request->npwp->getmimeType();
          $npwp_name = $request->npwp->getClientOriginalName();
          $npwp = [
                  'name'     => 'npwp',
                  'filename' => $npwp_name,
                  'Mime-Type'=> $npwp_mime,
                  'contents' => fopen( $npwp_path, 'r' ),
                ];
        }else{
          $npwp = [
                  'name'    => "",
                  'contents'=> ""
                ];
        }
        if($request->images){
          $image_path = $request->images->getPathname();
          $image_mime = $request->images->getmimeType();
          $image_name = $request->images->getClientOriginalName();
          $image = [
                  'name'     => 'image',
                  'filename' => $image_name,
                  'Mime-Type'=> $image_mime,
                  'contents' => fopen( $image_path, 'r' ),
                ];
        }else{
          $image = [
                  'name'    => "",
                  'contents'=> ""
                ];
        }
        if($request->identity){
          $identity_path = $request->identity->getPathname();
          $identity_mime = $request->identity->getmimeType();
          $identity_name = $request->identity->getClientOriginalName();
          $identity = [
                  'name'     => 'identity',
                  'filename' => $identity_name,
                  'Mime-Type'=> $identity_mime,
                  'contents' => fopen( $identity_path, 'r' ),
                ];
        }else{
          $identity = [
                  'name'    => "",
                  'contents'=> ""
                ];
        }
        $newCustomer = array(
                [
                  'name'     => 'nik',
                  'contents' => $request->nik
                ],
                [
                  'name'     => 'email',
                  'contents' => $request->email
                ],
                [
                  'name'     => 'first_name',
                  'contents' => $first_name,
                ],
                [
                  'name'     => 'last_name',
                  'contents' => $last_name,
                ],
                [
                  'name'     => 'birth_place',
                  'contents' => $request->birth_place,
                ],
                [
                  'name'     => 'birth_date',
                  'contents' => $request->birth_date,
                ],
                [
                  'name'     => 'address',
                  'contents' => $request->address,
                ],
                [
                  'name'     => 'gender',
                  'contents' => $request->gender,
                ],
                [
                  'name'     => 'city',
                  'contents' => 'Bandung',
                ],
                [
                  'name'     => 'phone',
                  'contents' => $request->phone,
                ],
                [
                  'name'     => 'citizenship',
                  'contents' => $request->citizenship,
                ],
                [
                  'name'     => 'status',
                  'contents' => $request->status,
                ],
                [
                  'name'     => 'address_status',
                  'contents' => $request->address_status,
                ],
                [
                  'name'     => 'mother_name',
                  'contents' => $request->mother_name,
                ],
                [
                  'name'     => 'mobile_phone',
                  'contents' => $request->mobile_phone,
                ],
                [
                  'name'     => 'emergency_contact',
                  'contents' => $request->emergency_contact,
                ],
                [
                  'name'     => 'emergency_relation',
                  'contents' => $request->emergency_relation,
                ],
                $identity,
                $npwp,
                $image,
                [
                  'name'     => 'work_type',
                  'contents' => $request->work_type,
                ],
                [
                  'name'     => 'work',
                  'contents' => $request->work,
                ],
                [
                  'name'     => 'company_name',
                  'contents' => $request->company_name,
                ],
                [
                  'name'     => 'work_field',
                  'contents' => $request->work_field,
                ],
                [
                  'name'     => 'position',
                  'contents' => $request->position,
                ],
                [
                  'name'     => 'work_duration',
                  'contents' => $request->work_duration,
                ],
                [
                  'name'     => 'office_address',
                  'contents' => $request->office_address,
                ],
                [
                  'name'     => 'salary',
                  'contents' => $request->salary,
                ],
                [
                  'name'     => 'other_salary',
                  'contents' => $request->other_salary,
                ],
                [
                  'name'     => 'loan_installment',
                  'contents' => $request->loan_installment,
                ],
                [
                  'name'     => 'dependent_amount',
                  'contents' => $request->dependent_amount,
                ]
              );
          // [
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

        $newCustomer = $this->customerRequest($request);

        $client = Client::setEndpoint('customer')
         ->setHeaders(['Authorization' => $data['token']])
         ->setBody($newCustomer)
         ->post('multipart');

         if($client['status']['succeded'] == true){
            \Session::flash('success', 'Data sudah tersimpan!');
            return redirect()->route('customers.index');
         }else{
         dd($client);
            \Session::flash('error', 'Lengkapi data Anda!');
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
        $data = $this->getUser();

         /* GET Role Data */
        $customerData = Client::setEndpoint('customer/'.$id)->setQuery(['limit' => 100])->setHeaders(['Authorization' => $data['token']])->get();
        
        $dataCustomer = $customerData['data'];

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
    public function update(Request $request, $id)
    {
        $data = $this->getUser();

        $newCustomer = $this->customerRequest($request);

        $client = Client::setEndpoint('customer/'.$id)
         ->setHeaders(['Authorization' => $data['token']])
         ->setBody($newCustomer)
         ->put('multipart');

        if($client['status']['succeded'] == true){
            \Session::flash('success', 'Data sudah tersimpan!');
            return redirect()->route('customers.index');
        }else{
         dd($client);
            \Session::flash('error', 'Lengkapi data Anda!');
            return redirect()->back();
        }
    }

    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();

        $customers = Client::setEndpoint('customer')
                ->setHeaders(['Authorization' => $data['token']])
                ->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'office_id' => $request->input('office_id')
                ])->get();

        foreach ($customers['customers']['data'] as $key => $customer) {
            $customer['fullname'] = $customer['first_name'].' '.$customer['last_name'];
            $customer['action'] = view('internals.layouts.actions', [
                'edit' => route('customers.edit', $customer['id']),
                'show' => route('customers.show', $customer['id']),
            ])->render();
            $customers['customers']['data'][$key] = $customer;
        }

        $customers['customers']['draw'] = $request->input('draw');
        $customers['customers']['recordsTotal'] = $customers['customers']['total'];
        $customers['customers']['recordsFiltered'] = $customers['customers']['per_page'];

        return response()->json($customers['customers']);
    }
}
