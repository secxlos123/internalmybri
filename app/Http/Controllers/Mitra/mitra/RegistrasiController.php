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
	function mitra($mitra){
		$file = array();
		$datamitra = $this->dataRequest($mitra,$file);
	}
	
	function mitra_detail_dasar($mitra_detail_dasar){
		$data = array();
		$data['jenis_mitra '] = $mitra_detail_dasar['jenis_mitra '];
		$data['golongan_mitra '] = $mitra_detail_dasar['golongan_mitra '];
		$data['induk_mitra'] = $mitra_detail_dasar['induk_mitra'];
		$data['anak_perusahaan_wilayah'] = $mitra_detail_dasar['anak_perusahaan_wilayah'];
		$data['anak_perusahaan_kabupaten'] = $mitra_detail_dasar['anak_perusahaan_kabupaten'];
		$data['alamat_mitra'] = $mitra_detail_dasar['alamat_mitra'];
		$data['no_telp_mitra'] = $mitra_detail_dasar['no_telp_mitra'];
		$data['id_mitra'] = $mitra_detail_dasar['id_mitra'];
	}
	function mitra_detail_data($mitra_detail_data){
		$data = array();
		$data['deskripsi_mitra'] = $mitra_detail_data['deskripsi_mitra'];
		$data['hp_mitra'] = $mitra_detail_data['hp_mitra'];
		$data['bendaharawan_mitra'] = $mitra_detail_data['bendaharawan_mitra'];
		$data['telp_bendaharawan_mitra'] = $mitra_detail_data['telp_bendaharawan_mitra'];
		$data['hp_bendaharawan_mitra'] = $mitra_detail_data['hp_bendaharawan_mitra'];
		$data['email'] = $mitra_detail_data['email'];
		$data['jml_pegawai'] = $mitra_detail_data['jml_pegawai'];
		$data['thn_pegawai'] = $mitra_detail_data['thn_pegawai'];
		$data['tgl_pendirian'] = $mitra_detail_data['tgl_pendirian'];
		$data['akta_pendirian'] = $mitra_detail_data['akta_perubahan'];
		$data['npwp_usaha'] = $mitra_detail_data['npwp_usaha'];
		$data['laporan_keuangan'] = $mitra_detail_data['laporan_keuangan'];
		$data['legalitas_perusahaan'] = $mitra_detail_data['legalitas_perusahaan'];
	}
	function mitra_detail_fasilitas($mitra_detail_fasilitas){
		$data['jenis_pengajuan'] = $mitra_detail_fasilitas['jenis_pengajuan'];
		$data['fasilitas_bank'] = $mitra_detail_fasilitas['fasilitas_bank'];
		$data['upload_fasilitas_bank'] = $mitra_detail_fasilitas['upload_fasilitas_bank'];
		$data['ijin_perinsip'] = $mitra_detail_fasilitas['ijin_perinsip'];
		$data['upload_ijin'] = $mitra_detail_fasilitas['upload_ijin'];
		$data['daftar_ijin'] = $mitra_detail_fasilitas['daftar_ijin'];
	}
	function mitra_detail_payroll($mitra_detail_payroll){
		$data['payroll'] = $mitra_detail_payroll['payroll'];
		$data['no_rek_mitra1'] = $mitra_detail_payroll['no_rek_mitra1'];
		$data['no_cif_mitra'] = $mitra_detail_payroll['no_cif_mitra'];
		$data['tipe_account1'] = $mitra_detail_payroll['tipe_account1'];
		$data['tgl_pembayaran'] = $mitra_detail_payroll['tgl_pembayaran'];
		$data['tgl_gajian1'] = $mitra_detail_payroll['tgl_gajian1'];
	}
	function mitra_pemutus($mitra_pemutus){
		$data['pemutus_name'] = $mitra_pemutus['pemutus_name'];
		$data['pemeriksa'] = $mitra_pemutus['pemeriksa'];
		$data['jabatan'] = $mitra_pemutus['jabatan'];
		$data['jabatan_pemeriksa'] = $mitra_pemutus['jabatan_pemeriksa'];
	}
	
	  public function dataRequest($request,$file)
    {
		$excepted = array('_token');
		if($file->count()!='0'){
		foreach($file as $uploadname=>$uploadfile){
        $imgReq = $request[$uploadname];
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
			$excepted[] = $uploadname;
        } else {
          $image = [];
        };
		}}
			$allReq = $request->except($excepted);
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
		$baseRequest = $request->all();
		print_r($baseRequest);die();
		//$mitra = ['mitra'=>$this->mitra($baseRequest)];
		$mitra = ['mitra_detail_dasar'=>$this->mitra_detail_dasar($baseRequest)];
		$mitra = ['mitra_detail_data'=>$this->mitra_detail_data($baseRequest)];
		$mitra = ['mitra_detail_fasilitas'=>$this->mitra_detail_fasilitas($baseRequest)];
		$mitra = ['mitra_detail_payroll'=>$this->mitra_detail_payroll($baseRequest)];
		$mitra = ['mitra_pemutus'=>$this->mitra_pemutus($baseRequest)];
		
		$data = $this->getUser();
	
		$client = Client::setEndpoint('register_mitra')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'mitra' => $mitra
				])
				->post();
		return response()->json(['response' => $client]); 
		}
    public function fasilitas_store( Request $request ){
		
		$data = $this->getUser();
		$arraydata = [];
		$form_fasilitas = json_decode($request->data);
		foreach ($form_fasilitas as $value_form) {
			if(isset($value_form->value)){
				$value = $value_form->value;
			}else{
				$value = '';
			}
			$name = $value_form->name;
			$arraydata = array_merge(array($name=>$value),$arraydata);
		}
		$data_form = array('fasilitas_data'=>$arraydata);
		$client = Client::setEndpoint('fasilitas_mitra')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'mitra' => $data_form
				])
				->post('multipart');
		return response()->json(['response' => $client]); 
		}
}
