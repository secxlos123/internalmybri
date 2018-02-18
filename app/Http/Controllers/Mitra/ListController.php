<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class ListController extends Controller
{
   
   
    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return $data;
    }
	
	  public function list_bank(Request $request)
    {
		$data = $this->getUser();
		
		$getdatamitra = Client::setEndpoint('getBank')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->get();
					if($getdatamitra['code']=='200'){
							for($i=0;$i<count($getdatamitra['contents']);$i++){
								$region['results'][$i]['id'] = $getdatamitra['contents'][$i]['KODE'];
								$region['results'][$i]['text'] = $getdatamitra['contents'][$i]['NAMA'];
							}
						}else{
							$region='';
						}
		return $region;
	}
	  public function list_fasilitas(Request $request)
    {
		$data = $this->getUser();
		
		$getdatamitra = Client::setEndpoint('getFasilitas')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->get();
					if($getdatamitra['code']=='200'){
							for($i=0;$i<count($getdatamitra['contents']);$i++){
								$region['results'][$i]['id'] = $getdatamitra['contents'][$i]['KODE'];
								$region['results'][$i]['text'] = $getdatamitra['contents'][$i]['NAMA'];
							}
						}else{
							$region['results'][0]['id'] = '';
								$region['results'][0]['text'] = 'Data Tidak Ditemukan! Klik Untuk Create Fasilitas Baru.';
						}
		return $region;
	}
}
