<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 5 Penilaian</b></h4>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Objek</th>
                                <th>Tanggal Penilaian</th>
                                <th>NPW</th>
                                <th>PNPW</th>
                                <th>NL</th>
                                <th>PNL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Tanah * </th>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" name="valuation[scoring_land_date]" value="{{ $collateral['ots_valuation']['scoring_land_date'] ? $collateral['ots_valuation']['scoring_land_date'] : old('valuation.scoring_land_date')}}" id="scoring_land_date">
                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[npw_land]" maxlength="50" value="{{ $collateral['ots_valuation']['npw_land'] ? $collateral['ots_valuation']['npw_land'] : old('valuation.npw_land')}}" id="npw_land">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[pnpw_land]" maxlength="50" value="{{ $collateral['ots_valuation']['pnpw_land'] ? $collateral['ots_valuation']['pnpw_land'] : old('valuation.pnpw_land')}}" id="pnpw_land">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[nl_land]" maxlength="50" value="{{ $collateral['ots_valuation']['nl_land'] ? $collateral['ots_valuation']['nl_land'] : old('valuation.nl_land')}}" id="nl_land">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>  
                                        <input type="text" class="form-control currency-rp" name="valuation[pnl_land]" maxlength="50" value="{{ $collateral['ots_valuation']['pnl_land'] ? $collateral['ots_valuation']['pnl_land'] : old('valuation.pnl_land')}}" id="pnl_land">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Bangunan * </th>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" name="valuation[scoring_building_date]" value="{{ $collateral['ots_valuation']['scoring_building_date'] ? $collateral['ots_valuation']['scoring_building_date'] : old('valuation.scoring_building_date')}}" id="scoring_building_date">
                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[npw_building]" maxlength="50" value="{{ $collateral['ots_valuation']['npw_building'] ? $collateral['ots_valuation']['npw_building'] : old('valuation.npw_building')}}" id="npw_building">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[pnpw_building]" maxlength="50" value="{{ $collateral['ots_valuation']['pnpw_building'] ? $collateral['ots_valuation']['pnpw_building'] : old('valuation.pnpw_building')}}" id="pnpw_building">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[nl_building]" maxlength="50" value="{{ $collateral['ots_valuation']['nl_building'] ? $collateral['ots_valuation']['nl_building'] : old('valuation.nl_building')}}" id="nl_building">
                                    </div>
                                </td>
                                <td> 
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>   
                                        <input type="text" class="form-control currency-rp" name="valuation[pnl_building]" maxlength="50" value="{{ $collateral['ots_valuation']['pnl_building'] ? $collateral['ots_valuation']['pnl_building'] : old('valuation.pnl_building')}}" id="pnl_building">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanah dan Bangunan * </th>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" name="valuation[scoring_all_date]" value="{{ $collateral['ots_valuation']['scoring_all_date'] ? $collateral['ots_valuation']['scoring_all_date'] : old('valuation.scoring_all_date')}}" id="scoring_all_date">
                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[npw_all]" maxlength="50" value="{{ $collateral['ots_valuation']['npw_all'] ? $collateral['ots_valuation']['npw_all'] : old('valuation.npw_all')}}" id="npw_all" readonly="">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[pnpw_all]" maxlength="50" value="{{ $collateral['ots_valuation']['pnpw_all'] ? $collateral['ots_valuation']['pnpw_all'] : old('valuation.pnpw_all')}}" id="pnpw_all" readonly="">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[nl_all]" maxlength="50" value="{{ $collateral['ots_valuation']['nl_all'] ? $collateral['ots_valuation']['nl_all'] : old('valuation.nl_all')}}" id="nl_all" readonly="">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[pnl_all]" maxlength="50" value="{{ $collateral['ots_valuation']['pnl_all'] ? $collateral['ots_valuation']['pnl_all'] : old('valuation.pnl_all')}}" id="pnl_all" readonly="">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-md-6">
                        <div class="form-group ">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>