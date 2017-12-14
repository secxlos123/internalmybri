<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['first_name']}}</p>
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
                    <p class="form-control-static">{{$briguna['score']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jabatan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['work']['position']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Scoring Mitra :</label>
                <div class="col-md-7">
                    <p class="form-control-static">-</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Baru/Suplesi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['baru_atau_perpanjang']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Bunga :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Suku_bunga']}} % pertahun</p>
                </div>
            </div>
        </form>  
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Instansi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['mitra']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Plafond :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($briguna['Plafond_usulan'], 2, ",", ".") }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Instansi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['npl_instansi']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Unit Kerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['npl_unitkerja']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Payroll :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        @if($briguna['Payroll'] == '1')
                            Payroll Bank BRI
                        @else
                            Payroll Non BRI
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Angsuran :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($briguna['angsuran_usulan'], 2, ",", ".") }}</p>
                </div>
            </div>
        </form>
    </div>
</div>