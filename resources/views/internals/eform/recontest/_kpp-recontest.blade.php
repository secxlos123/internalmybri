<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-horizontal" role="form">
                <input type="hidden" name="id_prescreening" id="id_prescreening" value="12">
                <div class="form-group {!! $errors->has('kpp_type') ? 'has-error' : '' !!}" id="kpp_type">
                    <label class="col-md-4 control-label">KPP :</label>
                    <div class="col-md-8">
                        <p class="form-control-static"> {{$eformData['visit_report']['kpp_type_name']}}</p>
                    </div>
                </div>
                <div class="form-group {!! $errors->has('type_financed') ? 'has-error' : '' !!}" id="type_financed">
                    <label class="col-md-4 control-label">Jenis Dibiayai :</label>
                    <div class="col-md-8">
                        <p class="form-control-static"> {{$eformData['visit_report']['type_financed_name']}}</p>
                    </div>
                </div>
                <div class="form-group {!! $errors->has('economy_sector') ? 'has-error' : '' !!}" id="economy_sector">
                    <label class="col-md-4 control-label">Sektor Ekonomi :</label>
                    <div class="col-md-8">
                        <p class="form-control-static"> {{$eformData['visit_report']['economy_sector_name']}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-horizontal" role="form">
                <div class="form-group {!! $errors->has('project_list') ? 'has-error' : '' !!}" id="project_list">
                    <label class="col-md-4 control-label">Project :</label>
                    <div class="col-md-8">
                        @if($eformData['kpr']['developer_id'] == 1)
                        <p class="form-control-static"> TIDAK MENGIKUTI PROJECT</p>
                        @else
                        <p class="form-control-static"> {{$eformData['kpr']['property_name']}}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group {!! $errors->has('program_list') ? 'has-error' : '' !!}" id="program_list">
                    <label class="col-md-4 control-label">Program :</label>
                    <div class="col-md-8">
                        <p class="form-control-static"> {{$eformData['visit_report']['program_list_name']}}</p>
                    </div>
                </div>
                <div class="form-group {!! $errors->has('use_reason') ? 'has-error' : '' !!}" id="use_reason">
                    <label class="col-md-4 control-label">Tujuan Penggunaan :</label>
                    <div class="col-md-8">
                        <p class="form-control-static"> {{$eformData['visit_report']['use_reason_name']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>