<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">NIK Pasangan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['couple_nik']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Pasangan :</label>
                <div class="col-md-7">
                    <p class="form-control-static"> {{$detail['customer']['personal']['couple_name']}}</p>
                </div>
            </div>
            
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Tempat Tanggal Lahir Pasangan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['couple_birth_place']}}, {{ substr($detail['customer']['personal']['couple_birth_date'], -2) }}-{{ substr($detail['customer']['personal']['couple_birth_date'], 5, 2) }}-{{ substr($detail['customer']['personal']['couple_birth_date'], 0, 4) }}</p>
                </div>
            </div>
        </form>
    </div>
</div>