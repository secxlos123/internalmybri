<?php

namespace App\Http\Controllers\CRM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

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
        $branch = "";
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
      // dd($branch);

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
      if ($request->branch != "") {
        $branch = "00".$request->branch;
      } else {
        $branch = "";
      }
      $report = Client::setEndpoint('crm/report_marketings')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "region"=>$request->region, //mandatory
        "branch"=>$branch, //jika branch kosong maka filter seluruh branch per kanwil
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
        $branch = "";
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

      $report = Client::setEndpoint('crm/report_activities')
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
      return view('internals.crm.report.index-activity', compact('data', 'reports', 'kanwil', 'kanca', 'fo', 'region', 'regionList', 'branch', 'branchList'));
    }

    public function listReportActivity(Request $request)
    {
      $data = $this->getUser();
      // dd(env('APP_ENV'));
      // return $request->all();
      if ($request->branch != "") {
        $branch = "00".$request->branch;
      } else {
        $branch = "";
      }

      $report = Client::setEndpoint('crm/report_activities')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "region"=>$request->region, //mandatory
        "branch"=>$branch, //jika branch kosong maka filter seluruh branch per kanwil
        "pn"=>$request->pn, //
        "start_date"=>$request->start,
        "end_date"=>$request->end
      ])
      ->post();
      $reports = $report['contents'];
      // dd($reports);
      // return count($reports);
      $data = [
        'reports' => $reports
      ];
      // $kanca = $listKanca['contents']['responseData'];
      return view('internals.crm.report.list-activity')->with($data);
    }

    public function exportMarketing(Request $request)
    {
      $data = $this->getUser();
      // dd(env('APP_ENV'));
      // return $request->all();
      if ($request->branch != "") {
        $branch = "00".$request->branch;
      } else {
        $branch = "";
      }
      $report = Client::setEndpoint('crm/report_marketings')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "region"=>$request->region, //mandatory
        "branch"=>$branch, //jika branch kosong maka filter seluruh branch per kanwil
        "pn"=>$request->pn, //
        "start_date"=>$request->start_date,
        "end_date"=>$request->end_date
      ])
      ->post();
      $data = $report['contents'];
      $array = [];
      $i = 1;
      foreach ($data as $key => $value) {
        $array[$key]['No'] = $i;
        $array[$key]['Bulan'] = $value['bulan'];
        $array[$key]['Tahun'] = $value['tahun'];
        $array[$key]['Wilayah'] = $value['wilayah'];
        $array[$key]['Cabang'] = $value['cabang'];
        $array[$key]['Nama Pemasar'] = $value['fo_name'];
        $array[$key]['Produk'] = $value['product_type'];
        $array[$key]['Jenis'] = $value['activity_type'];
        $array[$key]['Nama Nasabah'] = $value['nama'];
        $array[$key]['Target'] = "Rp.".$value['target'];
        $array[$key]['Realisasi - No Rekening'] = $value['rekening'];
        $array[$key]['Realisasi - Volume'] = $value['volume_rekening'];
        $array[$key]['Realisasi - Tanggal Closing'] = $value['target_closing_date'];
        $array[$key]['Status'] = $value['status'];
        $i++;
      }
      //
      // $data = unset($data['catatan']);
      // return $data;
      $myFile= Excel::create("Report_Marketing-".date("Y-m-d_H:i:s"), function($excel) use($array) {
        $excel->setTitle('Report Marketing');
        $excel->sheet('sheet 1', function($sheet) use($array) {
          $sheet->mergeCells('A1:N1');
          $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(14);
            $row->setFontWeight('bold');
          });

          $sheet->row(1, array('Report Marketing'));
          $sheet->fromArray($array, null, 'A2', true, true);
        });
      });

      $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
      $response =  array(
        'name' => "Report_Marketing-".date("Y-m-d_H:i:s"), //no extention needed
        'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
      );
      return response()->json($response);
    }

    public function exportActivity(Request $request)
    {
      $data = $this->getUser();
      // dd(env('APP_ENV'));
      // return $request->all();
      if ($request->branch != "") {
        $branch = "00".$request->branch;
      } else {
        $branch = "";
      }
      $report = Client::setEndpoint('crm/report_activities')
      ->setHeaders([
        'pn' => $data['pn'],
        'branch' => $data['branch'],
        'Authorization' => $data['token'],
        'Content-Type' => 'application/json'
      ])
      ->setBody([
        "region"=>$request->region, //mandatory
        "branch"=>$branch, //jika branch kosong maka filter seluruh branch per kanwil
        "pn"=>$request->pn, //
        "start_date"=>$request->start_date,
        "end_date"=>$request->end_date
      ])
      ->post();
      $data = $report['contents'];
      $array = [];
      $i = 1;
      foreach ($data as $key => $value) {
        $array[$key]['No'] = $i;
        $array[$key]['Wilayah'] = $value['wilayah'];
        $array[$key]['Cabang'] = $value['cabang'];
        $array[$key]['Nama FO'] = $value['fo_name'];
        $array[$key]['Activity'] = $value['activity'];
        $array[$key]['Tujuan'] = $value['tujuan'];
        $array[$key]['Tanggal'] = $value['tanggal'];
        $array[$key]['Alamat'] = $value['alamat'];
        $array[$key]['Jenis Marketing'] = $value['marketing_type'];
        $array[$key]['Nama Nasabah'] = $value['nama'];
        $array[$key]['Deskripsi'] = $value['desc'];
        $array[$key]['Hasil Activity'] = $value['result'];
        $i++;
      }
      //
      // $data = unset($data['catatan']);
      // return $data;
      $myFile= Excel::create("Report_Activity-".date("Y-m-d_H:i:s"), function($excel) use($array) {
        $excel->setTitle('Report_Activity');
        $excel->sheet('sheet 1', function($sheet) use($array) {
          $sheet->mergeCells('A1:L1');
          $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(14);
            $row->setFontWeight('bold');
          });

          $sheet->row(1, array('Report Activity'));
          $sheet->fromArray($array, null, 'A2', true, true);
        });
      });

      $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
      $response =  array(
        'name' => "Report_Activity-".date("Y-m-d_H:i:s"), //no extention needed
        'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
      );
      return response()->json($response);
    }

}
