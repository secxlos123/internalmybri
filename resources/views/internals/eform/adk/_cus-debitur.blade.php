<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Usia MPP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['nik']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Atasan Langsung :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPWP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['birth_place']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. dan Tgl. Kenaikan SK Pangkat Terakhir :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['birth_date']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Federal WH Code :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['address']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Transaksi Normal Harian :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{(isset($detail['customer']['personal']['phone']) ? $detail['customer']['personal']['phone'] : '-' )}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Tanggal Mulai Bekerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['gender']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jabatan Atasan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['citizenship']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. dan Tgl. SK Peningkatan Pegawai Pertama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['status']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Resident Flag :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['address_status']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pernah Pinjam di Bank Lain :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['email']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Perjanjian Pisah Harta :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['mother_name']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>