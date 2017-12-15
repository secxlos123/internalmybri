<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 9 Agunan Tanah & Rumah Tinggal</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <h5>Pemecahan Sertifikat</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status *:</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[certificate_status]', array("" => "", 
                                    "Sudah Diberikan" => "Sudah Diberikan", 
                                    "Belum Diberikan" => "Belum Diberikan"), 
                                    old('nine[certificate_status]'), [
                                    'class' => 'select2 certificate_status ',
                                    'data-placeholder' => '-- Pilih --',
                                    'id' => 'certificate_status'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix" id="date_receipt" hidden="">
                            <label class="col-md-4 control-label">Tanggal Penelitian *:</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-autoclose" name="nine[receipt_date]" value="{{old('nine[receipt_date]')}}" id="receipt_date">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Keterangan *:</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="nine[information]" id="information">{{old('nine[information]')}}</textarea>
                            </div>
                        </div>
                        <h5>Dokumen Notaris Developer :</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status *:</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[notary_status]', array("" => "", 
                                    "Sudah Diberikan" => "Sudah Diberikan", 
                                    "Belum Diberikan" => "Belum Diberikan"), 
                                    old('nine[notary_status]'), [
                                    'class' => 'select2 notary_status ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <h5>Dokumen Take Over :</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status *:</label>
                            <div class="col-md-8">
                                
                                {!! Form::select('nine[takeover_status]', array("" => "", 
                                    "Sudah Diberikan" => "Sudah Diberikan", 
                                    "Belum Diberikan" => "Belum Diberikan"), 
                                    old('nine[takeover_status]'), [
                                    'class' => 'select2 takeover_status ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <h5>Perjanjian Kredit</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status *:</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[credit_status]', array("" => "", 
                                        "Sudah Diberikan" => "Sudah Diberikan", 
                                        "Belum Diberikan" => "Belum Diberikan"), 
                                        old('nine[credit_status]'), [
                                        'class' => 'select2 credit_status ',
                                        'data-placeholder' => '-- Pilih --'
                                    ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                        <h5>SKMHT</h5>
                            <label class="col-md-4 control-label">Status *:</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[skmht_status]', array("" => "", 
                                        "Sudah Diberikan" => "Sudah Diberikan", 
                                        "Belum Diberikan" => "Belum Diberikan"), 
                                        old('nine[skmht_status]'), [
                                        'class' => 'select2 skmht_status ',
                                        'data-placeholder' => '-- Pilih --'
                                    ]) !!}
                            </div>
                        </div>
                        <h5>IMB</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status *:</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[imb_status]', array("" => "", 
                                    "Sudah Diberikan" => "Sudah Diberikan", 
                                    "Belum Diberikan" => "Belum Diberikan"), 
                                    old('nine[imb_status]'), [
                                    'class' => 'select2 imb_status ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <h5>SHGB</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status *:</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[shgb_status]', array("" => "", 
                                    "Sudah Diberikan" => "Sudah Diberikan", 
                                    "Belum Diberikan" => "Belum Diberikan"), 
                                    old('nine[shgb_status]'), [
                                    'class' => 'select2 shgb_status ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>