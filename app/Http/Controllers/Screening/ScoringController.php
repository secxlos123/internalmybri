<?php

namespace App\Http\Controllers\Screening;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScoringRequest;
use App\Http\Requests\UpdateScoringRequest;
use Client;

class ScoringController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('leads', ['except' => ['datatables']]);
    // }

    protected $columns = [
        'id',
        'score',
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
        /* GET UserLogin Data */
        $data = $this->getUser();
        // dd(session()->get('user.contents'));

        /* GET Role Data */
        $customerData = Client::setEndpoint('customer')
                      ->setQuery(['limit' => 100])
                      ->setHeaders([
                          'Authorization' => $data['token']
                          , 'pn' => $data['pn']
                          // , 'auditaction' => 'action name'
                          // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                          // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                      ])->get();
        $dataCustomer = $customerData['contents']['data'];
        // dd($dataCustomer);

        return view('internals.customers.index', compact('data', 'dataCustomer'));
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
    public function dataRequestmulti($request)
    {
        $id = $request->id;
        $pefindo_score = $request->pefindo_score;
        $ket_risk = $request->ket_risk;
		$countupload = $request->countupload;
        $name = array(
            [
              'name'     => 'id',
              'contents' => $id,
            ],
            [
              'name'     => 'is_screening',
              'contents' => '1',
            ],
            [
              'name'     => 'pefindo_score',
              'contents' => $pefindo_score,
            ],
            [
              'name'     => 'ket_risk',
              'contents' => $ket_risk,
            ],
          );
        $imgReq = $request->uploadscore;
          $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
                  'name'     => 'uploadscore',
                  'filename' => $image_name,
                  'Mime-Type'=> $image_mime,
                  'contents' => fopen( $image_path, 'r' ),
                ];
		$nameuploads = '';
		for($i=2;$i<$countupload;$i++){

        $imgReq = $request['uploadscore'.$i];
          $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
                  'name'     => 'uploadscore'.$i,
                  'filename' => $image_name,
                  'Mime-Type'=> $image_mime,
                  'contents' => fopen( $image_path, 'r' ),
                ];
			$nameuploads = 'uploadscore'.$i.'-,-';
		}
			$nameuploads = explode('-,-',$nameuploads);
			$countnameu = count($nameuploads);
			$allReq = $request->except(['_token','uploadscore']);
          foreach ($allReq as $index => $req) {
			  for($i=0;$i<$countnameu;$i++){
				  if($nameuploads[$i]!=$index&&$i==0){
						$inputData[] = [
							  'name'     => $index,
							  'contents' => $req
							];
				  }
			  }
          }
          $newCustomer = array_merge($image, $inputData, $name);

        return $newCustomer;
    }

	   public function dataRequest($request)
    {
        $id = $request->id;
        $pefindo_score = $request->pefindo_score;
        $ket_risk = $request->ket_risk;
		$countupload = $request->countupload;
        $name = array(
            [
              'name'     => 'id',
              'contents' => $id,
            ],
            [
              'name'     => 'is_screening',
              'contents' => '1',
            ],
            [
              'name'     => 'pefindo_score',
              'contents' => $pefindo_score,
            ],
            [
              'name'     => 'ket_risk',
              'contents' => $ket_risk,
            ],
          );

        $imgReq = $request->uploadscore;
        if ($imgReq) {
            $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
                  'name'     => 'uploadscore',
                  'filename' => $image_name,
                  'Mime-Type'=> $image_mime,
                  'contents' => fopen( $image_path, 'r' ),
                ];
        } else {
          $image = [];
        };

			$allReq = $request->except(['_token','uploadscore']);
          foreach ($allReq as $index => $req) {
						$inputData[] = [
							  'name'     => $index,
							  'contents' => $req
							];
	      }
          $newCustomer = array_merge($image, $inputData, $name);

        return $newCustomer;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScoringRequest $request)
    {
        // return response()->json(['message' => "salah", 'code' => 500]);
        $data = $this->getUser();

    $countu = $request->countupload;
    if($countu>2){
        $newCustomer = $this->dataRequestmulti($request);
    }else{
    $newCustomer = $this->dataRequest($request);

    }
    // dd($newCustomer);
        $client = Client::setEndpoint('scorings')
         ->setHeaders([
              'Authorization' => $data['token']
              , 'pn' => $data['pn']
              , 'auditaction' => 'form score pefindo'
              , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
              , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
          ])->setBody($newCustomer)
         ->post('multipart');

        $codeResponse = $client['code'];
        $codeDescription = $client['descriptions'];

        if($codeResponse == 201){
            // session()->put('user', $client);
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }elseif($codeResponse == 422){
            return response()->json($client);
        }elseif($codeResponse == 404){
            return response()->json(['message' => $codeDescription, 'code' => $client]);
        }else{
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }


    }

    public function datatables(Request $request)
    {
      // dd($request->input('city_id'));
        $sort = $request->input('order.0');
        $data = $this->getUser();

        $customers = Client::setEndpoint('customer')
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    // , 'auditaction' => 'action name'
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'name'      => $request->input('name'),
                    'nik'      => $request->input('nik'),
                    'city_id'   => $request->input('city_id'),
                    'page'      => (int) $request->input('page') + 1,
                ])->get();

        foreach ($customers['contents']['data'] as $key => $customer) {
            $customer['name'] = $customer['first_name'].' '.$customer['last_name'];
            $customer['city_id'] = $customer['city'];
            $customer['action'] = view('internals.layouts.actions', [
                'show' => route('customers.show', $customer['id']),
            ])->render();
            $customers['contents']['data'][$key] = $customer;
        }

        $customers['contents']['draw'] = $request->input('draw');
        $customers['contents']['recordsTotal'] = $customers['contents']['total'];
        $customers['contents']['recordsFiltered'] = $customers['contents']['total'];

        return response()->json($customers['contents']);
    }
}
