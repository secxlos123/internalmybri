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
    public function list_uker(Request $request)
    {
		$data = $this->getUser();
		$listuker = Client::setEndpoint('getBranch')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'kode' => '',
					'keys' => 'all',
				])
				->post();
		return $listuker;
    }
}
