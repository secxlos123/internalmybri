<div class="panel-body">
    <div class="row">
        <div class="col-md-8">
            <div class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-6 control-label">Foto NPWP * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="npwp" accept="image/*,application/pdf">
                        @if ($errors->has('npwp')) <p class="help-block">{{ $errors->first('npwp') }}</p> @endif
                    </div>
                </div>
                <div class="form-group" id="salary_slip">
                    <label class="col-md-6 control-label">Slip Gaji * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="salary_slip" accept="image/*,application/pdf">
                    </div>
                </div>
                <div class="form-group" id="legal_bussiness_document">
                    <label class="col-md-6 control-label">Dokumen Legal Usaha * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="legal_bussiness_document" accept="image/*,application/pdf">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="col-md-6 control-label">Izin Praktek * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="license_of_practice">
                    </div>
                </div> -->
                <div class="form-group" id="work_letter">
                    <label class="col-md-6 control-label">Surat Keterangan Kerja * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="work_letter" accept="image/*,application/pdf">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Kartu Keluarga * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="family_card" accept="image/*,application/pdf">
                    </div>
                </div>
                @if($eformData['customer']['personal']['status_id'] >= 2)
                <div class="form-group" id="marrital_certificate">
                    <label class="col-md-6 control-label">Akta Nikah/Akta Cerai :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="marrital_certificate" accept="image/*,application/pdf">
                    </div>
                </div>
                @endif
                <!-- <div class="form-group">
                    <label class="col-md-6 control-label">Dokumen Legal Usaha / Izin Praktek :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                    </div>
                </div> -->
                @if(($eformData['customer']['financial']['status_finance'] != "Join Income") && ($eformData['customer']['personal']['status_id'] == 2 ))
                <div class="form-group" id="separate_certificate">
                    <label class="col-md-6 control-label">Akta Pisah Harta :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="divorce_certificate" accept="image/*,application/pdf">
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label class="col-md-6 control-label">Foto Debitur * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="photo_with_customer" accept="image/*,application/pdf,application/rar">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Surat Penawaran * :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="offering_letter" accept="image/*,application/pdf">
                    </div>
                </div>
                <div class="form-group" id="shm" @if($eformData['kpr']['developer_id'] != 1) hidden="" @endif>
                    <label class="col-md-6 control-label">Sertifikat Hak Milik :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="proprietary" accept="image/*,application/pdf">
                    </div>
                </div>
                <div class="form-group" id="imb" @if($eformData['kpr']['developer_id'] != 1) hidden="" @endif>
                    <label class="col-md-6 control-label">Izin Mendirikan Bangunan :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="building_permit" accept="image/*,application/pdf">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Bukti DP </label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="down_payment" accept="image/*,application/pdf">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Pajak Bumi dan Bangunan Terakhir </label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="building_tax" accept="image/*,application/pdf">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Dokumen Lainnya </label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="other_document" accept="image/*,application/pdf">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>