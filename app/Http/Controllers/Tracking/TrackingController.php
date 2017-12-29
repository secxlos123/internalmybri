<?php

namespace App\Http\Controllers\Tracking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class TrackingController extends Controller
{
    protected $columns = [
        'ref_number',
        'nama_pemohon',
        'developer_name',
        'property_name',
        'status',
        'action',
    ];

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
        // dd($user);
        return view('internals.tracking.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->getUser();
        // dd($user);
         /* GET Detail Data */
        $userData = Client::setEndpoint('tracking/'.$id)
                    ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                        // , 'auditaction' => 'action name'
                        // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                        // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                    ])
                    ->get();

        $datas = $userData['contents'];
        // dd($datas);

        return view('internals.tracking.detail', compact('data', 'datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get Datatables
     * @param $request
     */

    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $eforms = Client::setEndpoint('tracking')
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    // , 'auditaction' => 'action name'
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'      => (int) $request->input('page') + 1,
                    'status'    => $request->input('status')
                ])->get();
                \Log::info($eforms);
        foreach ($eforms['contents']['data'] as $key => $form) {
            // dd($form['kpr']['developer_id']);
            $form['ref_number'] = strtoupper($form['ref_number']);
            $form['nama_pemohon'] = $form['nama_pemohon'];
            $form['developer_name'] = strtoupper($form['developer_name']);
            $form['property_name'] = $form['property_name'];
            $form['status'] = $form['status'];

            $form['action'] = view('internals.layouts.actions', [
                'show' => route('tracking.show', $form['id']),
            ])->render();
            $eforms['contents']['data'][$key] = $form;
        }

        $eforms['contents']['draw'] = $request->input('draw');
        $eforms['contents']['recordsTotal'] = $eforms['contents']['total'];
        $eforms['contents']['recordsFiltered'] = $eforms['contents']['total'];

        return response()->json($eforms['contents']);
    }

    /**
     * Download Excel
     *
     */
    public function downloadTracking(Request $request)
    {
        $data = $this->getUser();
        $sort = $request->input('order.0');

        return \Excel::create('Rekapitulasi Tracking Pengajuan', function($excel) use($data, $request) {
            $excel->sheet('Rekapitulasi Data Tracking', function($sheet) use($data, $request){
                    // Set paper orientation
                    $sheet->setOrientation('landscape');
                    // $sheet->setAllBorders('thin');
                    // Set title cell
                    $sheet->setPageMargin(0.25);
                    $sheet->row(1, array('Rekapitulasi Data Tracking'));
                    $sheet->mergeCells('A1:E1');
                    $sheet->cells('A1:E1', function($cells) {
                        $cells->setAlignment('center');
                    });
                    $sheet->row(1, function ($row) {
                        $row->setFontFamily('Candara');
                        $row->setFontWeight('bold');
                        $row->setFontSize(20);
                    });

                    $sheet->mergeCells('A2:E2');
                    $sheet->cells('A2:E2', function($cells) {
                        $cells->setAlignment('center');
                    });

                    // Set Header cell
                    $sheet->row(4, array(
                        'No. Referensi', 'Tanggal Pengajuan', 'Developer', 'Nama Properti', 'Status'
                    ));
                    $sheet->cells('A4:E4', function($cells) {
                        $cells->setAlignment('center');
                        $cells->setFontFamily('Calibri');
                        $cells->setFontWeight('bold');
                        $cells->setBackground('#000000');
                        $cells->setFontColor('#ffffff');
                    });

            // Get Data Cell
            $trackings = Client::setEndpoint('tracking')
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    // , 'auditaction' => 'action name'
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->get();

                $arr = array();
                foreach($trackings['contents']['data'] as $index => $track) {
                        $fields =  array(
                            $track['no_ref'],
                            '2017-10-03',
                            $track['developer_name'],
                            $track['property_name'],
                            $track['status']
                            );
                        array_push($arr, $fields);
                }

                $sheet->fromArray($arr,null,'A5',true, false);

                // Set heigts
                $sheet->setHeight(array(
                    1     =>  25,
                    2     =>  19
                ));

                for( $intRowNumber = 3; $intRowNumber <= count($arr) + 4; $intRowNumber++){
                    $sheet->setHeight($intRowNumber, 18);
                }
                // Set width
                $sheet->setWidth(array(
                        'A' => 15,
                        'B' => 20,
                        'C' => 25,
                        'D' => 25,
                        'E' => 25,
                    ));
                });
        })->export('xls');
    }
}
