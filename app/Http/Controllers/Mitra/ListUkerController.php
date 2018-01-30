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
    public function list_uker_all(Request $request)
    {
		$data = $this->getUser();
		$listuker = Client::setEndpoint('getBranch')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'keys' => 'kanwil',
					'kode'=> $data['branch'],
				])
				->post();
		print_r($listuker);die();
		if($listuker['code']=='200'){
			if($listuker['contents']['code']=='200'){
				for($i=0;$i<count($listuker['contents']['data']);$i++){
					$region[$i]['value'] = $listuker['contents']['data'][$i]['region'];
					$region[$i]['value'] = $listuker['contents']['data'][$i]['rgdesc'];
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
