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

        return view('internals.debitur.index', compact('data', 'dataDebitur'));
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
        $customerData = Client::setEndpoint('debitur-detail')
                        ->setQuery(['limit' => 100, 'user_id' => $id])
                        ->setHeaders([
                            'Authorization' => $data['token']
                            , 'pn' => $data['pn']
                        ])
                        ->get();

        $dataCustomer = $customerData['contents'][0];

        return view('internals.debitur.detail', compact('data', 'dataCustomer'));
    }

    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();

        $debiturs = Client::setEndpoint('debitur-list')
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'name'      => $request->input('name'),
                    'nik'      => $request->input('nik'),
                    'city_id'   => $request->input('city_id'),
                    'page'      => (int) $request->input('page') + 1,
                ])->get();
        foreach ($debiturs['contents']['data'] as $key => $debitur) {
            $debitur['name'] = $debitur['user']['first_name'].' '.$debitur['user']['last_name'];
            $debitur['city_id'] = $debitur['city']['name'];
            $debitur['email'] = $debitur['user']['email'];
            $debitur['phone'] = $debitur['user']['mobile_phone'];
            $debitur['gender'] = $debitur['user']['gender'];

            $debitur['action'] = view('internals.layouts.actions', [
                'show' => route('debitur.show', $debitur['user_id']),
            ])->render();
            $debiturs['contents']['data'][$key] = $debitur;
        }

        $debiturs['contents']['draw'] = $request->input('draw');
        $debiturs['contents']['recordsTotal'] = $debiturs['contents']['total'];
        $debiturs['contents']['recordsFiltered'] = $debiturs['contents']['total'];

        return response()->json($debiturs['contents']);
    }
}
