
<div class="row">
     <div class="panel-heading">
        <h4 class="panel-title">Dokumen Pendukung</h4>
    </div>
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['npwp']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['npwp']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['npwp'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['npwp'], 'noimage.jpg'))
                <p>Foto NPWP Kosong</p>
                <img class="img-responsive" id="zoom">
                @else
                <img src="{{$detail['visit_report']['npwp']}}" class="img-responsive" id="zoom">
                <p>Foto NPWP</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['npwp'])){{$detail['visit_report']['npwp']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Foto NPWP</p>
            @endif
        </div>
    </div>
@if($detail['visit_report']['source'] == 'fixed')
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['salary_slip']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['salary_slip']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['salary_slip'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['salary_slip'], 'noimage.jpg'))
                <p>Slip Gaji Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['salary_slip'])){{$detail['visit_report']['salary_slip']}}@endif" class="img-responsive">
                <p>Slip Gaji</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['salary_slip'])){{$detail['visit_report']['salary_slip']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Slip Gaji</p>
            @endif
        </div>
    </div>

    <!-- <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['license_of_practice'])){{$detail['visit_report']['license_of_practice']}}@endif" class="img-responsive">
            <p>Izin Praktek</p>
        </div>
    </div> -->

    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['work_letter']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['work_letter']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['work_letter'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['work_letter'], 'noimage.jpg'))
                <p>Surat Keterangan Kerja Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['work_letter'])){{$detail['visit_report']['work_letter']}}@endif" class="img-responsive">
                <p>Surat Keterangan Kerja</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['work_letter'])){{$detail['visit_report']['work_letter']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Surat Keterangan Kerja</p>
            @endif
        </div>
    </div>
@endif

@if($detail['visit_report']['source'] == 'nonfixed')
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['legal_bussiness_document'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['legal_bussiness_document'], 'noimage.jpg'))
                <p>Dokumen Legal Usaha Kosong</p>
                @else
                <img src="{{$detail['visit_report']['legal_bussiness_document']}}" class="img-responsive">
                <p>Klik Untuk Lihat Dokumen Legal Usaha</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['legal_bussiness_document'])){{$detail['visit_report']['legal_bussiness_document']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Dokumen Legal Usaha</p>
            @endif
        </div>
    </div>
@endif

    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['family_card']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['family_card']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['family_card'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['family_card'], 'noimage.jpg'))
                <p>Kartu Keluarga Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['family_card'])){{$detail['visit_report']['family_card']}}@endif" class="img-responsive">
                <p>Kartu Keluarga</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['family_card'])){{$detail['visit_report']['family_card']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Kartu Keluarga</p>
            @endif
        </div>
    </div>
@if(!empty($detail['customer']['personal']['status_id'] > 1))
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['marrital_certificate']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['marrital_certificate']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['marrital_certificate'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['marrital_certificate'], 'noimage.jpg'))
                <p>Akta Nikah/Cerai Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['marrital_certificate'])){{$detail['visit_report']['marrital_certificate']}}@endif" class="img-responsive">
                <p>Akta Nikah/Cerai</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['marrital_certificate'])){{$detail['visit_report']['marrital_certificate']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Akta Nikah/Cerai</p>
            @endif
        </div>
    </div>
@endif
@if(($detail['customer']['financial']['status_finance'] != "Join Income") && ($detail['customer']['personal']['status_id'] == 2 ))
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['divorce_certificate']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['divorce_certificate']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['divorce_certificate'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['divorce_certificate'], 'noimage.jpg'))
                <p>Akta Pisah Harta Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['divorce_certificate'])){{$detail['visit_report']['divorce_certificate']}}@endif" class="img-responsive">
                <p>Akta Pisah Harta</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['divorce_certificate'])){{$detail['visit_report']['divorce_certificate']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Akta Pisah Harta</p>
            @endif
        </div>
    </div>
@endif

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['photo_with_customer'])){{$detail['visit_report']['photo_with_customer']}}@endif" class="img-responsive">
            <p>Foto Debitur</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['offering_letter'])), PATHINFO_EXTENSION) == 'jpeg'))
                 @if(strpos($detail['visit_report']['offering_letter'], 'noimage.jpg'))
                <p>Surat Penawaran Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['offering_letter'])){{$detail['visit_report']['offering_letter']}}@endif" class="img-responsive">
                <p>Surat Penawaran</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['offering_letter'])){{$detail['visit_report']['offering_letter']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Surat Penawaran</p>
            @endif
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['down_payment']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['down_payment']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['down_payment'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['down_payment'], 'noimage.jpg'))
                <p>Bukti DP Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['down_payment'])){{$detail['visit_report']['down_payment']}}@endif" class="img-responsive">
                <p>Bukti DP</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['down_payment'])){{$detail['visit_report']['down_payment']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Bukti DP</p>
            @endif
        </div>
    </div>

    @if(($detail['visit_report']['use_reason'] == 2)||($detail['visit_report']['use_reason'] == 18))
    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['proprietary']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['proprietary']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['proprietary'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['proprietary'], 'noimage.jpg'))
                <p>Surat Hak Milik Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['proprietary'])){{$detail['visit_report']['proprietary']}}@endif" class="img-responsive">
                <p>Surat Hak Milik</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['proprietary'])){{$detail['visit_report']['proprietary']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Surat Hak Milik</p>
            @endif
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['building_permit']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['building_permit']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['building_permit'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['building_permit'], 'noimage.jpg'))
                <p>Izin Mendirikan Bangunan Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['building_permit'])){{$detail['visit_report']['building_permit']}}@endif" class="img-responsive">
                <p>Izin Mendirikan Bangunan</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['building_permit'])){{$detail['visit_report']['building_permit']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Izin Mendirikan Bangunan</p>
            @endif
        </div>
    </div>
    @endif

    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['building_tax']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['building_tax']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['building_tax'])), PATHINFO_EXTENSION) == 'jpeg'))
                @if(strpos($detail['visit_report']['building_tax'], 'noimage.jpg'))
                <p>PBB Terakhir Kosong</p>
                @else
                <img src="@if(!empty($detail['visit_report']['building_tax'])){{$detail['visit_report']['building_tax']}}@endif" class="img-responsive">
                <p>PBB Terakhir</p>
                @endif
            @else
                <a href="@if(!empty($detail['visit_report']['building_tax'])){{$detail['visit_report']['building_tax']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat PBB Terakhir</p>
            @endif
        </div>
    </div>
</div>