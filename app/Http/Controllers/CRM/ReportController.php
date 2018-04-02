<?php

namespace App\Http\Controllers\CRM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Client;

class ReportController extends Controller
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
    public function marketing()
    {
      // return 'ehe'; die();
      $data = $this->getUser();
      // dd(env('APP_ENV'));
      // dd($data);
      // dd($region);
      // dd($data);
      if ($data['uker'] == "KP") {
        $regionList = "able";
        $region = "A";
        $branch = "";
        $branchList = "able";
      } elseif ($data['uker'] == "KW") {
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
        $branch = $data['branch'];
        $regionList = "disable";
        $branchList = "able";
      } else {
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
        $branch = $data['branch'];
        $regionList = "disable";
        $branchList = "disable";
      }
      // dd($region);

      $report = Client::setEndpoint('crm/report_marketings')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "region"=>$region, //mandatory
        "branch"=>$branch, //jika branch kosong maka filter seluruh branch per kanwil
        "pn"=>"" //
      ])
      ->post();
      $reports = $report['contents'];

      $listKanwil = Client::setEndpoint('crm/branch/list_kanwil')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
      ])
      ->post();
      $kanwil = $listKanwil['contents'];

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
      // dd($listKanca);
      $kanca = $listKanca['contents']['responseData'];

      $data = $this->getUser();
      // return $request->region;
      $listFo = Client::setEndpoint('crm/pemasar_kanwil')
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

      $fo = $listFo['contents'];
      // dd($fo);
      return view('internals.crm.report.index-marketing', compact('data', 'reports', 'kanwil', 'kanca', 'fo', 'region', 'regionList', 'branch', 'branchList'));
    }

    public function listReportMarketing(Request $request)
    {
      $data = $this->getUser();
      // dd(env('APP_ENV'));
      // return $request->all();
      $report = Client::setEndpoint('crm/report_marketings')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "region"=>$request->region, //mandatory
        "branch"=>"00".$request->branch, //jika branch kosong maka filter seluruh branch per kanwil
        "pn"=>$request->pn, //
        "start_date"=>$request->start,
        "end_date"=>$request->end
      ])
      ->post();
      $reports = $report['contents'];
      // return count($reports);
      $data = [
        'reports' => $reports
      ];
      // $kanca = $listKanca['contents']['responseData'];
      return view('internals.crm.report.list-marketing')->with($data);
    }

    public function listKanca(Request $request)
    {
      $data = $this->getUser();
      // return $request->region;
      $list = Client::setEndpoint('crm/branch/list_kanca_kanwil')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        'region' => $request->region
      ])
      ->post();

      return $list['contents']['responseData'];
    }

    public function listFo(Request $request)
    {
      $data = $this->getUser();
      // return $request->region;
      $list = Client::setEndpoint('crm/pemasar_kanwil')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        'region' => $request->region
      ])
      ->post();
      // return $list['c'];
      return $list['contents'];
    }

    public function listFoKanca(Request $request)
    {
      $data = $this->getUser();
      // return $request->region;
      if ($request->branch == "") {
        $list = Client::setEndpoint('crm/pemasar_kanwil')
        ->setHeaders([
          'pn' => $data['pn'],
          'branch' => $data['branch'],
          'Authorization' => $data['token'],
          'Content-Type' => 'application/json'
        ])
        ->setBody([
          'region' => $request->region
        ])
        ->post();

        return $list['contents'];
      }
      $list = Client::setEndpoint('crm/pemasar_cabang')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        'branch' => $request->branch
      ])
      ->post();
      // return $list['c'];
      return $list['contents'];
    }

    public function activity()
    {
      $data = $this->getUser();
      // dd(env('APP_ENV'));
      // dd($data);
      $report = Client::setEndpoint('crm/report_activities')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "region"=>"A", //mandatory
        "branch"=>"", //jika branch kosong maka filter seluruh branch per kanwil
        "pn"=>"" //
      ])
      ->post();
      $reports = $report['contents'];
      $listKanwil = Client::setEndpoint('crm/branch/list_kanwil')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
      ])
      ->post();
      $kanwil = $listKanwil['contents'];

      $listKanca = Client::setEndpoint('crm/branch/list_kanca_kanwil')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        'region' => "A"
      ])
      ->post();
      // dd($listKanca);
      $kanca = $listKanca['contents']['responseData'];

      $data = $this->getUser();
      // return $request->region;
      $listFo = Client::setEndpoint('crm/pemasar_kanwil')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        'region' => "A"
      ])
      ->post();

      $fo = $listFo['contents'];
      // dd($fo);
      return view('internals.crm.report.index-activity', compact('data', 'reports', 'kanwil', 'kanca', 'fo'));
    }

    public function listReportActivity(Request $request)
    {
      $data = $this->getUser();
      // dd(env('APP_ENV'));
      // return $request->all();
      $report = Client::setEndpoint('crm/report_activities')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "region"=>$request->region, //mandatory
        "branch"=>$request->branch, //jika branch kosong maka filter seluruh branch per kanwil
        "pn"=>$request->pn, //
        "start_date"=>$request->start,
        "end_date"=>$request->end
      ])
      ->post();
      $reports = $report['contents'];
      // return count($reports);
      $data = [
        'reports' => $reports
      ];
      // $kanca = $listKanca['contents']['responseData'];
      return view('internals.crm.report.list-activity')->with($data);
    }

}
