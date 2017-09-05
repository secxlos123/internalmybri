<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
use App\Http\Requests\EForm\LKNRequest;
use App\Http\Controllers\Controller;
use Client;

class AOController extends Controller
{
  public function __construct()
    {
        $this->middleware('eform', ['except' => ['datatables']]);
    }

	protected $columns = [
        'ref',
        'customer_name',
        'request_amount',
        'appointment_date',
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
        // dd($data);
        
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
        
        return view('internals.eform.lkn', compact('data', 'id'));
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function lknRequest($request, $data)
    {
        // $this->validate($request, [
        //         'title'     => 'required',
        //         'content'       => 'mimes:pdf|max:50485760'
        //     ]);
        
        /* GET Role Data */
        // $customerData = Client::setEndpoint('customer/'.$request->name)->setQuery(['limit' => 100])->setHeaders(['Authorization' => $data['token']])->get();
        
        // $nik = $customerData['data']['personal']['nik'];
        // dd($request);

        $imgReq = $request->only(['income_salary_image', 'mutation_file', 'photo_with_customer']);
        foreach ($imgReq as $index => $img) {
        	$image_path = $img->getPathname();
            $image_mime = $img->getmimeType();
            $image_name = $img->getClientOriginalName();
            $image[] = [
                  'name'     => $index,
                  'filename' => $image_name,
                  'Mime-Type'=> $image_mime,
                  'contents' => fopen( $image_path, 'r' ),
                ];
        }

        $allReq = $request->except(['income_salary_image', 'mutation_file', 'photo_with_customer']);
        foreach ($allReq as $index => $req) {
	        $inputData[] = [
	                  'name'     => $index,
	                  'contents' => $req
	                ];
        }

        $newLKN = array_merge($image, $inputData);

        return $newLKN;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLKN(LKNRequest $request, $id)
    {
        $data = $this->getUser();
        $newForm = $this->lknRequest($request, $data);
    	// dd($data);

    	$client = Client::setEndpoint('eforms/'.$id.'/visit-reports')
           ->setHeaders(['Authorization' => $data['token']])
           ->setBody($newForm)
           ->post('multipart');
        
            // dd($client);
        if($client['code'] == 201){
            \Session::flash('success', 'Data LKN sudah disimpan.');
            return redirect()->route('indexAO');
        }else{
            \Session::flash('error', 'Kesalahan input.');
            return redirect()->back();
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

         /* GET Role Data */
        $customerData = Client::setEndpoint('customer/'.$id)
                      ->setQuery(['limit' => 100])
                      ->setHeaders(['Authorization' => $data['token']])
                      ->get();
        
        $dataCustomer = $customerData['contents'];
        
        return view('internals.eform.verification', compact('data', 'id', 'dataCustomer'));
    }

    //datatable
    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $eforms = Client::setEndpoint('eforms')
                ->setHeaders(['Authorization' => $data['token']])
                ->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'office_id' => $request->input('search.value'),
                    'customer_name' => $request->input('search.value'),
                    'page'      => (int) $request->input('page') + 1
                ])->get();

        foreach ($eforms['contents']['data'] as $key => $form) {
            $form['ref'] = strtoupper($form['ref_number']);
            $form['customer_name'] = strtoupper($form['customer_name']);
            $form['request_amount'] = $form['nominal'];
            $form['appointment_date'] = $form['appointment_date'];
            $form['action'] = view('internals.layouts.actions', [
                'verification' => route('getVerification', $form['User_id']),
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
