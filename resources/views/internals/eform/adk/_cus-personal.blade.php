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
                    <p class="form-control-static">
                    {{ substr($detail['customer']['personal']['birth_date'], -2) }}-{{ substr($detail['customer']['personal']['birth_date'], 5, 2) }}-{{ substr($detail['customer']['personal']['birth_date'], 0, 4) }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Alamat :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['address']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Kota :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['birth_place']}}</p>
                </div>
            </div>
            <!-- <div class="form-group">
                <label class="col-md-5 control-label">No. Telepon :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{(isset($detail['customer']['personal']['phone']) ? $detail['customer']['personal']['phone'] : '-' )}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. Handphone :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{(isset($detail['customer']['personal']['mobile_phone']) ? $detail['customer']['personal']['mobile_phone'] : '-' )}}</p>
                </div>
            </div> -->
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Kelamin :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($detail['customer']['personal']['gender'] == 'L' || $detail['customer']['personal']['gender'] == 'l')
                        Laki - Laki
                    @else
                        Perempuan
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Kewarganegaraan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['citizenship_name']}}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Status Pernikahan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($detail['customer']['personal']['status'] == '1')
                        Lajang
                    @elseif($detail['customer']['personal']['status'] == '2')
                        Menikah
                    @else
                        Janda / Duda
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Status Tempat Tinggal :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($detail['customer']['personal']['address_status'] == '0')
                        Milik Sendiri
                    @elseif($detail['customer']['personal']['status'] == '1')
                        Milik Orang Tua
                    @else
                        Tinggal Di Rumah Sewa
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Email :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['email']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Ibu Kandung :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['mother_name']}}</p>
                </div>
            </div>
            <!-- <div class="form-group">
                <label class="col-md-5 control-label">Agama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['agama']}}</p>
                </div>
            </div> -->
        </form>
    </div>
</div>