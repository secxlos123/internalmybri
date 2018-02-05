
<!-- Modal Prescreening -->
<div id="result-modal" class="modal fade">
    <div class="custom-dialog" role="document" style="margin: 50px auto; width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Hasil Prescreening</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect hide" id="btn-update-sicd">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal-text-base hidden">
    Silahkan lakukan verifikasi data nasabah terlebih dahulu.
</div>

<div class="modal-text-base-none hidden">
    Hasil prescreening belum tersedia.
</div>

<div class="modal-body-base hidden">
    <div class="card-box m-t-30">
        <h4 class="m-t-min30 m-b-30 header-title custom-title">Hasil Prescreening</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-horizontal" role="form">
                   <div class="">
                        <label class="col-md-6 control-label"> NIK</label>
                        <div class="col-md-6">
                            <p class="hide" id="prescreening-id">1</p>
                            <p class="form-control-static" id="prescreening-nik">8179718616116</p>
                        </div>
                    </div>
                    <div class="">
                        <label class="col-md-6 control-label"> Nama Calon Nasabah</label>
                        <div class="col-md-6">
                            <p class="form-control-static" id="prescreening-name">John Doe</p>
                        </div>
                    </div>
                    <div class="">
                        <label class="col-md-6 control-label"> Hasil Prescreening</label>
                        <div class="col-md-6" id="prescreening-result">
                            Hijau
                        </div>
                    </div>
                    <div class="">
                        <label class="col-md-6 control-label"> Keterangan Terkait Risiko</label>
                        <div class="col-md-6">
                            <p class="form-control-static" id="prescreening-notice">isinya dari sana</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-box m-t-30">
        <h4 class="m-t-min30 m-b-30 header-title custom-title" data-toggle="collapse" href="#collapse1" style="cursor: pointer;">Detail Hasil Prescreening <small>(klik disini untuk detail prescreening)</small> </h4>
        <div class="panel-collapse collapse" id="collapse1">
            <div class="card-box m-t-30 after-this">
                <h4 class="m-t-min30 m-b-30 header-title custom-title">PEFINDO / SLIK</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-horizontal" role="form">
                            <div class="">
                                <label class="col-md-6 control-label"> Score</label>
                                <div class="col-md-6">
                                    <p class="form-control-static" id="prescreening-score">100</p>
                                </div>
                            </div>
                            <div class="">
                                <label class="col-md-6 control-label"> Hasil Pefindo / SLIK</label>
                                <div class="col-md-6" id="prescreening-color">
                                    100
                                </div>
                            </div>
                            <div class="">
                                <label class="col-md-6 control-label"> Dokumen</label>
                                <div class="col-md-6" id="prescreening-image">
                                    <p class="form-control-static">-</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>