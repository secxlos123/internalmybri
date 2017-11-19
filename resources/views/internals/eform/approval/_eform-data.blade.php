<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">No. Referensi Pengajuan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['ref_number']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jumlah Permohonan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['nominal'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Produk :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{strtoupper($detail['product_type'])}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jangka Waktu :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['kpr']['year']}} Bulan</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Pengaju :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['ao_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Kantor Cabang :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{ isset($detail['branch']) ? $detail['branch'] : '' }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Tanggal Pertemuan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['appointment_date']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>