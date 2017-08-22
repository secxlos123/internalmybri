<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class ApprovalController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getApproval($id)
    {
        $data = $this->getUser();

         /* GET Form Data */
        $formDetail = Client::setEndpoint('eforms/'.$id)->setHeaders(['Authorization' => $data['token']])->get();
        
        $detail = $formDetail['data'];

        /*GET DETAIL PRODUCT*/
        $product = (json_decode($detail['product']));

        /*GET DETAIL CUST*/
        $customerData = Client::setEndpoint('customer/'.$detail['user_id'])->setHeaders(['Authorization' => $data['token']])->get();

        $customer = $customerData['data'];
        // dd($detail);

        return view('internals.eform.approval', compact('data', 'detail', 'product', 'customer', 'id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postApproval(Request $request, $id)
    {
        $data = $this->getUser();

        $dispotition = [
            'id' => $id,
        ];

        $client = Client::setEndpoint('eforms/'.$id.'/approve')->setHeaders(['Authorization' => $data['token']])->setBody($dispotition)->post();

        if($client['status']['succeded'] == true){
            \Session::flash('success', 'EForm berhasil diapprove!');
            return redirect()->route('eform.index');
        }else{
        dd($client);
            \Session::flash('error', 'EForm gagal diapprove!');
            return redirect()->back();
        }

    }
}
