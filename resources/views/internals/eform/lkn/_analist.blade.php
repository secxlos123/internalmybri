<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group pros {!! $errors->has('pros') ? 'has-error' : '' !!}">
                                            <label class="col-md-2 control-label">Pros *:</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="3" name="pros" maxlength="255">{{ old('pros') }}</textarea>
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
                                                <textarea class="form-control" rows="3" name="cons" maxlength="255">{{ old('cons') }}</textarea>
                                                @if ($errors->has('cons')) <p class="help-block">{{ $errors->first('cons') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div role="form">
                                        <div class="form-group photo_with_customer {!! $errors->has('photo_with_customer') ? 'has-error' : '' !!}">
                                            <label class="col-md-6 control-label">Unggah Foto Bersama Nasabah *</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="photo_with_customer" accept="image/png,image/jpg">
                                                @if ($errors->has('photo_with_customer')) <p class="help-block">{{ $errors->first('photo_with_customer') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>