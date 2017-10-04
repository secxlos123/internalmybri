<div class="panel-body">
    <div class="row">
        <div class="col-md-9">
            <div class="form-horizontal" role="form">
                <input type="hidden" name="use_reason_id" id="use_reason_id" value="">
                <input type="hidden" name="id_prescreening" id="id_prescreening" value="0">
                <div class="form-group {!! $errors->has('kpp_type') ? 'has-error' : '' !!}" id="kpp_type">
                    <label class="col-md-4 control-label">KPP *:</label>
                    <div class="col-md-8">
                        {!! Form::select('kpp_type', ['' => ''], old('kpp_type'), [
                            'class' => 'select2 kpp_type',
                            'data-placeholder' => 'Pilih KPP',
                        ]) !!}
                    </div>
                </div>
                <div class="form-group {!! $errors->has('type_financed') ? 'has-error' : '' !!}" id="type_financed">
                    <label class="col-md-4 control-label">Jenis Dibiayai *:</label>
                    <div class="col-md-8">
                        {!! Form::select('type_financed', ['' => ''], old('type_financed'), [
                            'class' => 'select2 type_financed',
                            'data-placeholder' => 'Pilih Jenis Dibiayai',
                        ]) !!}
                    </div>
                </div>
                <div class="form-group {!! $errors->has('economy_sector') ? 'has-error' : '' !!}" id="economy_sector">
                    <label class="col-md-4 control-label">Sektor Ekonomi *:</label>
                    <div class="col-md-8">
                        {!! Form::select('economy_sector', ['' => ''], old('economy_sector'), [
                            'class' => 'select2 economy_sector',
                            'data-placeholder' => 'Pilih Sektor Ekonomi',
                        ]) !!}
                    </div>
                </div>
                <div class="form-group {!! $errors->has('project_list') ? 'has-error' : '' !!}" id="project_list">
                    <label class="col-md-4 control-label">Project *:</label>
                    <div class="col-md-8">
                        {!! Form::select('project_list', ['' => ''], old('project_list'), [
                            'class' => 'select2 project_list',
                            'data-placeholder' => 'Pilih Project',
                        ]) !!}
                    </div>
                </div>
                <div class="form-group {!! $errors->has('program_list') ? 'has-error' : '' !!}" id="program_list">
                    <label class="col-md-4 control-label">Program *:</label>
                    <div class="col-md-8">
                        {!! Form::select('program_list', ['' => ''], old('program_list'), [
                            'class' => 'select2 program_list',
                            'data-placeholder' => 'Pilih Program',
                        ]) !!}
                    </div>
                </div>
                <div class="form-group {!! $errors->has('use_reason') ? 'has-error' : '' !!}" id="use_reason">
                    <label class="col-md-4 control-label">Tujuan Penggunaan *:</label>
                    <div class="col-md-8">
                        {!! Form::select('use_reason', ['' => ''], old('use_reason'), [
                            'class' => 'select2 use_reason',
                            'data-placeholder' => 'Pilih Tujuan Penggunaan',
                        ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>