@if(isset($detail) && isset($customer))
        <div class="row">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Pengajuan</h3>
                        </div>
                        <!-- data pengajuan-->
                        <div class="panel-body">
                            @include('internals.eform.approval._eform-data')
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Nasabah</h3>
                        </div>
                        <!-- data nasabah -->
                        <div class="panel-body">
                            @include('internals.eform.approval._customer-personal')
                            <hr>

                            @if($detail['customer']['personal']['status_id'] == 2)
                            <!--pasangan-->
                            @include('internals.eform.approval._customer-couple')
                            <hr>
                            @endif

                            <!--pekerjaan-->
                            @include('internals.eform.approval._customer-work')
                            <hr>

                            <!-- finansial -->
                            @include('internals.eform.approval._customer-financial')
                            <hr>

                            <!-- family -->
                            @include('internals.eform.approval._customer-family')
                            <hr>

                            <!-- identity -->
                            @include('internals.eform.approval._customer-identity')
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Kunjungan LKN</h3>
                        </div>
                        <!-- data lkn -->
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-visit')
                        </div>
                        <div class="panel-body">
                            @include('internals.collateral.manager._income-customer')
                        </div>
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-kpp')
                        </div>
                        @if (isset($detail['visit_report']['mutation']))
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-mutation')
                        </div>
                        @endif
                        @if(($detail['visit_report']['use_reason'] == 2)||($detail['visit_report']['use_reason'] == 18))
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-investigate')
                        </div>
                        @endif
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-analist')
                        </div>
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-recommend')
                        </div>
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-common')
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Informasi Penilaian</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-5 control-label">Tanggal Penilaian NPW Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_valuation']['scoring_land_date']}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">NPW Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['npw_land'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['npw_land']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">NL Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['nl_land'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['nl_land']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNPW Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['pnpw_land'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['pnpw_land']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNL Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['pnl_land'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['pnl_land']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Tanggal Penilaian NPW Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_valuation']['scoring_building_date']}} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">NPW Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['npw_building'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['npw_building']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">NL Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['nl_building'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['nl_building']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNPW Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['pnpw_building'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['pnpw_building']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNL Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['pnl_building'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['pnl_building']))}} @endif</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-5 control-label">Tanggal Penilaian NPW Tanah & Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_valuation']['scoring_all_date']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">NPW Tanah & Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['npw_all'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['npw_all']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">NL Tanah & Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['nl_all'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['nl_all']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNPW Tanah & Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['pnpw_all'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['pnpw_all']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNL Tanah & Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if(!empty($collateral['ots_valuation']['pnl_all'])) Rp {{number_format(str_replace('.','',$collateral['ots_valuation']['pnl_all']))}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label"></label>
                        <a href="javascript:void(0);" id="view-detail"><label class="col-md-7 control-label" style="cursor: pointer;">+ Lihat informasi lain</label></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>