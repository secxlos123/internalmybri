<div class="row">
     <div class="panel-heading">
        <h4 class="panel-title">Rekomedasi</h4>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Rekomendasi AO :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['recommended'] == 'yes' ? 'Ya' : 'Tidak'}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
        </form>
    </div>
    </div>