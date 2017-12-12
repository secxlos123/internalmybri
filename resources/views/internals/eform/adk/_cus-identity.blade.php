<div class="row">
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>NPWP</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>KK</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>Slip Gaji</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>SK Pertama</p>
        </div>
    </div>
    @if( ($detail['customer']['personal']['status_id']) == 2 )
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>SK Terakhir</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>Foto KTP</p>
        </div>
        <div class="card-box">
            <img src="@if(!empty($detail['customer']['personal']['couple_identity'])){{$detail['customer']['personal']['couple_identity']}}@endif" class="img-responsive">
            <p>Foto KTP Pasangan</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>SKPG</p>
        </div>
    </div>
    @endif
</div>