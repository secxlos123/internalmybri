<?php

namespace App\Http\Controllers\Mitra\mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class FasilitasController extends Controller
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
		   public function dataRequest($request)
    {
        $name = array(
            [
              'name'     => 'fasilitas_lainnya',
              'contents' => $request->fasilitas_lainnya,
            ],
            [
              'name'     => 'deskripsi_fasilitas_lainnya',
              'contents' => $request->deskripsi_fasilitas_lainnya,
            ],
            [
              'name'     => 'nomor_pks_notaril',
              'contents' => $request->nomor_pks_notaril,
            ],
            [
              'name'     => 'nomor_perjanjian_kerjasama_bri',
              'contents' => $request->nomor_perjanjian_kerjasama_bri,
            ],
            [
              'name'     => 'nomor_perjanjian_kerjasama_ketiga',
              'contents' => $request->nomor_perjanjian_kerjasama_ketiga,
            ],
            [
              'name'     => 'tgl_perjanjian',
              'contents' => $request->tgl_perjanjian,
            ],
            [
              'name'     => 'tgl_perjanjian_backdate',
              'contents' => $request->tgl_perjanjian_backdate,
            ],
          );
		  
        $imgReq = $request->ijin_prinsip;
        if ($imgReq) {
            $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
                  'name'     => 'ijin_prinsip',
                  'filename' => $image_name,
                  'Mime-Type'=> $image_mime,
                  'contents' => fopen( $image_path, 'r' ),
                ];
        } else {
          $image = [];
        };

			$allReq = $request->except(['_token','ijin_prinsip']);
          foreach ($allReq as $index => $req) {
						$inputData[] = [
							  'name'     => $index,
							  'contents' => $req
							];
	      }
          $newCustomer = array_merge($image, $inputData, $name);

        return $newCustomer;
	}
	public function store( Request $request ){
		$data = $this->getUser();
/* 		$form_fasilitas = json_decode($request->data);
		foreach ($form_fasilitas as $value_form) {
			if(isset($value_form->value)){
				$value = $value_form->value;
			}else{
				$value = '';
			}
			$name = $value_form->name;
			$arraydata = array_merge(array($name=>$value),$arraydata);
		}
		$data_form = array('fasilitas_data'=>$arraydata); */
		//$arraydata = $request->all();
		$arraydata = $this->dataRequest($request);
//		return response()->json(['message' => 'testing', 'code' => $newCustomer]);
		$client = Client::setEndpoint('fasilitas_mitra')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody($arraydata)
				->post('multipart');
		
        $codeResponse = $client['code'];
        $codeDescription = $client['descriptions'];

        if($codeResponse == 201){
            // session()->put('user', $client);
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }elseif($codeResponse == 422){
            return response()->json($client);
        }elseif($codeResponse == 404){
            return response()->json(['message' => $codeDescription, 'code' => $client]);
        }else{
            return response()->json(['message' => $codeDescription, 'code' => $codeResponse]);
        }

		}
		
    public function show( $id )
    {
		$data = $this->getUser();
		return array('heres'=>'heres');die();
		$getdatamitra = Client::setEndpoint('getFasilitas')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->get();
					if($getdatamitra['code']=='200'){
							for($i=0;$i<count($getdatamitra['contents']);$i++){
								$region['results'][$i]['id'] = $getdatamitra['contents'][$i]['fasilitas_lainnya'];
								$region['results'][$i]['text'] = $getdatamitra['contents'][$i]['id'];
							}
						}else{
							$region['results'][0]['id'] = '';
								$region['results'][0]['text'] = 'Data Tidak Ditemukan! Klik Untuk Create Fasilitas Baru.';
						}
		return $region;
		/* 
        $customer = Customer::findOrFail( $id );
        return response()->success( [
            'message' => 'Sukses',
            'contents' => $customer
        ], 200 ); */
	}
    
}
