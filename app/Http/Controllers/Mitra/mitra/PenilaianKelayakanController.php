<?php

namespace App\Http\Controllers\Mitra\mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class PenilaianKelayakanController extends Controller
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
		$mitra_list = Client::setEndpoint('mitraall')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'id_header' => $_GET['id_header']
				])
				->post();

		$view = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'penilaian_kelayakan'
				])
				->post();
		$view = $view['contents'];
		return view('internals.mitra.mitra.penilaian_kelayakan',  compact('data','view','mitra_list'));
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
		$client = Client::setEndpoint('penilaian_kelayakan')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'penilaian_kelayakan' => $request->all()
				])
				->post();
		return response()->json(['response' => $client]); 
		}
}
