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
        $data     = $this->getUser();
        // print_r($data);exit();
        // hanya adk yg bisa melakukan fungsi ini
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.index', compact('data'));
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
        $conten = [
            'nik' => '',
            'tp_produk' => '',
            'uid_pemrakarsa' => ''
        ];

        if (!empty($detail)) {
            $conten = [
                'nik'           => $detail['nik'],
                'tp_produk'     => $detail['tp_produk'],
                'uid_pemrakarsa'=> $detail['uid_pemrakarsa']
            ];
        }

        // GET Form Data Debitur LAS
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
        $debitur = [];
        if ($data_debitur['code'] == '01') {
            $debitur = $data_debitur['contents']['data'][0];
        }
        // dd($debitur);
        
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.detail-adk', compact('data','detail','debitur','id'));
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
                $catatan_ktp = '';
                if (!empty($response['catatan_ktp'])) {
                    $catatan_ktp = $response['catatan_ktp'];
                    // array_push($update_data, $catatan_ktp);
                }

                $update_data = [
                    'is_verified' => 0,
                    'eform_id'    => $response['eform'],
                    'catatan_ktp' => $catatan_ktp
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody($update_data)
                                ->post();
                // print_r($update_briguna);exit();
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'npwp':
                $catatan_npwp = '';
                if (!empty($response['catatan_npwp'])) {
                    $catatan_npwp = $response['catatan_npwp'];
                }

                $update_data = [
                    'is_verified'  => 0,
                    'eform_id'     => $response['eform'],
                    'catatan_npwp' => $catatan_npwp
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody($update_data)
                                ->post();
                // print_r($update_briguna);exit();
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'gaji':
                $catatan_gaji = '';
                if (!empty($response['catatan_gaji'])) {
                    $catatan_gaji = $response['catatan_gaji'];
                }
 
                $update_data = [
                    'is_verified'  => 0,
                    'eform_id'     => $response['eform'],
                    'catatan_gaji' => $catatan_gaji
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody($update_data)
                                ->post();
                // print_r($update_briguna);exit();
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'kk':
                $catatan_kk = '';
                if (!empty($response['catatan_kk'])) {
                    $catatan_kk = $response['catatan_kk'];
                }

                $update_data = [
                    'is_verified' => 0,
                    'eform_id'    => $response['eform'],
                    'catatan_kk'  => $catatan_kk
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody($update_data)
                                ->post();
                // print_r($update_briguna);exit();
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'sk_awal':
                $catatan_sk_awal = '';
                if (!empty($response['catatan_sk_awal'])) {
                    $catatan_sk_awal = $response['catatan_sk_awal'];
                }

                $update_data = [
                    'is_verified' => 0,
                    'eform_id'    => $response['eform'],
                    'catatan_sk_awal'  => $catatan_sk_awal
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody($update_data)
                                ->post();
                // print_r($update_briguna);exit();
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'sk_akhir':
                $catatan_sk_akhir = '';
                if (!empty($response['catatan_sk_akhir'])) {
                    $catatan_sk_akhir = $response['catatan_sk_akhir'];
                }

                $update_data = [
                    'is_verified' => 0,
                    'eform_id'    => $response['eform'],
                    'catatan_sk_akhir'  => $catatan_sk_akhir
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody($update_data)
                                ->post();
                // print_r($update_briguna);exit();
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'rekomendasi':
                $catatan_rekomendasi = '';
                if (!empty($response['catatan_rekomendasi'])) {
                    $catatan_rekomendasi = $response['catatan_rekomendasi'];
                }

                $update_data = [
                    'is_verified' => 0,
                    'eform_id'    => $response['eform'],
                    'catatan_rekomendasi'  => $catatan_rekomendasi
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody($update_data)
                                ->post();
                // print_r($update_briguna);exit();
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'skpu':
                $catatan_skpu = '';
                if (!empty($response['catatan_skpu'])) {
                    $catatan_skpu = $response['catatan_skpu'];
                }

                $update_data = [
                    'is_verified' => 0,
                    'eform_id'    => $response['eform'],
                    'catatan_skpu'  => $catatan_skpu
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody($update_data)
                                ->post();
                // print_r($update_briguna);exit();
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan gagal di update',
                        'response' => $update_briguna
                    ]);
                }
                break;

            case 'couple_ktp':
                $catatan_couple_ktp = '';
                if (!empty($response['catatan_couple_ktp'])) {
                    $catatan_couple_ktp = $response['catatan_couple_ktp'];
                }

                $update_data = [
                    'is_verified' => 0,
                    'eform_id'    => $response['eform'],
                    'catatan_couple_ktp'  => $catatan_couple_ktp
                ];

                $update_briguna = Client::setEndpoint('api_las/update')
                                ->setHeaders(
                                    [ 'Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                                ->setBody($update_data)
                                ->post();
                // print_r($update_briguna);exit();
                if ($update_briguna['code'] == '200') {
                    return response()->json([
                        'code'     => 200,
                        'message'  => 'Catatan berhasil di update',
                        'response' => $update_briguna
                    ]);
                } else {
                    return response()->json([
                        'code'     => 400,
                        'message'  => 'Catatan gagal di update',
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
        // print_r($response);exit();
        
        $update_data = [
            'is_verified'      => $response['is_verified'],
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
                \Session::flash('success', 'Pengajuan berhasil di Verifikasi');
                return redirect()->route('adk.index');
            } else {
                \Session::flash('error', 'Pengajuan ditunda, karena dokumen verifikasi belum lengkap');
                return redirect()->route('adk.index');
            }
        } else {
            \Session::flash('error', 'Pengajuan gagal di Verifikasi');
            return redirect()->route('adk.index');
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

        // $putusan['statusCode'] = '01';
        // $putusan['statusDesc'] = 'berhasil';
        if ($putusan['statusCode'] == '01') {
            // get status interface yang sudah dikirim ke brinets
            $getBrinets = Client::setEndpoint('api_las/index')
                ->setHeaders(
                    [ 'Authorization' => $data['token'],
                      'pn' => $data['pn']
                    ])
                ->setBody([
                    'requestMethod' => 'getStatusInterface',
                    'requestData'   => $response['id_aplikasi']
                ])
                ->post('form_params');
            // dd($getBrinets);
            // $getBrinets['statusCode'] = '01';
            if ($getBrinets['statusCode'] == '01') {
                $update_data = [
                    'eform_id'    => $response['eform_id'],
                    'is_send'     => 1,
                    'cif'         => $getBrinets['items'][0]['CIF'],
                    'cif_las'     => $getBrinets['items'][0]['CIF_LAS'],
                    'no_rekening' => $getBrinets['items'][0]['NO_REKENING']
                ];
                // print_r($response['eform_id']);
                // print_r($update_data);
                // exit();
                $update_briguna = Client::setEndpoint('api_las/update')
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->setBody($update_data)
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
                            // print_r($debitur);
                            // print_r($form);exit();
                            $form['eform_id'] = $value['eform_id'];
                            $form['request_amount'] = 'Rp '.number_format($form['plafond'], 2, ",", ".");
                            if ($form['fid_tp_produk'] == '1') {
                                $form['fid_tp_produk'] = 'Briguna Karya';
                            } elseif ($form['fid_tp_produk'] == '10') {
                                $form['fid_tp_produk'] = 'Briguna Micro';
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
            $detail_debitur = [
                'name_adk'     => $data['name'],
                'jabatan_adk'  => $data['position'],
                'nama_debitur' => $detail['customer']['personal']['first_name'],
                'alamat'       => $detail['customer']['personal']['address'],
                'tgl_skpp'     => '-',
                'perusahaan'   => $detail['customer']['work']['company_name'],
                'no_putusan'   => '-',
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
        } else {
            \Session::flash('error', 'Dokumen PTK gagal didownload');
            return redirect()->route('adk.index');
        }
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
            $no_sk_awal = $detail['no_dan_tanggal_sk_awal'];
            $tgl_sk_awal= $detail['no_dan_tanggal_sk_awal'];
            $no_sk_akhir = $detail['no_dan_tanggal_sk_akhir'];
            $tgl_sk_akhir= $detail['no_dan_tanggal_sk_akhir'];
            $provisi = ($detail['Plafond_usulan'] * $detail['Provisi_kredit']) / 100;

            $detail_sph = [
                'nama_debitur'   => $detail['customer']['personal']['first_name'],
                'nama_pasangan'  => $detail['customer']['personal']['couple_name'],
                'ktp'            => $detail['customer']['personal']['nik'],
                'ktp_pasangan'   => $detail['customer']['personal']['couple_nik'],
                'pekerjaan'      => $detail['customer']['work']['work'],
                'alamat'         => $detail['customer']['personal']['address'],
                'status'         => $detail['customer']['personal']['status'],
                'kantor_cabang'  => $detail['branch_name'],
                'pinjaman'       => $detail['request_amount'],
                'tujuan'         => $detail['Tujuan_penggunaan_kredit'],
                'jangka_waktu'   => $detail['Jangka_waktu'],
                'suku_bunga'     => ($detail['Suku_bunga'] / 12),
                'angsuran'       => $detail['angsuran_usulan'],
                'provisi'        => $detail['Provisi_kredit'],
                'provisi_atau'   => $provisi,
                'biaya_adm'      => $detail['Biaya_administrasi'],
                'asuransi'       => $detail['Premi_asuransi_jiwa'],
                'beban_debitur'  => $detail['Premi_beban_debitur'],
                'beban_bri'      => $detail['Premi_beban_bri'],
                'pengadilan'     => $detail['Pengadilan_terdekat'],
                'ref_number'     => $detail['ref_number'],
                'cif_las'        => $detail['cif_las'],
                'no_sk_awal'     => $no_sk_awal,
                'tgl_sk_awal'    => $tgl_sk_awal,
                'no_sk_akhir'    => $no_sk_akhir,
                'tgl_sk_akhir'   => $tgl_sk_akhir
            ];

            // lempar data ke view blade
            view()->share('data_sph',$detail_sph);
            $pdf = PDF::loadView('internals.eform.adk._sph');
            return $pdf->download('sph.pdf');
        } else {
            \Session::flash('error', 'Dokumen SPH gagal didownload');
            return redirect()->route('adk.index');
        }
    }

    public function datatablesBackup(Request $request) {
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
                print_r($value);exit();
                $form['eform_id'] = $value['eform_id'];
                $form['request_amount'] = 'Rp '.number_format($value['plafond'], 2, ",", ".");
                if ($value['tp_produk'] == '1') {
                    $form['tp_produk'] = 'Briguna Karya';
                } elseif ($value['tp_produk'] == '10') {
                    $form['tp_produk'] = 'Briguna Micro';
                } else {
                    $form['tp_produk'] = 'Lainnya';
                }
                $form['action'] = view('internals.layouts.actions', [
                    'approve_adk' => $form
                ])->render();
                $eforms['contents']['data'][] = $form;
                $count = count($form);
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
            return response()->json($eforms['contents']);   
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
    }
}