
<div class="row">
     <div class="panel-heading">
        <h4 class="panel-title">Dokumen Pendukung</h4>
    </div>
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['family_card']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['family_card']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['family_card'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['family_card'], 'noimage.jpg'))
                <p>Nama DOkumen Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['family_card'])){{$detail['visit_report']['family_card']}}@endif" class="img-responsive">
                <p>Nama DOkumen</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['family_card'])){{$detail['visit_report']['family_card']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Nama DOkumen</p>
            @endif
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['offering_letter'])), PATHINFO_EXTENSION) == 'jpeg'))
                 @if(strpos($detail['visit_report']['offering_letter'], 'noimage.jpg'))
                <p>Nama Dokumen Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['offering_letter'])){{$detail['visit_report']['offering_letter']}}@endif" class="img-responsive">
                <p>Nama Dokumen</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['offering_letter'])){{$detail['visit_report']['offering_letter']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Nama Dokumen</p>
            @endif
        </div>
    </div>

</div>