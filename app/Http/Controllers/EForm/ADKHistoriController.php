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
        // print_r($data);exit();
        // hanya adk yg bisa melakukan fungsi ini
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.his_index', compact('data'));
        } else {
            return view('internals.layouts.404');
        }
    }

    public function getApprove($id) {
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
            $premi_as_jiwa   = ($detail['Premi_asuransi_jiwa'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_bri = ($detail['Premi_beban_bri'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_debitur = ($detail['Premi_beban_debitur'] * $detail['Plafond_usulan']) / 100;

            $asuransi = [
                'premi_as_jiwa'   => $premi_as_jiwa,
                'premi_beban_bri' => $premi_beban_bri,
                'premi_beban_debitur' => $premi_beban_debitur
            ];
        }
        
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.detail-adk', compact('data','detail','id','asuransi'));
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
                    'requestMethod' => 'eformBriguna'
                ])->post();
        // print_r($customer);exit();
        if (!empty($customer)) {
            \Log::info("masuk");
            $form  = array();
            $count = 0;
            foreach ($customer as $index => $value) {
                // print_r($value);exit();
                if (intval($value['is_send']) == '1') {
                    $status = 'Approved';
                } else if (intval($value['is_send']) == '2') {
                    $status = 'Unapproved';
                } else if (intval($value['is_send']) == '3') {
                    $status = 'Void';
                } else if (intval($value['is_send']) == '4') {
                    $status = 'Void adk';
                } else if (intval($value['is_send']) == '5') {
                    $status = 'Approved pencairan';
                } else if (intval($value['is_send']) == '6') {
                    $status = 'Disbursed';
                } else if (intval($value['is_send']) == '7') {
                    $status = 'Send to brinets';
                } else if (intval($value['is_send']) == '8') {
                    $status = 'Agree mp';
                } else if (intval($value['is_send']) == '9') {
                    $status = 'Not Agree mp';
                }

                if (!empty($value['is_send'])) {
                    if (intval($value['is_send']) != '0') {
                        $value['namadeb'] = $value['first_name'].' '.$value['last_name'];
                        $value['STATUS'] = $status;
                        $value['ref_number'] = $value['ref_number'];
                        $value['tgl_pengajuan'] = empty($value['created_at']) ? $value['created_at'] : date('d-m-Y',strtotime($value['created_at']));
                        $value['eform_id'] = $value['eform_id'];
                        $value['request_amount'] = 'Rp '.number_format($value['Plafond_usulan'], 0, ",", ".");
                        if ($value['tp_produk'] == '1') {
                            $value['fid_tp_produk'] = 'Briguna Karya/Umum';
                        } elseif ($value['tp_produk'] == '2') {
                            $value['fid_tp_produk'] = 'Briguna Purna';
                        } elseif ($value['fid_tp_produk'] == '28') {
                            $value['fid_tp_produk'] = 'Briguna Karyawan BRI';
                        } elseif ($value['tp_produk'] == '22') {
                            $value['fid_tp_produk'] = 'Briguna Talangan';
                        } elseif ($value['tp_produk'] == '10') {
                            $value['fid_tp_produk'] = 'Briguna Micro';
                        } else {
                            $value['fid_tp_produk'] = 'Lainnya';
                        }
                        $value['action'] = view('internals.layouts.actions', [
                            'approve_adk' => $value
                        ])->render();
                        $eforms['contents']['data'][] = $value;
                        $count = count($value);
                    }
                }
            }

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
                    'STATUS'        => '-'
                    // 'action'        => '-'
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
                'STATUS'        => '-'
                // 'action'        => '-'
            ];
            return response()->json($eforms['contents']);
        }
    }
}