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
            'premi_beban_debitur' => '',
            'premi_beban_bri' => ''
        ];

        if (!empty($detail)) {
            if (intval($detail['is_send']) == '1') {
                $status = 'Approved';
            } else if (intval($detail['is_send']) == '2') {
                $status = 'Unapproved';
            } else if (intval($detail['is_send']) == '3') {
                $status = 'Void';
            } else if (intval($detail['is_send']) == '4') {
                $status = 'Void adk';
            } else if (intval($detail['is_send']) == '5') {
                $status = 'Approved pencairan';
            } else if (intval($detail['is_send']) == '6') {
                $status = 'Disbursed';
            } else if (intval($detail['is_send']) == '7') {
                $status = 'Send to brinets';
            } else if (intval($detail['is_send']) == '8') {
                $status = 'Agree mp';
            } else if (intval($detail['is_send']) == '9') {
                $status = 'Not Agree mp';
            }
            $premi_as_jiwa   = ($detail['Premi_asuransi_jiwa'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_bri = ($detail['Premi_beban_bri'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_debitur = ($detail['Premi_beban_debitur'] * $detail['Plafond_usulan']) / 100;

            $asuransi = [
                'premi_as_jiwa'   => $premi_as_jiwa,
                'premi_beban_bri' => $premi_beban_bri,
                'premi_beban_debitur' => $premi_beban_debitur
            ];

            
            /*$update_data = [
                'eform_id'    => $response['eform_id'],
                'no_rekening' => $response['catat_adk']
            ];
            $update_briguna = Client::setEndpoint('api_las/update')
                ->setHeaders(
                    [ 'Authorization' => $data['token'],
                      'pn' => $data['pn']
                    ])
                ->setBody($update_data)
                ->post();*/
        }
        
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.view-detail-adk', compact('data','detail','id','asuransi','status'));
        } else {
            return view('internals.layouts.404');
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
                    'requestMethod' => 'eformBriguna',
                    'requestData'   => $data['branch']
                ])->post();
        // print_r($customer);exit();
        if (!empty($customer)) {
            $count = 0;
            foreach ($customer as $key => $result) {
                // print_r($result);exit();
                if (!empty($result['is_send'])) {
                    if ($result['is_send'] != '0') {
                        if ($result['is_send'] == '1') {
                            $status = 'Approved';
                        } else if ($result['is_send'] == '2') {
                            $status = 'Unapproved';
                        } else if ($result['is_send'] == '3') {
                            $status = 'Void';
                        } else if ($result['is_send'] == '4') {
                            $status = 'Void adk';
                        } else if ($result['is_send'] == '5') {
                            $status = 'Approved pencairan';
                        } else if ($result['is_send'] == '6') {
                            $status = 'Disbursed';
                        } else if ($result['is_send'] == '7') {
                            $status = 'Send to brinets';
                        } else if ($result['is_send'] == '8') {
                            $status = 'Agree mp';
                        } else if ($result['is_send'] == '9') {
                            $status = 'Not Agree mp';
                        }

                        if ($result['tp_produk'] == '1') {
                            $tp_produk = 'Briguna Karya/Umum';
                        } elseif ($result['tp_produk'] == '2') {
                            $tp_produk = 'Briguna Purna';
                        } elseif ($result['fid_tp_produk'] == '28') {
                            $tp_produk = 'Briguna Karyawan BRI';
                        } elseif ($result['tp_produk'] == '22') {
                            $tp_produk = 'Briguna Talangan';
                        } elseif ($result['tp_produk'] == '10') {
                            $tp_produk = 'Briguna Micro';
                        } else {
                            $tp_produk = 'Lainnya';
                        }

                        $history['tgl_pengajuan'] = empty($result['created_at']) ? $result['created_at'] : date('d-m-Y',strtotime($result['created_at']));
                        $history['request_amount']= 'Rp '.number_format($result['Plafond_usulan'], 0, ",", ".");
                        $history['eform_id']      = $result['eform_id'];
                        $history['id_aplikasi']   = $result['id_aplikasi'];
                        $history['ref_number']    = $result['ref_number'];
                        $history['STATUS']        = $status;
                        $history['fid_tp_produk'] = $tp_produk;
                        $history['pinca_name']    = $result['pinca_name'];
                        $history['ao_name']       = $result['ao_name'];
                        $history['namadeb']       = $result['first_name'].' '.$result['last_name'];
                        $history['action']= view('internals.layouts.actions',['detail_adk' => $result['eform_id']])->render();
                        $res_history[] = $history;
                    }
                }
            }
            // print_r($count);
            // print_r($res_history);exit();
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
                //         print_r($getBrinets);
                // print_r($getBrinets['items'][0]['NO_REKENING']);exit();
                $value['no_rekenings'] = '';
                if ($getBrinets['statusCode'] == '01') {
                    $value['no_rekenings'] = $getBrinets['items'][0]['NO_REKENING'];
                }
                $eforms['contents']['data'][] = $value;
                $count = count($value);
            }
            // print_r($eforms);
            // print_r($count);exit();
            if (intval($count) == 0) {
                $eforms['contents']['draw'] = $request->input('draw');
                $eforms['contents']['recordsTotal'] = '0';
                $eforms['contents']['recordsFiltered'] = '0';
                $eforms['contents']['data'][] = [
                    'tgl_pengajuan' => '-',
                    'id_aplikasi'   => '-',
                    'ref_number'    => '-',
                    'fid_tp_produk' => '-',
                    'pinca_name'    => '-',
                    'ao_name'       => '-',
                    'namadeb'       => '-',
                    'no_rekening'   => '-',
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
            return response()->json($eforms['contents']);   
        } else {
            $eforms['contents']['draw'] = $request->input('draw');
            $eforms['contents']['recordsTotal'] = '0';
            $eforms['contents']['recordsFiltered'] = '0';
            $eforms['contents']['data'][] = [
                'tgl_pengajuan' => '-',
                'id_aplikasi'   => '-',
                'ref_number'    => '-',
                'fid_tp_produk' => '-',
                'pinca_name'    => '-',
                'ao_name'       => '-',
                'namadeb'       => '-',
                'no_rekening'   => '-',
                'request_amount'=> '-',
                'STATUS'        => '-',
                'action'        => '-'
            ];
            return response()->json($eforms['contents']);
        }
    }
}