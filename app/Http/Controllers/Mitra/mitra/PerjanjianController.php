<?php

namespace App\Http\Controllers\Mitra\mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;
use DB;

class PerjanjianController extends Controller
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
		if(isset($_GET['i'])){
		$id_header = base64_decode($_GET['i']);
		$mitra_list = Client::setEndpoint('mitraall')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'id_header' => $id_header
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
	
	function registrasi_perjanjian($registrasi_perjanjian){
		$file = array();
		if($registrasi_perjanjian['penilaian_mitra_register_radio']!=''){
			$registrasi_perjanjian['penilaian_mitra_register_radio'] = '1';
		}
		if($registrasi_perjanjian['penilaian_mitra_kelayakan_radio']){
			$registrasi_perjanjian['penilaian_mitra_kelayakan_radio']= '1';
		}
		if($registrasi_perjanjian['penilaian_mitra_rks_radio']){
			$registrasi_perjanjian['penilaian_mitra_rks_radio']='1';
		}
		$data[] = [
					'perjanjian_layanan' => $registrasi_perjanjian['perjanjian_layanan'],
					'jenis_perjanjian' => $registrasi_perjanjian['jenis_perjanjian'],
					'judul_perjanjian' => $registrasi_perjanjian['judul_perjanjian'],
					'deskripsi_perjanjian' => $registrasi_perjanjian['deskripsi_perjanjian'],
					'signer_mitra' => $registrasi_perjanjian['signer_mitra'],
					'nomor_notaril' => $registrasi_perjanjian['nomor_notaril'],
					'nomor_perjanjian_bri' => $registrasi_perjanjian['nomor_perjanjian_bri'],
					'nomor_perjanjian_ketiga' => $registrasi_perjanjian['nomor_perjanjian_ketiga'],
					'tgl_perjanjian' => $registrasi_perjanjian['tgl_perjanjian'],
					'tgl_berakhir_perjanjian' => $registrasi_perjanjian['tgl_berakhir_perjanjian'],
					'tgl_perjanjian_backdate' => $registrasi_perjanjian['tgl_perjanjian_backdate'],
					'tgl_register' => $registrasi_perjanjian['tgl_register'],
					'penilaian_mitra_register_radio' => $registrasi_perjanjian['penilaian_mitra_register_radio'],
					'penilaian_mitra_kelayakan_radio' => $registrasi_perjanjian['penilaian_mitra_kelayakan_radio'],
					'penilaian_mitra_rks_radio' => $registrasi_perjanjian['penilaian_mitra_rks_radio'],
					'pemutus_name_perjanjian' => $registrasi_perjanjian['pemutus_name_perjanjian'],
					'pemeriksa_perjanjian' => $registrasi_perjanjian['pemeriksa_perjanjian'],
					'jabatan_perjanjian' => $registrasi_perjanjian['jabatan_perjanjian'],
					'jabatan_pemeriksa_perjanjian' => $registrasi_perjanjian['jabatan_pemeriksa_perjanjian'],
					'id_header' => $registrasi_perjanjian['id_header']
				];		
		$file[] = [
					'upload_perjanjian' => $registrasi_perjanjian['upload_perjanjian']
				];
		$datamitra = $this->dataRequest($data,$file);
		return $datamitra;		
	}
	  public function dataRequest($request,$file)
    {
		$image = [];
			$allReq = $request[0];
		if(count($file)!='0'){
		foreach($file[0] as $uploadname=>$uploadfile){
        $imgReq = $file[0][$uploadname];
        if ($imgReq) {			
            $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
                  'name'     => $uploadname,
                  'filename' => $image_name,
                  'Mime-Type'=> $image_mime,
                  'contents' => fopen( $image_path, 'r' ),
                ];
        } else {
          $image = [];
        };
		}
		}
          foreach ($allReq as $index => $req) {
						$inputData[] = [
							  'name'     => $index,
							  'contents' => $req
							];
	      }
          $filedata = array_merge($image, $inputData);

        return $filedata;
    }
    public function store( Request $request ){
		$data = $this->getUser();
		$registrasi_perjanjian['name'] = 'registrasi_perjanjian';
		$registrasi_perjanjian['contents'] = $this->registrasi_perjanjian($request->all());
		$client = Client::setEndpoint('registrasi_perjanjian')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody($registrasi_perjanjian['contents'])
				->post('multipart');

		header("Location: ".env('APP_URL')."/calon_mitra_approval?i=".base64_encode($client['message'])."&k=".base64_encode($client['contents']));
			die();
		
		//return response()->json(['response' => $client]); 
		}
}
