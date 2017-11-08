<?php

namespace App\Http\Controllers\Debitur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class DebiturController extends Controller
{
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

        return view('internals.debitur.index', compact('data', 'dataCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        return view('internals.debitur.detail', compact('data', 'dataCustomer'));
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
}
