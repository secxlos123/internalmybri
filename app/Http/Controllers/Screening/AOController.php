<?php

namespace App\Http\Controllers\Screening;

use Illuminate\Http\Request;
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
     * Reformat image request
     *
     * @param  \Illuminate\Http\Request  $image
     * @param  String  $name
     */
    public function reformatImage( $name, $image )
    {
      return [
        'name' => $name
        , 'contents' => fopen($image->getRealPath(), 'r')
        , 'filename' => $image->getClientOriginalName()
        , 'Mime-Type'=> $image->getmimeType()
      ];
    }

    /**
     * Reformat content request
     *
     * @param  \Illuminate\Http\Request  $value
     * @param  String  $name
     */
    public function reformatContent( $name, $value )
    {
      return [
        'name' => $name
        , 'contents' => $value
      ];
    }

    /**
     * Get return content
     *
     * @param  \Illuminate\Http\Request  $value
     * @param  String  $name
     */
    public function returnContent( $field, $values, $baseName )
    {
      $excludeNumber = ['amount', 'npwp_number', 'income', 'income_salary', 'income_allowance', 'number', 'couple_salary', 'couple_other_salary', 'salary', 'other_salary'];
      $excludeImage = ['file', 'npwp', 'legal_document', 'salary_slip', 'family_card', 'marrital_certificate', 'divorce_certificate', 'photo_with_customer', 'offering_letter', 'proprietary', 'building_permit', 'down_payment', 'building_tax', 'legal_bussiness_document', 'work_letter', 'license_of_practice'];

      if ( in_array($baseName, $excludeNumber) ) {
        $values = str_replace(',', '.', str_replace('.', '', $values));
      }

      if ( in_array($baseName, $excludeImage) ) {
        $return = $this->reformatImage( $field, $values );
      } else {
        $return = $this->reformatContent( $field, $values );
      }

      return $return;
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getScore($id)
    {
        $data = $this->getUser();
        return view('internals.screening.getscore', compact('data','id'));
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
     * @param  \Illuminate\Http\Request  $requestImage
     * @param  String $attribute
     */
    function parseImage( $requestImage, $attribute )
    {
      if ( isset($requestImage) ) {
        $image[] = [
          'name'     => $attribute,
          'filename' => $requestImage->getClientOriginalName(),
          'Mime-Type'=> $requestImage->getmimeType(),
          'contents' => fopen( $requestImage->getPathname(), 'r' ),
        ];
        return $image;
      };

      return [];
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $requestNumber
     * @param  String $attribute
     */
    function parseNumber( $requestNumber, $attribute )
    {
      if ( isset($requestNumber) ) {
        $number[] = [
          'name'     => $attribute,
          'contents' => str_replace(',', '.', str_replace('.', '', $requestNumber))
        ];
        return $number;
      };

      return [];
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
                  'is_screening' => $request->input('is_screening'),
                ])->get();

        foreach ($eforms['contents']['data'] as $key => $form) {
    if($form['ref_number']!=null || $form['ref_number']!=''){
			$form['product_type'] = strtoupper($form['product_type']);
            $form['ref_number'] = strtoupper($form['ref_number']);
            $form['nik'] = strtoupper($form['nik']);
            $form['customer_name'] = strtoupper($form['customer']['personal']['first_name']).strtoupper($form['customer']['personal']['last_name']);
              $form['birth_date'] = $form['customer']['personal']['birth_date'];
            $form['created_at'] = date_format(date_create($form['created_at']),"Y-m-d");
            $form['request_amount'] = $form['nominal'];
            $form['created_at'] = $form['created_at'];
			$form['branch_id'] = $form['branch_id'];
		if($form['is_screening']=='0' || $form['is_screening']==''){
			$form['is_screening']='Belum';
		}elseif($form['is_screening']=='1'){
			$form['is_screening']='Sudah';
		}

					// 	$offices = Client::setEndpoint('offices')
					// 	->setHeaders([
					// 		'Authorization' => $data['token'],
					// 		'pn' => $data['pn']
					// 	])->setQuery([
					// 		'branch' => $form['branch_id'],
					// 		'distance' => 1,
					// 		'long' => 106.820788,
					// 		'lat' => -6.301752
					// 	])
					// 	->get();
					// $office = [];

				 //   if(!empty($offices['contents']['data'])){
					//   $office = $offices['contents']['data'][0];
					// }
      // $form['branchs'] = $office['unit'];

			$form['branchs'] = '';

            $verify = $form['customer']['is_verified'];
            $visit = $form['is_visited'];
        //before $status = $form['response_status'];
			$status = $form['status'];
            $form['action'] = view('internals.layouts.actions', [

              'prescreening' => route('getscore', $form['id']),
            ])->render();
		}else{
			$form['branchs'] = '';
			 $form['ref_number'] = '';
			 $form['product_type'] = '';

            $form['nik'] = '';
            $form['customer_name'] = '';
            $form['birth_date'] = '';
            $form['created_at'] = '';
            // $form['product_type'] = strtoupper($form['product_type']);
            $form['request_amount'] = '';
            $form['created_at'] = '';
			$form['branch_id'] = '';
			$form['is_screning']='';
            $verify = '';
            $visit = '';
        //before $status = $form['response_status'];
		$status = $form['status'];

            $form['action'] = view('internals.layouts.actions', [

            ])->render();
		}
            $eforms['contents']['data'][$key] = $form;
        }

        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];

        return response()->json($eforms['contents']);
    }
}
