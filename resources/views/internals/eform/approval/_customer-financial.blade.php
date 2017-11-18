 <div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label title ="Take Home Pay Per Bulan" class="col-md-5 control-label">Gaji/Pendapatan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp{{($detail['customer']['financial']['salary'])}}</p>
                </div>
            </div>
            <div class="form-group">
                <label title ="Rata-Rata Per Bulan" class="col-md-5 control-label">Pendapatan Lain :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp{{($detail['customer']['financial']['other_salary'])}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Angsuran Permohonan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp{{($detail['customer']['financial']['loan_installment'])}}</p>
                </div>
            </div>
            <div class="form-group">
                <label title ="Jumlah Anak Tanggungan" class="col-md-5 control-label">Jumlah Tanggungan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['financial']['dependent_amount']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>