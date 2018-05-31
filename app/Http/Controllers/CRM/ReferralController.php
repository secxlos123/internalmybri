<?php

namespace App\Http\Controllers\CRM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Client;

class ReferralController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('leads', ['except' => ['datatables']]);
    // }

    // protected $columns = [
    //     'nik',
    //     'name',
    //     'email',
    //     'city_id',
    //     'phone',
    //     'gender',
    //     'action',
    // ];

    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user');
            
        foreach ($users as $user) 
        {
          $data = $user;
        }
        
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = $this->getUser();
      // dd(env('APP_ENV'));
      $referrals = Client::setEndpoint('crm/account/get_referral')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->get();
      $referral = $referrals['contents'];
      // dd($referral);
      return view('internals.crm.referal.index', compact('data', 'referral'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
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
      
      $getPemasar = Client::setEndpoint('crm/pemasar')
                              ->setHeaders([
                                              'pn' => $data['pn'],
                                              'branch' => $data['branch'],
                                              'Authorization' => $data['token'],
                                              'Content-Type' => 'application/json'
                                           ])
                              ->post();


      //$category = 
      //$contact_time = 
      $product = $crmIndex['contents']['product_type'];
      $pemasar = $getPemasar['contents'];

      return view('internals.crm.referal.add', compact('data', 'product', 'pemasar'));
    }

    public function store(Request $request)
    {
      $data = $this->getUser();

      $body = [
                 'nik' => $request->input('nik'),
                 'name' => $request->input('name'),
                 'phone' => $request->input('phone'),
                 'address' => $request->input('address'),
                 'product_type' => $request->input('product_type'),
                 'contact_time' => $request->input('contact_time'),
                 'intention' => $request->input('intention'),
                 'officer_ref' => $request->input('officer_ref'),
                 'note' => $request->input('note'),
                 'status' => 'ref'
              ];

      // dd($data);
      $storeReferal = Client::setEndpoint('crm/account/store_referral')
                                ->setHeaders([
                                                'pn' => $data['pn'],
                                                'branch' => $data['branch'],
                                                'name' => $data['name'],
                                                'Authorization' => $data['token'],
                                                'Content-Type' => 'application/json'
                                             ])
                                ->setBody($body)
                                ->post();

      if($storeReferal['code'] == 201)
      {
        \Session::flash('success', $storeReferal['descriptions']);
        return redirect()->route('referral.index');
      }
      else
      {
        $error = reset($storeReferal['contents']);
        \Session::flash('error', $storeReferal['descriptions'].' '.$error);
        return redirect()->back()->withInput($request->input());
      }
    }

    public function update(Request $request)
    {
      $data = $this->getUser();

      $body = [
        'ref_id' => $request->input('ref_id'),
        'officer_ref' => $request->input('officer_ref'),
        'officer_name' => $request->input('officer_name'),
        'status' => 'dispo'
      ];

      // dd($body);
      // dd($data);
      $updateReferal = Client::setEndpoint('crm/account/update_officer_referral')
          ->setHeaders([
            'pn' => $data['pn'],
            'branch' => $data['branch'],
            'name' => $data['name'],
            'Authorization' => $data['token'],
            'Content-Type' => 'application/json'
          ])
          ->setBody($body)
          ->post();

          // dd($updateReferal);

      if($updateReferal['code'] == 200){
        \Session::flash('success', $updateReferal['descriptions']);
        return redirect()->back();
      }else{
        $error = reset($updateReferal['contents']);
        \Session::flash('error', $updateReferal['descriptions'].' '.$error);
        return redirect()->back()->withInput($request->input());
      }
    }

    public function nikCek(Request $request)
    {
      $user = $this->getUser();

      $data = [
          'nik' => $request->input('nik'),
      ];

      $nikCek = Client::setEndpoint('crm/account/customer_nik')
          ->setHeaders([
              'pn' => $user['pn'],
              'branch' => $user['branch'],
              'Authorization' => $user['token'],
              'Content-Type' => 'application/json'
          ])
          ->setBody($data)
          ->post();

      return $nikCek;
    }

    public function disposisiReferral(Request $request)
    {
      $data = $this->getUser();
      // dd(env('APP_ENV'));
      $referrals = Client::setEndpoint('crm/account/get_referral')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->get();

      $getPemasar = Client::setEndpoint('crm/pemasar')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->post();

      $referral = $referrals['contents'];
      $pemasar = $getPemasar['contents'];
      return view('internals.crm.disposisi-referal.index', compact('data', 'referral', 'pemasar'));
    }
}
