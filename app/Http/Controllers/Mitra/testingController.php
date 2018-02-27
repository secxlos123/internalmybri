<?php

namespace App\Http\Controllers\Mitra\dirrpc;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class testingController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('leads', ['except' => ['datatables']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$serverName = "10.35.65.166"; $connectionOptions = array(     "Database" => "LAS",     "Uid" => "sa",     "PWD" => "starbuck" ); 
 
		//Establishes the connection 
		$conn = sqlsrv_connect($serverName, $connectionOptions); if( $conn === false ) {     die( $this->FormatErrors( sqlsrv_errors())); } 
 
		//Select Query 
		$tsql= "SELECT @@Version as SQL_VERSION"; 
 
		//Executes the query 
		$getResults= sqlsrv_query($conn, $tsql); 
		 
		//Error handling 
		if ($getResults == FALSE)     die($this->FormatErrors(sqlsrv_errors()));
    }
	
	function FormatErrors( $errors ) {     
	/* Display errors. */     
		echo "Error information: <br/>";     
		foreach ( $errors as $error )     {         
		echo "SQLSTATE: ".$error['SQLSTATE']."<br/>";        
		echo "Code: ".$error['code']."<br/>";         
		echo "Message: ".$error['message']."<br/>"; 
		} 
	} 
	
	public function hapus(Request $request){
        $data = $this->getUser();
		$client = Client::setEndpoint('hapus_dir')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'dirrpc' => $request->all()
				])
				->post();
		return response()->json(['response' => $client]);
	}
		public function hapus_detail(Request $request){
        $data = $this->getUser();
		$client = Client::setEndpoint('hapus_detail_dir')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'dirrpc' => $request->all()
				])
				->post();
		return response()->json(['response' => $client]);
	}
    public function datatables(Request $request)
    {
		$act = $request->act;
	    $sort = $request->input('order.0');
        $data = $this->getUser();
        $dirrpc = Client::setEndpoint('dirrpc')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    //'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'      => (int) $request->input('page') + 1,
                    'nama_debt'=> $request->input('nama_debt'),
                    'payroll'  => $request->input('payroll'),
                    'debt_name'=> $request->input('gimmick_name'),
                    'act'    => $act,
                ])->get();
		$i=1;
        foreach ($dirrpc['contents']['data'] as $key => $dir) {
            $dir['debt_name'] = strtoupper($dir['debt_name']);
            $dir['nomor'] = strtoupper($i);
           // $dir['dir_persen'] = strtoupper($dir['dir_persen']);
		    if($act=='search'){
				$k = '<input type="hidden" value="'.$dir['no'].'" id="no'.$i.'" name="no'.$i.'"/>';
				$dir['maintance'] = strtoupper('<button type="button" class="btn btn-orange waves-light waves-effect w-md" id="btn-edit" name="btn-edit" data-toggle="modal">Maintance </button>');	
				$dir['action'] = strtoupper('<button type="button" class="btn btn-orange waves-light waves-effect w-md" id="btn-hapus" name="btn-hapus" data-toggle="modal">Hapus </button>'.$k);
			}elseif($act=='maintance'){
				$k = '<input type="hidden" value="'.$dir['id_detail'].'" id="no'.$i.'" name="no'.$i.'"/>';
				$dir['penghasilan_maksimal'] = strtoupper($dir['penghasilan_maksimal']);
				$dir['penghasilan_minimal'] = strtoupper($dir['penghasilan_minimal']);
				$dir['dir_persen'] = strtoupper($dir['dir_persen']);
				$dir['maintance'] = strtoupper('');	
				$dir['action'] = strtoupper('<button type="button" class="btn btn-orange waves-light waves-effect w-md" id="btn-hapus" name="btn-hapus" data-toggle="modal">Hapus </button><button type="button" class="btn btn-orange waves-light waves-effect w-md" id="btn-edit" name="btn-edit" data-toggle="modal">Ubah </button>'.$k);
			}
            $dirrpc['contents']['data'][$key] = $dir;
			$i = $i+1;
        }

        $dirrpc['contents']['draw'] = $request->input('draw');
        $dirrpc['contents']['recordsTotal'] = $dirrpc['contents']['total'];
        $dirrpc['contents']['recordsFiltered'] = $dirrpc['contents']['total'];

        return response()->json($dirrpc['contents']);
    }

    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return $data;
    }
    public function store( Request $request ){
		
		$data = $this->getUser();
		$client = Client::setEndpoint('gimmick')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'gimmick' => $request->all()
				])
				->post();
		return response()->json(['response' => $client]); 
		}
}
