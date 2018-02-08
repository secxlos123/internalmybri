@section('title','MyBRI - Auditrail')

@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style type="text/css">
    .small{
        font-size: 7.5pt;
    }
</style>

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Auditrail</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Home MyBRI</a>
                            </li>
                            <li class="active">
                                Auditrail
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active small"><a data-toggle="tab" href="#pengajuan">Pengajuan Kredit</a></li>
                        <li class="small"><a data-toggle="tab" href="#developerAdmin">Admin Developer</a></li>
                        <li class="small"><a data-toggle="tab" href="#schedule">Penjadwalan</a></li>
                        <li class="small"><a data-toggle="tab" href="#collateral">Collateral</a></li>
                        <li class="small"><a data-toggle="tab" href="#loginUser">User Login</a></li>
                        <li class="small"><a data-toggle="tab" href="#profileEdit">Profil</a></li>
                        <li class="small"><a data-toggle="tab" href="#developerAgent">Agen Developer</a></li>
                        <li class="small"><a data-toggle="tab" href="#property">Property</a></li>
                        <li class="small"><a data-toggle="tab" href="#activityUser">User Activity</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="pengajuan" class="tab-pane fade in active">
                            @include('internals.audit-rail._eform')
                        </div>
                        <div id="developerAdmin" class="tab-pane fade ">
                            @include('internals.audit-rail._developerAdmin')
                        </div>
                        <div id="schedule" class="tab-pane fade">
                            @include('internals.audit-rail._schedule')
                        </div>
                        <div id="collateral" class="tab-pane fade">
                            @include('internals.audit-rail._collateral')
                        </div>
                        <div id="loginUser" class="tab-pane fade">
                            @include('internals.audit-rail._loginUser')
                        </div>
                        <div id="profileEdit" class="tab-pane fade">
                            @include('internals.audit-rail._profilEdit')
                        </div>
                        <div id="developerAgent" class="tab-pane fade">
                            @include('internals.audit-rail._developerAgent')
                        </div>
                        <div id="property" class="tab-pane fade">
                            @include('internals.audit-rail._property')
                        </div>
                        <div id="activityUser" class="tab-pane fade">
                            @include('internals.audit-rail._activityUser')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.audit-rail.datatable-script')