<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Pekerjaan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['work']['type']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pekerjaan :</label>
                <div class="col-md-7">
                    <p class="form-control-static"> {{$detail['customer']['work']['work']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Perusahaan :</label>
                <div class="col-md-7">
                    <p class="form-control-static"> {{$detail['customer']['work']['company_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Bidang Pekerjaan :</label>
                <div class="col-md-7">
                    <p class="form-control-static"> {{$detail['customer']['work']['work_field']}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Jabatan :</label>
                <div class="col-md-7">
                    <p class="form-control-static"> {{$detail['customer']['work']['position']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Lama Kerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static"> {{$detail['customer']['work']['work_duration']}} Tahun {{$detail['customer']['work']['work_duration_month']}} Bulan</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Alamat Kantor :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                         {{$detail['customer']['work']['office_address']}}
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>