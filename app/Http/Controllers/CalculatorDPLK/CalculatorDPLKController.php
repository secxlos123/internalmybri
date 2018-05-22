<?php

namespace App\Http\Controllers\CalculatorDPLK;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class CalculatorDPLKController extends Controller
{
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
        return view('internals.calculator.dplk.index', compact('data'));
    }

    /**
     * Calculate
     *
     */

    public function postCalculate(Request $request){
        // dd($request->all());
      $data = $this->getUser();
      $calculate = $request->except('_token');
      $interest_rate_type = $calculate['interest_rate_type'];
      if($interest_rate_type==1){
          $type = 'generateFlat';
      }elseif ($interest_rate_type==2) {
          $type ='generateEfektif';
      }elseif ($interest_rate_type==3) {
          $type ='generateEfektifFixedFloat';
      }elseif ($interest_rate_type == 4) {
          $type ='generateEfektifFixedFloorFloat';
      }else{
          dd('type not found');
      }
      $price = $calculate['price'];
      $term = $calculate['time_period'];
      $rate = $calculate['rate'];
      $downPayment = str_replace(",", "", $calculate['down_payment']);
      $priceNumber = str_replace(",", "", $price);
      $fxflterm = $calculate['time_period_total'];
      $fxterm =  $calculate['time_period_fixed'];
      $fxrate =  $calculate['interest_rate_fixed'];
      $flrate =  $calculate['interest_rate_float'];
      if($interest_rate_type== 1 || $interest_rate_type ==2){
          $calculateSend = array(
               'type' => $type,
               'price' => $priceNumber,
               'term' => $term,
               'rate' => $rate,
               'downPayment' => $downPayment
          );
      }
      else if ($interest_rate_type== 3){
          $calculateSend = array(
                'type' => $type,
                'price' => $priceNumber,
                'fxflterm' => $fxflterm,
                'fxterm'    => $fxterm,
                'fxrate'   => $fxrate,
                'flrate'   => $flrate,
               'downPayment' => $downPayment
          );
      }
      else if($interest_rate_type== 4){
          $fflterm = $calculate['time_period_floor'];
          $ffloatlrate = $calculate['interest_rate_floor'];
          $calculateSend = array(
              'type' => $type,
              'price' => $priceNumber,
              'fxflflterm' => $fxflterm,
              'ffxterm' => $fxterm,
              'fflterm' => $fflterm,
              'ffxrate' => $fxrate,
              'ffloorrate' => $flrate,
              'ffloatlrate' => $ffloatlrate,
              'downPayment' => $downPayment
          );
      }
      $response = Client::setBase('common')->setEndpoint('calculator')->setBody($calculateSend)->post();
     // dd($response);
      $rincian_pinjaman =  $response['contents']['rincian_pinjaman'];
      $detail_angsuran =   $response['contents']['detail_angsuran'];
      return view('internals.calculator.detail', compact('rincian_pinjaman','detail_angsuran','interest_rate_type', 'data'));
    }

    /**
     * getResult
     *
     */
    public function getCalculate(Request $request){
        $rincian_pinjaman =  null;
        $detail_angsuran =   null;
        return view('home.calculator.property_simulasi', compact('rincian_pinjaman','detail_angsuran'));
    }

    public function convertCommatoPoint($value){
       $result = floatval(str_replace(',', '.', str_replace('.', '', $value)));
       return $result;
    }
}
