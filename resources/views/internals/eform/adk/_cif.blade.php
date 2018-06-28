<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Cif Number :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$data_cif['cif_number']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Alamat :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$data_cif['address']}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Lengkap :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$data_cif['name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Ibu Kandung :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$data_cif['mother_name']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>