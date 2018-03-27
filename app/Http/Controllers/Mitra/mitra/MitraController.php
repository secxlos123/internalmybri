<?php

namespace App\Http\Controllers\Mitra\mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class MitraController extends Controller
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
		$message = '';
		$key = '';
		if(isset($_GET['i'])){
			$message = base64_decode($_GET['i']);
			$key = base64_decode($_GET['k']);
		}
		$data = $this->getUser();
		$view = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'mitra_kerjasama_internal'
				])
				->post();
		$view = $view['contents'];
		$view2 = Client::setEndpoint('GetView')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])
				->setBody([
					'form' => 'mitra_kerjasama2'
				])
				->post();
		$view2 = $view2['contents'];
		return view('internals.mitra.mitra.mitra',  compact('data','view','view2','message','key'));
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
			if($dir['status']=='pengajuan'){
				$actiontext = 'Penilaian';
				$btntext = 'btn-penilaian';
			}elseif($dir['status']=='penilaian'){
				$actiontext = 'Perjanjian';
				$btntext = 'btn-perjanjian';
			}elseif($dir['status']=='perjanjian'){
				$actiontext = 'Approval';
				$btntext = 'btn-approval';			
			}
			$actionstatus = '<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-5" data-toggle="modal" id="'.$btntext.'" name="'.$btntext.'"><i class="mdi mdi-pencil"></i>'.$actiontext.' </button>';
			$actionhapus = '<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-5" data-toggle="modal" id="btn-delete" name="btn-delete"><i class="mdi mdi-delete"></i>Hapus </button>';
			
			if($dir['status']!='approval'){
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
  }
