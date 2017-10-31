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
     * Showing image/download link of the specified resource.
     *
     * @param  String  $index
     * @return \Illuminate\Http\Response
     */
    function urlImage($index){
      $includeImage = ['npwp', 'legal_document', 'salary_slip', 'legal_bussiness_document','licence_of_practice', 'work_letter', 'family_card', 'marrital_certificate', 'divorce_certificate', 'offering_letter', 'down_payment', 'building_tax', 'photo_with_customer', 'building_permit', 'proprietary'];

      if ( in_array($index, $includeImage) ) {
        $value = pathinfo($detail['visit_report']["'".$index."'"], PATHINFO_EXTENSION);

        if(($value == 'jpg') || ($value == 'png') || ($value == 'gif')){
          return 'image';
        }else{
          return 'not image';
        } 
      }

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
        // dd($detail);
        // foreach ($request->all() as $index) {
        //     $name = $baseName . '[' . $tablesIndex . '][' . $tableKey . ']';
        //     $application[] = $this->returnContent( $name, $data, $tableKey );
        //   }
       
        /*GET DETAIL CUST*/
        $customerData = Client::setEndpoint('customer/'.$detail['user_id'])
                        ->setHeaders(['Authorization' => $data['token']])
                        ->get();

        $customer = $customerData['contents'];
        // dd($detail);

        return view('internals.eform.approval.index', compact('data', 'detail', 'product', 'customer', 'id'));
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
        // dd($request->all());
        $approve = [
          'pros' => $request->pros,
          'cons' => $request->cons,
          'recommended' => $request->recommended,
          'recommendation' => $request->recommendation,
          'is_approved' => $request->is_approved == 'true' ? true : false
        ];

        $client = Client::setEndpoint('eforms/'.$id.'/approve')
                  ->setHeaders([  
                      'Authorization' => $data['token'],
                      'pn' => $data['pn']
                  ])
                  ->setBody($approve)
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
