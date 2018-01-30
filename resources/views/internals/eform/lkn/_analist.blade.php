<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-horizontal">
                <div class="form-group pros {!! $errors->has('pros') ? 'has-error' : '' !!}">
                    <label class="col-md-2 control-label">Pros *:</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="3" name="pros">{{ old('pros') }}</textarea>
                        @if ($errors->has('pros')) <p class="help-block">{{ $errors->first('pros') }}</p> @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-horizontal">
                <div class="form-group cons {!! $errors->has('cons') ? 'has-error' : '' !!}">
                    <label class="col-md-2 control-label">Cons *:</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="3" name="cons">{{ old('cons') }}</textarea>
                        @if ($errors->has('cons')) <p class="help-block">{{ $errors->first('cons') }}</p> @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>