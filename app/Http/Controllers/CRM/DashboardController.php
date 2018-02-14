<?php

namespace App\Http\Controllers\CRM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Client;

class DashboardController extends Controller
{

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
    $product = $crmIndex['contents']['product_type'];
    $pemasar = $getPemasar['contents'];

    return view('internals.crm.dashboard.index', compact('data', 'product', 'pemasar'));
  }

  public function chartMarketing(Request $request)
  {
    /* GET UserLogin Data */
    $data = $this->getUser();

    // if ($data['role'] == 'pinca') {
    //   $pn = "";
    // } else {
    //   $pn = $data['pn'];
    // }
    $pn = "";

    $bulan = $request->input('bulan');
    $pemasar = $request->input('pemasar');
    $product = $request->input('product');

    // return $product;

    $chartData = Client::setEndpoint('crm/marketing_summary')
    ->setQuery(['role' => $data['role']])
    ->setHeaders([
      'Authorization' => $data['token'],
      'pn' => $data['pn'],
      'branch' => $data['branch']
    ])
    ->setBody([
      "product_type"=>$product, //filter pruduk
      "month"=>$bulan,//filter bulan
      "pn"=>$pn //filter officer
    ])
    ->post();

    return $chartData['contents'];
  }

}
