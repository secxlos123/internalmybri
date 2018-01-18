<?php

namespace App\Http\Controllers\Mitra\mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class RegistrasiController extends Controller
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
					'form' => 'registrasi_mitra'
				])
				->post();
		$view = $view['contents'];
		$view2 = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'registrasi_mitra2'
				])
				->post();
		$view2 = $view2['contents'];
		$view3 = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'registrasi_mitra3'
				])
				->post();
		$view3 = $view3['contents'];
		$view4 = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'registrasi_mitra4'
				])
				->post();
		$view4 = $view4['contents'];
		$view5 = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'registrasi_mitra5'
				])
				->post();
		$view5 = $view5['contents'];
		return view('internals.mitra.mitra.registrasi',  compact('data','view','view2','view3','view4','view5'));
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
		$arrayheader = [];
		$header = json_decode($request->formheader);
		foreach ($header as $valueheader) {
			if(isset($valueheader->value)){
				$value = $valueheader->value;
			}else{
				$value = '';
			}
			$arrayheader+=array($valueheader->name=>$value);
		}
		$arraydetail = [];
		$detail = json_decode($request->formdetail);
		foreach ($detail as $valuedetail) {
			if(isset($valuedetail->value)){
				$value = $valuedetail->value;
			}else{
				$value = '';
			}
			$arraydetail+=array($valuedetail->name=>$value);
		}
		$arraypemutus = [];
		$pemutus = json_decode($request->formpemutus);
		foreach ($pemutus as $valuepemutus) {
			if(isset($valuepemutus->value)){
				$value = $valuepemutus->value;
			}else{
				$value = '';
			}
			$arraypemutus+=array($valuepemutus->name=>$value);
		}
		$data_form = array('header'=>$arrayheader,'detail'=>$arraydetail,'pemutus'=>$arraypemutus);
		$client = Client::setEndpoint('register_mitra')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'mitra' => $data_form
				])
				->post();
		return response()->json(['response' => $client]); 
		}
}
