<style type="text/css">
.custom {
    width: 500px;
    margin: 100px auto;
}
</style>
<!-- Modal Penolakan -->
<div id="delete-modal" class="modal fade">
    <div class="custom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Hapus Pengajuan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-horizontal" role="form">
                            <p>Apakah Anda yakin akan menghapus pengajuan ini?</p>
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-orange waves-effect" id="btn-delete-this">Hapus Pengajuan</button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>