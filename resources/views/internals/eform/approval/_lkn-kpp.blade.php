<div class="row">
    <div class="panel-heading">
        <h4 class="panel-title">KPP</h4>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">KPP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['kpp_type']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Dibiayai :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['type_financed']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Sektor Ekonomi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['economy_sector']}}</p>
                </div>
            </div>            
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Project :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['project_list']}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-5 control-label">Program :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['program_list']}}</p>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-md-5 control-label">Tujuan Penggunaan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['use_reason']}}</p>
                </div>
            </div>
        </form>
    </div>
    </div>