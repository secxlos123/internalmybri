<div class="row">
    <div class="col-md-12">
        @if ($type != 'preview')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rekomendasi</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Dengan ini saya meyakini kebenaran data yang diinput oleh RM dan merekomendasikan permohonan recontest kredit untuk dapat diproses secara lanjut.</p>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="yes" value="yes" name="recommended" checked="">
                                    <label for="yes"> Ya </label>
                                </div>
                                <div class="radio radio-pink radio-inline">
                                    <input type="radio" id="no" value="no" name="recommended">
                                    <label for="no">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                                <label class="control-label">Rekomendasi * :</label>
                                <textarea class="form-control" name="recommendation" placeholder="Tulis Rekomendasi">{{ old('recommendation') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            @include('form_audit._input_long_lat')
        </div>
        @endif
        <hr>
            <div class="text-center">
            @if ($type != 'preview')
                @if(($detail['is_screening'] == '1') && ($detail['response_status'] == 'approve'))
                    <button type="submit" href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Terima</button>
                    <button type="submit" href="#" class="btn btn-danger waves-light waves-effect w-md m-b-20" id="btn-reject">Tolak</button>
                @endif
            @else
                <button type="button" onclick="printPage()" class="btn waves-light waves-effect w-md m-b-20"><i class="fa fa-print"></i> Print</button>
            @endif
                <a href="{{URL::previous()}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
            </div>
    </div>
</div>