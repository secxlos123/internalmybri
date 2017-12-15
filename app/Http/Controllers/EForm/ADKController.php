<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
// use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use Client;
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
        // GET DETAIL CUST with Form Data
        // print_r($data['pn']);
        $formDetail = Client::setEndpoint('eforms/'.$id)
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->get();
                    // dd($formDetail);
        $detail = $formDetail['contents'];
        // dd($detail);
        $data_briguna = Client::setEndpoint('api_las/briguna')
                    ->setHeaders(
                        [ 'Authorization' => $data['token'],
                          'pn' => $data['pn']
                        ])
                    ->setBody(['id' => $id])
                    ->post();
        $briguna = $data_briguna['contents'];
        // dd($briguna);
        $conten = [
            'nik'           => $briguna['nik'],
            'tp_produk'     => $briguna['tp_produk'],
            'uid_pemrakarsa'=> $briguna['uid_pemrakarsa']
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
        
        // dd($detail);
        // ao harusnya ganti adk
        if ($data['role'] == 'adk') {
            return view('internals.eform.adk.detail-adk', compact('data','detail','debitur','id','briguna'));
        } else{
            return view('internals.eform.adk.index', compact('data'));
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
            \Session::flash('success', 'Verifikasi '.$putusan['statusDesc'].' dikirim ke Brinets');
            return redirect()->route('adk.index');
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
                $form = array();
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
                            $eforms['contents']['data'][$key] = $form;
                            $count = count($form);
                        }
                    }
                }                
                $eforms['contents']['total'] = $count;
            }
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
        // print_r($eforms);exit();
        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];
        return response()->json($eforms['contents']);
    }
}