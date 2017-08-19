<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $offices = \Client::setEndpoint('offices')
            ->setHeaders(['Authorization' => session('user.data.token')])
            ->setQuery([
                'city_id' => $request->input('citi_id'),
                'page' => $request->input('page'),
                'name' => $request->input('name'),
            ])->get();

        foreach ($offices['offices']['data'] as $key => $office) {
            $office['text'] = $office['name'];
            $offices['offices']['data'][$key] = $office;
        }

        return response()->json(['offices' => $offices['offices']]);
    }
}
