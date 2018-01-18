<?php

namespace App\Http\Controllers\Mitra\mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class ScoringProsesController extends Controller
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
		$view6 = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'scoringproses'
				])
				->post();
		$view6 = $view6['contents'];
		$view7 = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'scoringproses2'
				])
				->post();
		$view7 = $view7['contents'];
		return view('internals.mitra.mitra.scoringproses',  compact('data','view','view2','view3','view4','view5','view6','view7','mitra_list'));
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
		$data_form = $request->all();
		$client = Client::setEndpoint('scoring_mitra')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'scoring_mitra' => $data_form
				])
				->post();
		return response()->json(['response' => $client]); 
		}
}
