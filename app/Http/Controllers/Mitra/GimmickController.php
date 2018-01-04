<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class GimmickController extends Controller
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
	 
	    public function datatables(Request $request)
    {
	    $sort = $request->input('order.0');
        $data = $this->getUser();
		\Log::info($data);
        $gimmick = Client::setEndpoint('gimmick')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    //'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'      => (int) $request->input('page') + 1,
                    'gimmick_name'=> $request->input('gimmick_name'),
                ])->get();
		\Log::info($gimmick);
            // dd($eforms);
		$i=1;
		$action = '<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-5" data-toggle="modal" id="btn-download" name="btn-download"><i class="mdi mdi-download"></i>Unduh </button>'.
				  '<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-5" data-toggle="modal" id="btn-print" name="btn-print"><i class="mdi mdi-printer"></i>Print </button>';
        foreach ($gimmick['contents']['data'] as $key => $dir) {
            $dir['gimmick_name'] = strtoupper($dir['gimmick_name']);
            $dir['no'] = strtoupper($i);
            $dir['gimmick_level'] = strtoupper($dir['gimmick_level']);
            $dir['area_level'] = strtoupper($dir['area_level']);
			$dir['segmen_level'] = strtoupper($dir['segmen_level']);
			$dir['payroll'] = strtoupper($dir['payroll']);
			$dir['dir_rpc'] = strtoupper($dir['dir_rpc']);
			$dir['action'] = $action;
            $gimmick['contents']['data'][$key] = $dir;
			$i = $i+1;
        }

        $gimmick['contents']['draw'] = $request->input('draw');
        $gimmick['contents']['recordsTotal'] = $gimmick['contents']['total'];
        $gimmick['contents']['recordsFiltered'] = $gimmick['contents']['total'];

        return response()->json($gimmick['contents']);
    }

    public function gimmick_list(Request $request)
    {
		$data = $this->getUser();
		$view = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'gimmick_list'
				])
				->post();
		$view = $view['contents'];
		return view('internals.mitra.gimmick.gimmick_list',  compact('data','view'));
    }
    public function index()
    {
		$data = $this->getUser();
		 $dir_rpc = Client::setEndpoint('dir_rpc_list')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])->setQuery([
                ])->get();
				$i=0;
        foreach ($dir_rpc['contents']['data'] as $key => $dir) {
           $dirm[$i]['debt_name'] = strtoupper($dir['debt_name']);
           $dirm[$i]['no'] = $dir['no'];
			$i = $i+1;
			$dir_rpc = $dirm;
        }
		return view('internals.mitra.gimmick.gimmick',  compact('data','dir_rpc'));
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
		if($request->action=='unduh'){
		$data = $request->all();
		$pdf = PDF::loadView('gimmick',compact('data'));
        return $pdf->download('gimmick.pdf');
		}else if($request->action=='print'){
		$data = $request->all();
		$pdf = PDF::loadView('gimmick',compact('data'));
        return $pdf->stream('gimmick.pdf');;	
		
//	  die();
// 	  print_r($request->all());die();
//		 $pdf = PDF::loadView('gimmick',compact(''));
//			return $pdf->download('invoice.pdf');
//			die();
		}else if($request->action=='submit'){
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
}
