<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GClient;

class CustomerController extends Controller
{
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
        // dd($data);
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
        $npwp_path = $request->npwp->getPathname();
        $npwp_mime = $request->npwp->getmimeType();
        $npwp_name = $request->npwp->getClientOriginalName();
        $image_path = $request->images->getPathname();
        $image_mime = $request->images->getmimeType();
        $image_name = $request->images->getClientOriginalName();
        $identity_path = $request->identity->getPathname();
        $identity_mime = $request->identity->getmimeType();
        $identity_name = $request->identity->getClientOriginalName();
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
                [
                  'name'     => 'identity',
                  'filename' => $identity_name,
                  'Mime-Type'=> $identity_mime,
                  'contents' => fopen( $identity_path, 'r' ),
                ],
                [
                  'name'     => 'npwp',
                  'filename' => $npwp_name,
                  'Mime-Type'=> $npwp_mime,
                  'contents' => fopen( $npwp_path, 'r' ),
                ],
                [
                  'name'     => 'image',
                  'filename' => $image_name,
                  'Mime-Type'=> $image_mime,
                  'contents' => fopen( $image_path, 'r' ),
                ],
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
        $first_name = $this->split_name($request)['0'];
        $last_name = $this->split_name($request)['1'];
        $npwp_path = $request->npwp->getPathname();
        $npwp_mime = $request->npwp->getmimeType();
        $npwp_name = $request->npwp->getClientOriginalName();

        $client = new GClient;
        
        try {
            $res = $client->request('POST', 'https://mybri-api.stagingapps.net/api/v1/int/customer', [
                'headers' => ['Authorization' => $data['token']],
                'multipart' => $newCustomer
              ]);
            if($res->getStatusCode() == 200) {
                $data_api = $res->getBody();
              }
            return redirect()->route('customers.index');

          } catch (GuzzleException $e) {
            dd($e->getMessage());
              return redirect()->back();
              session()->flash('danger', 'User error :'.$e->getMessage());
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
        
        return view('internals.customers.edit', compact('data', 'dataCustomer'));
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
}
