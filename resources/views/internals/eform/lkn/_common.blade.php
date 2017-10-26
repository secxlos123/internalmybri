<div class="panel-body">
    <div class="row">
        <div class="col-md-8">
            <div class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-6 control-label">Foto NPWP * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="npwp" accept="image/png,image/jpeg,image/gif">
                        @if ($errors->has('npwp')) <p class="help-block">{{ $errors->first('npwp') }}</p> @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Dokumen Legal Agunan *:</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="legal_document">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Slip Gaji / Dokumen Legal Usaha / Izin Praktek *:</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="salary_slip">
                    </div>
                </div>
               <!--  <div class="form-group">
                    <label class="col-md-6 control-label">Bank Statement :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="bank_statement">
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-md-6 control-label">Kartu Keluarga :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="family_card">
                    </div>
                </div>
                <div class="form-group" id="marrital_certificate">
                    <label class="col-md-6 control-label">Akta Nikah/Akta Cerai :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="marrital_certificate">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="col-md-6 control-label">Dokumen Legal Usaha / Izin Praktek :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                    </div>
                </div> -->
                <div class="form-group" id="separate_certificate">
                    <label class="col-md-6 control-label">Akta Pisah Harta :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="diforce_certificate">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Foto Debitur * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="photo_with_customer" accept="image/png,image/jpg">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Surat Penawaran * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="offering_letter" accept="image/png,image/jpg">
                    </div>
                </div>
                <div class="form-group" hidden="">
                    <label class="col-md-6 control-label">SHM :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="shm" accept="image/png,image/jpg">
                    </div>
                </div>
                <div class="form-group" hidden="">
                    <label class="col-md-6 control-label">IMB :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="imb" accept="image/png,image/jpg">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Bukti DP *</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="down_payment" accept="image/png,image/jpg">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">PBB Terakhir *</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="pbb" accept="image/png,image/jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>