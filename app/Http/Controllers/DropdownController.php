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
	        	'Authorization' => $data['token']
	        	, 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
        	])
            ->setQuery([
                'dev_id' => $request->input('dev_id'),
                'search' => $request->input('name'),
                'page'   => $request->input('page')
            ])
            ->get();
            // dd($properties);

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
	        	'Authorization' => $data['token']
	        	, 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
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
	        	'Authorization' => $data['token']
	        	, 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
        	])
            ->setQuery([
                'property_type_id' => $request->input('prop_type_id'),
                'search' => $request->input('name'),
                'page'   => $request->input('page'),
                'is_available' => true
            ])
            ->get();

        foreach ($units['contents']['data'] as $key => $type) {
            $type['text'] = $type['address'];
            $type['id'] = $type['id'];
            $units['contents']['data'][$key] = $type;
        }

        return response()->json(['units' => $units['contents']]);
    }

    public function birth_place(Request $request)
    {
        $data = $this->getUser();
        $cities = \Client::setEndpoint('cities')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($cities['contents']['data'] as $key => $city) {
            $city['text'] = $city['name'];
            // $city['id'] = $city['name'];
            $cities['contents']['data'][$key] = $city;
        }

        return response()->json(['cities' => $cities['contents']]);
    }

    public function jobs(Request $request)
    {
        $data = $this->getUser();
        $jobs = \Client::setEndpoint('job-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($jobs['contents']['data'] as $key => $job) {
            $job['text'] = $job['name'];
            $jobs['contents']['data'][$key] = $job;
        }

        return response()->json(['jobs' => $jobs['contents']]);
    }

    public function job_types(Request $request)
    {
        $data = $this->getUser();
        $job_types = \Client::setEndpoint('job-type-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($job_types['contents']['data'] as $key => $type) {
            $type['text'] = $type['name'];
            $job_types['contents']['data'][$key] = $type;
        }

        return response()->json(['job_types' => $job_types['contents']]);
    }

    public function job_fields(Request $request)
    {
        $data = $this->getUser();
        $job_fields = \Client::setEndpoint('job-field-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($job_fields['contents']['data'] as $key => $field) {
            $field['text'] = $field['name'];
            $job_fields['contents']['data'][$key] = $field;
        }

        return response()->json(['job_fields' => $job_fields['contents']]);
    }

    public function positions(Request $request)
    {
        $data = $this->getUser();
        $positions = \Client::setEndpoint('positions')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($positions['contents']['data'] as $key => $position) {
            $position['text'] = $position['name'];
            $positions['contents']['data'][$key] = $position;
        }

        return response()->json(['positions' => $positions['contents']]);
    }

    public function citizenship(Request $request)
    {
        $data = $this->getUser();
        $citizenship = \Client::setEndpoint('citizenship-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($citizenship['contents']['data'] as $key => $czen) {
            $czen['text'] = $czen['name'];
            $citizenship['contents']['data'][$key] = $czen;
        }

        return response()->json(['citizenship' => $citizenship['contents']]);
    }

    public function kppTypeList(Request $request)
    {
        $data = $this->getUser();
        $kppType = \Client::setEndpoint('kpp-type-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($kppType['contents']['data'] as $key => $czen) {
            $czen['text'] = $czen['name'];
            $kppType['contents']['data'][$key] = $czen;
        }

        return response()->json(['kppType' => $kppType['contents']]);
    }

    public function typeFinanced(Request $request)
    {
        $data = $this->getUser();
        $typeFinanced = \Client::setEndpoint('list-jenis-dibiayai')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($typeFinanced['contents']['data'] as $key => $czen) {
            $czen['text'] = $czen['name'];
            $typeFinanced['contents']['data'][$key] = $czen;
        }

        return response()->json(['typeFinanced' => $typeFinanced['contents']]);
    }

    public function economySectors(Request $request)
    {
        $data = $this->getUser();
        $economySector = \Client::setEndpoint('economy-sectors')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page'),
                'limit' => 5
            ])
            ->get();

        foreach ($economySector['contents']['data'] as $key => $czen) {
            $czen['text'] = $czen['name'];
            $economySector['contents']['data'][$key] = $czen;
        }

        return response()->json(['economySector' => $economySector['contents']]);
    }

    public function projectList(Request $request)
    {
        $data = $this->getUser();
        $projectList = \Client::setEndpoint('project-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($projectList['contents']['data'] as $key => $czen) {
            $czen['text'] = $czen['name'];
            $projectList['contents']['data'][$key] = $czen;
        }

        return response()->json(['projectList' => $projectList['contents']]);
    }

    public function programList(Request $request)
    {
        $data = $this->getUser();
        $programList = \Client::setEndpoint('program-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($programList['contents']['data'] as $key => $czen) {
            $czen['text'] = $czen['name'];
            $programList['contents']['data'][$key] = $czen;
        }

        return response()->json(['programList' => $programList['contents']]);
    }

    public function useReason(Request $request)
    {
        $data = $this->getUser();
        $useReason = \Client::setEndpoint('use-reasons')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($useReason['contents']['data'] as $key => $czen) {
            $czen['text'] = $czen['name'];
            $useReason['contents']['data'][$key] = $czen;
        }

        return response()->json(['useReason' => $useReason['contents']]);
    }

    /**
     * Get Staff Collateral
     *
     * @return \Illuminate\Http\Response
     */
    public function getStaff(Request $request)
    {
        $data = $this->getUser();

        $staffs = Client::setEndpoint('staff-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setQuery([
                'name' => $request->input('name'),
                'page' => $request->input('page'),
                'region_id' => $request->input('region_id')
            ])
            ->get();

        if(!empty($staffs)){
            foreach ($staffs['contents']['data'] as $key => $staff) {
                if ($staff['id'] = $staff['id']) {
                    $staff['text'] = $staff['name'];
                    $staffs['contents']['data'][$key] = $staff;
                }
            }
            $contents = $staffs['contents'];
        }else{
            $contents = [];
        }

        return response()->json(['staffs' => $contents]);
    }
}
