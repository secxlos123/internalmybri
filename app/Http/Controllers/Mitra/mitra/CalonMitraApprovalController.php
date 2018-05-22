<?php

namespace App\Http\Controllers\Mitra\mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class CalonMitraApprovalController extends Controller
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
		$message = '';
		$key = '';
		if(isset($_GET['i'])){
			$message = base64_decode($_GET['i']);
			$key = base64_decode($_GET['k']);
		
		$view = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'calon_mitra_approval'
				])
				->post();
		$view = $view['contents'];
		return view('internals.mitra.mitra.calon_mitra_approval',  compact('data','view','message','key'));
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
	
    public function datatables(Request $request)
    {
	    $sort = $request->input('order.0');
        $data = $this->getUser();
        $mitra = Client::setEndpoint('mitra_list')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    //'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'      => (int) $request->input('page') + 1,
                    'jenis_mitra'=> $request->input('jenis_mitra'),
                    'anak_perusahaan_wilayah'  => $request->input('anak_perusahaan_wilayah'),
                    'anak_perusahaan_kabupaten'=> $request->input('anak_perusahaan_kabupaten'),
                ])->get();
		$i=1;        
        foreach ($mitra['contents']['data'] as $key => $dir) {
			if($dir['status']=='perjanjian'){
				$actiontext = 'Approval';
				$btntext = 'btn-approval';	
				$actionstatus = '<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-5" data-toggle="modal" id="'.$btntext.'" name="'.$btntext.'"><i class="mdi mdi-pencil"></i>'.$actiontext.' </button>';
				$actionhapus = '<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-5" data-toggle="modal" id="btn-delete" name="btn-delete"><i class="mdi mdi-delete"></i>Hapus </button>';				
			}elseif($dir['status']=='approval'){
				$actiontext = 'Success';
				$btntext = 'btn-Success';			
				$actionstatus = 'Success';
				$actionhapus = '<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-5" data-toggle="modal" id="btn-delete" name="btn-delete"><i class="mdi mdi-delete"></i>Hapus </button>';
			}
			
			if($dir['status']=='perjanjian' || $dir['status']=='approval'){
            $dir['no'] = strtoupper($i);
			$dir['noid'] = strtoupper($dir['idMitrakerja']);
           // $dir['dir_persen'] = strtoupper($dir['dir_persen']);
				$k = '<input type="hidden" value="'.$dir['no'].'" id="no'.$i.'" name="no'.$i.'"/>';
				$dir['NAMA_INSTANSI'] = strtoupper($dir['NAMA_INSTANSI']);
				$dir['UNIT_KERJA'] = strtoupper($dir['UNIT_KERJA']);
				$dir['nomor_perjanjian_kerjasama_bri'] = strtoupper($dir['nomor_perjanjian_kerjasama_bri']);
				$dir['golongan_mitra'] = strtoupper($dir['golongan_mitra']);
				$dir['status'] = strtoupper($dir['status']);
				$dir['action_status'] = $actionstatus;
				$dir['perihal'] = '';
				$dir['rm'] = '';
				$dir['action_hapus'] = $actionhapus;
            $mitra['contents']['data'][$key] = $dir;
			$i = $i+1;
			}
        }

        $mitra['contents']['draw'] = $request->input('draw');
        $mitra['contents']['recordsTotal'] = $mitra['contents']['total'];
        $mitra['contents']['recordsFiltered'] = $mitra['contents']['total'];

        return response()->json($mitra['contents']);
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
		$client = Client::setEndpoint('gimmick')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'gimmick' => $request->all()
				])
				->post();
		return response()->json(['response' => $client]); 
		}
}
