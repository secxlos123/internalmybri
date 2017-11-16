<div id="update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <h3>Pilih Data</h3>
                    <div class="col-md-12 text-center">
                        <select class="form-control" name="data-source" id="data-source">
                            <option value="">-- Pilih --</option>
                            <option value="cif">Data CIF</option>
                            <option value="kemendagri">Data Kemendagri</option>
                            <option value="base">Data Input</option>
                        </select>
                        <input type="hidden" id="field">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-default waves-effect" data-dismiss="modal">Batal</a>
                <a href="javascript:void(0);" id="btnSave" class="btn btn-orange waves-effect waves-light">Simpan</a>
            </div>
        </div>
    </div>
</div><!--End-->