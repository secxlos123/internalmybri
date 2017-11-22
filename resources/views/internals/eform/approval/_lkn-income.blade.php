<div class="row">
    <div class="panel-heading">
        <h4 class="panel-title">Sumber Penghasilan</h4>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Gaji/Penghasilan :</label>
                <div class="col-md-7">
                    @if (!$detail['visit_report']['income_salary'] >= 0)
                        <p class="form-control-static">Rp. {{ number_format($detail['visit_report']['income'], 2, ",", ".") }}</p>
                    @else
                    <p class="form-control-static">Rp. {{ number_format($detail['visit_report']['income_salary'], 2, ",", ".") }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Penghasilan Lain :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['visit_report']['income_allowance'], 2, ",", ".") }}</p>
                </div>
            </div>
        </form>
    </div>
    @if($detail['customer']['personal']['status_id'] == 2)
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Penghasilan Pasangan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['visit_report']['couple_salary'], 2, ",", ".") }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-5 control-label">Penghasilan Lain Pasangan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['visit_report']['couple_other_salary'], 2, ",", ".") }}</p>
                </div>
            </div>
        </form>
    </div>
    @endif
</div>