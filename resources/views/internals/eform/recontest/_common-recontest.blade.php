<div class="panel-body">
    <div class="row">
        <div class="col-md-10">
            <div class="form-horizontal" role="form">
                <div class="form-group">
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['npwp']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['npwp']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['npwp'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['npwp'], 'noimage.jpg'))
                            <p>Foto NPWP Kosong</p>
                            <img class="img-responsive" id="zoom">
                            @else
                            <img src="{{$eformData['visit_report']['npwp']}}" class="img-responsive" id="zoom">
                            <p>Foto NPWP</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['npwp'])){{$eformData['visit_report']['npwp']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Foto NPWP</p>
                            @endif
                        </div>
                    </div>
                    @if($eformData['visit_report']['source'] == 'fixed')
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['salary_slip']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['salary_slip']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['salary_slip'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['salary_slip'], 'noimage.jpg'))
                            <p>Slip Gaji Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['salary_slip'])){{$eformData['visit_report']['salary_slip']}}@endif" class="img-responsive">
                            <p>Slip Gaji</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['salary_slip'])){{$eformData['visit_report']['salary_slip']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Slip Gaji</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['work_letter']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['work_letter']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['work_letter'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['work_letter'], 'noimage.jpg'))
                            <p>Surat Keterangan Kerja Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['work_letter'])){{$eformData['visit_report']['work_letter']}}@endif" class="img-responsive">
                            <p>Surat Keterangan Kerja</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['work_letter'])){{$eformData['visit_report']['work_letter']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Surat Keterangan Kerja</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($eformData['visit_report']['source'] == 'nonfixed')
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['legal_bussiness_document'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['legal_bussiness_document'], 'noimage.jpg'))
                            <p>Dokumen Legal Usaha Kosong</p>
                            @else
                            <img src="{{$eformData['visit_report']['legal_bussiness_document']}}" class="img-responsive">
                            <p>Klik Untuk Lihat Dokumen Legal Usaha</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['legal_bussiness_document'])){{$eformData['visit_report']['legal_bussiness_document']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Dokumen Legal Usaha</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['family_card']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['family_card']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['family_card'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['family_card'], 'noimage.jpg'))
                            <p>Kartu Keluarga Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['family_card'])){{$eformData['visit_report']['family_card']}}@endif" class="img-responsive">
                            <p>Kartu Keluarga</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['family_card'])){{$eformData['visit_report']['family_card']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Kartu Keluarga</p>
                            @endif
                        </div>
                    </div>
                    @if(!empty($eformData['customer']['personal']['status_id'] > 1))
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['marrital_certificate']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['marrital_certificate']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['marrital_certificate'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['marrital_certificate'], 'noimage.jpg'))
                            <p>Akta Nikah/Cerai Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['marrital_certificate'])){{$eformData['visit_report']['marrital_certificate']}}@endif" class="img-responsive">
                            <p>Akta Nikah/Cerai</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['marrital_certificate'])){{$eformData['visit_report']['marrital_certificate']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Akta Nikah/Cerai</p>
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(($eformData['customer']['financial']['status_finance'] != "Join Income") && ($eformData['customer']['personal']['status_id'] == 2 ))
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['divorce_certificate']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['divorce_certificate']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['divorce_certificate'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['divorce_certificate'], 'noimage.jpg'))
                            <p>Akta Pisah Harta Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['divorce_certificate'])){{$eformData['visit_report']['divorce_certificate']}}@endif" class="img-responsive">
                            <p>Akta Pisah Harta</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['divorce_certificate'])){{$eformData['visit_report']['divorce_certificate']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Akta Pisah Harta</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            <img src="@if(!empty($eformData['visit_report']['photo_with_customer'])){{$eformData['visit_report']['photo_with_customer']}}@endif" class="img-responsive">
                            <p>Foto Debitur</p>
                        </div>
                    </div>

                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['offering_letter'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['offering_letter'], 'noimage.jpg'))
                            <p>Surat Penawaran Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['offering_letter'])){{$eformData['visit_report']['offering_letter']}}@endif" class="img-responsive">
                            <p>Surat Penawaran</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['offering_letter'])){{$eformData['visit_report']['offering_letter']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Surat Penawaran</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['down_payment']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['down_payment']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['down_payment'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['down_payment'], 'noimage.jpg'))
                            <p>Bukti DP Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['down_payment'])){{$eformData['visit_report']['down_payment']}}@endif" class="img-responsive">
                            <p>Bukti DP</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['down_payment'])){{$eformData['visit_report']['down_payment']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Bukti DP</p>
                            @endif
                        </div>
                    </div>

                    @if(($eformData['visit_report']['use_reason'] == 2)||($eformData['visit_report']['use_reason'] == 18))
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['proprietary']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['proprietary']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['proprietary'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['proprietary'], 'noimage.jpg'))
                            <p>Surat Hak Milik Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['proprietary'])){{$eformData['visit_report']['proprietary']}}@endif" class="img-responsive">
                            <p>Surat Hak Milik</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['proprietary'])){{$eformData['visit_report']['proprietary']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Surat Hak Milik</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['building_permit']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['building_permit']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['building_permit'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['building_permit'], 'noimage.jpg'))
                            <p>Izin Mendirikan Bangunan Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['building_permit'])){{$eformData['visit_report']['building_permit']}}@endif" class="img-responsive">
                            <p>Izin Mendirikan Bangunan</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['building_permit'])){{$eformData['visit_report']['building_permit']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Izin Mendirikan Bangunan</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['building_tax']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['building_tax']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['building_tax'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['building_tax'], 'noimage.jpg'))
                            <p>PBB Terakhir Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['building_tax'])){{$eformData['visit_report']['building_tax']}}@endif" class="img-responsive">
                            <p>PBB Terakhir</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['building_tax'])){{$eformData['visit_report']['building_tax']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat PBB Terakhir</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            @if((pathinfo(strtolower($eformData['visit_report']['other_document']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['other_document']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['other_document'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($eformData['visit_report']['other_document'], 'noimage.jpg'))
                            <p>Dokumen Lainnya Kosong</p>
                            @else
                            <img src="@if(!empty($eformData['visit_report']['other_document'])){{$eformData['visit_report']['other_document']}}@endif" class="img-responsive">
                            <p>Dokumen Lainnya</p>
                            @endif
                            @else
                            <a href="@if(!empty($eformData['visit_report']['other_document'])){{$eformData['visit_report']['other_document']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Dokumen Lainnya</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="div_other_doc">
        <div class="col-md-12 docs" style="margin-bottom: 10px;">
            <div class="col-md-5">
                <div class="form-group">
                    <label class="col-md-4 control-label">Nama Dokumen :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control numericOnly" name="doc_name[0]" maxlength="12" value="{{ old('doc_name') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label class="col-md-5 control-label">Upload Dokumen Pendukung :</label>
                    <div class="col-md-6">
                        <input type="file" class="filestyle upload" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="doc_upload[0]" accept="image/*,application/pdf">
                    </div>
                    <span class="btn btn-orange col-md-1" id="plus">+</span>
                </div>
            </div>
        </div>
    </div>
</div>