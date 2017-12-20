<div class="row">
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>Foto KTP</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['NPWP_nasabah']}}" class="img-responsive">
            <p>NPWP</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['SK_AWAL']}}" class="img-responsive">
            <p>SK Pertama</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['SKPG']}}" class="img-responsive">
            <p>SKPG</p>
        </div>
    </div>
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['KK']}}" class="img-responsive">
            <p>KK</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['SLIP_GAJI']}}" class="img-responsive">
            <p>Slip Gaji</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['SK_AKHIR']}}" class="img-responsive">
            <p>SK Terakhir</p>
        </div>
    </div>
    @if( ($detail['customer']['personal']['status']) == 2 )
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['customer']['personal']['couple_identity']}}" class="img-responsive">
            <p>Foto KTP Pasangan</p>
        </div>
    </div>
    @endif
</div>