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
        $contents = array();
        if (count($properties['contents'])>0) {
            foreach ($properties['contents']['data'] as $key => $prop) {
                $prop['text'] = $prop['prop_name'];
                $prop['id'] = $prop['prop_id'];
                $properties['contents']['data'][$key] = $prop;
            }
            $contents = $properties['contents'];
        }

        return response()->json(['properties' => $contents ]);
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
        $contents = array();
        if (count($types['contents'])>0) {
            foreach ($types['contents']['data'] as $key => $type) {
                $type['text'] = $type['name'];
                $type['id'] = $type['id'];
                $types['contents']['data'][$key] = $type;
            }
            $contents = $types['contents'];
        }

        return response()->json(['types' => $contents ]);
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
        $contents = array();
        if (count($units['contents'])>0) {
            foreach ($units['contents']['data'] as $key => $type) {
                $type['text'] = $type['address'];
                $type['id'] = $type['id'];
                $units['contents']['data'][$key] = $type;
            }
            $contents = $units['contents'];
        }

        return response()->json(['units' => $contents ]);
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
        $contents = array();
        if (count($cities['contents'])>0) {
            foreach ($cities['contents']['data'] as $key => $city) {
                $city['text'] = $city['name'];
                // $city['id'] = $city['name'];
                $cities['contents']['data'][$key] = $city;
            }
            $contents = $cities['contents'];
        }

        return response()->json(['cities' => $contents ]);
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
        $contents = array();
        if (count($jobs['contents'])>0) {
            foreach ($jobs['contents']['data'] as $key => $job) {
                $job['text'] = $job['name'];
                $jobs['contents']['data'][$key] = $job;
            }
            $contents = $jobs['contents'];
        }

        return response()->json(['jobs' => $contents ]);
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
        $contents = array();
        if (count($job_types['contents'])>0) {
            foreach ($job_types['contents']['data'] as $key => $type) {
                $type['text'] = $type['name'];
                $job_types['contents']['data'][$key] = $type;
            }
            $contents = $job_types['contents'];
        }

        return response()->json(['job_types' => $contents ]);
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
        $contents = array();
        if (count($job_fields['contents'])>0) {
            foreach ($job_fields['contents']['data'] as $key => $field) {
                $field['text'] = $field['name'];
                $job_fields['contents']['data'][$key] = $field;
            }
            $contents = $job_fields['contents'];
        }

        return response()->json(['job_fields' => $contents ]);
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
        $contents = array();
        if (count($positions['contents'])>0) {
            foreach ($positions['contents']['data'] as $key => $position) {
                $position['text'] = $position['name'];
                $positions['contents']['data'][$key] = $position;
            }
            $contents = $positions['contents'];
        }

        return response()->json(['positions' => $contents ]);
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
        $contents = array();
        if (count($citizenship['contents'])>0) {
            foreach ($citizenship['contents']['data'] as $key => $czen) {
                $czen['text'] = $czen['name'];
                $citizenship['contents']['data'][$key] = $czen;
            }
            $contents = $citizenship['contents'];
        }

        return response()->json(['citizenship' => $contents]);
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
        $contents = array();
        if (count($kppType['contents'])>0) {
            foreach ($kppType['contents']['data'] as $key => $czen) {
                $czen['text'] = $czen['name'];
                $kppType['contents']['data'][$key] = $czen;
            }
            $contents = $kppType['contents'];
        }

        return response()->json(['kppType' => $contents ]);
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
        $contents = array();
        if (count($typeFinanced['contents'])>0) {
            foreach ($typeFinanced['contents']['data'] as $key => $czen) {
                $czen['text'] = $czen['name'];
                $typeFinanced['contents']['data'][$key] = $czen;
            }
            $contents = $typeFinanced['contents'];
        }

        return response()->json(['typeFinanced' => $contents ]);
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
        $contents = array();
        if (count($economySector['contents'])>0) {
            foreach ($economySector['contents']['data'] as $key => $czen) {
                $czen['text'] = $czen['name'];
                $economySector['contents']['data'][$key] = $czen;
            }
            $contents = $economySector['contents'];
        }

        return response()->json(['economySector' => $contents ]);
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
        $contents = array();
        if (count($projectList['contents'])>0) {
            foreach ($projectList['contents']['data'] as $key => $czen) {
                $czen['text'] = $czen['name'];
                $projectList['contents']['data'][$key] = $czen;
            }
            $contents = $projectList['contents'];
        }    

        return response()->json(['projectList' => $contents]);
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
        $contents = array();
        if (count($programList['contents'])>0) {
            foreach ($programList['contents']['data'] as $key => $czen) {
                $czen['text'] = $czen['name'];
                $programList['contents']['data'][$key] = $czen;
            }
            $contents = $programList['contents'];
        }

        return response()->json(['programList' => $contents]);
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

        $contents = array();
        if (count($useReason['contents'])>0) {
            foreach ($useReason['contents']['data'] as $key => $czen) {
                $czen['text'] = $czen['name'];
                $useReason['contents']['data'][$key] = $czen;
                }
            $contents = $useReason['contents'];
        }

        return response()->json(['useReason' => $contents]);
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
        $contents = array();
        if ( count($staffs['contents'])>0){
            foreach ($staffs['contents']['data'] as $key => $staff) {
                if ($staff['id'] = $staff['id']) {
                    $staff['text'] = $staff['name'];
                    $staffs['contents']['data'][$key] = $staff;
                }
            }
            $contents = $staffs['contents'];
        }

        return response()->json(['staffs' => $contents]);
    }

    /**
     * Get Insurance List
     *
     * @return \Illuminate\Http\Response
     */
    public function getInsurance(Request $request)
    {
        $data = $this->getUser();

        $insurances = Client::setEndpoint('insurance-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page'),
            ])
            ->get();
        $contents = array();
        if ( count($insurances['contents'])>0){
            foreach ($insurances['contents']['data'] as $key => $insurance) {
                if ($insurance['id'] = $insurance['id']) {
                    $insurance['text'] = $insurance['name'];
                    $insurances['contents']['data'][$key] = $insurance;
                }
            }
            $contents = $insurances['contents'];
        }

        return response()->json(['insurances' => $contents]);
    }

    /**
     * Get Appraiser List
     *
     * @return \Illuminate\Http\Response
     */
    public function getAppraiser(Request $request)
    {
        $data = $this->getUser();

        $appraisers = Client::setEndpoint('appraiser-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page'),
            ])
            ->get();
        $contents = array();
        if ( count($appraisers['contents'])>0){
            foreach ($appraisers['contents']['data'] as $key => $appraiser) {
                if ($appraiser['id'] = $appraiser['id']) {
                    $appraiser['text'] = $appraiser['name'];
                    $appraisers['contents']['data'][$key] = $appraiser;
                }
            }
            $contents = $appraisers['contents'];
        }

        return response()->json(['appraisers' => $contents]);
    }

    /**
     * Get Appraiser List
     *
     * @return \Illuminate\Http\Response
     */
    public function getZipCode(Request $request)
    {
        \Log::info($request);
        $data = $this->getUser();

        $zipcodes = Client::setEndpoint('zipcode-list')
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                // , 'auditaction' => 'action name'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
            ->setQuery([
                'search' => $request->input('search'),
                'page' => $request->input('page'),
            ])
            ->get();
        $contents = array();
        if ( count($zipcodes['contents'])>0){
            foreach ($zipcodes['contents']['data'] as $key => $zipcode) {
                if ($zipcode['id'] = $zipcode['id']) {
                    $zipcode['text'] = $zipcode['kota'];
                    $zipcodes['contents']['data'][$key] = $zipcode;
                }
            }
            $contents = $zipcodes['contents'];
        }

        return response()->json(['zipcodes' => $contents]);
    }
}
