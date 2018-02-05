<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 9 Pemecahan Sertifikat</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <h5>Pemecahan Sertifikat</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status :</label>
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
                            <label class="col-md-4 control-label">Tanggal Penelitian :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-maxdate" name="nine[receipt_date]" value="{{old('nine[receipt_date]')}}" id="receipt_date">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Keterangan :</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="nine[information]" id="information">{{old('nine[information]')}}</textarea>
                            </div>
                        </div>
                        <h5>Dokumen Notaris Developer :</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status :</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[notary_status]', array("" => "", 
                                    "Sudah Diberikan" => "Sudah Diberikan", 
                                    "Belum Diberikan" => "Belum Diberikan"), 
                                    old('nine[notary_status]'), [
                                    'class' => 'select2 notary_status ',
                                    'data-placeholder' => '-- Pilih --',
                                    'id' => 'notary_status'
                                ]) !!}
                            </div>
                        </div>
                         <div class="form-group clearfix" id="date_receipt_notary" hidden="">
                            <label class="col-md-4 control-label">Tanggal Penelitian :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-maxdate" name="nine[receipt_date_notary]" value="{{old('nine[receipt_date_notary]')}}" id="receipt_date_notary">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Keterangan :</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="nine[information_notary]" id="information_notary">{{old('nine[information_notary]')}}</textarea>
                            </div>
                        </div>
                        <h5>Dokumen Take Over :</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status :</label>
                            <div class="col-md-8">
                                
                                {!! Form::select('nine[takeover_status]', array("" => "", 
                                    "Sudah Diberikan" => "Sudah Diberikan", 
                                    "Belum Diberikan" => "Belum Diberikan"), 
                                    old('nine[takeover_status]'), [
                                    'class' => 'select2 takeover_status ',
                                    'data-placeholder' => '-- Pilih --',
                                    'id' => 'takeover_status'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix" id="date_receipt_takeover" hidden="">
                            <label class="col-md-4 control-label">Tanggal Penelitian :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-maxdate" name="nine[receipt_date_takeover]" value="{{old('nine[receipt_date_takeover]')}}" id="receipt_date_takeover">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Keterangan :</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="nine[information_takeover]" id="information_takeover">{{old('nine[information_takeover]')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <h5>Perjanjian Kredit</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status :</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[credit_status]', array("" => "", 
                                        "Sudah Diberikan" => "Sudah Diberikan", 
                                        "Belum Diberikan" => "Belum Diberikan"), 
                                        old('nine[credit_status]'), [
                                        'class' => 'select2 credit_status ',
                                        'data-placeholder' => '-- Pilih --',
                                        'id' => 'credit_status'
                                    ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix" id="date_receipt_credit" hidden="">
                            <label class="col-md-4 control-label">Tanggal Penelitian :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-maxdate" name="nine[receipt_date_credit]" value="{{old('nine[receipt_date_credit]')}}" id="receipt_date_credit">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Keterangan :</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="nine[information_credit]" id="information_credit">{{old('nine[information_credit]')}}</textarea>
                            </div>
                        </div>
                        <h5>SKMHT</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status :</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[skmht_status]', array("" => "", 
                                        "Sudah Diberikan" => "Sudah Diberikan", 
                                        "Belum Diberikan" => "Belum Diberikan"), 
                                        old('nine[skmht_status]'), [
                                        'class' => 'select2 skmht_status ',
                                        'data-placeholder' => '-- Pilih --',
                                        'id' => 'skmht_status'
                                    ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix" id="date_receipt_skmht" hidden="">
                            <label class="col-md-4 control-label">Tanggal Penelitian :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-maxdate" name="nine[receipt_date_skmht]" value="{{old('nine[receipt_date_skmht]')}}" id="receipt_date_skmht">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Keterangan :</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="nine[information_skmht]" id="information_skmht">{{old('nine[information_skmht]')}}</textarea>
                            </div>
                        </div>
                        <h5>IMB</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status :</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[imb_status]', array("" => "", 
                                    "Sudah Diberikan" => "Sudah Diberikan", 
                                    "Belum Diberikan" => "Belum Diberikan"), 
                                    old('nine[imb_status]'), [
                                    'class' => 'select2 imb_status ',
                                    'data-placeholder' => '-- Pilih --',
                                    'id' => 'imb_status'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix" id="date_receipt_imb" hidden="">
                            <label class="col-md-4 control-label">Tanggal Penelitian :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-maxdate" name="nine[receipt_date_imb]" value="{{old('nine[receipt_date_imb]')}}" id="receipt_date_imb">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Keterangan :</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="nine[information_imb]" id="information_imb">{{old('nine[information_imb]')}}</textarea>
                            </div>
                        </div>
                        <h5>SHGB</h5>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Status :</label>
                            <div class="col-md-8">
                                {!! Form::select('nine[shgb_status]', array("" => "", 
                                    "Sudah Diberikan" => "Sudah Diberikan", 
                                    "Belum Diberikan" => "Belum Diberikan"), 
                                    old('nine[shgb_status]'), [
                                    'class' => 'select2 shgb_status ',
                                    'data-placeholder' => '-- Pilih --',
                                    'id' => 'shgb_status'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix" id="date_receipt_shgb" hidden="">
                            <label class="col-md-4 control-label">Tanggal Penelitian :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-maxdate" name="nine[receipt_date_shgb]" value="{{old('nine[receipt_date_shgb]')}}" id="receipt_date_shgb">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Keterangan :</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="nine[information_shgb]" id="information_shgb">{{old('nine[information_shgb]')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>