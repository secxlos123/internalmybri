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
                                    if (empty($detail['customer']['personal']['identity']) || $detail['customer']['personal']['identity'] == '' || $detail['customer']['personal']['identity'] == 'null') {
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
                                    if (empty($detail['NPWP_nasabah']) || $detail['NPWP_nasabah'] == '' || $detail['NPWP_nasabah'] == 'null') {
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
                                    if (empty($detail['SLIP_GAJI']) || $detail['SLIP_GAJI'] == '' || $detail['SLIP_GAJI'] == 'null') {
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
                                    if (empty($detail['KK']) || $detail['KK'] == '' || $detail['KK'] == 'null') {
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
                                    if (empty($detail['SK_AWAL']) || $detail['SK_AWAL'] == '' || $detail['SK_AWAL'] == 'null') {
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
                                    if (empty($detail['SK_AKHIR']) || $detail['SK_AKHIR'] == '' || $detail['SK_AKHIR'] == 'null') {
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
                                    if (empty($detail['REKOMENDASI']) || $detail['REKOMENDASI'] == '' || $detail['REKOMENDASI'] == 'null') {
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
                                    if (empty($detail['SKPG']) || $detail['SKPG'] == '' || $detail['SKPG'] == 'null') {
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
                                    if (empty($detail['customer']['personal']['couple_identity']) || $detail['customer']['personal']['couple_identity'] == '' || $detail['customer']['personal']['couple_identity'] == 'null') {
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
<div id="result-modal-add-foto" class="modal fade">
    <div class="modal-dialog" role="document" style="margin: 100px auto; width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Foto Lainnya</h4>
            </div>
            <div class="modal-body">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal" role="form">
                                <?php
                                    if (empty($detail['lainnya1']) || $detail['lainnya1'] == '') {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="foto_lainnya">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" id="action" name="action" value="add">
                                        <input type="hidden" id="countupload" name="countupload" value="2">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
                                        <label class="col-md-3 control-label">Foto Lainnya :</label>
                                        <div class="col-md-9">
                                            <input type="text" data-placeholder="Nama file" id="namafoto" name="namafoto" class="form-control">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle">
                                            <br><div id="tambah"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="button" class="btn btn-save"  value=" + " id="addupload"></input>
                                            <input type="button" class="btn btn-save hide"  value=" - " id="removeupload"></input>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    } else {
                                ?>
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="edit_foto_lainnya">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" id="countupload" name="countupload" value="6">
                                        <input type="hidden" id="action" name="action" value="edit">
                                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
                                        <label class="col-md-2 control-label">Foto Lainnya 1 :</label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="lainnya1" value="{{$detail['lainnya1']}}">
                                            <input type="text" data-placeholder="Nama file" name="namafoto" id="namafoto" class="form-control" value="<?php 
                                            if (!empty($detail['lainnya1']) || $detail['lainnya1'] != '') {
                                                $lainnya1 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya1']);
                                                echo str_replace('-', ' ', $lainnya1['filename']);
                                            }
                                            ?>">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto" class="filestyle" value="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya1']?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="button" id="btn-lainnya1" value="Hapus" class="btn btn-danger">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Foto Lainnya 2 :</label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="lainnya2" value="{{$detail['lainnya2']}}">
                                            <input type="text" data-placeholder="Nama file" name="namafoto2" id="namafoto2" class="form-control" value="<?php 
                                            if (!empty($detail['lainnya2']) || $detail['lainnya2'] != '') {
                                                $lainnya2 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya2']);
                                                echo str_replace('-', ' ', $lainnya2['filename']);
                                            }
                                            ?>">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto2" class="filestyle" value="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya2']?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="button" id="btn-lainnya2" value="Hapus" class="btn btn-danger">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Foto Lainnya 3 :</label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="lainnya3" value="{{$detail['lainnya3']}}">
                                            <input type="text" data-placeholder="Nama file" name="namafoto3" id="namafoto3" class="form-control" value="<?php 
                                            if (!empty($detail['lainnya3']) || $detail['lainnya3'] != '') {
                                                $lainnya3 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya3']);
                                                echo str_replace('-', ' ', $lainnya3['filename']);
                                            }
                                            ?>">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto3" class="filestyle" value="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya1']?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="button" id="btn-lainnya3" value="Hapus" class="btn btn-danger">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Foto Lainnya 4 :</label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="lainnya4" value="{{$detail['lainnya4']}}">
                                            <input type="text" data-placeholder="Nama file" name="namafoto4" id="namafoto4" class="form-control" value="<?php 
                                            if (!empty($detail['lainnya4']) || $detail['lainnya4'] != '') {
                                                $lainnya4 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya4']);
                                                echo str_replace('-', ' ', $lainnya4['filename']);
                                            }
                                            ?>">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto4" class="filestyle" value="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya4']?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="button" id="btn-lainnya4" value="Hapus" class="btn btn-danger">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Foto Lainnya 5 :</label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="lainnya5" value="{{$detail['lainnya5']}}">
                                            <input type="text" data-placeholder="Nama file" name="namafoto5" id="namafoto5" class="form-control" value="<?php 
                                            if (!empty($detail['lainnya5']) || $detail['lainnya5'] != '') {
                                                $lainnya5 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya5']);
                                                echo str_replace('-', ' ', $lainnya5['filename']);
                                            }
                                            ?>">
                                            <input type="file" data-placeholder="Tidak ada file" name="uploadfoto5" class="filestyle" value="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya5']?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="button" id="btn-lainnya5" value="Hapus" class="btn btn-danger">
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange waves-effect" id="btn-add-foto-lainnya">Save</button>
            </div>
        </div>
    </div>
</div>