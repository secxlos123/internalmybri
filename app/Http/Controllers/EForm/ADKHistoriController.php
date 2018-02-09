<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class ADKHistoriController extends Controller
{

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
        $data = $this->getUser();
        // hanya adk yg bisa melakukan fungsi ini
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.his_index', compact('data'));
        } else {
            return view('errors.404');
        }
    }

    public function getDetail($id) {
        $data = $this->getUser();
        // GET DETAIL CUST with Form Data and briguna
        $formDetail = Client::setEndpoint('eforms/'.$id)
            ->setHeaders(
                [ 'Authorization' => $data['token'],
                  'pn' => $data['pn']
                ])
            ->get();
        $detail = $formDetail['contents'];
        // dd($detail);

        $asuransi = [
            'premi_as_jiwa' => '',
            'premi_beban_bri' => '',
            'premi_beban_debitur' => ''
        ];

        if (!empty($detail)) {
            $status = $this->getStatusIsSend($detail['is_send']);
            $premi_as_jiwa   = ($detail['Premi_asuransi_jiwa'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_bri = ($detail['Premi_beban_bri'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_debitur = ($detail['Premi_beban_debitur'] * $detail['Plafond_usulan']) / 100;

            $asuransi = [
                'premi_as_jiwa'   => $premi_as_jiwa,
                'premi_beban_bri' => $premi_beban_bri,
                'premi_beban_debitur' => $premi_beban_debitur
            ];
            
            // update data for no_rekening briguna
            if (empty($detail['no_rekening']) || $detail['no_rekening'] == '') {
                $getBrinets = Client::setEndpoint('api_las/index')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody([
                                    'requestMethod' => 'getStatusInterface',
                                    'requestData'   => $detail['id_aplikasi']
                                ])
                                ->post('form_params');
                // print_r($getBrinets);
                if ($getBrinets['statusCode'] == '01') {
                    $update_data = [
                        'eform_id'    => $id,
                        'is_send'     => 7,
                        'no_rekening' => $getBrinets['items'][0]['NO_REKENING'],
                        'cif'         => $getBrinets['items'][0]['CIF'],
                        'cif_las'     => $getBrinets['items'][0]['CIF_LAS'],
                    ];
                    // print_r($update_data);exit();
                    $update_briguna = Client::setEndpoint('api_las/update')
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->setBody($update_data)
                    ->post();
                }
            }            
        }
        
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.view-detail-adk', compact('data','detail','id','asuransi','status'));
        } else {
            return view('internals.layouts.404');
        }
    }

    public function datatables(Request $request) {
        $eforms = ['contents' => 
            [
                'draw'            => $request->input('draw'),
                'recordsTotal'    => '0',
                'recordsFiltered' => '0',
                'data'            => []
            ]
        ];
        $data = $this->getUser();
        // print_r($data);exit();
        $customer = Client::setEndpoint('api_las/index')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn'            => $data['pn']
                ])->setBody([
                    'requestMethod' => 'eformBriguna',
                    'requestData'   => $data['branch']
                ])->post();
        // print_r($customer);exit();
        if (!empty($customer)) {
            $count = 0;
            $res_history = [];
            foreach ($customer as $key => $result) {
                if (!empty($result['is_send'])) {
                    if ($result['is_send'] != '0') {
                        $status       = $this->getStatusIsSend($result['is_send']);
                        $tp_produk    = $this->getProduk($result['tp_produk']);
                        $prescreening = $this->getStatusScreening($result['prescreening_status']);
                        $tgl_putusan  = substr($result['tgl_putusan'], 0, 2).'-'.substr($result['tgl_putusan'], 2, 2).'-'.substr($result['tgl_putusan'], -4);
                        $tgl_analisa  = substr($result['tgl_analisa'], 0, 2).'-'.substr($result['tgl_analisa'], 2, 2).'-'.substr($result['tgl_analisa'], -4);

                        $history['tgl_pengajuan'] = empty($result['created_at']) ? '' : date('d-m-Y',strtotime($result['created_at']));
                        $history['tgl_analisa'] = empty($result['tgl_analisa']) ? '' : $tgl_analisa;
                        $history['tgl_putusan'] = empty($result['tgl_putusan']) ? '' : $tgl_putusan;
                        $history['request_amount']= 'Rp '.number_format($result['Plafond_usulan'],0,",",".");
                        $history['cif']           = $result['cif'];
                        $history['eform_id']      = $result['eform_id'];
                        $history['id_aplikasi']   = $result['id_aplikasi'];
                        $history['ref_number']    = $result['ref_number'];
                        $history['STATUS']        = $status;
                        $history['fid_tp_produk'] = $tp_produk;
                        $history['status_screening'] = $prescreening;
                        $history['pinca_name']    = $result['pinca_name'];
                        $history['ao_name']       = $result['ao_name'];
                        $history['namadeb']       = $result['first_name'].' '.$result['last_name'];
                        $history['action']= view('internals.layouts.actions',[
                            'detail_adk'       => $result['eform_id'],
                            'is_screening'     => $result['is_screening'],
                            'is_verified'      => $result['is_verified'],
                            'screening_result' => 'view'
                        ])->render();
                        $res_history[] = $history;
                    }
                }
            }

            if (!empty($res_history)) {
                foreach ($res_history as $index => $value) {
                    // print_r($value);exit();
                    $getBrinets = Client::setEndpoint('api_las/index')
                            ->setHeaders(
                                [ 'Authorization' => $data['token'],
                                  'pn' => $data['pn']
                                ])
                            ->setBody([
                                'requestMethod' => 'getStatusInterface',
                                'requestData'   => $value['id_aplikasi']
                            ])
                            ->post('form_params');
                    // print_r($getBrinets);
                    $value['no_rekenings'] = '';
                    if ($getBrinets['statusCode'] == '01') {
                        $value['no_rekenings'] = $getBrinets['items'][0]['NO_REKENING'];
                        $update_data = [
                            'eform_id'    => $id,
                            'is_send'     => 7,
                            'no_rekening' => $getBrinets['items'][0]['NO_REKENING'],
                            'cif'         => $getBrinets['items'][0]['CIF'],
                            'cif_las'     => $getBrinets['items'][0]['CIF_LAS'],
                        ];
                        // print_r($update_data);exit();
                        $update_briguna = Client::setEndpoint('api_las/update')
                        ->setHeaders(
                            [ 'Authorization' => $data['token'],
                              'pn' => $data['pn']
                            ])
                        ->setBody($update_data)
                        ->post();
                    }
                    $eforms['contents']['data'][] = $value;
                    $count = count($value);
                }
            }            
            // print_r($eforms);
            // print_r($count);exit();
            if (intval($count) != 0) {
                $eforms['contents']['total']           = $count;
                $eforms['contents']['draw']            = $request->input('draw');
                $eforms['contents']['recordsTotal']    = $eforms['contents']['total'];
                $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];
            }   
        }
        return response()->json($eforms['contents']);
    }

    function getStatusScreening($value) {
        if ($value == 1) {
            return '<a class="btn btn-success form-control-static">Hijau</a>';
        } elseif ($value == 2) {
            return '<a class="btn btn-warning form-control-static">Kuning</a>';
        } elseif ($value == 3) {
            return '<a class="btn btn-danger form-control-static">Merah</a>';
        }

        return '-';
    }

    function getStatusIsSend($value) {
        if ($value == '1') {
            return 'APPROVED';
        } else if ($value == '2') {
            return 'UNAPPROVED';
        } else if ($value == '3') {
            return 'VOID';
        } else if ($value == '4') {
            return 'VOID ADK';
        } else if ($value == '5') {
            return 'APPROVED PENCAIRAN';
        } else if ($value == '6') {
            return 'DISBURSED';
        } else if ($value == '7') {
            return 'SENT TO BRINETS';
        } else if ($value == '8') {
            return 'AGREE BY MP';
        } else if ($value == '9') {
            return 'DITOLAK';
        } else if ($value == '10') {
            return 'AGREE BY AMP';
        } else if ($value == '11') {
            return 'AGREE BY PINCAPEM';
        } else if ($value == '12') {
            return 'AGREE BY PINCA';
        } else if ($value == '13') {
            return 'AGREE BY WAPINWIL';
        } else if ($value == '10') {
            return 'AGREE BY WAPINCASUS';
        } else {
            return 'APPROVAL';
        }

        return '-';
    }

    function getProduk($value) {
        if ($value == '1') {
            return 'Briguna Karya/Umum';
        } elseif ($value == '2') {
            return 'Briguna Purna';
        } elseif ($value == '28') {
            return 'Briguna Karyawan BRI';
        } elseif ($value == '22') {
            return 'Briguna Talangan';
        } elseif ($value == '10') {
            return 'Briguna Micro';
        }

        return 'Lainnya';
    }
}