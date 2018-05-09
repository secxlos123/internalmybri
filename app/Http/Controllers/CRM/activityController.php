<?php

namespace App\Http\Controllers\CRM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Client;

class activityController extends Controller
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
    public function index()
    {
      $data = $this->getUser();
      // dd(env('APP_ENV'));

      // dd($referral);
      return view('internals.crm.activity.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data(Request $request)
    {
      $data = $this->getUser();
      $requestMonth = \Carbon\Carbon::createFromFormat('Y-m-d', request()->get('start'));
      $activity = Client::setEndpoint('crm/activity')
      ->setHeaders([
        'Authorization' => $data['token'],
        'pn' => $data['pn'],
        'branch' => $data['branch']
      ])
      ->get();
      $activities = [];
      foreach ($activity['contents'] as $key => $value) {
        $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $value['start_date']);
        if ($startDate->month == $requestMonth->month && $startDate->year == $requestMonth->year) {
          $activities[] = $value;
        }
      }
      // dd($activities);
      return $activities;
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

    public function pemasar(Request $request)
    {
      $user = $this->getUser();
      $pemasar = Client::setEndpoint('crm/pemasar')
      ->setHeaders([
        'pn' => $user['pn'],
        'branch' => $user['branch'],
        'Authorization' => $user['token'],
        'Content-Type' => 'application/json'
      ])
      ->post();

      return $pemasar['contents'];
    }

    public function marketing(Request $request)
    {
      $user = $this->getUser();

      $marketings = Client::setEndpoint('crm/marketing')
      ->setHeaders([
        'pn' => $user['pn'],
        'branch' => $user['branch'],
        'Authorization' => $user['token'],
        'Content-Type' => 'application/json'
      ])
      ->get();
      $marketing = $marketings['contents'];
      $m = array_filter($marketing, function ($var) use($request){
        return ($var['status'] != 'Done' && $var['status'] != 'done' && $var['status'] != 'Batal' && $var['status'] != 'batal');
      });

      return $m;
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
