<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 5 Penilaian</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Tanggal Penilaian NPW Tanah :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-autoclose" name="valuation[scoring_land_date]" value="{{old('valuation[scoring_land_date]')}}">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">NPW Tanah :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="valuation[npw_land]" maxlength="50" value="{{old('valuation[npw_land]')}}">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">NL Tanah :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="valuation[nl_land]" maxlength="50" value="{{old('valuation[nl_land]')}}">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">PNPW Tanah :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="valuation[pnpw_land]" maxlength="50" value="{{old('valuation[pnpw_land]')}}">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">PNL Tanah :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="valuation[pnl_land]" maxlength="50" value="{{old('valuation[pnl_land]')}}">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Tanggal Penilaian NPW Bangunan :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-autoclose" name="valuation[scoring_building_date]" value="{{old('valuation[scoring_building_date]')}}">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">NPW Bangunan :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="valuation[npw_building]" maxlength="50" value="{{old('valuation[npw_building]')}}">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">NL Bangunan :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="valuation[nl_building]" maxlength="50" value="{{old('valuation[nl_building]')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">PNPW Bangunan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="valuation[pnpw_building]" maxlength="50" value="{{old('valuation[pnpw_building]')}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">PNL Bangunan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="valuation[pnl_building]" maxlength="50" value="{{old('valuation[pnl_building]')}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Tanggal Penilaian NPW Tanah & Bangunan :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="valuation[scoring_all_date]" value="{{old('valuation[scoring_all_date]')}}">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">NPW Tanah & Bangunan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="valuation[npw_all]" maxlength="50" value="{{old('valuation[npw_all]')}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">NL Tanah & Bangunan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="valuation[nl_all]" maxlength="50" value="{{old('valuation[nl_all]')}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">PNPW Tanah & Bangunan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="valuation[pnpw_all]" maxlength="50" value="{{old('valuation[pnpw_all]')}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">PNL Tanah & Bangunan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="valuation[pnl_all]" maxlength="50" value="{{old('valuation[pnl_all]')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>