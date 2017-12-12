<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Gaji :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">CRS :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jabatan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Scoring Mitra :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Baru/Suplesi:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Bunga :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}} % pertahun</p>
                </div>
            </div>
        </form>  
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Instansi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Plafond :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Instansi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Unit Kerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Payroll :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Angsuran :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
        </form>
    </div>
</div>