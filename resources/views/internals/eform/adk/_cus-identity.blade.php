<div class="row">
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>Foto KTP</p>
        </div>
        <div class="card-box">
            <img src="{{$briguna['Url'].'/'.$briguna['NPWP_nasabah']}}" class="img-responsive">
            <p>NPWP</p>
        </div>
        <div class="card-box">
            <img src="{{$briguna['Url'].'/'.$briguna['SK_AWAL']}}" class="img-responsive">
            <p>SK Pertama</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>SKPG</p>
        </div>
    </div>
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$briguna['Url'].'/'.$briguna['KK']}}" class="img-responsive">
            <p>KK</p>
        </div>
        <div class="card-box">
            <img src="{{$briguna['Url'].'/'.$briguna['SLIP_GAJI']}}" class="img-responsive">
            <p>Slip Gaji</p>
        </div>
        <div class="card-box">
            <img src="{{$briguna['Url'].'/'.$briguna['SK_AKHIR']}}" class="img-responsive">
            <p>SK Terakhir</p>
        </div>
    </div>
    @if( ($detail['customer']['personal']['status']) == 2 )
    <div class="col-md-12" align="center">
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>Foto KTP</p>
        </div>
        <div class="card-box">
            <img src="@if(!empty($detail['customer']['personal']['couple_identity'])){{$detail['customer']['personal']['couple_identity']}}@endif" class="img-responsive">
            <p>Foto KTP Pasangan</p>
        </div>
    </div>
    @endif
</div>