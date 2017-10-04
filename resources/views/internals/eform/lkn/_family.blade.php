<div class="panel-body">
    <div class="row">
        <div class="col-md-9">
            <div class="form-horizontal" role="form">
                <div class="form-group {!! $errors->has('family_name') ? 'has-error' : '' !!}" id="family_name">
                    <label class="col-md-4 control-label">Nama Saudara *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="family_name" maxlength="50" value="" readonly="">
                        @if ($errors->has('family_name')) <p class="help-block">{{ $errors->first('family_name') }}</p> @endif
                    </div>
                </div>
                <div class="form-group {!! $errors->has('relationship') ? 'has-error' : '' !!}" id="relationship">
                    <label class="col-md-4 control-label">Hubungan Saudara *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="relationship" maxlength="50" value="" readonly="">
                        @if ($errors->has('relationship')) <p class="help-block">{{ $errors->first('relationship') }}</p> @endif
                    </div>
                </div>
                <div class="form-group {!! $errors->has('family_phone') ? 'has-error' : '' !!}" id="family_phone">
                    <label class="col-md-4 control-label">Telepon Saudara *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="family_phone" maxlength="50" value="" readonly="">
                        @if ($errors->has('family_phone')) <p class="help-block">{{ $errors->first('family_phone') }}</p> @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>