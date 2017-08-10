<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* GET UserLogin Data */
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }

        /* GET Role Data */
        $roleData = Client::setEndpoint('role')->setHeaders(['Authorization' => $data['token']])->get();
            foreach ($roleData as $role) {
                $role = $role;
            }
        $dataRole = $role['data'];

        return view('internals.roles.index', compact('data', 'dataRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return view('internals.roles.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }

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
                "manajemen-role"=> isset($request->role) ? true : false
            ]            
        ];

        $client = Client::setEndpoint('role')->setHeaders(['Authorization' => $data['token']])->setBody($newRole)->post();

        if($client['status']['succeded'] == true){
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
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
            // dd($data['token']);
        /* GET Role Data */
        $roleData = Client::setEndpoint('role/'.$id)->setHeaders(['Authorization' => $data['token']])->get();
            // foreach ($roleData as $role) {
            //     $role = $role;
            // }
        $dataRole = $roleData['data'];
        // dd($roleData);

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
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }

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
                "manajemen-role"=> isset($request->role) ? true : false
            ]            
        ];

        $client = Client::setEndpoint('role/'.$id)->setHeaders(['Authorization' => $data['token']])->setBody($newRole)->put();

        if($client['status']['succeded'] == true){
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
    public function destroy($id)
    {
        //
    }
}
