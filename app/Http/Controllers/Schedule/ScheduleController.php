<?php

namespace App\Http\Controllers\Schedule;

use Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

    /**
     * Get credentails user login from session
     * @return array
     */
    public function getUser()
    {
        /* GET UserLogin Data */
        $users = session()->get('user')['contents'];
        return $users;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getUser();
        return view('internals.schedule.index', compact('data'));
    }

    /**
     * Get all schedules ao
     * @return \Illuminate\Http\JsonResponse
     */
    public function schedule()
    {
        $now = \Carbon\Carbon::now();
        return $this->jsonResponse(
          $this->api('schedule')
              ->setQuery([
                'month' => $now->month,
                'year' => $now->year
              ])->get()
        );
    }

    /**
     * Store new schedule to api
     * @return \Illuminate\Http\Response
     */
    public function postSchedule()
    {
      $method = request()->has('id') ? 'put' : 'post';
      $id = request()->has('id') ? '/' . request()->get('id') : '';
      return $this->jsonResponse(
        $this->api('schedule' . $id)
          ->setBody(request()->except('id'))
          ->{$method}()
      );
    }

    /**
     * Get e-form resources from api
     * @return \Illuminate\Http\Response
     */
    public function eFormList()
    {
        return $this->jsonResponse(
          $this->api('eforms')
            ->setQuery([
                'limit' => 10,
                'office_id' => $this->getUser()['branch'],
                'status' => 0
            ])->get()
        );
    }

    /**
     * Set Guzzle headers with token and pn
     * @param  string $url
     * @return Clint
     */
    private function api($url)
    {
        $user = $this->getUser();
        return Client::setEndpoint($url)
            ->setHeaders([
                'Authorization' => $user['token'],
                'pn' => $user['pn']
            ]);
    }
}
