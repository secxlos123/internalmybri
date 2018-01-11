<?php

namespace App\Http\Controllers\Mitra\dirrpc;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class DirRpcController extends Controller
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
					'form' => 'dir_rpc'
				])
				->post();
		$view = $view['contents'];
		return view('internals.mitra.dirrpc.dirrpc',  compact('data','view'));
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
				->get();
		return response()->json(['response' => $client]);
	}
    public function datatables(Request $request)
    {
	    $sort = $request->input('order.0');
        $data = $this->getUser();
		\Log::info($data);
        $dirrpc = Client::setEndpoint('dirrpc')
				->setHeaders([
					'Authorization' => $data['token'],
					'pn' => $data['pn']
				])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    //'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'      => (int) $request->input('page') + 1,
                    'gimmick_name'=> $request->input('gimmick_name'),
                    'mitra_kerjasama'  => $request->input('mitra_kerjasama'),
                    'kantor_wilayah'    => $request->input('kantor_wilayah'),
                    'kantor_cabang' => $request->input('kantor_cabang'),
                ])->get();
		\Log::info($dirrpc);
            // dd($eforms);
		$i=1;
		
        foreach ($dirrpc['contents']['data'] as $key => $dir) {
		$k = '<input type="hidden" value="'.$dir['no'].'" id="no'.$i.'" name="no'.$i.'"/>';
            $dir['debt_name'] = strtoupper($dir['debt_name']);
            $dir['debt_name'] = strtoupper($dir['debt_name']);
            $dir['no'] = strtoupper($i);
           // $dir['dir_persen'] = strtoupper($dir['dir_persen']);
            $dir['maintance'] = strtoupper($dir['maintance']);
			$dir['action'] = strtoupper($dir['action'].$k);
            $dirrpc['contents']['data'][$key] = $dir;
			$i = $i+1;
        }

        $dirrpc['contents']['draw'] = $request->input('draw');
        $dirrpc['contents']['recordsTotal'] = $dirrpc['contents']['total'];
        $dirrpc['contents']['recordsFiltered'] = $dirrpc['contents']['total'];

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
