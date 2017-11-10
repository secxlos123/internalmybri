<style type="text/css">
.custom-dialog {
    width: 1000px;
    margin: 50px auto;
}
</style>
<!-- Modal Penolakan -->
<div id="result-modal" class="modal fade">
    <div class="custom-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Hasil Prescreening</h4>
            </div>
            <div class="modal-body">
                <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Hasil Prescreening</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-horizontal" role="form">
                               <div class="form-group">
                                    <label class="col-md-6 control-label"> NIK Calon Peminjam</label> 
                                    <div class="col-md-6">
                                        <p class="form-control-static">8179718616116</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label"> Nama Calon Peminjam</label> 
                                    <div class="col-md-6">
                                        <p class="form-control-static">John Doe</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label"> Dokumen Pevindo</label> 
                                    <div class="col-md-6">
                                        <img src="{{asset('assets/images/download.png')}}" width="50" class="img-responsive">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label"> Dokumen SCID</label> 
                                    <div class="col-md-6">
                                        <img src="{{asset('assets/images/download.png')}}" width="50" class="img-responsive">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label"> Dokumen DHN</label> 
                                    <div class="col-md-6">
                                        <img src="{{asset('assets/images/download.png')}}" width="50" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-6 control-label"> Hasil Prescreening</label> 
                                    <div class="col-md-6">
                                        <p class="form-control-static">Hijau</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label"> Score Pevindo</label> 
                                    <div class="col-md-6">
                                        <p class="form-control-static">100</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title" id="success">Informasi CRS</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-horizontal" role="form">
                               <div class="form-group">
                                    <label class="col-md-6 control-label"> Score</label> 
                                    <div class="col-md-6">
                                        <p class="form-control-static">100</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label"> Rating </label> 
                                    <div class="col-md-6">
                                        <p class="form-control-static">4</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12"> Selamat, pengajuan Pinjaman anda telah diapprove, dengan catatan data yang telah diinputkan sesuai dokumen yang diupload.</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title" id="failed">Informasi CRS</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-horizontal" role="form">
                               <div class="form-group">
                                    <label class="col-md-6 control-label"> Score</label> 
                                    <div class="col-md-6">
                                        <p class="form-control-static">50</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 control-label"> Rating </label> 
                                    <div class="col-md-6">
                                        <p class="form-control-static">1</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12"> Mohon Maaf Pengajuan Anda tidak dapat diapprove. Apa anda ingin override?</label>
                                </div>
                                <div class="text-center">
                                    <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md m-b-20">Ya</a>
                                    <a href="javascript:void(0);" class="btn btn-default waves-light waves-effect w-md m-b-20">Tidak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>