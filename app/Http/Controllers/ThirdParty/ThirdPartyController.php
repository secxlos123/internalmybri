<?php

namespace App\Http\Controllers\ThirdParty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThirdParty\ThirdPartyRequest;
use Client;

class ThirdPartyController extends Controller
{
    protected $columns = [
        'name',
        'address',
        'city_id',
        'phone_number',
        'email',
        'is_actived',
        'action',
    ];

    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user')['contents'];
        return $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getUser();
        // dd($user);
        return view('internals.third-party.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getUser();
        return view('internals.third-party.create', compact('data'));
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function otherRequest($request, $data)
    {
        $allReq = $request->except('_token');
        foreach ($allReq as $index => $req) {
                $inputData[] = [
                  'name'     => $index,
                  'contents' => $req
                ];
            }

        $requests = $inputData;

        return $requests;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThirdPartyRequest $request)
    {
        $data = $this->getUser();
        $newOther = $this->otherRequest($request, $data);
        // dd($newOther);
        
        $client = Client::setEndpoint('thirdparty')
           ->setHeaders([
                'Authorization' => $data['token'],
                'pn' => $data['pn']
            ])
           ->setBody($newOther)
           ->post('multipart');
           // dd($client);
        
        if($client['code'] == 200){
            \Session::flash('success', $client['descriptions']);
            return redirect()->route('third-party.index');
        }elseif($client['code'] == 500){
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
        }else{
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
        }
        
        return view('internals.third-party.index', compact('data'));
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

         /* GET User Data */
        $userData = Client::setEndpoint('thirdparty/'.$id)
                    ->setHeaders(['Authorization' => $data['token'],
                                    'pn' => $data['pn']
                                ])
                    ->get();
        // dd($userData);
        
        $datas = $userData['contents'];

        return view('internals.third-party.detail', compact('data', 'datas'));
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
         /* GET User Data */
        $userData = Client::setEndpoint('thirdparty/'.$id)
                    ->setHeaders(['Authorization' => $data['token'],
                                    'pn' => $data['pn']
                                ])
                    ->get();
        
        $datas = $userData['contents'];
        return view('internals.third-party.edit', compact('data', 'datas', 'id'));
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
        $newOther = $this->otherRequest($request, $data);
        
        $client = Client::setEndpoint('thirdparty/'.$id)
           ->setHeaders([
                'Authorization' => $data['token'],
                'pn' => $data['pn']
            ])
           ->setBody($newOther)
           ->put('multipart');

        if($client['code'] == 200){
            \Session::flash('success', 'Data Pihak ke-3 sudah diubah.');
            return redirect()->route('third-party.index');
        }else{
            \Session::flash('error', 'Kesalahan input.');
            return redirect()->back();
        }
        
        return view('internals.third-party.index', compact('data'));
    }

    /**
     * Showing datatables 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $third_party = Client::setEndpoint('thirdparty')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'name'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'city_id'   => $request->input('city_id'),
                    'page'      => (int) $request->input('page') + 1
                ])->get();

        foreach ($third_party['contents']['data'] as $key => $third) {
            $third['action'] = view('internals.layouts.actions', [
                'edit' => route('third-party.edit', $third['user_id']),
                'show' => route('third-party.show', $third['user_id']),
                // 'delete' => route('third-party.delete', $third['id']),
            ])->render();
            $third_party['contents']['data'][$key] = $third;
        }

        $third_party['contents']['draw'] = $request->input('draw');
        $third_party['contents']['recordsTotal'] = $third_party['contents']['total'];
        $third_party['contents']['recordsFiltered'] = $third_party['contents']['total'];

        return response()->json($third_party['contents']);
    }
}
