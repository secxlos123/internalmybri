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
        try {
          $requestMonth = \Carbon\Carbon::createFromFormat('Y-m-d', request()->get('start'));
          $response = $this->api('schedule')
              ->setQuery([
                'month' => $requestMonth->month,
                'year' => $requestMonth->year
              ])->get();
          if ($response['code'] && $response['code'] === 200) {
            $schedules = collect($response['contents']['data']);
            $schedules = $schedules->map(function($schedule) {
              $map = $schedule;
              $map['origin_title'] = $schedule['title'];
              $map['title'] = $schedule['ref_number'];
              $map['start'] = $schedule['appointment_date'];
              return $map;
            });
            return $this->jsonResponse($schedules);
          } else {
            throw new \Exception("Error Processing Request", 400);
          }

          throw new \Exception("Error Processing Request", 400);
        } catch (\Exception $e) {
          info($e->getMessage());
          throw new \RuntimeException;
        }
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
    public function eFormList(Request $request)
    {
        return $this->jsonResponse(
          $this->api('eforms')
            ->setQuery([
                'limit' => 10
                , 'office_id' => $this->getUser()['branch']
                , 'status' => 0
                , 'ref_number' => $request->input('term')['term']
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
                'Authorization' => $user['token']
                , 'pn' => $user['pn']
                // , 'auditaction' => 'action name'
                // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ]);
    }
}
