<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $cities = \Client::setEndpoint('cities')
            ->setHeaders(['Authorization' => session('user.data.token')])
            ->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($cities['cities']['data'] as $key => $city) {
            $city['text'] = $city['name'];
            $cities['cities']['data'][$key] = $city;
        }

        return response()->json(['cities' => $cities['cities']]);
    }
}
