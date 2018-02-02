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
    return view('internals.crm.dashboard.index', compact('data'));
  }

  public function chartMarketing(Request $request)
  {
    /* GET UserLogin Data */
    $data = $this->getUser();

    $chartData = Client::setEndpoint('crm/marketing')
        ->setQuery(['role' => $data['role']])
        ->setHeaders([
            'Authorization' => $data['token'],
            'pn' => $data['pn'],
            'branch' => $data['branch']
        ])
        ->get();

    // return $chartData;

    $chart_data = array();
    foreach ($chartData['contents'] as $chart) {
      return $chart;
        // $yearName = date("Y", strtotime($chart->new_date));
        $monthName = $chart['month'];
        $value = $chart['value'];

        $chart_data[] = array(
            'month'  => $monthName,
            'value' => $value
            );
    }
    return $chart_data;
  }

}
