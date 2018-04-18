<?php

namespace App\Http\Controllers\CRM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;
use Redirect;

class leadsController extends Controller
{
    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user')['contents'];
        return $users;
    }

    public function index(Request $request)
    {
      $data = $this->getUser();

      return view('internals.crm.leads.index', compact('data'));
    }

    public function detail(Request $request)
    {
      $data = $this->getUser();
      // dd($request->cif);
      if ($request->nik != null) {

        $customer = Client::setEndpoint('crm/account/customer_nik')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          "nik" => $request->nik
        ])
        ->post();

        $activities = Client::setEndpoint('crm/activity/by_customer')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          "nik" => $request->nik,
          "cif" => ""
        ])
        ->post();

        $activity = $activities['contents'];

        if ($info['tipe_nasabah'] == "I") {
          return view('internals.crm.leads.detail', compact('data', 'portfolio', 'info', "marketing"));
        } else {
          return view('internals.crm.leads.detail_non_i', compact('data', 'portfolio', 'info', 'marketingsFiltered', 'activities'));
        }
        // dd($customer);

      } elseif ($request->cif != null) {
        // dd($request->cif);
        $customerByCif = Client::setEndpoint('crm/account/leads_detail')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          "cif" => $request->cif
        ])
        ->post();

        $customer = Client::setEndpoint('crm/account/customer_nik')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          "nik" => $customerByCif['contents']['id_number']
        ])
        ->post();
        $info = $customer['contents']['info'][0];
        $portfolio = $customer['contents']['portfolio'];
        // dd($portfolio);
        $activity = Client::setEndpoint('crm/activity/by_customer')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          "nik" => "",
          "cif" => "$request->cif"
        ])
        ->post();

        $activities = $activity['contents'];

        $marketing = Client::setEndpoint('crm/marketing/by_branch')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->post();

        $marketings = $marketing['contents'];
        $cif = $request->cif;
        $marketingsFiltered = array_filter($marketings, function ($var) use ($cif) {
          return ($var['cif'] == $cif);
        });
        // dd($marketings);

        if ($info['tipe_nasabah'] == "I") {
          return view('internals.crm.leads.detail', compact('data', 'portfolio', 'info', 'marketingsFiltered', 'activities'));
        } else {
          return view('internals.crm.leads.detail_non_i', compact('data', 'portfolio', 'info', 'marketingsFiltered', 'activities'));
        }
        // dd($customer['contents']);
      }

    }

    public function kelolaan(Request $request)
    {
      $data = $this->getUser();

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
      $data = [
        'kelolaans' => $kelolaans
      ];

      return view('internals.crm.leads.kelolaan')->with($data);
    }

    public function leads(Request $request)
    {
      $data = $this->getUser();
      // dd($request->type_usulan);
      $lead = Client::setEndpoint('crm/account/leads')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "type_usulan"=>$request->type_usulan
      ])
      ->post();
      $leads = $lead['contents'];
      $data = [
        'leads' => $leads
      ];
      return view('internals.crm.leads.leads')->with($data);
    }

    public function customers(Request $request)
    {
      $data = $this->getUser();

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
      $data = [
        'customers' => $customers
      ];
      return view('internals.crm.leads.customer')->with($data);
    }

    public function cpps(Request $request)
    {
      $data = $this->getUser();

      $cpp = Client::setEndpoint('crm/new_customer')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->get();
      // dd($cpp);
      $cpps = $cpp['contents'];
      $data = [
        'cpps' => $cpps
      ];
      return view('internals.crm.leads.cpp')->with($data);
    }

    public function referrals(Request $request)
    {
      $data = $this->getUser();

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
      $data = [
        'referrals' => $referrals
      ];
      return view('internals.crm.leads.referral')->with($data);
    }

}
