<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
use App\Http\Requests\EForm\LKNRequest;
use App\Http\Controllers\Controller;
use Client;

class AOController extends Controller
{
  // public function __construct()
  //   {
  //       $this->middleware('eform', ['except' => ['datatables']]);
  //   }

	protected $columns = [
        'ref_number',
        'customer_name',
        'request_amount',
        'created_at',
        'mobile_phone',
        'prescreening_status',
        'status',
        'created_at',
        'action',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getUser();

        return view('internals.eform.index-ao', compact('data'));
    }

    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLKN($id)
    {
        $data = $this->getUser();

        $eforms = Client::setEndpoint('eforms/'.$id)
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                ])->get();
        $eformData = $eforms['contents'];

        // $typeFinanced = Client::setEndpoint('use-reasons')
        //         ->setHeaders([
        //             'Authorization' => $data['token'],
        //             'pn' => $data['pn']
        //         ])
        //         ->get();
        // dd($eforms);

        return view('internals.eform.lkn', compact('data', 'id', 'eformData'));
    }

    public function renderMutation(Request $request)
    {

       $view = (String)view('internals.eform.lkn._render-mutation')
          ->render();
       return response()->json(['view' => $view]);
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function lknRequest($request, $data)
    {
        $application = [];

        foreach ($request->all() as $keys => $values) {
          if (is_array($values)) {
            foreach ($values as $key => $value) {
              if (is_array($value)) {
                foreach ($value as $index => $content) {
                  if (is_array($content)) {
                    foreach ($content as $id => $file) {
                      if (is_array($file)) {
                        foreach ($file as $idx => $f) {
                          if( strpos($f, ',') !== false ){
                            $fl = intval(preg_replace('(\D+)', '', $f));
                            $name = "{$keys}[{$key}][{$index}][{$id}][{$idx}]";
                            $application[] = ['name' => $name, 'contents' => $fl];
                          }else{
                            $name = "{$keys}[{$key}][{$index}][{$id}][{$idx}]";
                            $application[] = ['name' => $name, 'contents' => $f];
                          }
                        }
                      }else{
                        $name = "{$keys}[{$key}][{$index}][{$id}]";
                        $application[] = ['name' => $name, 'contents' => $file];
                      }
                    }
                  }else{
                    $name = "{$keys}[{$key}][{$index}]";
                    $application[] = ['name' => $name, 'contents' => $content];
                  }
                }
                $ctn = $index == 'file' ? fopen($content->getRealPath(), 'r')  : $content;
                $mime = $content->getmimeType();
                $name = $content->getClientOriginalName();

                $application[] = ['name' => "{$keys}[{$key}][{$index}]", 'contents' => $ctn, 'filename' => $name, 'Mime-Type'=> $mime];
              }
            }
          }else{
            if( strpos($values, ',') !== false ){
              $content = intval(preg_replace('(\D+)', '', $values));
              $application[] = ['name'     => $keys, 'contents' => $content];
            }else{
              $application[] = ['name'     => $keys, 'contents' => $values];
            }

            // $ctn = $keys == 'photo_with_customer' ? fopen($values->getRealPath(), 'r')  : $values;
                if($keys == 'photo_with_customer'){
                  $ctn = fopen($values->getRealPath(), 'r');
                  $mime = $values->getmimeType();
                  $name = $values->getClientOriginalName();

                  $application[] = ['name' => "{$keys}", 'contents' => $ctn, 'filename' => $name, 'Mime-Type'=> $mime];
                }else{
                  $ctn = $values;

                  $application[] = ['name' => "{$keys}", 'contents' => $ctn];
                }

          }
        }
        return $application;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLKN(Request $request, $id)
    {
        $data = $this->getUser();
        $newForm = $this->lknRequest($request, $data);
        // dd($newForm);
    	  $client = Client::setEndpoint('eforms/'.$id.'/visit-reports')
           ->setHeaders([
                'Authorization' => $data['token'],
                'pn' => $data['pn']
            ])
           ->setBody($newForm)
           ->post('multipart');

           // dd($client);

        if($client['code'] == 201){
            \Session::flash('success', $client['descriptions']);
            return redirect()->route('eform.index');
        }else{
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
        }

        return view('internals.eform.lkn', compact('data'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVerification($id)
    {
        $data = $this->getUser();
        // dd($id);
         /* GET Role Data */
        $customerData = Client::setEndpoint('eforms/'.$id.'/verification/show')
                      ->setQuery(['limit' => 100])
                      ->setHeaders([
                          'Authorization' => $data['token'],
                          'pn' => $data['pn']
                      ])
                      ->post();

        $dataCustomer = $customerData['contents'];
        // dd($dataCustomer);

        return view('internals.eform.verification', compact('data', 'id', 'dataCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function completeData($eform_id, $customer_id)
    {
        $data = $this->getUser();
        // dd($data);

         /* GET Role Data */
        $customerData = Client::setEndpoint('customer/'.$customer_id)
                      ->setQuery(['limit' => 100])
                      ->setHeaders([
                          'Authorization' => $data['token'],
                          'pn' => $data['pn']
                      ])
                      ->get();

        $dataCustomer = $customerData['contents'];
        // dd($customerData);

        return view('internals.eform.complete', compact('data', 'eform_id', 'dataCustomer', 'customer_id'));
    }

    // uses regex that accepts any word character or hyphen in last name
    function split_name($request) {
        $name = trim($request->full_name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
        return array($first_name, $last_name);
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function dataRequest($request)
    {
        $first_name = $this->split_name($request)['0'];
        $last_name = $this->split_name($request)['1'];
        // dd($request->gender);

        $verifyStatus[] = [
          'name'     => 'verify_status',
          'contents' => 'verify'
        ];

        $name = array(
          [
            'name'     => 'first_name',
            'contents' => $first_name,
          ],
          [
            'name'     => 'last_name',
            'contents' => $last_name,
          ],
        );

        $allReq = $request->except(['full_name', '_token']);
          foreach ($allReq as $index => $req) {
            $inputData[] = [
              'name'     => $index,
              'contents' => $req
            ];
          }

        if(($request->couple_identity) || ($request->identity)){
          if((isset($request->identity) && (isset($request->couple_identity)))){
            $imgReq = $request->identity;
            $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
              'name'     => 'identity',
              'filename' => $image_name,
              'Mime-Type'=> $image_mime,
              'contents' => fopen( $image_path, 'r' ),
            ];

            $couple_req = $request->couple_identity;
            $couple_path = $couple_req->getPathname();
            $couple_mime = $couple_req->getmimeType();
            $couple_name = $couple_req->getClientOriginalName();
            $couple[] = [
              'name'     => 'couple_identity',
              'filename' => $couple_name,
              'Mime-Type'=> $couple_mime,
              'contents' => fopen( $couple_path, 'r' ),
            ];
            $newData = array_merge($inputData, $name, $verifyStatus, $image, $couple);
          }else if(isset($request->identity)){
            $imgReq = $request->identity;
            $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
              'name'     => 'identity',
              'filename' => $image_name,
              'Mime-Type'=> $image_mime,
              'contents' => fopen( $image_path, 'r' ),
            ];
            $newData = array_merge($inputData, $name, $verifyStatus, $image);
          }else if(isset($request->couple_identity)){
            $couple_req = $request->couple_identity;
            $couple_path = $couple_req->getPathname();
            $couple_mime = $couple_req->getmimeType();
            $couple_name = $couple_req->getClientOriginalName();
            $couple[] = [
              'name'     => 'couple_identity',
              'filename' => $couple_name,
              'Mime-Type'=> $couple_mime,
              'contents' => fopen( $couple_path, 'r' ),
            ];
            $newData = array_merge($inputData, $name, $verifyStatus, $couple);
          }
        }else{
          $newData = array_merge($inputData, $name, $verifyStatus);
        }

        return $newData;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifyData(Request $request, $customer_id)
    {
        $data = $this->getUser();

        $newData = $this->dataRequest($request);
        // dd($newData);

        $client = Client::setEndpoint('customers/'.$customer_id.'/verify')
         ->setHeaders([
            'Authorization' => $data['token'],
            'pn' => $data['pn']
          ])
         ->setBody($newData)
         ->put('multipart');
         // dd($client);

        if($client['code'] == 200){
            \Session::flash('success', $client['descriptions']);
            return redirect()->route('eform.index');
        }else{
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
        }
    }

    //datatable
    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $eforms = Client::setEndpoint('eforms')
                ->setHeaders([
                  'Authorization' => $data['token'],
                  'pn' => $data['pn']
                ])
                ->setQuery([
                  'limit'     => $request->input('length'),
                  'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                  'search'    => $request->input('search.value'),
                  'page'      => (int) $request->input('page') + 1,
                  'start_date'=> $request->input('start_date'),
                  'end_date'  => $request->input('end_date'),
                  'status'    => $request->input('status')
                ])->get();
                // dd($eforms);

        foreach ($eforms['contents']['data'] as $key => $form) {
            $form['ref_number'] = strtoupper($form['ref_number']);
            $form['customer_name'] = strtoupper($form['customer_name']);
            $form['created_at'] = date_format(date_create($form['created_at']),"Y-m-d");
            // $form['product_type'] = strtoupper($form['product_type']);
            $form['request_amount'] = $form['nominal'];
            $form['created_at'] = $form['created_at'];

            $verify = $form['customer']['is_verified'];
            $visit = $form['is_visited'];

            $form['action'] = view('internals.layouts.actions', [
              'verified' => $verify,
              'visited' => $visit,

              'verification' => route('getVerification', $form['id']),
              'lkn' => route('getLKN', $form['id']),
            ])->render();
            $eforms['contents']['data'][$key] = $form;
        }

        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];

        return response()->json($eforms['contents']);
    }
}
