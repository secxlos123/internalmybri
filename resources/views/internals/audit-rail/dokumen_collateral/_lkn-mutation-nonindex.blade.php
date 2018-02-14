<div class="row">
    <div class="panel-heading">
        <h4 class="panel-title">Mutasi</h4>
    </div>
</div>
@foreach($detail['visit_report']['mutation'] as $mutation)
<div id="mutations" class="mutations">
    <div class="panel-body" style="border-style:solid;border-width:0.5px;border-color:#f3f3f3">  
        <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($mutation['file']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($mutation['file']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($mutation['file'])), PATHINFO_EXTENSION) == 'jpeg'))
                <img src="@if(!empty($mutation['file'])){{$mutation['file']}}@endif" class="img-responsive">
                <p>File Mutasi</p>
            @else
                <a href="@if(!empty($mutation['file'])){{$mutation['file']}}@endif" target="_blank"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat File Mutasi</p>
            @endif
        </div>
    </div>
    </div>
</div>
@endforeach