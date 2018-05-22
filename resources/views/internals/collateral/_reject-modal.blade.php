<style type="text/css">
.custom-dialog {
    width: 500px;
    margin: 300px auto;
}
</style>
<!-- Modal Penolakan -->
<div id="reject-modal" class="modal fade">
    <div class="custom-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
            	<div class="row">
                    <div class="col-md-12 text-center">
		            	<div class="form-group">
		                	<label class="col-md-4 control-label"> Alasan Penolakan *</label> 
		            		<div class="col-md-8">
		            			<textarea name="reason" placeholder="Alasan Penolakan" class="form-control" rows="3" id="reason">{{old('reason')}}</textarea>
                                <p class="text-danger" id="validasi_penolakan" hidden="">Kolom Alasan Penolakan wajib diisi!</p>
		            		</div>
		            	</div>
		            </div>
		        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                <button type="button" id="btn-submit" class="btn btn-orange waves-effect waves-light">Submit</button>
            </div>
        </div>
    </div>
</div>