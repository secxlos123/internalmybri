<div class="row">
    <div class="panel-heading">
        <h4 class="panel-title">Sumber Penghasilan</h4>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Gaji/Penghasilan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp{{$detail['customer']['financial']['salary']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Penghasilan Lain :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp{{$detail['customer']['financial']['other_salary']}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Penghasilan Pasangan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp{{$detail['customer']['financial']['salary_couple']}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-5 control-label">Penghasilan Lain Pasangan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp{{$detail['customer']['financial']['other_salary_couple']}}</p>
                </div>
            </div>
        </form>
    </div>
    </div>