<div id="filter" class="m-b-15">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">NIK atau Nama Calon Debitur :</label>
                        <div class="col-sm-8">
                            <!-- <input type="text" class="form-control" id="username_activity"> -->
                            {!! Form::select('action_document', ['' => ''], old('name'), [
                                'class' => 'select2 action_document',
                                'data-placeholder' => 'Pilih NIK atau Nama Calon Debitur',
                                'id' => 'modul_action_document'
                            ]) !!}
                        </div>
                    </div>
                </form>
            <div class="text-right">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="filter-document">Filter</a>
            </div>
        </div>
    </div>
</div>
</div>

<div id="detail-user">
    
</div>