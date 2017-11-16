<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rekomendasi</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Dengan ini saya meyakini kebenaran data nasabah dan merekomendasikan permohonan kredit untuk dapat diproses lebih lanjut</p>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="yes" value="yes" name="recommended" checked="">
                                    <label for="yes"> Ya </label>
                                </div>
                                <div class="radio radio-pink radio-inline">
                                    <input type="radio" id="no" value="no" name="recommended">
                                    <label for="no"> Tidak </label>
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
                                <label class="col-md-1 control-label">Rekomendasi * :</label>
                                <textarea class="form-control" name="recommendation" placeholder="Tulis Rekomendasi">{{ old('recommendation') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
            <div class="text-center">
                <button type="submit" href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Terima</button>
                <button type="submit" href="#" class="btn btn-danger waves-light waves-effect w-md m-b-20" id="btn-reject">Tolak</button>
                <a href="{{URL::previous()}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
            </div>
    </div>
</div>