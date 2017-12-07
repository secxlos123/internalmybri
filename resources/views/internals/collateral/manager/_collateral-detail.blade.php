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
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['npw_land'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">NL Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['nl_land'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNPW Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['pnpw_land'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNL Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['pnl_land'], 2, ",", ".")}}</p>
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
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['npw_building'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">NL Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['nl_building'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNPW Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['pnpw_building'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNL Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['pnl_building'], 2, ",", ".")}}</p>
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
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['npw_all'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">NL Tanah & Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['nl_all'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNPW Tanah & Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['pnpw_all'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">PNL Tanah & Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp{{number_format($collateral['ots_valuation']['pnl_all'], 2, ",", ".")}}</p>
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