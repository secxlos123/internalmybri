
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <p>Dengan ini saya meyakini kebenaran data yang diinput oleh RM dan merekomendasikan permohonan recontest kredit untuk dapat diproses secara lanjut.</p>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <div class="radio radio-info radio-inline">
                        <input type="radio" id="yes" value="yes" name="recommended">
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