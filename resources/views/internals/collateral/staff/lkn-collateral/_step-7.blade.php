<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 7 Agunan Tanah & Rumah Tinggal</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status Agunan * :</label>
                            <div class="col-md-8">
                                {!! Form::select('seven[collateral_status]', array("" => "", 
                                    "Ditempati Sendiri" => "Ditempati Sendiri", 
                                    "Disewakan" => "Disewakan"), 
                                    old('seven[collateral_status]'), [
                                    'class' => 'select2 collateral_status_',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Atas Nama (Nama Pemilik) * :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="seven[on_behalf_of]" maxlength="50" value="{{old('seven[on_behalf_of]')}}" id="on_behalf_of">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">No. Bukti Kepemilikan * :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="seven[ownership_number]" maxlength="50" value="{{old('seven[ownership_number]')}}" id="ownership_number">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Lokasi * :</label>
                            <div class="col-md-8">
                            {!! Form::select('seven[city_id]', ['' => ''], old('seven[city_id]'), [
                                    'class' => 'select2 cities',
                                    'data-placeholder' => '-- Pilih Kota --',
                                ]) !!}
                                {{-- <input type="text" class="form-control" name="seven[location]" maxlength="50" value="{{old('seven[location]')}}" id="location_step7"> --}}
                            </div>
                            <input type="hidden" name="city_name" id="city_name">
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Alamat Agunan * :</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="seven[address_collateral]" id="address_collateral" maxlength="250">{{ $type == 'nonindex' ? $collateral['home_location'] : $collateral['property']['address']}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Deskripsi * :</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="4" name="seven[description]" id="description" maxlength="250">{{old('seven[description]')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Status Bukti Kepemilikan * :</label>
                        <div class="col-md-8">
                            {!! Form::select('seven[ownership_status]', array("" => "", 
                                "Sertifikat Hak Milik" => "Sertifikat Hak Milik", 
                                "Sertifikat Hak Guna" => "Sertifikat Hak Guna",
                                "Sertifikat Hak Guna Usaha" => "Sertifikat Hak Guna Usaha",
                                "Sertifikat Hak Pakai" => "Sertifikat Hak Pakai",
                                "Lainnya" => "Lainnya"), 
                                old('other[ownership_status]'), [
                                'class' => 'select2 ownership_status ',
                                'data-placeholder' => '-- Pilih --'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Tanggal Bukti * :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="seven[date_evidence]" value="{{old('seven[date_evidence]')}}" id="date_evidence">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Kelurahan/Desa * :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="seven[village]" maxlength="50" value="{{old('seven[village]')}}" id="village">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Kecamatan * :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="seven[districts]" maxlength="50" value="{{old('seven[districts]')}}" id="districts">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>