<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Developer\DevRequest;
use App\Http\Requests\Developer\UpdateDevRequest;
use Client;

class DeveloperController extends Controller
{

    protected $columns = [
        'name',
        'email',
        'phone_number',
        'city_name',
        'project',
        'is_actived',
        'action',
    ];

    protected $columnsProp = [
        'prop_name',
        'prop_city_name',
        'prop_types',
        'prop_items',
    ];



    public function getUser(){
     /* GET UserLogin Data */
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getUser();
        return view('internals.developers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getUser();
        return view('internals.developers.create', compact('data'));
    }

    /**
     * List of request needed for input to customer
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function devRequest($request, $data)
    {
        if(!empty($request->image)){
            $imgReq = $request->image;
                $image_path = $imgReq->getPathname();
                $image_mime = $imgReq->getmimeType();
                $image_name = $imgReq->getClientOriginalName();
                $image[] = [
                      'name'     => 'image',
                      'filename' => $image_name,
                      'Mime-Type'=> $image_mime,
                      'contents' => fopen( $image_path, 'r' ),
                    ];
        }else{
            $image[] = [
                  'name'    => "",
                  'contents'=> ""
                ];
        }

        $allReq = $request->except(['image', '_token']);
        foreach ($allReq as $index => $req) {
            if( strpos($req, ',') !== false ){
              $content = intval(preg_replace('(\D+)', '', $req));
              $inputData[] = ['name'     => $index, 'contents' => $content];
            }else{
                $inputData[] = [
                  'name'     => $index,
                  'contents' => $req
                ];
            }
        }

        $newDeveloper = array_merge($image, $inputData);

        return $newDeveloper;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevRequest $request)
    {
        $data = $this->getUser();
        $email = strtolower($request->email);
        $request->merge(['email'=>$email]);
        $newDev = $this->devRequest($request, $data);

        $client = Client::setEndpoint('developer')
           ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                , 'auditaction' => 'tambah admin dev'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
           ->setBody($newDev)
           ->post('multipart');

        if($client['code'] == 200){
            \Session::flash('success', 'Data Developer sudah disimpan.');
            return redirect()->route('developers.index');
        }elseif($client['code'] == 500){
            \Session::flash('error', 'Maaf, server sedang gangguan.');
            return redirect()->back()->withInput($request->input());
        }else{
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
        }

        return view('internals.developers.index', compact('data'));
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

         /* GET User Data */
        $userData = Client::setEndpoint('developer/'.$id)
                    ->setQuery(['limit' => 100])
                    ->setHeaders([
                        'Authorization' => $data['token']
                        , 'pn' => $data['pn']
                    ])
                    ->get();

        $dataDev = $userData['contents'];

        return view('internals.developers.detail', compact('data', 'dataDev'));
    }

    public function properties(Request $request, $id)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $developers = Client::setEndpoint("developer/{$id}/properties")
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->setQuery([
                    'limit'  => $request->input('length'),
                    'prop_city_id' => $request->input('city_id'),
                    'search' => $request->input('search.value'),
                    'sort'   => $this->columnsProp[$sort['column']] .'|'. $sort['dir'],
                    'page'   => (int) $request->input('page') + 1
                ])->get();

        $developers['contents']['draw'] = $request->input('draw');
        $developers['contents']['recordsTotal'] = $developers['contents']['total'];
        $developers['contents']['recordsFiltered'] = $developers['contents']['total'];

        return response()->json($developers['contents']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function property_detail($id)
    {
        $data = $this->getUser();

        return view('internals.developers.property-detail', compact('data', 'dataDev', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->getUser();

         /* GET User Data */
        $userData = Client::setEndpoint("developer/{$id}")
            ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
            ])
            ->get();

        $dataDev = $userData['contents'];

        return view('internals.developers.edit', compact('data', 'dataDev', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevRequest $request, $id)
    {
        $data = $this->getUser();
        $newDev = $this->devRequest($request, $data);

        $client = Client::setEndpoint('developer/'.$id)
           ->setHeaders([
                'Authorization' => $data['token']
                , 'pn' => $data['pn']
                , 'auditaction' => 'ubah admin dev'
                , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
            ])
           ->setBody($newDev)
           ->put('multipart');

        if($client['code'] == 200){
            \Session::flash('success', 'Data Developer sudah diubah.');
            return redirect()->route('developers.index');
        }else{
            $error = reset($client['contents']);
            \Session::flash('error', $client['descriptions'].' '.$error);
            return redirect()->back()->withInput($request->input());
        }

        return view('internals.developers.index', compact('data'));
    }

    /**
     * Banned account of developer
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actived(Request $request, $id)
    {
        $data = $this->getUser();
        $log = ""; 
        if(!empty($request['is_actived'])){
           $is_actived = $request['is_actived'];
           $log = ($is_actived =='true') ? 'unbanned admin dev' : 'banned admin dev';
        }
        $developers = Client::setEndpoint("developer/{$id}/actived")
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'auditaction' => $log
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])
                ->setBody(['is_actived' => filter_var($request->input('is_actived'), FILTER_VALIDATE_BOOLEAN)])
                ->put();

        return response()->json($developers['descriptions']);
    }

    /**
     * Get list of developer
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDeveloper(Request $request)
    {
        $data = $this->getUser();
        $developers = \Client::setEndpoint('developer')
            ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])
            ->setQuery([
                'search' => $request->input('name'),
                'page' => $request->input('page')
            ])
            ->get();

        foreach ($developers['contents']['data'] as $key => $dev) {
            $dev['text'] = $dev['company_name'];
            $dev['id'] = $dev['dev_id'];

            $developers['contents']['data'][$key] = $dev;
        }

        return response()->json(['developers' => $developers['contents']]);
    }

    /**
     * Get datatable source data of developer
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $developers = Client::setEndpoint('developer')
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'city_id'   => $request->input('city_id'),
                    'project'   => $request->input('project'),
                    'page'      => (int) $request->input('page') + 1,
                    'without_independent' => true
                ])->get();

        foreach ($developers['contents']['data'] as $key => $developer) {
            $developer['action'] = view('internals.layouts.actions', [
                'edit' => route('developers.edit', $developer['dev_id']),
                'show' => route('developers.show', $developer['dev_id']),
            ])->render();
            $developers['contents']['data'][$key] = $developer;
        }

        $developers['contents']['draw'] = $request->input('draw');
        $developers['contents']['recordsTotal'] = $developers['contents']['total'];
        $developers['contents']['recordsFiltered'] = $developers['contents']['total'];

        return response()->json($developers['contents']);
    }
}
