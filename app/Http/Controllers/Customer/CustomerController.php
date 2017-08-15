<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

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
        $newCustomer = [
              "nik" => $request->nik,
              "email" => $request->email,
              "first_name" => $first_name,
              "last_name" => $last_name,
              "birth_place" => $request->birth_place,
              "birth_date" => date('Y-m-d', strtotime($request->birth_date)),
              "address" => $request->address,
              "gender" => $request->gender,
              "city" => 'Bandung',
              "phone" => $request->phone,
              "citizenship" => $request->citizenship,
              "status" => $request->status,
              "address_status" => $request->address_status,
              "mother_name" => $request->mother_name,
              "mobile_phone" => $request->mobile_phone,
              "emergency_contact" => $request->emergency_contact,
              "emergency_relation" => $request->emergency_relation,
              "identity" =>'123456789',
              "npwp" => '1234567898',
              "work_type" => $request->work_type,
              "work" => $request->work,
              "company_name" => $request->company_name,
              "work_field" => $request->work_field,
              "position" => $request->position,
              "work_duration" => $request->work_duration,
              "office_address" => $request->office_address,
              "salary" => $request->salary,
              "other_salary" => $request->other_salary,
              "loan_installment" => $request->loan_installment,
              "dependent_amount" => $request->dependent_amount
        ];

        return $newCustomer;
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

        $newCustomer = $this->customerRequest($request);

        $client = Client::setEndpoint('customer')->setHeaders(['Authorization' => $data['token']])->setBody($newCustomer)->post();

        if($client['status']['succeded'] == true){
            dd($client);
            return redirect()->route('users.index');
        }else{
            dd($client);
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

        return view('internals.customers.detail', compact('data'));
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
        
        return view('internals.customers.edit', compact('data'));
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
