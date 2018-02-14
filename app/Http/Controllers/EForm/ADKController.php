<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;
use PDF;

class ADKController extends Controller
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
            return view('internals.eform.adk.index', compact('data'));
        } else {
            return view('errors.404');
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

        /*$conten = [
            'nik' => '',
            'tp_produk' => '',
            'uid_pemrakarsa' => ''
        ];*/
        $asuransi = [
            'premi_as_jiwa' => '',
            'premi_beban_debitur' => '',
            'premi_beban_bri' => ''
        ];

        if (!empty($detail)) {
            $status = $this->getStatusIsSend($detail['is_send']);
            $premi_as_jiwa = ($detail['Premi_asuransi_jiwa'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_bri = ($detail['Premi_beban_bri'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_debitur = ($detail['Premi_beban_debitur'] * $detail['Plafond_usulan']) / 100;

            $asuransi = [
                'premi_as_jiwa' => $premi_as_jiwa,
                'premi_beban_debitur' => $premi_beban_debitur,
                'premi_beban_bri' => $premi_beban_bri
            ];

            /*$conten = [
                'nik'           => $detail['nik'],
                'tp_produk'     => $detail['tp_produk'],
                'uid_pemrakarsa'=> $detail['uid_pemrakarsa']
            ];*/
        }

        // GET Form Data Debitur LAS
        /*$data_debitur = Client::setEndpoint('api_las/index')
            ->setHeaders(['Authorization' => $data['token'],
                  'pn' => $data['pn']])
            ->setBody([
                'requestMethod' => 'inquiryHistoryDebiturPerorangan',
                'requestData'   => $conten
            ])
            ->post();
        $debitur = [];
        if ($data_debitur['code'] == '01') {
            $debitur = $data_debitur['contents']['data'][0];
        }*/
        
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.detail-adk', compact('data','detail','id','asuransi','status'));
        } else {
            return view('internals.layouts.404');
        }
    }

    public function postKeterangan(Request $request) {
        $data = $this->getUser();
        $response = $request->all();
        // print_r($response);exit();

        switch ($response['type']) {
            case 'ktp':
                if (isset($response['uploadfoto'])) {
                    $update_data = [
                        '_token'      => $response['_token'],
                        'type'        => 'catatan_ktp',
                        'field'       => 'identity',
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        'catatan_ktp' => empty($response['catatan_ktp'])? '' : $response['catatan_ktp'],
                        'uploadfoto'  => $response['uploadfoto']
                    ];

                    $newData = $this->dataRequest($update_data);
                    // print_r($newData);exit();
                    $update_briguna = Client::setEndpoint('api_las/update_foto')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($newData)
                                    ->post('multipart');
                } else {
                    $update_data = [
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        // 'eform_id'    => $response['eform'],
                        'catatan_ktp' => empty($response['catatan_ktp'])? '' : $response['catatan_ktp'],
                    ];

                    $update_briguna = Client::setEndpoint('api_las/update')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($update_data)
                                    ->post();
                }
                
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan KTP berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan KTP gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'npwp':
                if (isset($response['uploadfoto'])) {
                    $update_data = [
                        'type'        => 'catatan_npwp',
                        'field'       => 'NPWP_nasabah',
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        'catatan_npwp' => empty($response['catatan_npwp'])? '' : $response['catatan_npwp'],
                        'uploadfoto'  => $response['uploadfoto']
                    ];

                    $newData = $this->dataRequest($update_data);
                    // print_r($newData);exit();
                    $update_briguna = Client::setEndpoint('api_las/update_foto')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($newData)
                                    ->post('multipart');
                } else {
                    $update_data = [
                        'is_verified'  => 0,
                        'eform_id'     => $response['eform_id'],
                        // 'eform_id'     => $response['eform'],
                        'catatan_npwp' => empty($response['catatan_npwp'])? '' : $response['catatan_npwp']
                    ];

                    $update_briguna = Client::setEndpoint('api_las/update')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($update_data)
                                    ->post();
                }

                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan NPWP berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan NPWP gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'gaji':
                if (isset($response['uploadfoto'])) {
                    $update_data = [
                        'type'        => 'catatan_gaji',
                        'field'       => 'SLIP_GAJI',
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        'catatan_gaji' => empty($response['catatan_gaji'])? '' : $response['catatan_gaji'],
                        'uploadfoto'  => $response['uploadfoto']
                    ];

                    $newData = $this->dataRequest($update_data);
                    // print_r($newData);exit();
                    $update_briguna = Client::setEndpoint('api_las/update_foto')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($newData)
                                    ->post('multipart');
                } else {
                    $update_data = [
                        'is_verified'  => 0,
                        'eform_id'     => $response['eform_id'],
                        // 'eform_id'     => $response['eform'],
                        'catatan_gaji' => empty($response['catatan_gaji'])? '' : $response['catatan_gaji']
                    ];

                    $update_briguna = Client::setEndpoint('api_las/update')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($update_data)
                                    ->post();
                }

                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan GAJI berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan GAJI gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'kk':
                if (isset($response['uploadfoto'])) {
                    $update_data = [
                        'type'        => 'catatan_kk',
                        'field'       => 'KK',
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        'catatan_kk' => empty($response['catatan_kk'])? '' : $response['catatan_kk'],
                        'uploadfoto'  => $response['uploadfoto']
                    ];

                    $newData = $this->dataRequest($update_data);
                    // print_r($newData);exit();
                    $update_briguna = Client::setEndpoint('api_las/update_foto')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($newData)
                                    ->post('multipart');
                } else {
                    $update_data = [
                        'is_verified'  => 0,
                        'eform_id'     => $response['eform_id'],
                        // 'eform_id'     => $response['eform'],
                        'catatan_kk' => empty($response['catatan_kk'])? '' : $response['catatan_kk']
                    ];

                    $update_briguna = Client::setEndpoint('api_las/update')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($update_data)
                                    ->post();
                }

                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan KK berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan KK gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'sk_awal':
                if (isset($response['uploadfoto'])) {
                    $update_data = [
                        'type'        => 'catatan_sk_awal',
                        'field'       => 'SK_AWAL',
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        'catatan_sk_awal' => empty($response['catatan_sk_awal'])? '' : $response['catatan_sk_awal'],
                        'uploadfoto'  => $response['uploadfoto']
                    ];

                    $newData = $this->dataRequest($update_data);
                    // print_r($newData);exit();
                    $update_briguna = Client::setEndpoint('api_las/update_foto')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($newData)
                                    ->post('multipart');
                } else {
                    $update_data = [
                        'is_verified'  => 0,
                        'eform_id'     => $response['eform_id'],
                        // 'eform_id'     => $response['eform'],
                        'catatan_sk_awal' => empty($response['catatan_sk_awal'])? '' : $response['catatan_sk_awal']
                    ];

                    $update_briguna = Client::setEndpoint('api_las/update')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($update_data)
                                    ->post();
                }
                
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan SK_AWAL berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan SK_AWAL gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'sk_akhir':
                if (isset($response['uploadfoto'])) {
                    $update_data = [
                        'type'        => 'catatan_sk_akhir',
                        'field'       => 'SK_AKHIR',
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        'catatan_sk_akhir' => empty($response['catatan_sk_akhir'])? '' : $response['catatan_sk_akhir'],
                        'uploadfoto'  => $response['uploadfoto']
                    ];

                    $newData = $this->dataRequest($update_data);
                    // print_r($newData);exit();
                    $update_briguna = Client::setEndpoint('api_las/update_foto')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($newData)
                                    ->post('multipart');
                } else {
                    $update_data = [
                        'is_verified'  => 0,
                        'eform_id'     => $response['eform_id'],
                        // 'eform_id'     => $response['eform'],
                        'catatan_sk_akhir' => empty($response['catatan_sk_akhir'])? '' : $response['catatan_sk_akhir']
                    ];

                    $update_briguna = Client::setEndpoint('api_las/update')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($update_data)
                                    ->post();
                }

                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan SK_AKHIR berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan SK_AKHIR gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'rekomendasi':
                if (isset($response['uploadfoto'])) {
                    $update_data = [
                        'type'        => 'catatan_rekomendasi',
                        'field'       => 'REKOMENDASI',
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        'catatan_rekomendasi' => empty($response['catatan_rekomendasi'])? '' : $response['catatan_rekomendasi'],
                        'uploadfoto'  => $response['uploadfoto']
                    ];

                    $newData = $this->dataRequest($update_data);
                    // print_r($newData);exit();
                    $update_briguna = Client::setEndpoint('api_las/update_foto')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($newData)
                                    ->post('multipart');
                } else {
                    $update_data = [
                        'is_verified'  => 0,
                        'eform_id'     => $response['eform_id'],
                        // 'eform_id'     => $response['eform'],
                        'catatan_rekomendasi' => empty($response['catatan_rekomendasi'])? '' : $response['catatan_rekomendasi']
                    ];

                    $update_briguna = Client::setEndpoint('api_las/update')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($update_data)
                                    ->post();
                }

                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan REKOMENDASI berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan REKOMENDASI gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'skpu':
                if (isset($response['uploadfoto'])) {
                    $update_data = [
                        'type'        => 'catatan_skpu',
                        'field'       => 'SKPG',
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        'catatan_skpu' => empty($response['catatan_skpu'])? '' : $response['catatan_skpu'],
                        'uploadfoto'  => $response['uploadfoto']
                    ];

                    $newData = $this->dataRequest($update_data);
                    // print_r($newData);exit();
                    $update_briguna = Client::setEndpoint('api_las/update_foto')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($newData)
                                    ->post('multipart');
                } else {
                    $update_data = [
                        'is_verified'  => 0,
                        'eform_id'     => $response['eform_id'],
                        // 'eform_id'     => $response['eform'],
                        'catatan_skpu' => empty($response['catatan_skpu'])? '' : $response['catatan_skpu']
                    ];

                    $update_briguna = Client::setEndpoint('api_las/update')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($update_data)
                                    ->post();
                }

                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan SKPU berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan SKPU gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'couple_ktp':
                if (isset($response['uploadfoto'])) {
                    $update_data = [
                        'type'        => 'catatan_couple_ktp',
                        'field'       => 'couple_identity',
                        'is_verified' => 0,
                        'eform_id'    => $response['eform_id'],
                        'catatan_couple_ktp' => empty($response['catatan_couple_ktp'])? '' : $response['catatan_couple_ktp'],
                        'uploadfoto'  => $response['uploadfoto']
                    ];

                    $newData = $this->dataRequest($update_data);
                    // print_r($newData);exit();
                    $update_briguna = Client::setEndpoint('api_las/update_foto')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($newData)
                                    ->post('multipart');
                } else {
                    $update_data = [
                        'is_verified'  => 0,
                        'eform_id'     => $response['eform_id'],
                        // 'eform_id'     => $response['eform'],
                        'catatan_couple_ktp' => empty($response['catatan_couple_ktp'])? '' : $response['catatan_couple_ktp']
                    ];

                    $update_briguna = Client::setEndpoint('api_las/update')
                                    ->setHeaders(
                                        [ 'Authorization' => $data['token'],
                                          'pn' => $data['pn']
                                        ])
                                    ->setBody($update_data)
                                    ->post();
                }
                
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan KTP Pasangan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan KTP Pasangan gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            default:
                return response()->json([
                    'code'     => 400,
                    'message'  => 'Catatan gagal di update',
                    'response' => ''
                ]);
                break;
        }
    }

    public function postVerifikasi(Request $request) {
        $data = $this->getUser();
        $response = $request->all();
        $kk           = 0;
        $ktp          = 0;
        $ktp_pasangan = 0;
        $npwp         = 0;
        $sk_awal      = 0;
        $sk_akhir     = 0;
        $skpu         = 0;
        $rekomendasi  = 0;
        $slip_gaji    = 0;

        if (!empty($response['kk'])) {
            $kk = 1;
        }
        if (!empty($response['ktp'])) {
            $ktp = 1;
        }
        if (!empty($response['ktp_pasangan'])) {
            $ktp_pasangan = 1;
        }
        if (!empty($response['npwp'])) {
            $npwp = 1;
        }
        if (!empty($response['sk_awal'])) {
            $sk_awal = 1;
        }
        if (!empty($response['sk_akhir'])) {
            $sk_akhir = 1;
        }
        if (!empty($response['skpu'])) {
            $skpu = 1;
        }
        if (!empty($response['surat_rekomendasi'])) {
            $rekomendasi = 1;
        }
        if (!empty($response['slip_gaji'])) {
            $slip_gaji = 1;
        }

        // verifikasi dokumen lengkap
        /*if ($response['is_verified'] == 1) {
            $update_data = [
                'is_verified'      => $response['is_verified'],
                'catatan_adk'      => $response['catat_adk'],
                // 'is_send'          => 5,
                // 'is_send'          => 6,
                'eform_id'         => $response['eform_id'],
                'flag_kk'          => $kk,
                'flag_ktp'         => $ktp,
                'flag_couple_ktp'  => $ktp_pasangan,
                'flag_slip_gaji'   => $slip_gaji,
                'flag_npwp'        => $npwp,
                'flag_sk_awal'     => $sk_awal,
                'flag_sk_akhir'    => $sk_akhir,
                'flag_skpu'        => $skpu,
                'flag_rekomendasi' => $rekomendasi
            ];
        // tunda verifikasi dokumen
        } else {*/
            $update_data = [
                'is_verified'      => $response['is_verified'],
                'catatan_adk'      => $response['catat_adk'],
                'eform_id'         => $response['eform_id'],
                'flag_kk'          => $kk,
                'flag_ktp'         => $ktp,
                'flag_couple_ktp'  => $ktp_pasangan,
                'flag_slip_gaji'   => $slip_gaji,
                'flag_npwp'        => $npwp,
                'flag_sk_awal'     => $sk_awal,
                'flag_sk_akhir'    => $sk_akhir,
                'flag_skpu'        => $skpu,
                'flag_rekomendasi' => $rekomendasi
            ];
        // }
        // print_r($update_data);exit();
        $update_briguna = Client::setEndpoint('api_las/update')
                        ->setHeaders(
                            [ 'Authorization' => $data['token'],
                              'pn' => $data['pn']
                            ])
                        ->setBody($update_data)
                        ->post();
        // dd($update_briguna);
        if ($update_briguna['code'] == '200') {
            if ($response['is_verified'] == 1) {
                \Session::flash('success', 'Pengajuan berhasil diverifikasi, dokumen sudah lengkap');
                return redirect()->route('adk.index');
            } else {
                \Session::flash('error', 'Pengajuan ditunda, karena dokumen verifikasi belum lengkap');
                return redirect()->route('adk.index');
            }
        } else {
            \Session::flash('error', 'Pengajuan gagal diverifikasi');
            return redirect()->route('adk.index');
        }
    }

    public function postApprove(Request $request) {
        $data = $this->getUser();
        $response = $request->all();

        // verifikasi adk dibatalkan kirim ke brinet
        if (strtolower($response['type']) == 'batal') {
            $update_data = [
                'eform_id'    => $response['eform_id'],
                'is_send'     => 4,
                'catatan_adk' => $response['catat_adk']
            ];
            if ($response['catat_adk'] == '') {
                return response()->json([
                    'code'     => 400,
                    'message'  => 'Catatan ADK tidak boleh kosong, jika ingin dibatalkan',
                    'response' => ''
                ]);
            }
            // print_r($update_data);exit();
            $update_briguna = Client::setEndpoint('api_las/update')
                ->setHeaders(
                    [ 'Authorization' => $data['token'],
                      'pn' => $data['pn']
                    ])
                ->setBody($update_data)
                ->post();
            // dd($update_briguna);

            if ($update_briguna['code'] == '200') {
                return response()->json([
                    'code'     => 200,
                    'message'  => 'Pengajuan berhasil dibatalkan',
                    'response' => $update_briguna
                ]);
            } else {
                return response()->json([
                    'code'     => 400,
                    'message'  => 'Pengajuan gagal dibatalkan',
                    'response' => $update_briguna
                ]);
            }
        } else {
            // flag putusan kirim ke brinets
            $conten_putusan = [
                "id_aplikasi" => $response['id_aplikasi'],
                "uid"         => $response['uid'],
                "flag_putusan"=> '7',
                "catatan"     => $response['catat_adk']
            ];
            // print_r($conten_putusan);exit();
            
            $putusan = Client::setEndpoint('api_las/index')
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->setBody([
                        'requestMethod' => 'putusSepakat',
                        'requestData'   => $conten_putusan
                    ])
                    ->post('form_params');

            if ($putusan['statusCode'] == '01') {
                // get status interface yang sudah dikirim ke brinets
                /*$getBrinets = Client::setEndpoint('api_las/index')
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->setBody([
                        'requestMethod' => 'getStatusInterface',
                        'requestData'   => $response['id_aplikasi']
                    ])
                    ->post('form_params');*/
                // dd($getBrinets);

                // if ($getBrinets['statusCode'] == '01') {
                    $update_data = [
                        'eform_id'    => $response['eform_id'],
                        // 'is_send'     => 7,
                        'is_send'     => 6,
                        'catatan_adk' => $response['catat_adk'],
                        // 'cif'         => $getBrinets['items'][0]['CIF'],
                        // 'cif_las'     => $getBrinets['items'][0]['CIF_LAS'],
                        // 'no_rekening' => $getBrinets['items'][0]['NO_REKENING']
                    ];
                    // print_r($response['eform_id']);
                    // print_r($update_data);exit();
                    $update_briguna = Client::setEndpoint('api_las/update')
                        ->setHeaders(
                            [ 'Authorization' => $data['token'],
                              'pn' => $data['pn']
                            ])
                        ->setBody($update_data)
                        ->post();
                    // dd($update_briguna);
                    if ($update_briguna['code'] == '200') {
                        \Session::flash('success', 'Verifikasi '.$putusan['statusDesc'].' dikirim ke Brinets');
                        return redirect()->route('adk.index');
                    } else {
                        \Session::flash('error', 'Verifikasi gagal disimpan');
                        return redirect()->route('adk.index');
                    }
                // } else {
                //     \Session::flash('error', 'Brinets tidak menemukan Id Aplikasi');
                //     return redirect()->route('adk.index');
                // }
            } else {
                \Session::flash('error', 'Verifikasi gagal dikirim ke Brinets');
                return redirect()->route('adk.index');
            }
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
        $customer = Client::setEndpoint('api_las/index')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn'            => $data['pn']
                ])->setBody([
                    'requestMethod' => 'eformBriguna',
                    'requestData'   => $data['branch']
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

            if ($debitur['code'] == '01') {
                $listVerADK = $debitur['contents']['data'];
                $form  = array();
                $count = 0;
                foreach ($customer as $index => $value) {
                    foreach ($listVerADK as $key => $form) {
                        if (intval($value['id_aplikasi']) == intval($form['id_aplikasi'])) {
                            // if (intval($value['is_send']) == '1' || intval($value['is_send']) == '3' || intval($value['is_send']) == '6') {
                            if ($value['is_send'] == '1') {
                                $status    = $this->getStatusIsSend($value['is_send']);
                                $tp_produk = $this->getProduk($form['fid_tp_produk']);
                                $prescreening = $this->getStatusScreening($value['prescreening_status']);
                                $form['cif'] = $value['cif'];
                                $form['eform_id'] = $value['eform_id'];
                                $form['fid_tp_produk'] = $tp_produk;
                                $form['STATUS'] = $status;
                                $form['ref_number'] = $value['ref_number'];
                                $form['status_screening'] = $prescreening;
                                $form['tgl_pengajuan'] = empty($value['created_at']) ? $value['created_at'] : date('d-m-Y',strtotime($value['created_at']));
                                $form['request_amount'] = 'Rp '.number_format($form['plafond'], 0, ",", ".");
                                $form['action'] = view('internals.layouts.actions',[
                                    'approve_adk' => $form,
                                    'is_screening'     => $value['is_screening'],
                                    'is_verified'      => $value['is_verified'],
                                    'screening_result' => 'view'
                                ])->render();
                                $eforms['contents']['data'][] = $form;
                                $count = count($form);
                            }
                        }
                    }
                }

                if (intval($count) != 0) {
                    $eforms['contents']['total']           = $count;
                    $eforms['contents']['draw']            = $request->input('draw');
                    $eforms['contents']['recordsTotal']    = $eforms['contents']['total'];
                    $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];
                }
            }
        }
        return response()->json($eforms['contents']);
    }

    public function exportPTK(Request $request) {
        $data = $this->getUser();
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
            $tgl_skpp = empty($detail['created_at']) ? '' : date('d-m-Y',strtotime($detail['created_at']));
            $tgl_putusan  = substr($detail['tgl_putusan'], 0, 2).'-'.substr($detail['tgl_putusan'], 2, 2).'-'.substr($detail['tgl_putusan'], -4);
            $no_skpp     = $detail['ref_number'].'/'.date('m').'/'.date('Y').'/  '.$tgl_skpp;
            $no_putusan  = 'PTK/'.$detail['ref_number'].'/'.date('m').'/'.date('Y').'/  '.$tgl_putusan;
            $premi_as_jiwa   = ($detail['Premi_asuransi_jiwa'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_bri = ($detail['Premi_beban_bri'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_debitur = ($detail['Premi_beban_debitur'] * $detail['Plafond_usulan']) / 100;

            $detail_debitur = [
                'name_adk'     => $data['name'],
                'jabatan_adk'  => $data['position'],
                'no_skpp'      => $no_skpp,
                'no_putusan'   => $no_putusan,
                'nama_debitur' => $detail['costumer_name'],
                'alamat'       => $detail['customer']['personal']['address'],
                'perusahaan'   => $detail['customer']['work']['company_name'],
                'scoring'      => $detail['score'],
                'jumlah_kredit'=> $detail['Plafond_usulan'],
                'jangka_waktu' => $detail['Jangka_waktu'],
                'suku_bunga'   => $detail['Suku_bunga'],
                'provisi'      => $detail['Provisi_kredit'],
                'biaya_adm'    => $detail['Biaya_administrasi'],
                'penalty'      => $detail['Penalty'],
                'angsuran'     => $detail['angsuran_usulan'],
                'asuransi'     => $detail['Premi_asuransi_jiwa'],
                'beban_debitur'=> $detail['Premi_beban_debitur'],
                'beban_bri'    => $detail['Premi_beban_bri'],
                'nama_ao'      => $detail['ao_name'],
                'nama_pemutus' => $detail['pinca_name'],
                'premi_as_jiwa'=> $premi_as_jiwa,
                'premi_beban_debitur'=> $premi_beban_debitur,
                'premi_beban_bri'    => $premi_beban_bri
            ];

            // lempar data ke view blade
            view()->share('data_debitur',$detail_debitur);
            $pdf = PDF::loadView('internals.eform.adk._ptk_ipk');
            return $pdf->download('ptk_ipk.pdf');
        } else {
            \Session::flash('error', 'Dokumen PTK gagal didownload');
            return redirect()->route('adk.index');
        }
    }

    public function exportSPH(Request $request) {
        $data = $this->getUser();
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
            $fasilitas   = substr($detail['Kode_fasilitas'],-2);
            $no_skpp     = $detail['ref_number'].'/'.date('m').'/'.date('Y');
            $no_sk_awal  = $detail['no_dan_tanggal_sk_awal'];
            $no_sk_akhir = $detail['no_dan_tanggal_sk_akhir'];
            $provisi     = ($detail['Plafond_usulan'] * $detail['Provisi_kredit']) / 100;

            $detail_sph = [
                'nama_debitur'  => $detail['costumer_name'],
                'nama_pasangan' => $detail['customer']['personal']['couple_name'],
                'ktp'           => $detail['customer']['personal']['nik'],
                'ktp_pasangan'  => $detail['customer']['personal']['couple_nik'],
                'pekerjaan'     => $detail['customer']['work']['work'],
                'alamat'        => $detail['customer']['personal']['address'],
                'status'        => $detail['customer']['personal']['status'],
                'kantor_cabang' => $detail['branch_name'],
                'pinjaman'      => $detail['Plafond_usulan'],
                'tujuan'        => $detail['Tujuan_penggunaan_kredit'],
                'jangka_waktu'  => $detail['Jangka_waktu'],
                'suku_bunga'    => $detail['Suku_bunga'],
                'angsuran'      => $detail['angsuran_usulan'],
                'provisi'       => $detail['Provisi_kredit'],
                'provisi_atau'  => $provisi,
                'biaya_adm'     => $detail['Biaya_administrasi'],
                'asuransi'      => $detail['Premi_asuransi_jiwa'],
                'beban_debitur' => $detail['Premi_beban_debitur'],
                'beban_bri'     => $detail['Premi_beban_bri'],
                'pengadilan'    => $detail['Pengadilan_terdekat'],
                'cif_las'       => $detail['cif'],
                'bil_jangka'    => $this->terbilang($detail['Jangka_waktu'],$style=2),
                'bil_bunga'     => $this->terbilang($detail['Suku_bunga'],$style=2),
                'bil_day'       => $this->terbilang(date('d'),$style=2),
                'bil_month'     => $this->month(intval(date('m'))),
                'bil_year'      => $this->terbilang(date('Y'),$style=2),
                'bil_provisi'   => $this->terbilang($detail['Provisi_kredit'],$style=2),
                'bil_prov_atau' => $this->terbilang($provisi,$style=2),
                'bil_pinjaman'  => $this->terbilang($detail['Plafond_usulan'],$style=2),
                'bil_angsuran'  => $this->terbilang($detail['angsuran_usulan'],$style=2),
                'bil_biaya_adm' => $this->terbilang($detail['Biaya_administrasi'],$style=2),
                'no_skpp'       => $no_skpp,
                'no_sk_awal'    => $no_sk_awal,
                'no_sk_akhir'   => $no_sk_akhir
            ];
            // dd($detail_sph);
            if ($detail['baru_atau_perpanjang'] == '0') {
                if (strtolower($fasilitas) == 'wl') {
                    // lempar data ke view blade
                    view()->share('data_sph',$detail_sph);
                    $pdf = PDF::loadView('internals.eform.adk._sph');
                    return $pdf->download('sph_briguna_karya.pdf');
                } else if (strtolower($fasilitas) == 'wp') {
                    // lempar data ke view blade
                    view()->share('data_sph',$detail_sph);
                    $pdf = PDF::loadView('internals.eform.adk._sph_pekerja_bri');
                    return $pdf->download('sph_briguna_pekerja_bri.pdf');
                } else if (strtolower($fasilitas) == 'w7' || strtolower($fasilitas) == 'w8') {
                    // lempar data ke view blade
                    view()->share('data_sph',$detail_sph);
                    $pdf = PDF::loadView('internals.eform.adk._sph_smart_profesi');
                    return $pdf->download('sph_briguna_smart.pdf');
                }
            } else {
                view()->share('data_sph',$detail_sph);
                $pdf = PDF::loadView('internals.eform.adk._adendum');
                return $pdf->download('sph_addendum.pdf');
            }
        } else {
            \Session::flash('error', 'Dokumen SPH gagal didownload');
            return redirect()->route('adk.index');
        }
    }

    public function exportDebitur(Request $request) {
        // return $this->exportKredit($request);
        $data = $this->getUser();
        $response = $request->all();
        $formDetail = Client::setEndpoint('eforms/'.$response['eform_id'])
                    ->setHeaders([ 
                        'Authorization' => $data['token'],
                        'pn' => $data['pn']
                    ])
                    ->get();
        $detail = $formDetail['contents'];
        // dd($detail);
        if (!empty($detail)) {
            $no_skpp    = $detail['ref_number'].'/'.date('m').'/'.date('Y');
            $detail_sph = [
                'nama_debitur'  => $detail['costumer_name'],
                'nama_pasangan' => $detail['customer']['personal']['couple_name'],
                'nama_emergency'=> $detail['customer']['contact']['emergency_name'],
                'tgl_lahir_deb' => $detail['customer']['personal']['birth_date'],
                'tgl_pasangan'  => $detail['customer']['personal']['couple_birth_date'],
                'tmpt_lahir_deb'=> $detail['customer']['personal']['birth_place'],
                'tmpt_pasangan' => $detail['customer']['personal']['couple_birth_place'],
                'ktp'           => $detail['customer']['personal']['nik'],
                'ktp_pasangan'  => $detail['customer']['personal']['couple_nik'],
                'jenis_kelamin' => $detail['customer']['personal']['gender'],
                'pekerjaan'     => $detail['customer']['work']['work'],
                'alamat'        => $detail['customer']['personal']['address'],
                'alamat_dom'    => $detail['customer']['personal']['current_address'],
                // 'alamat_kantor' => $detail['customer']['work']['office_address'],
                'tlp_emergency' => $detail['customer']['contact']['emergency_contact'],
                'status'        => $detail['customer']['personal']['status'],
                'tlp_rumah'     => $detail['customer']['personal']['phone'],
                'handphone'     => $detail['customer']['personal']['mobile_phone'],
                'jml_tanggungan'=> $detail['customer']['personal']['dependent_amount'],
                'nama_ibu'      => $detail['customer']['personal']['mother_name'],
                'kewarganegaran'=> $detail['customer']['personal']['citizenship_name'],
                'email'         => $detail['customer']['personal']['email'],
                'status_rumah'  => $detail['customer']['personal']['address_status'],
                'gaji_lainnya'  => $detail['customer']['personal']['other_salary'],
                'lama_kerja'    => $detail['customer']['work']['work_duration'],
                'lama_kerja_bln'=> $detail['customer']['work']['work_duration_month'],
                'jabatan'       => $detail['customer']['work']['position'],
                'gaji'          => $detail['Gaji_bersih_per_bulan'],
                'jenis_pinjaman'=> $detail['tp_produk'],
                'instansi'      => $detail['mitra']['NAMA_INSTANSI'],
                'nip'           => $detail['NIP'],
                'status_kerja'  => $detail['Status_Pekerjaan'],
                'nama_atasan'   => $detail['Nama_atasan_Langsung'],
                'jabatan_atasan'=> $detail['Jabatan_atasan'],
                'npwp'          => $detail['no_npwp'],
                'kantor_cabang' => $detail['branch_name'],
                'pinjam_ajukan' => $detail['request_amount'],
                'pinjaman'      => $detail['Plafond_usulan'],
                'tujuan'        => $detail['Penggunaan_kredit'],
                'jangka_waktu'  => $detail['Jangka_waktu'],
                'suku_bunga'    => $detail['Suku_bunga'],
                'angsuran'      => $detail['angsuran_usulan'],
                // baru
                'pendidikan_terakhir' => $detail['id_Status_gelar'],
                'nama_ao'       => $detail['ao_name'],
                'lama_tinggal'  => $detail['lama_menetap'],
                'kelurahan'     => $detail['kelurahan'],
                'kelurahan_dom' => $detail['kelurahan_dom'],
                'kota'          => $detail['kota'],
                'kota_dom'      => $detail['kota_dom'],
                'kode_pos'      => $detail['kode_pos'],
                'kode_pos_dom'  => $detail['kode_pos_dom'],
                'ref_number'    => $detail['ref_number'],
                'bil_pinjaman'  => $this->terbilang($detail['Plafond_usulan'],$style=3),
                'no_skpp'       => $no_skpp
            ];
            // dd($detail_sph);

            // $this->data['detail'] = $detail;
            // return view('internals.eform.adk._report_kredit')->with($this->data);
            /// lempar data ke view blade
            $pdf = \PDF::loadView('internals.eform.adk._debitur', 
                    ['data_sph' => $detail_sph])
                    ->setPaper('a4', 'landscape');
            return $pdf->download('form_pengajuan.pdf');            
        } else {
            \Session::flash('error', 'Dokumen Form Pengajuan gagal didownload');
            return redirect()->route('adk.index');
        }
    }

    public function exportKredit(Request $request) {
        $data = $this->getUser();
        $response = $request->all();
        $formDetail = Client::setEndpoint('eforms/'.$response['eform_id'])
                    ->setHeaders([ 
                        'Authorization' => $data['token'],
                        'pn' => $data['pn']
                    ])
                    ->get();
        $detail = $formDetail['contents'];
        // dd($detail);
        if (!empty($detail)) {
            $status = $this->getStatusIsSend($detail['is_send']);
            $premi_as_jiwa = ($detail['Premi_asuransi_jiwa'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_bri = ($detail['Premi_beban_bri'] * $detail['Plafond_usulan']) / 100;
            $premi_beban_debitur = ($detail['Premi_beban_debitur'] * $detail['Plafond_usulan']) / 100;

            $detail['premi_as_jiwa'] = $premi_as_jiwa;
            $detail['premi_beban_debitur'] = $premi_beban_debitur;
            $detail['premi_beban_bri'] = $premi_beban_bri;
            $detail['status_send'] = $status;
            // dd($detail);
            $this->data['detail'] = $detail;
            return view('internals.eform.adk._report_kredit')->with($this->data);
            /// lempar data ke view blade
            // $pdf = \PDF::loadView('internals.eform.adk._report_kredit', 
            //         ['detail' => $detail])
            //         ->setPaper('a4', 'landscape');
            // return $pdf->download('detail_kredit.pdf');            
        } else {
            \Session::flash('error', 'Dokumen Detail Kredit gagal didownload');
            return redirect()->route('adk.index');
        }
    }

    function terbilang($x, $style = 4) {
        if($x < 0) {
            $hasil = "minus ".trim($this->kekata($x));
        } else {
            $hasil = trim($this->kekata($x));
        }    
        
        switch($style) {
            case 1 :
                $hasil = strtoupper($hasil);
            break;
            case 2 :
                $hasil = strtolower($hasil);
            break;
            case 3 :
                $hasil = ucwords($hasil);
            break;
            default:
                $hasil = ucfirst($hasil);
            break;
        }    
        return $hasil;
    }

    function kekata($x) {
        $x = abs($x);
        $angka = [
            "","satu","dua","tiga","empat","lima",
            "enam","tujuh","delapan","sembilan","sepuluh","sebelas"
        ];

        $temp = "";
        if ($x < 12) {
            $temp = " ".$angka[$x];
        } elseif($x < 20) {
            $temp = $this->kekata($x-10)." belas";
        } elseif($x < 100) {
            $temp = $this->kekata($x/10)." puluh".$this->kekata($x%10);
        } elseif($x < 200) {
            $temp = " seratus".$this->kekata($x-100);
        } elseif($x < 1000) {
            $temp = $this->kekata($x/100)." ratus".$this->kekata($x%100);
        } elseif($x < 2000) {
            $temp = " seribu".$this->kekata($x-1000);
        } elseif($x < 1000000) {
            $temp = $this->kekata($x/1000)." ribu".$this->kekata($x%1000);
        } elseif($x < 1000000000) {
            $temp = $this->kekata($x/1000000)." juta".$this->kekata($x%1000000);
        } elseif($x < 1000000000000) {
            $temp = $this->kekata($x/1000000000)." milyar".$this->kekata(fmod($x,1000000000));
        } elseif($x < 1000000000000000) {
            $temp = $this->kekata($x/1000000000000)." trilyun".$this->kekata(fmod($x,1000000000000));
        }    
        return $temp;
    }

    function month($x) {
        switch ($x) {
            case 1:
                return 'Januari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maret';
                break;
            case 4:
                return 'April';
                break;
            case 5:
                return 'Mei';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Agustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'Desember';
                break;
            default:
                return 'Bulan tidak ditemukan';
                break;
        }
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
            return 'SEND TO BRINETS';
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

    function dataRequest($request) {
        // print_r($request->all());exit();
        $id       = $request['eform_id'];
        $catatan  = $request[$request['type']];
        $verified = $request['is_verified'];
        $imgReq   = $request['uploadfoto'];
        $name = array([
              'name'     => 'eform_id',
              'contents' => $id,
            ], [
              'name'     => $request['type'],
              'contents' => $catatan,
            ], [
              'name'     => 'is_verified',
              'contents' => $verified,
            ], [
              'name'     => $request['field'],
              'contents' => $imgReq->getClientOriginalName(),
            ]);
        // print_r($name);
        if ($imgReq) {
            $image_path = $imgReq->getPathname();
            $image_mime = $imgReq->getmimeType();
            $image_name = $imgReq->getClientOriginalName();
            $image[] = [
                'name'     => 'uploadfoto',
                'filename' => $image_name,
                'Mime-Type'=> $image_mime,
                'contents' => fopen($image_path, 'r')
            ];
        } else {
            $image = [];
        }
        // print_r($image);
        // $allReq = $request->except(['_token','uploadfoto']);
        // print_r($allReq);exit();
        // foreach ($allReq as $index => $req) {
        //     $inputData[] = [
        //         'name'     => $index,
        //         'contents' => $req
        //     ];
        // }
        $newCustomer = array_merge($image, $name);

        return $newCustomer;
    }
}