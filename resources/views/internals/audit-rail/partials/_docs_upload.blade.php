<div class="row foto-nasabah">
    <div class="col-md-12">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen PDF</h3>
            </div>
             @foreach( $dataUpload as $dataUploads )
                @if(substr($dataUploads['name'], -3) != 'pdf')
            <div class="panel-body" hidden="hidden">
                @else
            <div class="panel-body">
                @endif
                <div class="row">
                    <div class="col-md-3" align="center">
                    </div>
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($dataUploads['name']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataUploads['name']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataUploads['name'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($dataUploads['name'], 'noimage.jpg'))
                            <!-- <p>Document</p> -->
                            @else
                            <img src="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" class="img-responsive">
                            <!-- <p>Document</p> -->
                            @endif
                            @else
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Dokumen</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
</div>
 
