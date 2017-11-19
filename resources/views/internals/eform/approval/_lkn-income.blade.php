<div class="row">
    <div class="panel-heading">
        <h4 class="panel-title">Sumber Penghasilan</h4>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Gaji/Penghasilan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Penghasilan Lain :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['other_salary'], 2, ",", ".") }}</p>
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
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary_couple'], 2, ",", ".") }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-5 control-label">Penghasilan Lain Pasangan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['other_salary_couple'], 2, ",", ".") }}</p>
                </div>
            </div>
        </form>
    </div>
    @endif
</div>