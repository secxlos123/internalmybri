<?php

namespace App\Http\Controllers\Mitra\mitra\eksternal;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class InputIndividuController extends Controller
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
					'form' => 'input_individu'
				])
				->post();
		$view = $view['contents'];
		$view2 = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'input_individu2'
				])
				->post();
		$view2 = $view2['contents'];
		return view('internals.mitra.mitra.eksternal.input_individu',  compact('data','view','view2'));
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
		$client = Client::setEndpoint('input_kolektif')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'input_kolektif' => $request->all()
				])
				->post();
		return response()->json(['response' => $client]); 
		}
}
