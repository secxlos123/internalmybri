<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class ListUkerController extends Controller
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
		$region = ['results'=>[['id'=>1,'text'=>'123'],['id'=>2,'text'=>'234'],['id'=>3,'text'=>'345'],['id'=>4,'text'=>'456']]];
//		}
		return $region;
	}
 public function list_uker_tester2(Request $request){
return $request->all();
	}

	
    public function list_uker_kanwil(Request $request)
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
							'keys' => 'kanwil',
							'kode'=> $getdatabranch['contents']['data']['region'],
						])
						->post();
							$region = ['results'=>[['id'=>1,'text'=>'123'],['id'=>2,'text'=>'234'],['id'=>3,'text'=>'345'],['id'=>4,'text'=>'456']]];
		
					if($listuker['code']=='200'){
						if($listuker['contents']['code']=='200'){
							for($i=0;$i<count($listuker['contents']['data']);$i++){
								$region['result'][$i]['id'] = $listuker['contents']['data'][$i]['mainbr'];
								$region['result'][$i]['text'] = $listuker['contents']['data'][$i]['mbdesc'];
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
