<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class ListMitraController extends Controller
{
   
   
    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return $data;
    }

    public function list_uker_tester(Request $request){
	/* 	if($kode=='all'){
			$region = [['id'=>1,'text'=>'123'],['id'=>2,'text'=>'234'],['id'=>3,'text'=>'345']];
		}else{ */
		$region = ['results'=>[['id'=>"1",'text'=>'123'],['id'=>"2",'text'=>'234'],['id'=>"3",'text'=>'345'],['id'=>"4",'text'=>'456']]];
//		}
		return $region;
	}
 public function list_uker_tester2(Request $request){
return $request->all();
	}

	
    public function list_induk_non_usaha(Request $request)
    {
		$data = $this->getUser();
		$getdatamitra = Client::setEndpoint('getMitra')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'keys' => 'induknonusaha',
				])
				->post();
					if($getdatamitra['code']=='200'){
							for($i=0;$i<count($getdatamitra['contents']);$i++){
								$region['results'][$i]['id'] = $getdatamitra['contents'][$i]['id'];
								$region['results'][$i]['text'] = $getdatamitra['contents'][$i]['NAMA'];
							}
						}else{
							$region = '';
						}
		return $region;
	}
	  public function list_induk_badan_usaha(Request $request)
    {
		$data = $this->getUser();
		$getdatamitra = Client::setEndpoint('getMitra')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'keys' => 'indukbadanusaha',
				])
				->post();
					if($getdatamitra['code']=='200'){
							for($i=0;$i<count($getdatamitra['contents']);$i++){
								$region['results'][$i]['id'] = $getdatamitra['contents'][$i]['id'];
								$region['results'][$i]['text'] = $getdatamitra['contents'][$i]['NAMA'];
							}
						}else{
							$region = '';
						}
		return $region;
	}
	
	  public function list_kanwil_mitra(Request $request)
    {
		$data = $this->getUser();
		$getdatamitra = Client::setEndpoint('getMitra')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'keys' => 'indukbadanusaha',
				])
				->post();
					if($getdatamitra['code']=='200'){
							for($i=0;$i<count($getdatamitra['contents']);$i++){
								$region['results'][$i]['id'] = $getdatamitra['contents'][$i]['id'];
								$region['results'][$i]['text'] = $getdatamitra['contents'][$i]['NAMA'];
							}
						}else{
							$region = '';
						}
		return $region;
	}
		  public function list_mitra(Request $request)
    {
		$data = $this->getUser();
		
		$getdatamitra = Client::setEndpoint('getMitra')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'keys' => $request->keys,
					'data' => $request->data,
				])
				->post();
					if($getdatamitra['code']=='200'){
							for($i=0;$i<count($getdatamitra['contents']);$i++){
								$region['results'][$i]['id'] = $getdatamitra['contents'][$i]['KODE'];
								$region['results'][$i]['text'] = $getdatamitra['contents'][$i]['NAMA'];
							}
						}else{
							$region = '';
						}
		return $region;
	}

    public function list_uker_mbranch(Request $request)
    {
		$data = $this->getUser();
		
		$getdatabranch = Client::setEndpoint('getBranch')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'keys' => 'branch',
					'kode'=> $data['branch'],
				])
				->post();
		if($getdatabranch['code']=='200'){
			if($getdatabranch['contents']['code']=='200'){
				$listuker = Client::setEndpoint('getBranch')
						->setHeaders([
							'Authorization' => $data['token'],
							'pn' => $data['pn']
						])
						->setBody([
							'keys' => 'main',
							'kode'=> $getdatabranch['contents']['data']['mainbr'],
						])
						->post();
					if($listuker['code']=='200'){
						if($listuker['contents']['code']=='200'){
							for($i=0;$i<count($listuker['contents']['data']);$i++){
								$region[$i]['value'] = $listuker['contents']['data'][$i]['mainbr'];
								$region[$i]['desc'] = $listuker['contents']['data'][$i]['mbdesc'];
							}
						}else{
							$region = '';
						}
					}else{
						$region = '';
					}
			}else{
				$region = '';
			}
		}else{
			$region = '';
		}

		return $region;
	}

}
