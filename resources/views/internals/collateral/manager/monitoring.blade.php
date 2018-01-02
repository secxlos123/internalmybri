@section('title','My BRI - Monitoring Collateral Properti')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style>
.distance{
    margin-bottom: 10px;
}
.icon-distance{
    margin-bottom: 30px;
}
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <!-- header -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Collateral Checklist</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dasboard</a>
                            </li>
                            <li>
                                <a href="{{route('collateral.index')}}">List Pengajuan Properti Baru</a>
                            </li>
                            <li class="active">
                                Collateral Checklist
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- contains -->
            <div class="row">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="card-box m-t-30">
                        <h4 class="m-t-min30 m-b-30 header-title custom-title">Collateral Checklist</h4>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="distance">Checklist Agunan</label>
                                    <div class="form-horizontal" role="form">
                                        <ol>
                                            <li><p>Pengikatan Agunan : </p></li>
                                            <li>
                                                <p>Penutupan Asuransi : </p>
                                                <ol type="a">
                                                    <li class="distance">Polis Asuransi Agunan </li>
                                                    <li class="distance">Polis Asuransi Jiwa </li>
                                                </ol>
                                            </li>
                                            <li>
                                                <p>Kelengkapan Dokumen : </p>
                                                <ol type="a">
                                                    <li class="distance">SHM / SHGB / SHMRS </li>
                                                    <li class="distance">IMB </li>
                                                    <li class="distance">AJB / PPJB </li>
                                                    <li class="distance">PBB </li>
                                                    <li class="distance">NJOP </li>
                                                </ol>
                                            </li>
                                            <li>
                                                <p>Retensi : </p>
                                                <ol type="a">
                                                    <li class="distance">Progress 1 </li>
                                                    <li class="distance">Progress 2 </li>
                                                    <li class="distance">Progress 3 </li>
                                                    <li class="distance">Progress 4 </li>
                                                    <li class="distance">Progress 5 </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="distance">Status Agunan</label>
                                    <div class="form-horizontal" role="form">
                                        <ul style="list-style-type:none">
                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['collateral_binding_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li class="icon-distance"></li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['collateral_insurance_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['life_insurance_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li class="icon-distance"></li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['ownership_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['building_permit_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['sales_law_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['property_tax_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['sale_value_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li class="icon-distance"></li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['progress_one_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['progress_two_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['progress_three_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['progress_four_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                            <li>@if(strpos($detailCollateral['contents']['ots_doc']['progress_five_doc'], 'noimage') == false)<i class="fa fa-check-circle text-info fa-2x"></i> @else <i class="fa fa-times-circle text-danger fa-2x"></i>@endif</li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="distance"></label>
                                    <div class="form-horizontal" role="form">
                                        <h4><b>Presentase</b></h4>
                                        <h1>{{$percent}}%</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{URL::previous()}}" class="btn btn-default waves-light waves-effect w-md m-b-20 pull-right">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')