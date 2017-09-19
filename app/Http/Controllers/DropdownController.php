<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;

class DropdownController extends Controller
{

	public function getUser()
	{
		/* GET UserLogin Data */
		$users = session()->get('user');
		
		foreach ($users as $user) {
			$data = $user;
		}

		return $data;
	}

    public function properties(Request $request)
    {
        $data = $this->getUser();
        
        $properties = Client::setEndpoint('dropdown/properties')
        	->setHeaders([
	        	'Authorization' => $data['token'],
	        	'pn' => $data['pn']
        	])
            ->setQuery([
                'dev_id' => $request->input('dev_id'),
                'search' => $request->input('name'),
                'page'   => $request->input('page')
            ])
            ->get();

        foreach ($properties['contents']['data'] as $key => $prop) {
            $prop['text'] = $prop['prop_name'];
            $prop['id'] = $prop['prop_id'];
            $properties['contents']['data'][$key] = $prop;
        }

        return response()->json(['properties' => $properties['contents']]);
    }

    public function types(Request $request)
    {
        $data = $this->getUser();
        
        $types = Client::setEndpoint('dropdown/types')
        	->setHeaders([
	        	'Authorization' => $data['token'],
	        	'pn' => $data['pn']
        	])
            ->setQuery([
                'property_id' => $request->input('prop_id'),
                'search' => $request->input('name'),
                'page'   => $request->input('page')
            ])
            ->get();

        foreach ($types['contents']['data'] as $key => $type) {
            $type['text'] = $type['name'];
            $type['id'] = $type['id'];
            $types['contents']['data'][$key] = $type;
        }

        return response()->json(['types' => $types['contents']]);
    }

    public function units(Request $request)
    {
        $data = $this->getUser();
        
        $units = Client::setEndpoint('dropdown/units')
        	->setHeaders([
	        	'Authorization' => $data['token'],
	        	'pn' => $data['pn']
        	])
            ->setQuery([
                'property_type_id' => $request->input('prop_type_id'),
                'search' => $request->input('name'),
                'page'   => $request->input('page')
            ])
            ->get();

        foreach ($units['contents']['data'] as $key => $type) {
            $type['text'] = $type['address'];
            $type['id'] = $type['id'];
            $units['contents']['data'][$key] = $type;
        }

        return response()->json(['units' => $units['contents']]);
    }
}
