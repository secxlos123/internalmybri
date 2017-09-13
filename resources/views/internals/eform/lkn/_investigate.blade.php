<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group seller_name {!! $errors->has('seller_name') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Nama Penjual *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="seller_name" maxlength="50" value="{{ old('seller_name') }}">
                                                @if ($errors->has('seller_name')) <p class="help-block">{{ $errors->first('seller_name') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group seller_address {!! $errors->has('seller_address') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Alamat *:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" rows="3" name="seller_address" maxlength="255">{{ old('seller_address') }}</textarea>
                                                @if ($errors->has('seller_address')) <p class="help-block">{{ $errors->first('seller_address') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group seller_phone {!! $errors->has('seller_phone') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">No. Telepon *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="seller_phone" maxlength="12" value="{{ old('seller_phone') }}">
                                                @if ($errors->has('seller_phone')) <p class="help-block">{{ $errors->first('seller_phone') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group selling_price {!! $errors->has('selling_price') ? 'has-error' : '' !!}">
                                            <label class="col-md-5 control-label">Harga Jual *:</label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <!-- <span class="input-group-addon">Rp</span> -->
                                                    <input type="text" class="form-control numericOnly currency-rp" name="selling_price" maxlength="24" value="{{ old('selling_price') }}">
                                                    <!-- <span class="input-group-addon">,00</span> -->
                                                </div>
                                                    @if ($errors->has('selling_price')) <p class="help-block">{{ $errors->first('selling_price') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group reason_for_sale {!! $errors->has('reason_for_sale') ? 'has-error' : '' !!}">
                                            <label class="col-md-5 control-label">Alasan Dijual *:</label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" rows="3" name="reason_for_sale" maxlength="255">{{ old('reason_for_sale') }}</textarea>
                                                @if ($errors->has('reason_for_sale')) <p class="help-block">{{ $errors->first('reason_for_sale') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group relation_with_seller {!! $errors->has('relation_with_seller') ? 'has-error' : '' !!}">
                                            <label class="col-md-5 control-label">Hubungan dengan Pembeli *:</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="relation_with_seller" maxlength="255" value="{{ old('relation_with_seller') }}">
                                                @if ($errors->has('relation_with_seller')) <p class="help-block">{{ $errors->first('relation_with_seller') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>