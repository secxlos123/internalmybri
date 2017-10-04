<?php

namespace App\Http\Controllers\ThirdParty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThirdPartyController extends Controller
{
    protected $columns = [
        'name',
        'address',
        'city_name',
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
        //
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

    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $third_party = Client::setEndpoint('third-party')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'city_id'   => $request->input('city_id'),
                    'project'   => $request->input('project'),
                    'page'      => (int) $request->input('page') + 1
                ])->get();

        foreach ($third_party['contents']['data'] as $key => $third) {
            $third['action'] = view('internals.layouts.actions', [
                'edit' => route('third-party.edit', $third['id']),
                'show' => route('third-party.show', $third['id']),
            ])->render();
            $third_party['contents']['data'][$key] = $third;
        }

        $third_party['contents']['draw'] = $request->input('draw');
        $third_party['contents']['recordsTotal'] = $third_party['contents']['total'];
        $third_party['contents']['recordsFiltered'] = $third_party['contents']['total'];

        return response()->json($third_party['contents']);
    }
}
