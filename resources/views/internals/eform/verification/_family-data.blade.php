<div class="row">
    <div class="col-md-12">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Data Keluarga/Kerabat Terdekat</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-horizontal">
                            <div class="form-group ">
                                <label class="col-md-4 control-label">Nama * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    <input type="text" class="form-control" name="emergency_name" value="{{$dataCustomer['customer']['emergency_name']}}" maxlength="50">
                                @else
                                    <p>{{ @$dataCustomer['customer']['emergency_name'] }}</p>
                                @endif
                                    @if ($errors->has('emergency_name')) <p class="help-block">{{ $errors->first('emergency_name') }}</p> @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">No. Handphone * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    <input type="text" class="form-control numericOnly" name="emergency_mobile_phone" value="{{$dataCustomer['customer']['emergency_contact']}}" maxlength="16">
                                @else
                                    <p>{{ @$dataCustomer['customer']['emergency_contact'] }}</p>
                                @endif
                                    @if ($errors->has('emergency_mobile_phone')) <p class="help-block">{{ $errors->first('emergency_mobile_phone') }}</p> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-horizontal">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Hubungan * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    <input type="text" class="form-control" name="emergency_relation" maxlength="50" value="{{$dataCustomer['customer']['emergency_relation']}}">
                                @else
                                    <p>{{ @$dataCustomer['customer']['emergency_relation'] }}</p>
                                @endif
                                    @if ($errors->has('emergency_relation')) <p class="help-block">{{ $errors->first('emergency_relation') }}</p> @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!--End-->