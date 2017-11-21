<?php

namespace App\Http\Controllers\ApprovalData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class ApprovalDataController extends Controller
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
    public function indexApprovalDeveloper()
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        return view('internals.approval-data.developer.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewApprovalDeveloper($id)
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        return view('internals.approval-data.developer.approval-form', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApprovalThirdParty()
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        return view('internals.approval-data.third-party.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewApprovalThirdParty($id)
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        return view('internals.approval-data.third-party.approval-form', compact('data'));
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
}
