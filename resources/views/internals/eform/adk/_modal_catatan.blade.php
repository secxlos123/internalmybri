<div id="result-modal-ktp" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan KTP :</label>
                                    <input type="hidden" id="ktp" value="ktp">
                                    <div class="col-md-9">
                                        <?php 
                                        if(!empty($detail['catatan_ktp'])) {
                                        ?>
                                        <input type="text" id="catatan_ktp" name="catatan_ktp" class="form-control" value="<?php echo $detail['catatan_ktp']?>">
                                        <?php } else { ?>
                                        <input type="text" id="catatan_ktp" name="catatan_ktp" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-update-ktp">Update</button>
            </div>
        </div>
    </div>
</div>
<div id="result-modal-npwp" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan NPWP :</label>
                                    <input type="hidden" id="npwp" value="npwp">
                                    <div class="col-md-9">
                                        <?php 
                                        if(!empty($detail['catatan_npwp'])) {
                                        ?>
                                        <input type="text" id="catatan_npwp" name="catatan_npwp" class="form-control" value="<?php echo $detail['catatan_npwp']?>">
                                        <?php } else { ?>
                                        <input type="text" id="catatan_npwp" name="catatan_npwp" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-update-npwp">Update</button>
            </div>
        </div>
    </div>
</div>
<div id="result-modal-gaji" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan Gaji :</label>
                                    <input type="hidden" id="gaji" value="gaji">
                                    <div class="col-md-9">
                                        <?php 
                                        if(!empty($detail['catatan_gaji'])) {
                                        ?>
                                        <input type="text" id="catatan_gaji" name="catatan_gaji" class="form-control" value="<?php echo $detail['catatan_gaji']?>">
                                        <?php } else { ?>
                                        <input type="text" id="catatan_gaji" name="catatan_gaji" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-update-gaji">Update</button>
            </div>
        </div>
    </div>
</div>
<div id="result-modal-kk" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan Kartu Keluarga :</label>
                                    <input type="hidden" id="kk" value="kk">
                                    <div class="col-md-9">
                                        <?php 
                                        if(!empty($detail['catatan_kk'])) {
                                        ?>
                                        <input type="text" id="catatan_kk" name="catatan_kk" class="form-control" value="<?php echo $detail['catatan_kk']?>">
                                        <?php } else { ?>
                                        <input type="text" id="catatan_kk" name="catatan_kk" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-update-kk">Update</button>
            </div>
        </div>
    </div>
</div>
<div id="result-modal-sk_awal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan SK Pertama :</label>
                                    <input type="hidden" id="sk_awal" value="sk_awal">
                                    <div class="col-md-9">
                                        <?php 
                                        if(!empty($detail['catatan_sk_awal'])) {
                                        ?>
                                        <input type="text" id="catatan_sk_awal" name="catatan_sk_awal" class="form-control" value="<?php echo $detail['catatan_sk_awal']?>">
                                        <?php } else { ?>
                                        <input type="text" id="catatan_sk_awal" name="catatan_sk_awal" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-update-sk_awal">Update</button>
            </div>
        </div>
    </div>
</div>
<div id="result-modal-sk_akhir" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan SK Terakhir :</label>
                                    <input type="hidden" id="sk_akhir" value="sk_akhir">
                                    <div class="col-md-9">
                                        <?php 
                                        if(!empty($detail['catatan_sk_akhir'])) {
                                        ?>
                                        <input type="text" id="catatan_sk_akhir" name="catatan_sk_akhir" class="form-control" value="<?php echo $detail['catatan_sk_akhir']?>">
                                        <?php } else { ?>
                                        <input type="text" id="catatan_sk_akhir" name="catatan_sk_akhir" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-update-sk_akhir">Update</button>
            </div>
        </div>
    </div>
</div>
<div id="result-modal-rekomendasi" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan Surat Rekomendasi :</label>
                                    <input type="hidden" id="rekomendasi" value="rekomendasi">
                                    <div class="col-md-9">
                                        <?php 
                                        if(!empty($detail['catatan_rekomendasi'])) {
                                        ?>
                                        <input type="text" id="catatan_rekomendasi" name="catatan_rekomendasi" class="form-control" value="<?php echo $detail['catatan_rekomendasi']?>">
                                        <?php } else { ?>
                                        <input type="text" id="catatan_rekomendasi" name="catatan_rekomendasi" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-update-rekomendasi">Update</button>
            </div>
        </div>
    </div>
</div>
<div id="result-modal-skpu" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan SKPU :</label>
                                    <input type="hidden" id="skpu" value="skpu">
                                    <div class="col-md-9">
                                        <?php 
                                        if(!empty($detail['catatan_skpu'])) {
                                        ?>
                                        <input type="text" id="catatan_skpu" name="catatan_skpu" class="form-control" value="<?php echo $detail['catatan_skpu']?>">
                                        <?php } else { ?>
                                        <input type="text" id="catatan_skpu" name="catatan_skpu" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-update-skpu">Update</button>
            </div>
        </div>
    </div>
</div>
<div id="result-modal-couple_ktp" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan SKPU :</label>
                                    <input type="hidden" id="couple_ktp" value="couple_ktp">
                                    <div class="col-md-9">
                                        <?php 
                                        if(!empty($detail['catatan_couple_ktp'])) {
                                        ?>
                                        <input type="text" id="catatan_couple_ktp" name="catatan_couple_ktp" class="form-control" value="<?php echo $detail['catatan_couple_ktp']?>">
                                        <?php } else { ?>
                                        <input type="text" id="catatan_couple_ktp" name="catatan_couple_ktp" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-update-couple_ktp">Update</button>
            </div>
        </div>
    </div>
</div>