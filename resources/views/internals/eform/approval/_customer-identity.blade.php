<div class="row">
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['customer']['other']['identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['customer']['other']['identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['customer']['other']['identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['customer']['other']['identity'], 'noimage.jpg'))
                <p>Foto KTP Kosong</p>
                @else
                <img src="@if(!empty($detail['customer']['other']['identity'])){{$detail['customer']['other']['identity']}}@endif" class="img-responsive imageZoom-up">
                <p>Foto KTP</p>
                @endif
            @else
                <a href="@if(!empty($detail['customer']['other']['identity'])){{$detail['customer']['other']['identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Foto KTP</p>
            @endif
        </div>
    </div>
    @if( ($detail['customer']['personal']['status_id']) == 2 )
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['customer']['personal']['couple_identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['customer']['personal']['couple_identity'], 'noimage.jpg'))
                <p>Foto KTP Pasangan Kosong</p>
                @else
                <img src="@if(!empty($detail['customer']['personal']['couple_identity'])){{$detail['customer']['personal']['couple_identity']}}@endif" class="img-responsive imageZoom-up">
                <p>Foto KTP Pasangan</p>
                @endif
            @else
                <a href="@if(!empty($detail['customer']['personal']['couple_identity'])){{$detail['customer']['personal']['couple_identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Foto KTP Pasangan</p>
            @endif
        </div>
    </div>
    @endif
</div>