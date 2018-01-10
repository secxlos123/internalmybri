<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['name']}}</p>
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
                    <p class="form-control-static">{{$detail['score']}} (DITERIMA)</p>
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
                    <p class="form-control-static">{{$detail['scoring_mitra']}} (DITERIMA)</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Status Pengajuan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        {{$detail['status']}}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Suku Bunga :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['Suku_bunga']}} % pertahun</p>
                </div>
            </div>
        </form>  
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Mitra Kerjasama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['mitra']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Plafond :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['Plafond_usulan'], 2, ",", ".") }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Mitra Kerjasama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['npl_instansi']}} %</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Unit Kerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['npl_unitkerja']}} %</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Payroll :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        @if($detail['Payroll'] == '1')
                            Bank BRI
                        @else
                            Non Bank BRI
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Angsuran :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['angsuran_usulan'], 2, ",", ".") }}</p>
                </div>
            </div>
        </form>
    </div>
</div>