<?php

namespace App\Http\Controllers\Mitra\dirrpc;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class AddDirRpcontroller extends Controller
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
		$data = $this->getUser();
		$view = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'dir_rpc_add'
				])
				->post();
		$view = $view['contents'];
		return view('internals.mitra.dirrpc.dirrpc_add',  compact('data','view'));
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
		if($request->button=='unduh'){
		$data = $request->all();
		$pdf = PDF::loadView('gimmick',compact('data'));
        return $pdf->download('gimmick.pdf');
		}else if($request->button=='print'){
		$data = $request->all();
		$pdf = PDF::loadView('gimmick',compact('data'));
        return $pdf->stream('gimmick.pdf');;	
		
//	  die();
// 	  print_r($request->all());die();
//		 $pdf = PDF::loadView('gimmick',compact(''));
//			return $pdf->download('invoice.pdf');
//			die();
		}else if($request->button=='submit'){
			
		$data = $this->getUser();
		$client = Client::setEndpoint('dirrpc')
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
		}
  
 }
