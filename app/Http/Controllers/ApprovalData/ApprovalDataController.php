<?php

namespace App\Http\Controllers\ApprovalData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Client;

class ApprovalDataController extends Controller
{
    protected $columns = [
        'company_name',
        'address',
        'city_id',
        'mobile_phone',
        'action',
    ];

    protected $thirdcolumns = [
        'name',
        'address',
        'city_id',
        'mobile_phone',
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
    public function indexApprovalDeveloper()
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        return view('internals.approval-data.developer.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewApprovalDeveloper($id)
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        $detailData = Client::setEndpoint('approval-data-change/developer/'.$id)
                        ->setQuery(['limit' => 100])
                        ->setHeaders(['Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                        ->get();

        $detail = $detailData['contents'];
        // dd($detail);
        return view('internals.approval-data.developer.approval-form', compact('data', 'detail'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApprovalThirdParty()
    {
        /* GET UserLogin Data */
        $data = $this->getUser();

        return view('internals.approval-data.third-party.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewApprovalThirdParty($id)
    {
        $data = $this->getUser();
        $detailData = Client::setEndpoint('approval-data-change/thirdparty/'.$id)
                        ->setQuery(['limit' => 100])
                        ->setHeaders(['Authorization' => $data['token'],
                                      'pn' => $data['pn']
                                    ])
                        ->get();

        $detail = $detailData['contents'];
        // dd($detail);

        return view('internals.approval-data.third-party.approval-form', compact('data', 'detail'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postApprovalDataDeveloper(Request $request)
    {
        $status = ($request->is_approved == 'true') ? 'approve' : 'reject';

        $data = $this->getUser();
        $detailData = Client::setEndpoint('approval-data-change/developer/'.$status.'/'.$request->id)
                    ->setHeaders(['Authorization' => $data['token'],
                                  'pn' => $data['pn']
                                ])
                    ->post();
                    dd($detailData);

        if($detailData['code'] == 200){
            \Session::flash('success', 'Data berhasil diapprove!');
            return redirect()->route('approveDeveloper');
        }else{
            \Session::flash('error', 'Data gagal diapprove! - '.$detailData['descriptions']);
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postApprovalDataThirdParty(Request $request)
    {
        $status = ($request->is_approved == 'true') ? 'approve' : 'reject';
        
        $data = $this->getUser();
        $detailData = Client::setEndpoint('approval-data-change/thirdparty/'.$status.'/'.$request->id)
                    ->setHeaders(['Authorization' => $data['token'],
                                  'pn' => $data['pn']
                                ])
                    ->post();

        if($detailData['code'] == 200){
            \Session::flash('success', 'Data berhasil diapprove!');
            return redirect()->route('approveThirdParty');
        }else{
            \Session::flash('error', 'Data gagal diapprove! - '.$detailData['descriptions']);
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display a listing of the resource developer.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatableDeveloper(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();

        $approvals = Client::setEndpoint('approval-data-change/developer')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'      => (int) $request->input('page') + 1,
                ])->get();
        foreach ($approvals['contents']['data'] as $key => $approval) {
            $approval['city_id'] = $approval['city']['name'];
            $approval['address'] = $approval['address'];
            $approval['mobile_phone'] = $approval['mobile_phone'];

            $approval['action'] = view('internals.layouts.actions', [
                'show' => route('getApproveDeveloper', $approval['id']),
            ])->render();
            $approvals['contents']['data'][$key] = $approval;
        }

        $approvals['contents']['draw'] = $request->input('draw');
        $approvals['contents']['recordsTotal'] = $approvals['contents']['total'];
        $approvals['contents']['recordsFiltered'] = $approvals['contents']['total'];

        return response()->json($approvals['contents']);
    }

    /**
     * Display a listing of the resource third-party.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatableThirdParty(Request $request)
    {
        $sort = $request->input('order.0');
        $data = $this->getUser();

        $approvals = Client::setEndpoint('approval-data-change/third-party')
                ->setHeaders([
                    'Authorization' => $data['token'],
                    'pn' => $data['pn']
                ])->setQuery([
                    'limit'     => $request->input('length'),
                    'search'    => $request->input('search.value'),
                    'sort'      => $this->columns[$sort['column']] .'|'. $sort['dir'],
                    'page'      => (int) $request->input('page') + 1,
                ])->get();
        foreach ($approvals['contents']['data'] as $key => $approval) {
            $approval['city_id'] = $approval['city']['name'];
            $approval['address'] = $approval['address'];
            $approval['mobile_phone'] = $approval['related']['phone_number'];
            $approval['company_name'] = $approval['related']['name'];

            $approval['action'] = view('internals.layouts.actions', [
                'show' => route('getApproveThirdParty', $approval['id']),
            ])->render();
            $approvals['contents']['data'][$key] = $approval;
        }

        $approvals['contents']['draw'] = $request->input('draw');
        $approvals['contents']['recordsTotal'] = $approvals['contents']['total'];
        $approvals['contents']['recordsFiltered'] = $approvals['contents']['total'];

        return response()->json($approvals['contents']);
    }
}
