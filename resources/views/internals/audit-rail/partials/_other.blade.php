<div class="row foto-nasabah">
    <div class="col-md-12">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Lain-lain</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($dataCustomer['customer']['other']['identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['customer']['other']['identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['customer']['other']['identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($dataCustomer['customer']['other']['identity'], 'noimage.jpg'))
                            <p>Foto KTP Kosong</p>
                            @else
                            <img src="@if(!empty($dataCustomer['customer']['other']['identity'])){{$dataCustomer['customer']['other']['identity']}}@endif" class="img-responsive">
                            <p>Foto KTP</p>
                            @endif
                            @else
                            <a href="@if(!empty($dataCustomer['customer']['other']['identity'])){{$dataCustomer['customer']['other']['identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Foto KTP</p>
                            @endif
                        </div>
                    </div>
                    @if(!empty($dataCustomer['customer']['personal']['status_id'])&&($dataCustomer['customer']['personal']['status_id'] == 2))
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($dataCustomer['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['customer']['personal']['couple_identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($dataCustomer['customer']['personal']['couple_identity'], 'noimage.jpg'))
                            <p>Foto KTP Pasangan Kosong</p>
                            @else
                            <img src="@if(!empty($dataCustomer['customer']['personal']['couple_identity'])){{$dataCustomer['customer']['personal']['couple_identity']}}@endif" class="img-responsive">
                            <p>Foto KTP Pasangan</p>
                            @endif
                            @else
                            <a href="@if(!empty($dataCustomer['customer']['personal']['couple_identity'])){{$dataCustomer['customer']['personal']['couple_identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Foto KTP Pasangan</p>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>