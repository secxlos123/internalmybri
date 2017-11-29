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
                                <th>NPL</th>
                                <th>PNPL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Tanah *</th>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" name="valuation[scoring_land_date]" value="{{old('valuation[scoring_land_date]')}}" id="scoring_land_date">
                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[npw_land]" maxlength="50" value="{{old('valuation[npw_land]')}}" id="npw_land">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[nl_land]" maxlength="50" value="{{old('valuation[nl_land]')}}" id="nl_land">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[pnpw_land]" maxlength="50" value="{{old('valuation[pnpw_land]')}}" id="pnpw_land">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>  
                                        <input type="text" class="form-control currency-rp" name="valuation[pnl_land]" maxlength="50" value="{{old('valuation[pnl_land]')}}" id="pnl_land">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Bangunan *</th>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" name="valuation[scoring_building_date]" value="{{old('valuation[scoring_building_date]')}}" id="scoring_building_date">
                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[npw_building]" maxlength="50" value="{{old('valuation[npw_building]')}}" id="npw_building">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[nl_building]" maxlength="50" value="{{old('valuation[nl_building]')}}" id="nl_building">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[pnpw_building]" maxlength="50" value="{{old('valuation[pnpw_building]')}}" id="pnpw_building">
                                    </div>
                                </td>
                                <td> 
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>   
                                        <input type="text" class="form-control currency-rp" name="valuation[pnl_building]" maxlength="50" value="{{old('valuation[pnl_building]')}}" id="pnl_building">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanah dan Bangunan *</th>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" name="valuation[scoring_all_date]" value="{{old('valuation[scoring_all_date]')}}" id="scoring_all_date">
                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[npw_all]" maxlength="50" value="{{old('valuation[npw_all]')}}" id="npw_all">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[nl_all]" maxlength="50" value="{{old('valuation[nl_all]')}}" id="nl_all">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[pnpw_all]" maxlength="50" value="{{old('valuation[pnpw_all]')}}" id="pnpw_all">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon b-0">Rp</i></span>
                                        <input type="text" class="form-control currency-rp" name="valuation[pnl_all]" maxlength="50" value="{{old('valuation[pnl_all]')}}" id="pnl_all">
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