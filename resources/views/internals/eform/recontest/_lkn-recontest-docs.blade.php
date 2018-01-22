
<div class="row">
     <div class="panel-heading">
        <h4 class="panel-title">Dokumen Pendukung</h4>
    </div>
    @foreach($detail['recontest']['documents'] as $docs)
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($docs['image']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($docs['image']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($docs['image'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($docs['image'], 'noimage.jpg'))
                <p>{{ucwords($docs['name'])}} Kosong</p>
                @else
                <img src="@if(!empty($docs['image'])){{$docs['image']}}@endif" class="img-responsive">
                <p>{{ucwords($docs['name'])}}</p>
                @endif
            @else
                <a href="@if(!empty($docs['image'])){{$docs['image']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat {{ucwords($docs['name'])}}</p>
            @endif
        </div>
    </div>
    @endforeach
</div>