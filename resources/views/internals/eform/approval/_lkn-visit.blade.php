<div class="row">
    <div class="panel-heading">
        <h4 class="panel-title">Kunjungan</h4>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama AO :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['ao_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Tempat Kunjungan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['address']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Tanggal Kunjungan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['appointment_date']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Calon Debitur :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer_name']}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-5 control-label">Tujuan Kunjungan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['purpose_of_visit']}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">No. Referensi Pinjaman :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['ref_number']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jumlah Permohonan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp{{number_format($detail['nominal'],2,',','.')}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Pinjaman :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{strtoupper($detail['product_type'])}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nomor NPWP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['npwp_number_masking']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Hasil Kunjungan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['visit_result']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>