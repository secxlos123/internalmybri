<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\User\RoleRequest;
use Client;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role', ['except' => ['datatables']]);
    }

    protected $columns = [
        'name',
        'slug',
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
        return view('internals.roles.index', compact('data', 'dataRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getUser();

        return view('internals.roles.create', compact('data'));
    }

    /**
     * List of request needed for input to role
     *
     * @param  \Illuminate\Http\Request  $request
     */

    public function roleRequest($request)
    {
        $newRole = [
            'slug' => $request->slug,
            'name' => $request->name,
            'permissions' => [
                "home" => isset($request->home) ? true : false,
                "nasabah" => isset($request->nasabah) ? true : false,
                "properti" => isset($request->properti) ? true : false,
                "e-form" => isset($request->eform) ? true : false,
                "developer" => isset($request->developer) ? true : false,
                "debitur" => isset($request->debitur) ? true : false,
                "penjadwalan" => isset($request->jadwal) ? true : false,
                "kalkulator" => isset($request->kalkulator) ? true : false,
                "tracking" => isset($request->tracking) ? true : false,
                "pihak-ke-3" => isset($request->pihak3) ? true : false,
                "manajemen-user" => isset($request->user) ? true : false,
                "manajemen-role"=> isset($request->roles) ? true : false
            ]
        ];

        return $newRole;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $data = $this->getUser();

        $newRole = $this->roleRequest($request);

        $client = Client::setEndpoint('role')
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])
                ->setBody($newRole)
                ->post();

        if($client['code'] == 200){
            return redirect()->route('roles.index');
        }else{
            \Session::flash('error', 'Role sudah ada!');
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
        $roleData = Client::setEndpoint('role/'.$id)
                    ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                    ])
                    ->get();

        $dataRole = $roleData['contents']['permissions'];

        return $dataRole;
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
        $roleData = Client::setEndpoint('role/'.$id)
                    ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                    ])
                    ->get();

        $dataRole = $roleData['contents'];

        return view('internals.roles.edit', compact('data', 'dataRole'));
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

        $newRole = $this->roleRequest($request);

        $client = Client::setEndpoint('role/'.$id)
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])
                ->setBody($newRole)
                ->put();

        if($client['code'] == 200){
            return redirect()->route('roles.index');
        }else{
            \Session::flash('error', 'Role sudah ada!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = $this->getUser();

        $client = Client::setEndpoint('role/'.$id)->setHeaders([
            'Authorization' => $data['token']
            , 'pn' => $data['pn']
            , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
            , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
        ])->deleted();

        return redirect()->route('roles.index');
    }

    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $user = session('user.data');
        $roles = Client::setEndpoint('role')
                ->setHeaders([
                    'Authorization' => $user['token']
                    , 'pn' => $data['pn']
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])
                ->setQuery([
                    'limit' => $request->input('length'),
                    'name'  => $request->input('search.value'),
                    'slug'  => $request->input('search.value'),
                    'sort'  => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'  => (int) $request->input('page') + 1
                ])->get();

        foreach ($roles['contents']['data'] as $key => $role) {
            $role['slug'] = strtoupper($role['slug']);
            $delete = route('roles.destroy', $role['id']);
            $role['action'] = view('internals.layouts.actions', [
                'edit' => route('roles.edit', $role['id']),
                'showModal' => $role,
                'delete' => $delete,
            ])->render();
            $roles['contents']['data'][$key] = $role;
        }

        $roles['contents']['draw'] = $request->input('draw');
        $roles['contents']['recordsTotal'] = $roles['contents']['total'];
        $roles['contents']['recordsFiltered'] = $roles['contents']['total'];

        return response()->json($roles['contents']);
    }

}
