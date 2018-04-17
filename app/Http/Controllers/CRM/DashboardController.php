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
    // dd($data);

    if ($data['role'] == "pinwil" || $data['role_user'] == "pinwil") {
      $regionList = Client::setEndpoint('crm/branch/list_uker_kanca')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "branch_code"=>$data['branch']
      ])
      ->post();
      // dd($regionList);
      $regions = array_column($regionList['contents']['responseData'], 'region');
      $region = $regions[0];
      // dd($region);
      $listKanca = Client::setEndpoint('crm/branch/list_kanca_kanwil')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        'region' => $region
      ])
      ->post();
      $kanca = $listKanca['contents']['responseData'];
      // dd($kanca);
      $marketingByKanwil = [];
      foreach ($kanca as $k) {
        $marketingByBranch = Client::setEndpoint('crm/marketing/by_branch')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          'branch' => substr("00000".$k['mainbr'], -5)
        ])
        ->post();
        // dd($k);
        // dd($marketingByBranch);
        $zeroStatus = [
          "On Progress" => 0,
          "Batal" => 0,
          "Prospek" => 0,
          "Done" => 0
        ];
        if (count($marketingByBranch['contents']) > 0) {
          $statusBefore = array_count_values(array_column($marketingByBranch['contents'], 'status'));
        } else {
          $statusBefore = [];
        }
        $status = array_merge($zeroStatus, $statusBefore);
        // dd($k);
        // dd($status);
        $marketingByKanwil[$k['mbdesc']]['contents'] = $marketingByBranch['contents'];
        $marketingByKanwil[$k['mbdesc']]['status'] = $status;
        $marketingByKanwil[$k['mbdesc']]['branch'] = substr("00000".$k['mainbr'], -5);
      }
      // dd($marketingByKanwil);
    } else {
      $marketingByKanwil = [];
    }

    // dd($marketingByKanwil);

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

    $marketingByBranch = Client::setEndpoint('crm/marketing/by_branch')
    ->setHeaders([
      'pn' => $data['pn'],
      'branch' => $data['branch'],
      'Authorization' => $data['token'],
      'Content-Type' => 'application/json'
    ])
    ->post();

    $marketing = Client::setEndpoint('crm/marketing')
    ->setHeaders([
      'pn' => $data['pn'],
      'branch' => $data['branch'],
      'Authorization' => $data['token'],
      'Content-Type' => 'application/json'
    ])
    ->get();

    $product = $crmIndex['contents']['product_type'];
    $pemasar = $getPemasar['contents'];
    if (($data['role']=='pincapem') || ($data['role']=='pinwil') || ($data['role']=='ampd') || ($data['role']=='mp') || ($data['role']=='pinca')) {
      $marketings = $marketingByBranch['contents'];
    } elseif ($data['role'] == 'ao' || $data['role'] == 'fo') {
      $marketings = $marketing['contents'];
    }
    // dd($marketings);
    $tableMarketings = Client::setEndpoint('crm/marketing_summary')
    ->setHeaders([
      'Authorization' => $data['token'],
      'pn' => $data['pn'],
      'branch' => $data['branch']
    ])
    ->setBody([
      "product_type"=>"", //filter pruduk
      "month"=>"",//filter bulan
      "pn"=>"" //filter officer
    ])
    ->post();

    $tableMarketing = $tableMarketings['contents'];
    // dd($marketings);

    return view('internals.crm.dashboard.index', compact('data', 'product', 'pemasar', 'marketings', 'tableMarketing', 'marketingByKanwil'));
  }

  public function chartMarketing(Request $request)
  {
    /* GET UserLogin Data */
    $data = $this->getUser();
    // dd($data);
    if ($data['role'] == "pinwil" || $data['role_user'] == "pinwil") {
      $regionList = Client::setEndpoint('crm/branch/list_uker_kanca')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "branch_code"=>$data['branch']
      ])
      ->post();
      $regions = array_column($regionList['contents']['responseData'], 'region');
      $region = $regions[0];
      // dd($region);
      $listKanca = Client::setEndpoint('crm/branch/list_kanca_kanwil')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        'region' => $region
      ])
      ->post();
      $kanca = $listKanca['contents']['responseData'];
      // dd($kanca);
      $marketingByKanwil = [];
      $i = 0;
      foreach ($kanca as $k) {
        $marketingByBranch = Client::setEndpoint('crm/marketing/by_branch')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          'branch' => substr("00000".$k['mainbr'], -5)
        ])
        ->post();
        $zeroStatus = [
          "On Progress" => 0,
          "Batal" => 0,
          "Prospek" => 0,
          "Done" => 0
        ];
        if (count($marketingByBranch['contents']) > 0) {
          $statusBefore = array_count_values(array_column($marketingByBranch['contents'], 'status'));
        } else {
          $statusBefore = [];
        }
        $status = array_merge($zeroStatus, $statusBefore);
        // dd($status);
        $marketingByKanwil[$i] = $status;
        $marketingByKanwil[$i]['Nama']= $k['mbdesc'];
        $marketingByKanwil[$i]['Total'] = array_sum($status);
        // $marketingByKanwil[$k['mbdesc']]['branch'] = substr("00000".$k['mainbr'], -5);
        $i++;
      }
      // asort($marketingByKanwil);
      // dd('test');
      return $marketingByKanwil;
    }

    $bulan = $request->input('bulan');
    $pemasar = $request->input('pemasar');
    $product = $request->input('product');

    if (($data['role']=='pincapem') || ($data['role']=='pinwil') || ($data['role']=='ampd') || ($data['role']=='mp') || ($data['role']=='pinca')) {
      $pn = $pemasar;
    } elseif ($data['role'] == 'ao' || $data['role'] == 'fo') {
      $pn = $data['pn'];
    }

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
    // dd($chartData);

    return $chartData['contents'];
  }

  public function chartTotal(Request $request)
  {
    /* GET UserLogin Data */
    $data = $this->getUser();

    $bulan = $request->input('bulan');

    // return $product;

    $chartData = Client::setEndpoint('crm/marketing_summary')
    ->setQuery(['role' => $data['role']])
    ->setHeaders([
      'Authorization' => $data['token'],
      'pn' => $data['pn'],
      'branch' => $data['branch']
    ])
    ->setBody([
      "product_type"=>"", //filter pruduk
      "month"=>$bulan,//filter bulan
      "pn"=>"" //filter officer
    ])
    ->post();

    $totalData = array();

    $totalData[0]['Total'] = array_sum(array_column($chartData['contents'], 'Total'));
    $totalData[0]['Prospek'] = array_sum(array_column($chartData['contents'], 'Prospek'));
    $totalData[0]['On Progress'] = array_sum(array_column($chartData['contents'], 'On Progress'));
    $totalData[0]['Done'] = array_sum(array_column($chartData['contents'], 'Done'));
    $totalData[0]['Index'] = 'All';
    // return array_column($chartData['contents'], 'Total');
    // foreach ($chartData['contents'] as $k=>$subArray) {
    //   unset($subArray['Nama']);
    //   unset($subArray['Pemasar']);
    // }

    return $totalData;
  }

  public function pieChart(Request $request)
  {
    /* GET UserLogin Data */
    $data = $this->getUser();

    // return $product;

    $chartData = Client::setEndpoint('crm/marketing_summary_v2')
    ->setQuery(['role' => $data['role']])
    ->setHeaders([
      'Authorization' => $data['token'],
      'pn' => $data['pn'],
      'branch' => $data['branch']
    ])
    ->setBody([
      "product_type"=>"", //filter pruduk
      "month"=>"",//filter bulan
      "pn"=>"" //filter officer
    ])
    ->post();

    // return $chartData;
    $totalData = array();

    $totalData[0]['Total'] = array_sum(array_column($chartData['contents'], 'Total'));
    $totalData[0]['Prospek'] = array_sum(array_column($chartData['contents'], 'Prospek'));
    $totalData[0]['On Progress'] = array_sum(array_column($chartData['contents'], 'On Progress'));
    $totalData[0]['Done'] = array_sum(array_column($chartData['contents'], 'Done'));
    $totalData[0]['Index'] = 'All';
    // return array_column($chartData['contents'], 'Total');
    // foreach ($chartData['contents'] as $k=>$subArray) {
    //   unset($subArray['Nama']);
    //   unset($subArray['Pemasar']);
    // }

    return $totalData;
  }

  public function detailBranch(Request $request)
  {
    /* GET UserLogin Data */
    $data = $this->getUser();

    $marketingByBranch = Client::setEndpoint('crm/marketing_summary')
    ->setHeaders([
      'Authorization' => $data['token'],
      'pn' => $data['pn'],
      'branch' => $data['branch']
    ])
    ->setBody([
      "product_type"=>"", //filter pruduk
      "month"=>"",//filter bulan
      "pn"=>"", //filter officer
      "branch"=> $request->branch
    ])
    ->post();
    // dd($marketingByBranch['contents']);
    $data = [
      'marketings' => $marketingByBranch['contents'],
      'branch' => $request->branch
    ];
    // dd($data);
    return view('internals.crm.dashboard.admin.detail-branch')->with($data);
  }

  public function detailMarketing(Request $request)
  {
    /* GET UserLogin Data */
    $data = $this->getUser();
    // return $request->pn;
    // dd($request->all());
    $marketings = Client::setEndpoint('crm/marketing/by_branch')
    ->setHeaders([
      'pn' => $data['pn'],
      'branch' => $data['branch'],
      'Authorization' => $data['token'],
      'Content-Type' => 'application/json'
    ])
    ->setBody([
      "branch"=> $request->branch
    ])
    ->post();
    $marketing = $marketings['contents'];
    // dd($marketing);
    $mark = array_filter($marketing, function ($var) use($request){
      return ($var['pn'] == substr("00000000".$request->pn, -8));
    });
    // dd($mark);
    // return $mark;
    $data = [
      'marketings' => $mark
    ];
    // $kanca = $listKanca['contents']['responseData'];
    return view('internals.crm.dashboard.admin.detail-marketing')->with($data);
  }

}
