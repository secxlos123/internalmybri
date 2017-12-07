<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">NIK :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['nik']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Lengkap :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Tempat Lahir :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['birth_place']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Tanggal Lahir :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['birth_date']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Alamat :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['address']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. Telepon :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['phone']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. Handphone :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['mobile_phone']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pendidikan Terakhir :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{ get_title($detail['visit_report']['title']) }}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Kelamin :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['gender']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Kewarganegaraan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['citizenship']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Status Pernikahan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['status']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Status Tempat Tinggal :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['address_status']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Email :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['email']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Gadis Ibu Kandung :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['mother_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Agama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{ get_religion($detail['visit_report']['religion']) }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Riwayat Kepemilikan Rekening Pinjaman :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{ get_loan_history($detail['visit_report']['loan_history_accounts']) }}</p>
                </div>
            </div>
        </form>
    </div>
</div>