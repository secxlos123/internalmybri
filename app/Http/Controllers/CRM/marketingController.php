<?php

namespace App\Http\Controllers\CRM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;
use Redirect;

class marketingController extends Controller
{
    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user')['contents'];
        return $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getUser();

        $crmIndex = Client::setEndpoint('crm')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->get();

        $product = $crmIndex['contents']['product_type'];

        $marketings = Client::setEndpoint('crm/marketing')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->get();
        $marketing = $marketings['contents'];
        $prospek = array_filter($marketing, function ($var) {
          return ($var['status'] == 'Prospek');
        });
        $onprogress = array_filter($marketing, function ($var) {
          return ($var['status'] == 'On Progress');
        });
        $done = array_filter($marketing, function ($var) {
          return ($var['status'] == 'Done');
        });
        $batal = array_filter($marketing, function ($var) {
          return ($var['status'] == 'Batal');
        });
        // dd($done);
        // dd($marketings);

        return view('internals.crm.marketing.index', compact('data', 'prospek', 'onprogress', 'batal', 'done', 'product'));
    }

    public function detail(Request $request)
    {
        $data = $this->getUser();

        $marketingDetail = Client::setEndpoint('crm/marketing/detail')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          "id"=>$request->id
        ])
        ->post();

        $marketingNotes = Client::setEndpoint('crm/marketing/note')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          "marketing_id"=>$request->id
        ])
        ->post();

        $detail = $marketingDetail['contents'];
        $notes = $marketingNotes['contents'];
        // dd($detail);
        return view('internals.crm.marketing.detail', compact('data', 'detail', 'notes'));
    }

    public function create(Request $request)
    {
      $data = $this->getUser();
      // dd($data);
      $crmIndex = Client::setEndpoint('crm')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->get();
      // dd($crmIndex['contents']['activity_type']);
      $product = $crmIndex['contents']['product_type'];
      $activity = $crmIndex['contents']['activity_type'];

      $lead = Client::setEndpoint('crm/account/leads')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "type_usulan"=>""
      ])
      ->post();
      // dd($lead);
      $leads = $lead['contents'];

      $customer = Client::setEndpoint('crm/account/customer')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->get();
      // dd($customer);
      $customers = $customer['contents'];

      $kelolaan = Client::setEndpoint('crm/account/existing_fo')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "kode_kanwil" => "",
        "main_branch" => ""
      ])
      ->post();
      // dd($kelolaan);
      if(is_array($kelolaan['contents'])){
        $kelolaans = $kelolaan['contents'];
      } else {
        $kelolaans = [];
      }
      // dd($kelolaans);
      $referral = Client::setEndpoint('crm/account/get_referral_by_officer')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->get();
      // dd($referral['contents']);
      $referrals = $referral['contents'];

      $cpp = Client::setEndpoint('crm/new_customer')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->get();
      // dd($cpp['contents']);
      $cpps = $cpp['contents'];


      return view('internals.crm.marketing.create', compact('data', 'product', 'activity', 'leads', 'customers', 'kelolaans', 'referrals', 'cpps'));
    }

    public function storeNote(Request $request)
    {
      $data = $this->getUser();
      // dd($data);
      // dd($request->all());
      $storeNotes = Client::setEndpoint('crm/marketing/store_note')
      ->setHeaders([
        'pn' => $data['pn'],
        'name' => $data['name'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "marketing_id"=>$request->id,
        "note"=>$request->note
      ])
      ->post();
      // dd($storeNotes);
      $storeNote = $storeNotes['contents'];
      if ($storeNotes['code'] == 201 || $storeNotes['code'] == 200) {
        \Session::flash('note_msg_success', 'Success menambahkan note');
        return Redirect::back()->with('storeNotes');
      } else {
        \Session::flash('note_msg_success', 'Gagal menambahkan note');
        return Redirect::back()->with('storeNotes');
      }
    }

    public function storeMarketing(Request $request)
    {
      $data = $this->getUser();
      // dd($request->all());
      $target = (int)str_replace(',', '', $request->target);
      $nasabah = json_decode($request->input($request->type), true);
      // dd($nasabah);
      $storeMarketing = Client::setEndpoint('crm/marketing')
      ->setHeaders([
        'pn' => $data['pn'],
        'name' => $data['name'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "product_type"=> $request->product_type,
        "activity_type"=> $request->activity_type,
        "target"=> $target,
        "account_id"=> "", // mybri
        "number"=> "", //leads
        "nik"=> $nasabah['nik'], //existing
        "cif"=> $nasabah['cif'],
        "nama"=> $nasabah['name'],
        "status"=> "Prospek",
        "ref_id"=>"",//referral customer
        "branch"=> $data['branch'],
        "target_closing_date"=> ""
      ])
      ->post();
      // dd($storeMarketing);
      // $marketings = $storeMarketing['contents'];
      if ($storeMarketing['code'] == 201 || $storeMarketing['code'] == 200) {
        \Session::flash('note_msg_success', 'Success menambahkan note');
        return Redirect::back()->with('storeNotes');
      } else {
        \Session::flash('note_msg_success', 'Gagal menambahkan note');
        return Redirect::back()->with('storeNotes');
      }
    }

    /**
     * Calculate
     *
     */

    public function postCalculate(Request $request){
        // dd($request->all());
      $data = $this->getUser();
      $calculate = $request->except('_token');
      $interest_rate_type = $calculate['interest_rate_type'];
      if($interest_rate_type==1){
          $type = 'generateFlat';
      }elseif ($interest_rate_type==2) {
          $type ='generateEfektif';
      }elseif ($interest_rate_type==3) {
          $type ='generateEfektifFixedFloat';
      }elseif ($interest_rate_type == 4) {
          $type ='generateEfektifFixedFloorFloat';
      }else{
          dd('type not found');
      }
      $price = $calculate['price'];
      $term = $calculate['time_period'];
      $rate = $calculate['rate'];
      $downPayment = str_replace(",", "", $calculate['down_payment']);
      $priceNumber = str_replace(",", "", $price);
      $fxflterm = $calculate['time_period_total'];
      $fxterm =  $calculate['time_period_fixed'];
      $fxrate =  $calculate['interest_rate_fixed'];
      $flrate =  $calculate['interest_rate_float'];
      if($interest_rate_type== 1 || $interest_rate_type ==2){
          $calculateSend = array(
               'type' => $type,
               'price' => $priceNumber,
               'term' => $term,
               'rate' => $rate,
               'downPayment' => $downPayment
          );
      }
      else if ($interest_rate_type== 3){
          $calculateSend = array(
                'type' => $type,
                'price' => $priceNumber,
                'fxflterm' => $fxflterm,
                'fxterm'    => $fxterm,
                'fxrate'   => $fxrate,
                'flrate'   => $flrate,
               'downPayment' => $downPayment
          );
      }
      else if($interest_rate_type== 4){
          $fflterm = $calculate['time_period_floor'];
          $ffloatlrate = $calculate['interest_rate_floor'];
          $calculateSend = array(
              'type' => $type,
              'price' => $priceNumber,
              'fxflflterm' => $fxflterm,
              'ffxterm' => $fxterm,
              'fflterm' => $fflterm,
              'ffxrate' => $fxrate,
              'ffloorrate' => $flrate,
              'ffloatlrate' => $ffloatlrate,
              'downPayment' => $downPayment
          );
      }
      $response = Client::setBase('common')->setEndpoint('calculator')->setBody($calculateSend)->post();
     // dd($response);
      $rincian_pinjaman =  $response['contents']['rincian_pinjaman'];
      $detail_angsuran =   $response['contents']['detail_angsuran'];
      return view('internals.calculator.detail', compact('rincian_pinjaman','detail_angsuran','interest_rate_type', 'data'));
    }


    /**
     * getResult
     *
     */
    public function getCalculate(Request $request){
        $rincian_pinjaman =  null;
        $detail_angsuran =   null;
        return view('home.calculator.property_simulasi', compact('rincian_pinjaman','detail_angsuran'));
    }

    public function convertCommatoPoint($value){
       $result = floatval(str_replace(',', '.', str_replace('.', '', $value)));
       return $result;
    }
}
