@section('title','MyBRI - List Approval Pengajuan Properti Baru')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style media="screen">
  .panel-head{
    background-color: #00529C;
    color: #fff;
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    padding: 10px 20px;
  }
  .panel-head span{
    color: #f7941e;
  }
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Marketing</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Home MyBRI</a>
                            </li>
                            <li class="active">
                                Marketing
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">{{ \Session::get('success') }}</div>
                    @endif
                    <div class="card-box ">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#kelolaan" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-users"></i></span>
                                                <span class="hidden-xs">Kelolaan</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#crossSell" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-exchange"></i></span>
                                                <span class="hidden-xs">Cross Sell</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#myBri" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-check-square"></i></span>
                                                <span class="hidden-xs">My BRI</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#cpp" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-ban"></i></span>
                                                <span class="hidden-xs">CPP</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#referral" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-ban"></i></span>
                                                <span class="hidden-xs">Referral</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="kelolaan">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              @foreach($kelolaans as $kl)
                                                              <a href="{{url('/leads_detail?cif='.$kl['CIFNO']).'&nik='.''}}">
                                                                <div class="col-md-12">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-head">
                                                                      <div class="row">
                                                                        <div class="col-md-6">

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                          <div class="text-right"></div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                      <div class="actvity_type">{{$kl['short_name']}}</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </a>
                                                              @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="crossSell">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              @foreach($leads as $l)
                                                              <a href="{{url('/leads_detail?cif='.$l['CIF']).'&nik='.''}}">
                                                                <div class="col-md-12">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-head">
                                                                      <div class="row">
                                                                        <div class="col-md-6">

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                          <div class="text-right"></div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                      <div class="actvity_type">{{$l['nama']}}</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </a>
                                                              @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="myBri">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              @foreach($customers as $c)
                                                              <a href="{{url('/leads_detail?cif='.''.'&nik='.$c['nik'])}}">
                                                                <div class="col-md-12">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-head">
                                                                      <div class="row">
                                                                        <div class="col-md-6">

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                          <div class="text-right"></div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                      <div class="actvity_type">{{$c['first_name']}} {{$c['last_name']}}</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </a>
                                                              @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="cpp">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              @foreach($cpps as $c)
                                                              <a href="{{url('/leads_detail?cif='.''.'&nik='.$c['nik'])}}">
                                                                <div class="col-md-12">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-head">
                                                                      <div class="row">
                                                                        <div class="col-md-6">

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                          <div class="text-right"></div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                      <div class="actvity_type">{{$c['name']}}</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </a>
                                                              @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="referral">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                              @foreach($referrals as $r)
                                                              <a href="{{url('/leads_detail?cif='.''.'&nik='.$r['nik'])}}">
                                                                <div class="col-md-12">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-head">
                                                                      <div class="row">
                                                                        <div class="col-md-6">

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                          <div class="text-right"></div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                      <div class="actvity_type">{{$r['name']}}</div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </a>
                                                              @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
