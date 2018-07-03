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
	function mitra($mitra,$users){
		$file = array();

		$data[] = [
					'lo_mitra' => 'mitra',
					'idMitrakerja' => $mitra['id_mitra'],
					'NAMA_INSTANSI' =>!( $mitra['anak_perusahaan_kabupaten_text'] ) ? '' : $mitra['anak_perusahaan_kabupaten_text'],
					'kode' => '',
					'NPL'=>'0',
					'BRANCH_CODE'=>$users['branch'],
					'Jumlah_pegawai'=>!( $mitra['jml_pegawai'] ) ? '' : $mitra['jml_pegawai'],
					'JENIS_INSTANSI'=>!( $mitra['golongan_mitra_text'] ) ? '' : $mitra['golongan_mitra_text'],
					'UNIT_KERJA'=>$users['uker'],
					'Scoring'=>'70',
					'KET_Scoring'=>'Diterima',
					'jenis_bidang_usaha'=>'',
					'alamat_instansi'=>!( $mitra['alamat_mitra'] ) ? '' : $mitra['alamat_mitra'],
					'alamat_instansi2'=>!( $mitra['alamat_mitra'] ) ? '' : $mitra['alamat_mitra'],
					'alamat_instansi3'=>!( $mitra['alamat_mitra'] ) ? '' : $mitra['alamat_mitra'],
					'telephone_instansi'=>!( $mitra['no_telp_mitra'] ) ? '' : $mitra['no_telp_mitra'],
					'rating_instansi'=>'',
					'lembaga_pemeringkat'=>'',
					'go_public'=>'',
					'no_ijin_prinsip'=>!( $mitra['alamat_mitra'] ) ? '' : $mitra['ijin_perinsip'],
					'date_updated'=>date("Y/m/d"),
					'updated_by'=>$users['pn'],
					'acc_type'=>'',
					];
		$datamitra = $this->dataRequest($data,$file);
		return $datamitra;
	}
	function mitra_detail_dasar($mitra_detail_dasar){
		$file = array();
		$data[] = [
					'lo_mitra' => 'mitra_detail_dasar',
					'status' => 'pengajuan',
					'jenis_mitra' => $mitra_detail_dasar['jenis_mitra'],
					'golongan_mitra' => $mitra_detail_dasar['golongan_mitra_text'],
					'induk_mitra' => $mitra_detail_dasar['induk_mitra_text'],
					'anak_perusahaan_wilayah' => $mitra_detail_dasar['anak_perusahaan_wilayah_text'],
					'anak_perusahaan_kabupaten' => $mitra_detail_dasar['anak_perusahaan_kabupaten_text'],
					'alamat_mitra' => $mitra_detail_dasar['alamat_mitra'],
					'no_telp_mitra' => $mitra_detail_dasar['no_telp_mitra'],
					'id_mitra' => $mitra_detail_dasar['id_mitra'],
					'id_header' => $mitra_detail_dasar['id_mitra']
				];		
		$datamitra = $this->dataRequest($data,$file);
		return $datamitra;
	}
	function mitra_detail_data($mitra_detail_data){
		$file = array();
		$data[] = [
					'lo_mitra' => 'mitra_detail_data',
					'deskripsi_mitra' => !( $mitra_detail_data['deskripsi_mitra'] ) ? '' : $mitra_detail_data['deskripsi_mitra'],
					'hp_mitra' => !( $mitra_detail_data['hp_mitra'] ) ? '' : $mitra_detail_data['alamat_mitra'],
					'bendaharawan_mitra' => !( $mitra_detail_data['bendaharawan_mitra'] ) ? '' : $mitra_detail_data['bendaharawan_mitra'],
					'telp_bendaharawan_mitra' => !( $mitra_detail_data['telp_bendaharawan_mitra'] ) ? '' : $mitra_detail_data['telp_bendaharawan_mitra'],
					'hp_bendaharawan_mitra' => !( $mitra_detail_data['hp_bendaharawan_mitra'] ) ? '' : $mitra_detail_data['hp_bendaharawan_mitra'],
					'email' => !( $mitra_detail_data['email'] ) ? '' : $mitra_detail_data['email'],
					'jml_pegawai' => !( $mitra_detail_data['jml_pegawai'] ) ? '' : $mitra_detail_data['jml_pegawai'],
					'thn_pegawai' => !( $mitra_detail_data['thn_pegawai'] ) ? '' : $mitra_detail_data['thn_pegawai'],
					'tgl_pendirian' => !( $mitra_detail_data['tgl_pendirian'] ) ? '' : $mitra_detail_data['tgl_pendirian'],
					'akta_pendirian' => !( $mitra_detail_data['akta_perubahan'] ) ? '' : $mitra_detail_data['akta_perubahan'],
					'npwp_usaha' => !( $mitra_detail_data['npwp_usaha'] ) ? '' : $mitra_detail_data['npwp_usaha'],	
					'id_header' => !( $mitra_detail_data['id_mitra'] ) ? '' : $mitra_detail_data['id_mitra']
				];		
		$file[] = [
					'laporan_keuangan' => $mitra_detail_data['laporan_keuangan'],
					'legalitas_perusahaan' => $mitra_detail_data['legalitas_perusahaan']
				];
		$datamitra = $this->dataRequest($data,$file);
		return $datamitra;		
	}
	function mitra_detail_fasilitas($mitra_detail_fasilitas){
		
		$file = array();
		$data[] = [
					'lo_mitra' => 'mitra_detail_fasilitas',
					'jenis_pengajuan' => !($mitra_detail_fasilitas['jenis_pengajuan'] ) ? '' : $mitra_detail_fasilitas['jenis_pengajuan'],
					'fasilitas_bank' => !($mitra_detail_fasilitas['fasilitas_bank'] ) ? '' : $mitra_detail_fasilitas['fasilitas_bank'],
					'ijin_perinsip' => !($mitra_detail_fasilitas['ijin_perinsip'] ) ? '' : $mitra_detail_fasilitas['ijin_perinsip'],
					'daftar_ijin' => !($mitra_detail_fasilitas['daftar_ijin'] ) ? '' : $mitra_detail_fasilitas['daftar_ijin'],
					'id_header' => !($mitra_detail_fasilitas['id_mitra'] ) ? '' : $mitra_detail_fasilitas['id_mitra']
				];		
		$file[] = [
					'upload_fasilitas_bank' => $mitra_detail_fasilitas['upload_fasilitas_bank'],
					'upload_ijin' => $mitra_detail_fasilitas['upload_ijin']
				];
		$datamitra = $this->dataRequest($data,$file);
		return $datamitra;
	}
	function mitra_detail_payroll($mitra_detail_payroll){
		$file = array();
		$data[] = [
					'lo_mitra' => 'mitra_detail_payroll',
					'payroll' => !($mitra_detail_payroll['payroll'] ) ? '' : $mitra_detail_payroll['payroll'],
					'no_rek_mitra1' => !($mitra_detail_payroll['no_rek_mitra1'] ) ? '' : $mitra_detail_payroll['no_rek_mitra1'],
					'no_cif_mitra' => !($mitra_detail_payroll['no_cif_mitra'] ) ? '' : $mitra_detail_payroll['no_cif_mitra'],
					'tipe_account1' => !($mitra_detail_payroll['tipe_account1'] ) ? '' : $mitra_detail_payroll['tipe_account1'],
					'tgl_pembayaran' => !($mitra_detail_payroll['tgl_pembayaran'] ) ? '' : $mitra_detail_payroll['tgl_pembayaran'],
					'tgl_gajian1' => !($mitra_detail_payroll['tgl_gajian1'] ) ? '' : $mitra_detail_payroll['tgl_gajian1'],
					'id_header' => !($mitra_detail_payroll['id_mitra'] ) ? '' : $mitra_detail_payroll['id_mitra']
				];		
		$datamitra = $this->dataRequest($data,$file);
		return $datamitra;
	}
	function mitra_pemutus($mitra_pemutus){
		$file = array();
		$data[] = [
					'lo_mitra' => 'mitra_pemutus',
					'pemutus_name' => !($mitra_pemutus['pemutus_name'] ) ? '' : $mitra_pemutus['pemutus_name'],
					'pemeriksa' => !($mitra_pemutus['pemeriksa'] ) ? '' : $mitra_pemutus['pemeriksa'],
					'jabatan' => !($mitra_pemutus['jabatan'] ) ? '' : $mitra_pemutus['jabatan'],
					'jabatan_pemeriksa' => !($mitra_pemutus['jabatan_pemeriksa'] ) ? '' : $mitra_pemutus['jabatan_pemeriksa'],
					'id_header' => !($mitra_pemutus['id_mitra'] ) ? '' : $mitra_pemutus['id_mitra']
				];		
		$datamitra = $this->dataRequest($data,$file);
		return $datamitra;

	}
	function mitra_las($mitra_las,$users){
			$file = array();

			$data[] = [
						'lo_mitra' => 'mitra_las',
						'id' => 0,
						'nama_instansi' =>!( $mitra_las['anak_perusahaan_kabupaten_text'] ) ? '' : $mitra_las['anak_perusahaan_kabupaten_text'],
						'branchcode'=>$users['branch'],
						//kode_instansi get digit belakang gimana
						'kode_instansi' => $users['branch'].$mitra_las['id_mitra'],
						'jenis_bidang_usaha'=>!( $mitra_las['golongan_mitra'] ) ? '' : $mitra_las['golongan_mitra'],
						'alamat_instansi'=>!( $mitra_las['alamat_mitra'] ) ? '' : $mitra_las['alamat_mitra'],
						'alamat_instansi2'=>'',
						'alamat_instansi3'=>'',
						'telepon_instansi'=>!( $mitra_las['no_telp_mitra'] ) ? '' : $mitra_las['no_telp_mitra'],
						'rating'=>'4',
						'tanggal_pemeringkat'=>'04062018',
						'lembaga_pemeringkat'=>'',
						'npl'=>'1',
						'go_public'=>'1',
						'no_ijin_prinsip'=>!( $mitra_las['alamat_mitra'] ) ? '' : $mitra_las['ijin_perinsip'],
						'updated_by'=>$users['pn'],
						'jumlah_karyawan'=>!( $mitra_las['jml_pegawai'] ) ? '' : $mitra_las['jml_pegawai'],
						'jenis_instansi'=>!( $mitra_las['golongan_mitra'] ) ? '' : $mitra_las['golongan_mitra'],
						'acc_type'=>'SA',
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

	public function ceknull($request){
		foreach ($request as $index => $req) {
			if($req==''){
				if($index!='btn-submit'){
				return 'Data '.$index.' kosong, mohon di cek Kembali';
			}
			}
		}
	}
    public function store( Request $request ){
        $id_file = date('YmdHis');
		$ceknull = $this->ceknull($request->all());
		
		if($ceknull==''){
		$users = $this->getUser();
		$baseRequest = $request->all();
		//$c = $baseRequest['legalitas_perusahaan'];
		$mitra[0]['name'] = 'mitra';
		$mitra[0]['contents'] = $this->mitra($baseRequest,$users);
		//$mitra[]['mitra'] = $this->mitra($baseRequest,$users);
		
		$mitra[1]['name'] = 'mitra_detail_dasar';
		$mitra[1]['contents'] = $this->mitra_detail_dasar($baseRequest);
		//$mitra[]['mitra_detail_dasar'] = $this->mitra_detail_dasar($baseRequest);
		
		$mitra[2]['name'] = 'mitra_detail_data';
		$mitra[2]['contents'] = $this->mitra_detail_data($baseRequest);
		//$mitra[]['mitra_detail_data'] = $this->mitra_detail_data($baseRequest);
		
		
		$mitra[3]['name'] = 'mitra_detail_fasilitas';
		$mitra[3]['contents'] = $this->mitra_detail_fasilitas($baseRequest);
		//$mitra[]['mitra_detail_fasilitas'] = $this->mitra_detail_fasilitas($baseRequest);
		
		$mitra[4]['name'] = 'mitra_detail_payroll';
		$mitra[4]['contents'] = $this->mitra_detail_payroll($baseRequest);
		//$mitra[]['mitra_detail_payroll'] = $this->mitra_detail_payroll($baseRequest);
		
		$mitra[5]['name'] = 'mitra_pemutus';
		$mitra[5]['contents'] = $this->mitra_pemutus($baseRequest);
		
		$mitra[6]['name'] = 'mitra_las';
		$mitra[6]['contents'] = $this->mitra_las($baseRequest,$users);
		//$mitra[]['mitra_pemutus'] = $this->mitra_pemutus($baseRequest);
		/* $client = Client::setEndpoint('register_mitra')
				->setHeaders([
					'Authorization' => $users['token'],
					'pn' => $users['pn']
				])
				->setBody([
					'mitra' => $mitra
				])
				->post(); */
//			print_r($mitra);die();
//			print_r($mitra[5]['contents']);die();

		foreach($mitra as $mitradata){
				$mitradata['contents'][count($mitradata['contents'])] = ['name'=>'id_file','contents'=>$id_file];
				$client = Client::setEndpoint('register_mitra')
				 ->setHeaders([
					  'Authorization' => $users['token']
					  , 'pn' =>  $users['pn']
					  , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
					  , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
				  ])->setBody($mitradata['contents'])
				 ->post('multipart');
		}
//			return response()->json(['response' => $client]); 
			header("Location: ".env('APP_URL')."/calon_mitra?i=".base64_encode($client['message'])."&k=".base64_encode($client['contents']));
			die();
		}else{
			header("Location: ".env('APP_URL')."/calon_mitra?i=".base64_encode($ceknull)."&k=".base64_encode("Gagal"));
			die();
//			return response()->json(['response' => $ceknull]); 
		}
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
