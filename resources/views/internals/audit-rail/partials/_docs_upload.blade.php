<div class="row foto-nasabah">
    <div class="col-md-12">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Yang di Upload Nasabah</h3>
            </div>
             @foreach( $dataUpload as $dataUploads )
            <div class="panel-body">
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
                            <p>
                            @if(substr($dataUploads['name'], -19) == 'couple_identity.png' || substr($dataUploads['name'], -19) == 'couple_identity.jpg' || substr($dataUploads['name'], -19) == 'couple_identity.pdf' || substr($dataUploads['name'], -20) == 'couple_identity.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank">KTP Pasangan</a>
                            @elseif(substr($dataUploads['name'], -12) == 'identity.png' || substr($dataUploads['name'], -12) == 'identity.jpg' || substr($dataUploads['name'], -12) == 'identity.pdf' || substr($dataUploads['name'], -13) == 'identity.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">KTP Nasabah</a>
                            @elseif(substr($dataUploads['name'], -8) == 'npwp.pdf' || substr($dataUploads['name'], -8) == 'npwp.jpg' || substr($dataUploads['name'], -8) == 'npwp.png' || substr($dataUploads['name'], -9) == 'npwp.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">NPWP</a>
                            @elseif(substr($dataUploads['name'], -24) == 'marrital_certificate.pdf' || substr($dataUploads['name'], -24) == 'marrital_certificate.jpg' || substr($dataUploads['name'], -24) == 'marrital_certificate.png' || substr($dataUploads['name'], -25) == 'marrital_certificate.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Surat Nikah</a>
                            @elseif(substr($dataUploads['name'], -23) == 'photo_with_customer.pdf' || substr($dataUploads['name'], -23) == 'photo_with_customer.jpg' || substr($dataUploads['name'], -23) == 'photo_with_customer.png' || substr($dataUploads['name'], -24) == 'photo_with_customer.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Foto dengan Nasabah</a>
                            @elseif(substr($dataUploads['name'], -14) == 'permohonan.pdf' || substr($dataUploads['name'], -14) == 'permohonan.jpg' || substr($dataUploads['name'], -14) == 'permohonan.png' || substr($dataUploads['name'], -15) == 'permohonan.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Permohonan</a>
                            @elseif(substr($dataUploads['name'], -15) == 'family_card.pdf' || substr($dataUploads['name'], -15) == 'family_card.jpg' || substr($dataUploads['name'], -15) == 'family_card.png' || substr($dataUploads['name'], -16) == 'family_card.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Kartu Keluarga</a>
                            @elseif(substr($dataUploads['name'], -16) == 'building_tax.pdf' || substr($dataUploads['name'], -16) == 'building_tax.jpg' || substr($dataUploads['name'], -16) == 'building_tax.png' || substr($dataUploads['name'], -17) == 'building_tax.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">PBB</a>
                            @elseif(substr($dataUploads['name'], -19) == 'offering_letter.pdf' || substr($dataUploads['name'], -19) == 'offering_letter.jpg' || substr($dataUploads['name'], -19) == 'offering_letter.png' || substr($dataUploads['name'], -20) == 'offering_letter.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Surat Penawaran</a>
                            @elseif(substr($dataUploads['name'], -15) == 'salary_slip.pdf' || substr($dataUploads['name'], -15) == 'salary_slip.jpg' || substr($dataUploads['name'], -15) == 'salary_slip.png' || substr($dataUploads['name'], -16) == 'salary_slip.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Slip Gaji</a>
                            @elseif(substr($dataUploads['name'], -23) == 'divorce_certificate.pdf' || substr($dataUploads['name'], -23) == 'divorce_certificate.jpg' || substr($dataUploads['name'], -23) == 'divorce_certificate.png' || substr($dataUploads['name'], -24) == 'divorce_certificate.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Surat Perceraian</a>
                            @elseif(substr($dataUploads['name'], -18) == 'other_document.pdf' || substr($dataUploads['name'], -18) == 'other_document.jpg' || substr($dataUploads['name'], -18) == 'other_document.png' || substr($dataUploads['name'], -19) == 'other_document.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Dokumen Lainnya</a>
                            @elseif(substr($dataUploads['name'], -15) == 'work_letter.pdf' || substr($dataUploads['name'], -15) == 'work_letter.jpg' || substr($dataUploads['name'], -15) == 'work_letter.png' || substr($dataUploads['name'], -16) == 'work_letter.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Surat Kerja</a>
                            @elseif(substr($dataUploads['name'], -16) == 'down_payment.pdf' || substr($dataUploads['name'], -16) == 'down_payment.jpg' || substr($dataUploads['name'], -16) == 'down_payment.png' || substr($dataUploads['name'], -17) == 'down_payment.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Bukti Uang Muka</a>
                            @elseif(substr($dataUploads['name'], -18) == 'pefindo-report.pdf' || substr($dataUploads['name'], -18) == 'pefindo-report.jpg' || substr($dataUploads['name'], -18) == 'pefindo-report.png' || substr($dataUploads['name'], -19) == 'pefindo-report.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Laporan Pefindo</a>
                            @elseif(substr($dataUploads['name'], -19) == 'building_permit.pdf' || substr($dataUploads['name'], -19) == 'building_permit.jpg' || substr($dataUploads['name'], -19) == 'building_permit.png' || substr($dataUploads['name'], -20) == 'building_permit.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Surat Izin Mendirikan Bangunan</a>
                            @elseif(substr($dataUploads['name'], -15) == 'proprietary.pdf' || substr($dataUploads['name'], -15) == 'proprietary.jpg' || substr($dataUploads['name'], -15) == 'proprietary.png' || substr($dataUploads['name'], -16) == 'proprietary.jpeg' )
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive">Surat Hak Milik</a>
                            @endif
                            </p>
                            @endif
                            @else
                            <a href="@if(!empty($dataUploads['name'])){{$dataUploads['name']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>
                            @if(substr($dataUploads['name'], -19) == 'couple_identity.png' || substr($dataUploads['name'], -19) == 'couple_identity.jpg' || substr($dataUploads['name'], -19) == 'couple_identity.pdf')
                            Klik untuk lihat KTP Pasangan
                            @elseif(substr($dataUploads['name'], -12) == 'identity.png' || substr($dataUploads['name'], -12) == 'identity.jpg' || substr($dataUploads['name'], -12) == 'identity.pdf')
                            Klik untuk lihat KTP Nasabah
                            @elseif(substr($dataUploads['name'], -8) == 'npwp.pdf' || substr($dataUploads['name'], -8) == 'npwp.jpg' || substr($dataUploads['name'], -8) == 'npwp.png' )
                            Klik untuk lihat NPWP
                            @elseif(substr($dataUploads['name'], -24) == 'marrital_certificate.pdf' || substr($dataUploads['name'], -24) == 'marrital_certificate.jpg' || substr($dataUploads['name'], -24) == 'marrital_certificate.png' )
                            Klik untuk lihat Surat Nikah
                            @elseif(substr($dataUploads['name'], -23) == 'photo_with_customer.pdf' || substr($dataUploads['name'], -23) == 'photo_with_customer.jpg' || substr($dataUploads['name'], -23) == 'photo_with_customer.png' )
                            Klik untuk lihat Foto dengan Nasabah
                            @elseif(substr($dataUploads['name'], -14) == 'permohonan.pdf' || substr($dataUploads['name'], -14) == 'permohonan.jpg' || substr($dataUploads['name'], -14) == 'permohonan.png' )
                            Klik untuk Lihat Surat Permohonan
                            @elseif(substr($dataUploads['name'], -15) == 'family_card.pdf' || substr($dataUploads['name'], -15) == 'family_card.jpg' || substr($dataUploads['name'], -15) == 'family_card.png' )
                            Klik untuk Lihat Kartu Keluarga
                            @elseif(substr($dataUploads['name'], -16) == 'building_tax.pdf' || substr($dataUploads['name'], -16) == 'building_tax.jpg' || substr($dataUploads['name'], -16) == 'building_tax.png' )
                            Klik untuk Lihat PBB
                            @elseif(substr($dataUploads['name'], -19) == 'offering_letter.pdf' || substr($dataUploads['name'], -19) == 'offering_letter.jpg' || substr($dataUploads['name'], -19) == 'offering_letter.png' )
                            Klik untuk Lihat Surat Penawaran
                            @elseif(substr($dataUploads['name'], -15) == 'salary_slip.pdf' || substr($dataUploads['name'], -15) == 'salary_slip.jpg' || substr($dataUploads['name'], -15) == 'salary_slip.png' || substr($dataUploads['name'], -16) == 'salary_slip.jpeg' )
                            Klik untuk Lihat Slip Gaji
                            @elseif(substr($dataUploads['name'], -23) == 'divorce_certificate.pdf' || substr($dataUploads['name'], -23) == 'divorce_certificate.jpg' || substr($dataUploads['name'], -23) == 'divorce_certificate.png' || substr($dataUploads['name'], -24) == 'divorce_certificate.jpeg' )
                            Klik untuk Lihat Surat Perceraian
                            @elseif(substr($dataUploads['name'], -18) == 'other_document.pdf' || substr($dataUploads['name'], -18) == 'other_document.jpg' || substr($dataUploads['name'], -18) == 'other_document.png' || substr($dataUploads['name'], -19) == 'other_document.jpeg' )
                            Klik untuk Lihat Dokumen Lainnya
                            @elseif(substr($dataUploads['name'], -15) == 'work_letter.pdf' || substr($dataUploads['name'], -15) == 'work_letter.jpg' || substr($dataUploads['name'], -15) == 'work_letter.png' || substr($dataUploads['name'], -16) == 'work_letter.jpeg' )
                            Klik untuk Lihat Surat Kerja
                            @elseif(substr($dataUploads['name'], -16) == 'down_payment.pdf' || substr($dataUploads['name'], -16) == 'down_payment.jpg' || substr($dataUploads['name'], -16) == 'down_payment.png' || substr($dataUploads['name'], -17) == 'down_payment.jpeg' )
                            Klik untuk Lihat Bukti Uang Muka
                            @elseif(substr($dataUploads['name'], -7) == 'lkn.pdf')
                            Klik untuk melihat Dokumen LKN
                            @elseif(substr($dataUploads['name'], -16) == 'prescreening.pdf')
                            Klik untuk melihat Dokumen Prescreening
                            @elseif(substr($dataUploads['name'], -13) == 'recontest.pdf')
                            Klik untuk melihat Dokumen Rekontest
                            @elseif(substr($dataUploads['name'], -14) == 'collateral.pdf')
                            Klik untuk melihat Dokumen Collateral
                            @elseif(substr($dataUploads['name'], -18) == 'pefindo-report.pdf' || substr($dataUploads['name'], -18) == 'pefindo-report.jpg' || substr($dataUploads['name'], -18) == 'pefindo-report.png' || substr($dataUploads['name'], -19) == 'pefindo-report.jpeg' )
                            Klik untuk melihat Dokumen Pefindo
                            @elseif(substr($dataUploads['name'], -19) == 'building_permit.pdf' || substr($dataUploads['name'], -19) == 'building_permit.jpg' || substr($dataUploads['name'], -19) == 'building_permit.png' || substr($dataUploads['name'], -20) == 'building_permit.jpeg' )
                            Klik untuk melihat Dokumen Izin Mendirikan Bangunan
                            @elseif(substr($dataUploads['name'], -15) == 'proprietary.pdf' || substr($dataUploads['name'], -15) == 'proprietary.jpg' || substr($dataUploads['name'], -15) == 'proprietary.png' || substr($dataUploads['name'], -16) == 'proprietary.jpeg' )
                            Klik untuk melihat Dokumen Hak Milik
                            @endif
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
</div>
 
