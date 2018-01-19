<?php

namespace App\Http\Controllers\EForm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class RecontestController extends Controller
{
    /* GET UserLogin Data */
    public function getUser(){
        $users = session()->get('user')['contents'];
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRecontest($id)
    {
        $data = $this->getUser();

        $eforms = Client::setEndpoint('eforms/'.$id)
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    // , 'auditaction' => 'action name'
                    // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->get();
        $eformData = $eforms['contents'];
        $client = new \GuzzleHttp\Client();
        // dd($eformData);
        try {
            $res = $client->request('GET', 'http://freegeoip.net/json/');

            $getIP = json_decode( '[' . $res->getBody()->getContents() . ']' )[0];
            $eformData['longitude'] = $getIP->longitude;
            $eformData['latitude'] = $getIP->latitude;

        } catch (\Exception $e) {
            \Log::info($e);

        }

        if(!empty($eformData['recontest'])){
            $recontest = 0;
        }else{
            $recontest = 1;
        }
        return view('internals.eform.lkn.index', compact('data', 'id', 'eformData', 'recontest'));
    }

    /**
     * Reformat image request
     *
     * @param  \Illuminate\Http\Request  $image
     * @param  String  $name
     */
    public function reformatImage( $name, $image )
    {
      return [
        'name' => $name
        , 'contents' => fopen($image->getRealPath(), 'r')
        , 'filename' => $image->getClientOriginalName()
        , 'Mime-Type'=> $image->getmimeType()
      ];
    }

    /**
     * Reformat content request
     *
     * @param  \Illuminate\Http\Request  $value
     * @param  String  $name
     */
    public function reformatContent( $name, $value )
    {
      return [
        'name' => $name
        , 'contents' => $value
      ];
    }

    /**
     * Get return content
     *
     * @param  \Illuminate\Http\Request  $value
     * @param  String  $name
     */
    public function returnContent( $field, $values, $baseName )
    {
      $excludeNumber = ['amount', 'npwp_number', 'income', 'income_salary', 'income_allowance', 'number', 'couple_salary', 'couple_other_salary', 'salary', 'other_salary'];
      $excludeImage = ['file', 'npwp', 'salary_slip', 'family_card', 'marrital_certificate', 'divorce_certificate', 'photo_with_customer', 'offering_letter', 'proprietary', 'building_permit', 'down_payment', 'building_tax', 'legal_bussiness_document', 'work_letter', 'license_of_practice', 'other_document', 'document'];

      if ( in_array($baseName, $excludeNumber) ) {
        $values = str_replace(',', '', $values);
      }

      if ( in_array($baseName, $excludeImage) ) {
        if ($values != "") {
          $return = $this->reformatImage( $field, $values );
        } else {
          $return = null;
        }
      } else {
        $return = $this->reformatContent( $field, $values );
      }

      return $return;
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function lknRequest($request)
    {
      $application = [];
        // dd($request->all());
      foreach ($request->all() as $field => $values) {
        if ( $field == 'mutations') {
          foreach ($values as $mutationIndex => $mutations) {
            foreach ($mutations as $key => $value) {
              $baseName = $field . '[' . $mutationIndex . '][' . $key . ']';
              if ( $key == 'tables' ) {
                foreach ($value as $tablesIndex => $tables) {
                  foreach ($tables as $tableKey => $data) {
                    $name = $baseName . '[' . $tablesIndex . '][' . $tableKey . ']';

                    $return = $this->returnContent( $name, $data, $tableKey );
                    if ($return != null) {
                      $application[] = $this->returnContent( $name, $data, $tableKey );
                    }
                  }
                }
              } else {
                $return = $this->returnContent( $baseName, $value, $key );
                if ($return != null) {
                  $application[] = $this->returnContent( $baseName, $value, $key );
                }
              }
            }
          }
        } elseif ( $field == 'recontest') {
          foreach ($values as $recontestIndex => $recontest) {
            foreach ($recontest as $key => $value) {
              $baseName = $field . '[' . $recontestIndex . '][' . $key . ']';
                $return = $this->returnContent( $baseName, $value, $key );
                if ($return != null) {
                  $application[] = $this->returnContent( $baseName, $value, $key );
                }
            }
          }
        } else {
          $return = $this->returnContent( $field, $values, $field );
          if ($return != null) {
            $application[] = $this->returnContent( $field, $values, $field );
          }
        }
      }
      return $application;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLKNRecontest(Request $request, $id)
    {
        $data = $this->getUser();
        $newForm = $this->lknRequest($request);

        $client = Client::setEndpoint('eforms/'.$id.'/recontest')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                , 'auditaction' => 'Simpan Form LKN Recontest'
                , 'long' =>  $request['hidden-long']
                , 'lat' =>  $request['hidden-lat']
            ])
            ->setBody($newForm)
            ->post('multipart');

        if ( $client['code'] == 201 ) {
            \Session::flash('success', $client['descriptions']);
            return redirect()->route('eform.index');

        } else {
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getApprovalRecontest($id)
    {
        $data = $this->getUser();

        $eforms = Client::setEndpoint('eforms/'.$id)
          ->setHeaders([
            'Authorization' => $data['token']
            , 'pn' => $data['pn']
            // , 'auditaction' => 'action name'
            // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
            // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
          ])->get();
        $detail = $eforms['contents'];
        $client = new \GuzzleHttp\Client();
        // dd($detail);
        try {
            $res = $client->request('GET', 'http://freegeoip.net/json/');

            $getIP = json_decode( '[' . $res->getBody()->getContents() . ']' )[0];
            $detail['longitude'] = $getIP->longitude;
            $detail['latitude'] = $getIP->latitude;

        } catch (\Exception $e) {
            \Log::info($e);

        }

        if(!empty($detail['recontest'])){
            $recontest = 0;
        }else{
            $recontest = 1;
        }

        $type = 'fill';

        return view('internals.eform.recontest.approval', compact('data', 'id', 'detail', 'recontest', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postApprovalRecontest(Request $request, $id)
    {
      $data = $this->getUser();

      $approve = [
        'recommended' => $request->recommended,
        'recommendation' => $request->recommendation,
        'is_approved' => $request->is_approved == 'true' ? true : false
      ];

      $client = Client::setEndpoint('eforms/'.$id.'/approve')
        ->setHeaders([
          'Authorization' => $data['token']
          , 'pn' => $data['pn']
          , 'auditaction' => $request['auditaction']
          , 'long' => $request['hidden-long']
          , 'lat'  => $request['hidden-lat']
        ])
        ->setBody($approve)
        ->post();

      $color = $request->is_approved == 'true' ? 'success' : 'error';

      if ( $client['code'] == 201 ) {
        \Session::flash( $color, $client['descriptions'] );
        return redirect()->route('eform.index');

      } else {
        \Session::flash( 'error', 'EForm gagal diapprove! - ' . $client['descriptions'] );
        return redirect()->back()->withInput( $request->input() );
      }

      return redirect()->route('eform.index');
    }
}
