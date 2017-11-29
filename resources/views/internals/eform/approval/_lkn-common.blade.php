<div class="row">
     <div class="panel-heading">
        <h4 class="panel-title">Dokumen Pendukung</h4>
    </div>
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['visit_report']['npwp']}}" class="img-responsive" id="zoom">
            <p>NPWP</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['salary_slip'])){{$detail['visit_report']['salary_slip']}}@endif" class="img-responsive">
            <p>Slip Gaji</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            @if((pathinfo(strtolower($detail['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($detail['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($detail['visit_report']['legal_bussiness_document'])), PATHINFO_EXTENSION) == 'jpeg'))
            <img src="{{$detail['visit_report']['legal_bussiness_document']}}" class="img-responsive">
            @else
            <a href="#" class="btn btn-default"><i class="fa fa-download"></i></a>
            @endif
            <p>Dokumen Legal Usaha</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['license_of_practice'])){{$detail['visit_report']['license_of_practice']}}@endif" class="img-responsive">
            <p>Izin Praktek</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['work_letter'])){{$detail['visit_report']['work_letter']}}@endif" class="img-responsive">
            <p>Surat Keterangan Kerja</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['family_card'])){{$detail['visit_report']['family_card']}}@endif" class="img-responsive">
            <p>Kartu Keluarga</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['marrital_certificate'])){{$detail['visit_report']['marrital_certificate']}}@endif" class="img-responsive">
            <p>Akta Nikah/Cerai</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['divorce_certificate'])){{$detail['visit_report']['divorce_certificate']}}@endif" class="img-responsive">
            <p>Akta Pisah Harta</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['photo_with_customer'])){{$detail['visit_report']['photo_with_customer']}}@endif" class="img-responsive">
            <p>Foto Debitur</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['offering_letter'])){{$detail['visit_report']['offering_letter']}}@endif" class="img-responsive">
            <p>Surat Penawaran</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['down_payment'])){{$detail['visit_report']['down_payment']}}@endif" class="img-responsive">
            <p>Bukti DP</p>
        </div>
    </div>

    @if(($detail['visit_report']['use_reason'] == 2)||($detail['visit_report']['use_reason'] == 18))
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['proprietary'])){{$detail['visit_report']['proprietary']}}@endif" class="img-responsive">
            <p>Surat Hak Milik</p>
        </div>
    </div>

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['building_permit'])){{$detail['visit_report']['building_permit']}}@endif" class="img-responsive">
            <p>Izin Mendirikan Bangunan</p>
        </div>
    </div>
    @endif

    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="@if(!empty($detail['visit_report']['building_tax'])){{$detail['visit_report']['building_tax']}}@endif" class="img-responsive">
            <p>PBB Terakhir</p>
        </div>
    </div>
</div>