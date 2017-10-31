<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Kerabat/Keluarga :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nomor Handphone :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_contact']}}</p>
                </div>
            </div>
            
        </form>  
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Hubungan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>