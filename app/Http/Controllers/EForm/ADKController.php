<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
// use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use Client;
use PDF;
// use Validator;

class ADKController extends Controller
{
    protected $columns = [
        'ref_number',
        'customer_name',
        'request_amount',
        'created_at',
        // 'branch_id',
        'prescreening_status',
        'ao_name',
        'status',
        'created_at',
        'action',
    ];

    public function getUser() {
        /* GET UserLogin Data */
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data     = $this->getUser();
        // print_r($data);exit();
        // hanya adk yg bisa melakukan fungsi ini
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.index', compact('data'));
        }
    }

    public function getApprove($id) {
        $data = $this->getUser();
        // GET DETAIL CUST with Form Data briguna
        $formDetail = Client::setEndpoint('eforms/'.$id)
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->get();
                    // dd($formDetail);
        $detail = $formDetail['contents'];
        // dd($detail);
        $conten = [
            'nik'           => $detail['nik'],
            'tp_produk'     => $detail['tp_produk'],
            'uid_pemrakarsa'=> $detail['uid_pemrakarsa']
        ];

        // GET Form Data Debitur
        $data_debitur = Client::setEndpoint('api_las/index')
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->setBody([
                        'requestMethod' => 'inquiryHistoryDebiturPerorangan',
                        'requestData'   => $conten
                    ])
                    ->post();
                    // print_r($data_debitur);exit();
        if ($data_debitur['code'] == '01') {
            $debitur = $data_debitur['contents']['data'][0];
        }
        
        // dd($debitur);
        // ao harusnya ganti adk
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.detail-adk', compact('data','detail','debitur','id'));
        }
    }

    public function postApprove(Request $request) {
        $data = $this->getUser();
        // print_r($request->all());exit();
        $response = $request->all();
        $conten_putusan = [
            "id_aplikasi" => $response['id_aplikasi'],
            "uid"         => $response['uid'],
            "flag_putusan"=> '7',
            "catatan"     => $response['catatan']
        ];
        // print_r($conten_putusan);exit();
        // flag putusan kirim ke brinets
        /*$putusan = Client::setEndpoint('api_las/index')
                ->setHeaders(
                    [ 'Authorization' => $data['token'],
                      'pn' => $data['pn']
                    ])
                ->setBody([
                    'requestMethod' => 'putusSepakat',
                    'requestData'   => $conten_putusan
                ])
                ->post('form_params');*/

        $putusan['statusCode'] = '01';
        $putusan['statusDesc'] = 'berhasil';
        if ($putusan['statusCode'] == '01') {
            // get status interface yang sudah dikirim ke brinets
            // $getBrinets = Client::setEndpoint('api_las/index')
            //     ->setHeaders(
            //         [ 'Authorization' => $data['token'],
            //           'pn' => $data['pn']
            //         ])
            //     ->setBody([
            //         'requestMethod' => 'getStatusInterface',
            //         'requestData'   => '45096'//$response['id_aplikasi']
            //     ])
            //     ->post('form_params');
            // dd($getBrinets);
            $getBrinets['statusCode'] = '01';
            if ($getBrinets['statusCode'] == '01') {
                $update_data = [
                    'eform_id'    => $response['eform_id'],
                    'is_send'     => 1,
                    // 'cif'         => $getBrinets['items'][0]['CIF'],
                    // 'cif_las'     => $getBrinets['items'][0]['CIF_LAS'],
                    // 'no_rekening' => $getBrinets['items'][0]['NO_REKENING']
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->setBody(json_encode($update_data))
                    ->post();
                // dd($update_briguna);

                \Session::flash('success', 'Verifikasi '.$putusan['statusDesc'].' dikirim ke Brinets');
                return redirect()->route('adk.index');
            } else {
                \Session::flash('error', 'Brinets tidak menemukan Id Aplikasi');
                return redirect()->route('adk.index');
            }
        } else {
            \Session::flash('error', 'Verifikasi gagal dikirim ke Brinets');
            return redirect()->route('adk.index');
        }
    }

    public function datatables(Request $request) {
        $data = $this->getUser();
        // print_r($data);exit();
        $customer = Client::setEndpoint('api_las/index')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn'            => $data['pn']
                ])->setBody([
                    'requestMethod' => 'eformBriguna'
                ])->post();
        
        if (!empty($customer)) {
            $debitur = Client::setEndpoint('api_las/index')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn'            => $data['pn']
                ])->setBody([
                    'requestMethod' => 'inquiryListVerputADK',
                    'requestData'   => $data['branch']
                ])->post();

            // print_r($debitur);exit();
            if ($debitur['code'] == '01') {
                \Log::info("masuk");
                $listVerADK = $debitur['contents']['data'];
                $form  = array();
                $count = 0;
                foreach ($customer as $index => $value) {
                    // print_r($value);exit();
                    foreach ($listVerADK as $key => $form) {
                        // print_r($debitur);
                        // print_r($form);exit();
                        if (intval($value['id_aplikasi']) == intval($form['id_aplikasi'])) {
                            $form['eform_id'] = $value['eform_id'];
                            $form['request_amount'] = 'Rp '.number_format($form['plafond'], 2, ",", ".");
                            if ($form['fid_tp_produk'] == '1') {
                                $form['fid_tp_produk'] = 'Briguna Karya';
                            } else {
                                $form['fid_tp_produk'] = 'Lainnya';
                            }
                            $form['action'] = view('internals.layouts.actions', [
                                'approve_adk' => $form
                            ])->render();
                            $eforms['contents']['data'][] = $form;
                            $count = count($form);
                        }
                    }
                }

                if (intval($count) == 0) {
                    $eforms['contents']['draw'] = $request->input('draw');
                    $eforms['contents']['recordsTotal'] = '0';
                    $eforms['contents']['recordsFiltered'] = '0';
                    $eforms['contents']['data'][] = [
                        'id_aplikasi'   => '-',
                        'fid_tp_produk' => '-',
                        'nama_pegawai'  => '-',
                        'namadeb'       => '-',
                        'request_amount'=> '-',
                        'STATUS'        => '-',
                        'action'        => '-'
                    ];
                    
                    return response()->json($eforms['contents']);
                }
                $eforms['contents']['total'] = $count;
                $eforms['contents']['draw'] = $request->input('draw');
                $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
                $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];
                // print_r($eforms);exit();
                return response()->json($eforms['contents']);
            }
        } else {
            $eforms['contents']['draw'] = $request->input('draw');
            $eforms['contents']['recordsTotal'] = '0';
            $eforms['contents']['recordsFiltered'] = '0';
            $eforms['contents']['data'][] = [
                'id_aplikasi'   => '-',
                'fid_tp_produk' => '-',
                'nama_pegawai'  => '-',
                'namadeb'       => '-',
                'request_amount'=> '-',
                'STATUS'        => '-',
                'action'        => '-'
            ];
            
            return response()->json($eforms['contents']);
        }
        
        // print_r($eforms);exit();
        /*foreach ($eforms['contents']['data'] as $key => $form) {
            $form['ref'] = strtoupper($form['ref_number']);
            $form['customer_name']  = strtoupper($form['customer_name']);
            $form['request_amount'] = 'Rp '.number_format($form['nominal'], 2, ",", ".");
            $form['ao'] = $form['ao_id'];
            $verify = $form['customer']['is_verified'];
            $visit  = $form['is_visited'];

            $form['prescreening_status'] = view('internals.layouts.actions', [
              'prescreening_status' => route('getLKN', $form['id']),
              'prescreening_result' => $form['prescreening_status'],
            ])->render();

            $form['action'] = view('internals.layouts.actions', [
                'dispose' => $form['ao_id'],
                'submited' => ($form['is_approved'] && $verify),
                'dispotition' => $form,
                // 'screening' => route('eform.show', $form['id']),
                'approve' => $form,
                // 'verified' => $verify,
                'visited' => $visit,
                'status' => $form['status_eform'],
                // 'verification' => route('getVerification', $form['user_id']),
                // 'lkn' => route('getLKN', $form['id']),
            ])->render();
            $eforms['contents']['data'][$key] = $form;
        }*/
    }

    public function exportPDF(Request $request) {
        $data = $this->getUser();
        // print_r($data);exit();
        $response = $request->all();
        $formDetail = Client::setEndpoint('eforms/'.$response['eform_id'])
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->get();
        $detail = $formDetail['contents'];
        // dd($detail);
        if (!empty($detail)) {
            $detail_debitur = [
                'name_adk'     => $data['name'],
                'jabatan_adk'  => $data['position'],
                'nama_debitur' => $detail['customer']['personal']['first_name'],
                'alamat'       => $detail['customer']['personal']['address'],
                'tgl_skpp'     => '',
                'perusahaan'   => $detail['customer']['work']['company_name'],
                'no_putusan'   => '',
                'scoring'      => $detail['score'],
                'jumlah_kredit'=> $detail['request_amount'],
                'jangka_waktu' => $detail['Jangka_waktu'],
                'suku_bunga'   => ($detail['Suku_bunga'] / 12),
                'provisi'      => $detail['Provisi_kredit'],
                'biaya_adm'    => $detail['Biaya_administrasi'],
                'penalty'      => $detail['Penalty'],
                'angsuran'     => $detail['angsuran_usulan'],
                'asuransi'     => $detail['Premi_asuransi_jiwa'],
                'beban_debitur'=> $detail['Premi_beban_debitur'],
                'beban_bri'    => $detail['Premi_beban_bri']
            ];

            // lempar data ke view blade
            view()->share('data_debitur',$detail_debitur);
            $pdf = PDF::loadView('internals.eform.adk._ptk_ipk');
            return $pdf->download('ptk_ipk.pdf');
        }
        // dd($briguna);
    }

    public function exportSPH(Request $request) {
        $data = $this->getUser();
        // print_r($data);exit();
        $response = $request->all();
        $formDetail = Client::setEndpoint('eforms/'.$response['eform_id'])
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->get();
        $detail = $formDetail['contents'];
        // dd($detail);
        if (!empty($detail)) {
            $detail_debitur = [
                'name_adk'     => $data['name'],
                'jabatan_adk'  => $data['position'],
                'nama_debitur' => $detail['customer']['personal']['first_name'],
                'alamat'       => $detail['customer']['personal']['address'],
                'tgl_skpp'     => '',
                'perusahaan'   => $detail['customer']['work']['company_name'],
                'no_putusan'   => '',
                'scoring'      => $detail['score'],
                'jumlah_kredit'=> $detail['request_amount'],
                'jangka_waktu' => $detail['Jangka_waktu'],
                'suku_bunga'   => ($detail['Suku_bunga'] / 12),
                'provisi'      => $detail['Provisi_kredit'],
                'biaya_adm'    => $detail['Biaya_administrasi'],
                'penalty'      => $detail['Penalty'],
                'angsuran'     => $detail['angsuran_usulan'],
                'asuransi'     => $detail['Premi_asuransi_jiwa'],
                'beban_debitur'=> $detail['Premi_beban_debitur'],
                'beban_bri'    => $detail['Premi_beban_bri']
            ];

            // lempar data ke view blade
            view()->share('data_debitur',$detail_debitur);
            $pdf = PDF::loadView('internals.eform.adk._sph');
            return $pdf->download('sph.pdf');
        }
        // dd($briguna);
    }
}