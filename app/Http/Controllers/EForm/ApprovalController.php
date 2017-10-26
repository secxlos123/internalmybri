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
        $formDetail = Client::setEndpoint('eforms/'.$id)
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->get();
        
        $detail = $formDetail['contents'];
        // dd($formDetail);

        /*GET DETAIL CUST*/
        $customerData = Client::setEndpoint('customer/'.$detail['user_id'])
                        ->setHeaders(['Authorization' => $data['token']])
                        ->get();

        $customer = $customerData['contents'];
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
          'pros' => $request->pros,
          'cons ' => $request->cons,
        ];

        $client = Client::setEndpoint('eforms/'.$id.'/approve')
                  ->setHeaders([  
                                  'Authorization' => $data['token'],
                                  'pn' => $data['pn']
                              ])
                  ->setBody($dispotition)
                  ->post();
        // dd($client);

        if($client['code'] == 201){
            \Session::flash('success', $client['descriptions']);
            return redirect()->route('eform.index');
        }else{
            \Session::flash('error', 'EForm gagal diapprove!');
            return redirect()->back();
        }

    }
}
