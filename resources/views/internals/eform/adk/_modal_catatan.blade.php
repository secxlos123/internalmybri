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
                                <?php
                                    if (empty($detail['customer']['personal']['identity']) || $detail['customer']['personal']['identity'] == '') {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_ktp">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Foto KTP :</label>
                                        <div class="col-md-9">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Catatan KTP :</label>
                                        <input type="hidden" id="ktp" value="multi">
                                        <input type="hidden" name="type" value="ktp">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
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
                                </form>
                                <?php
                                    } else {
                                ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan KTP :</label>
                                    <input type="hidden" id="ktp" value="nomulti">
                                    <input type="hidden" name="type" id="val_ktp" value="ktp">
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
                                <?php } ?>
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
                                <?php
                                    if (empty($detail['NPWP_nasabah'])) {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_npwp">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Foto NPWP :</label>
                                        <div class="col-md-9">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Catatan NPWP :</label>
                                        <input type="hidden" id="npwp" value="multi">
                                        <input type="hidden" name="type" value="npwp">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
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
                                </form>
                                <?php
                                    } else {
                                ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan NPWP :</label>
                                    <input type="hidden" id="npwp" value="nomulti">
                                    <input type="hidden" name="type" id="val_npwp" value="npwp">
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
                                <?php } ?>
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
                                <?php
                                    if (empty($detail['SLIP_GAJI'])) {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_gaji">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Foto Gaji :</label>
                                        <div class="col-md-9">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Catatan Gaji :</label>
                                        <input type="hidden" id="gaji" value="multi">
                                        <input type="hidden" name="type" value="gaji">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
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
                                </form>
                                <?php } else { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan Gaji :</label>
                                    <input type="hidden" id="gaji" value="nomulti">
                                    <input type="hidden" name="type" id="val_gaji" value="gaji">
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
                                <?php } ?>
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
                                <?php
                                    if (empty($detail['KK'])) {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_kk">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Foto Kartu Keluarga :</label>
                                        <div class="col-md-9">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Catatan Kartu Keluarga :</label>
                                        <input type="hidden" id="kk" value="multi">
                                        <input type="hidden" name="type" value="kk">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
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
                                </form>
                                <?php } else { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan Kartu Keluarga :</label>
                                    <input type="hidden" id="kk" value="nomulti">
                                    <input type="hidden" name="type" id="val_kk" value="kk">
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
                                <?php } ?>
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
                                <?php
                                    if (empty($detail['SK_AWAL'])) {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_sk_awal">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Foto SK Pertama :</label>
                                        <div class="col-md-9">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Catatan SK Pertama :</label>
                                        <input type="hidden" id="sk_awal" value="multi">
                                        <input type="hidden" name="type" value="sk_awal">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
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
                                </form>
                                <?php } else { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan SK Pertama :</label>
                                    <input type="hidden" id="sk_awal" value="nomulti">
                                    <input type="hidden" name="type" id="val_sk_awal" value="sk_awal">
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
                                <?php } ?>
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
                                <?php
                                    if (empty($detail['SK_AKHIR'])) {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_sk_akhir">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Foto SK Terakhir :</label>
                                        <div class="col-md-9">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Catatan SK Terakhir :</label>
                                        <input type="hidden" id="sk_akhir" value="multi">
                                        <input type="hidden" name="type" value="sk_akhir">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
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
                                </form>
                                <?php } else { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan SK Terakhir :</label>
                                    <input type="hidden" id="sk_akhir" value="nomulti">
                                    <input type="hidden" name="type" id="val_sk_akhir" value="sk_akhir">
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
                                <?php } ?>
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
                                <?php
                                    if (empty($detail['REKOMENDASI'])) {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_rekomendasi">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Foto Surat Rekomendasi :</label>
                                        <div class="col-md-9">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Catatan Surat Rekomendasi :</label>
                                        <input type="hidden" id="rekomendasi" value="multi">
                                        <input type="hidden" name="type" value="rekomendasi">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
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
                                </form>
                                <?php } else { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan Surat Rekomendasi :</label>
                                    <input type="hidden" id="rekomendasi" value="nomulti">
                                    <input type="hidden" name="type" id="val_rekomendasi" value="rekomendasi">
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
                                <?php } ?>
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
                                <?php
                                    if (empty($detail['SKPG'])) {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_skpu">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Foto SKPU :</label>
                                        <div class="col-md-9">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Catatan SKPU :</label>
                                        <input type="hidden" id="skpu" value="multi">
                                        <input type="hidden" name="type" value="skpu">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
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
                                </form>
                                <?php } else { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan SKPU :</label>
                                    <input type="hidden" id="skpu" value="nomulti">
                                    <input type="hidden" name="type" id="val_skpu" value="skpu">
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
                                <?php } ?>
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
                                <?php
                                    if (empty($detail['customer']['personal']['couple_identity'])) {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_ktp_pasangan">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Foto KTP Pasangan :</label>
                                        <div class="col-md-9">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Catatan KTP Pasangan :</label>
                                        <input type="hidden" id="couple_ktp" value="multi">
                                        <input type="hidden" name="type" value="couple_ktp">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
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
                                </form>
                                <?php } else { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Catatan KTP Pasangan :</label>
                                    <input type="hidden" id="couple_ktp" value="nomulti">
                                    <input type="hidden" name="type" id="val_couple_ktp" value="couple_ktp">
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
                                <?php } ?>
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