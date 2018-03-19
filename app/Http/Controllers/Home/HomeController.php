<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('dashboard');
    // }

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
    	/* GET UserLogin Data */
        $data = $this->getUser();
        
        return view('internals.home.index', compact('data'));
    }

    /**
     * Display a chart of eform.
     *
     * @return \Illuminate\Http\Response
     */
    public function chartEform(Request $request)
    {
        /* GET UserLogin Data */
        $data = $this->getUser();
        $query = ['role' => $data['role']];
        if ($request->has('startChart') && $request->has('endChart') ) {
            $query['startChart'] = $request->input('startChart');
            $query['endChart'] = $request->input('endChart');
        }

        $chartData = Client::setEndpoint('dashboard-internal')
            ->setQuery($query)
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
            ])
            ->post();

        $chart_data = array();
        foreach ($chartData['contents']['chart'] as $chart) {
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

    /**
     * Display a chart of customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function chartCustomer()
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        $chartData = Client::setEndpoint('dashboard-internal')
            ->setQuery(['role' => $data['role']])
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
            ])
            ->post();

        $chart_data = array();
        foreach ($chartData['contents']['customer']['chart'] as $chart) {
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

    /**
     * Display a chart of customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function chartProperty()
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        $chartData = Client::setEndpoint('dashboard-internal')
            ->setQuery(['role' => $data['role']])
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
            ])
            ->post();

        $chart_data = array();
        foreach ($chartData['contents']['property']['chart'] as $chart) {
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
