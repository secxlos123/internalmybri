<div id="change-nik-modal" class="modal fade">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Ubah NIK</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="change-nik-form" onsubmit="return false;">
                    <div class="row">
                        <div class="col-md-12">
                            {{ csrf_field() }}
                            <div class="form-group new_nik {!! $errors->has('new_nik') ? 'has-error' : '' !!}">
                                <label class="col-md-3 control-label">NIK * :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control numericOnly" name="new_nik" id="new_nik" value="{{ old('new_nik') }}" maxlength="16">

                                    <p class="help-block new_nik-error"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <a href="#" data-dismiss="modal" class="btn btn-default waves-light waves-effect w-md">Batal</a>
                                <button type="submit" class="btn btn-orange waves-light waves-effect w-md" data-toggle="modal" id="change-nik-save" disabled> Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>