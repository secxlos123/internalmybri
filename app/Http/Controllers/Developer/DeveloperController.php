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
        // 'company_name',
        'name',
        'email',
        'phone_number',
        'city_name',
        'project',
        // 'is_actived',
        'action',
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
            $inputData[] = [
                      'name'     => $index,
                      'contents' => $req
                    ];
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
        $newDev = $this->devRequest($request, $data);
        
        $client = Client::setEndpoint('developer')
           ->setHeaders(['Authorization' => $data['token']])
           ->setBody($newDev)
           ->post('multipart');
        
        if($client['status']['succeded'] == true){
            \Session::flash('success', 'Data Developer sudah disimpan.');
            return redirect()->route('developers.index');
        }else{
            \Session::flash('error', 'Kesalahan input.');
            return redirect()->back();
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
        $userData = Client::setEndpoint('developer/'.$id)->setQuery(['limit' => 100])->setHeaders(['Authorization' => $data['token']])->get();
        
        $dataDev = $userData['data'];

        return view('internals.developers.detail', compact('data', 'dataDev'));
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
        $userData = Client::setEndpoint('developer/'.$id)->setQuery(['limit' => 100])->setHeaders(['Authorization' => $data['token']])->get();
        
        $dataDev = $userData['data'];

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
           ->setHeaders(['Authorization' => $data['token']])
           ->setBody($newDev)
           ->put('multipart');

        if($client['status']['succeded'] == true){
            \Session::flash('success', 'Data Developer sudah diubah.');
            return redirect()->route('developers.index');
        }else{
            \Session::flash('error', 'Kesalahan input.');
            return redirect()->back();
        }
        
        return view('internals.developers.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();
        $developers = Client::setEndpoint('developer')
                ->setHeaders(['Authorization' => $data['token']])
                ->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'city_id' => $request->input('city_id'),
                    'page'      => (int) $request->input('page') + 1
                ])->get();

        foreach ($developers['developers']['data'] as $key => $developer) {
            $developer['action'] = view('internals.layouts.actions', [
                'edit' => route('developers.edit', $developer['dev_id']),
                'show' => route('developers.show', $developer['dev_id']),
            ])->render();
            $developers['developers']['data'][$key] = $developer;
        }

        $developers['developers']['draw'] = $request->input('draw');
        $developers['developers']['recordsTotal'] = $developers['developers']['total'];
        $developers['developers']['recordsFiltered'] = $developers['developers']['total'];

        return response()->json($developers['developers']);
    }
}
