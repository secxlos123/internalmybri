<?php

namespace App\Http\Controllers\Mitra\mitra;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class CalonMitraController extends Controller
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
					'form' => 'calon_mitra'
				])
				->post();
		$view = $view['contents'];
		return view('internals.mitra.mitra.calon_mitra',  compact('data','view'));
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
            $dir['no'] = strtoupper($i);
           // $dir['dir_persen'] = strtoupper($dir['dir_persen']);
				$k = '<input type="hidden" value="'.$dir['no'].'" id="no'.$i.'" name="no'.$i.'"/>';
				$dir['jenis_mitra'] = strtoupper($dir['jenis_mitra']);
				$dir['anak_perusahaan_wilayah'] = strtoupper($dir['anak_perusahaan_wilayah']);
				$dir['anak_perusahaan_kabupaten'] = strtoupper($dir['anak_perusahaan_kabupaten']);
				$dir['golongan_mitra'] = strtoupper($dir['golongan_mitra']);
				$dir['status'] = strtoupper($dir['status']);
            $mitra['contents']['data'][$key] = $dir;
			$i = $i+1;
        }

        $mitra['contents']['draw'] = $request->input('draw');
        $mitra['contents']['recordsTotal'] = $mitra['contents']['total'];
        $mitra['contents']['recordsFiltered'] = $mitra['contents']['total'];

        return response()->json($dirrpc['contents']);
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
