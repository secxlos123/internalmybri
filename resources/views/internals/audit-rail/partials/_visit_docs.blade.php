<div class="row">
    <div class="col-md-12">
        @if(!empty($dataCustomer['visit_report']))
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Kunjungan</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-horizontal" role="form">
                            <div class="row">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Dokumen Pendukung</h4>
                                </div>
                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['npwp']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['npwp']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['npwp'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['npwp'], 'noimage.jpg'))
                                        <p>Foto NPWP Kosong</p>
                                        <img class="img-responsive" id="zoom">
                                        @else
                                        <img src="{{$dataCustomer['visit_report']['npwp']}}" class="img-responsive" id="zoom">
                                        <p>Foto NPWP</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['npwp'])){{$dataCustomer['visit_report']['npwp']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Foto NPWP</p>
                                        @endif
                                    </div>
                                </div>
                                @if($dataCustomer['visit_report']['source'] == 'fixed')
                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['salary_slip']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['salary_slip']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['salary_slip'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['salary_slip'], 'noimage.jpg'))
                                        <p>Slip Gaji Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['salary_slip'])){{$dataCustomer['visit_report']['salary_slip']}}@endif" class="img-responsive">
                                        <p>Slip Gaji</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['salary_slip'])){{$dataCustomer['visit_report']['salary_slip']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Slip Gaji</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['work_letter']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['work_letter']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['work_letter'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['work_letter'], 'noimage.jpg'))
                                        <p>Surat Keterangan Kerja Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['work_letter'])){{$dataCustomer['visit_report']['work_letter']}}@endif" class="img-responsive">
                                        <p>Surat Keterangan Kerja</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['work_letter'])){{$dataCustomer['visit_report']['work_letter']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Surat Keterangan Kerja</p>
                                        @endif
                                    </div>
                                </div>
                                @endif

                                @if($dataCustomer['visit_report']['source'] == 'nonfixed')
                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['legal_bussiness_document'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['legal_bussiness_document'], 'noimage.jpg'))
                                        <p>Dokumen Legal Usaha Kosong</p>
                                        @else
                                        <img src="{{$dataCustomer['visit_report']['legal_bussiness_document']}}" class="img-responsive">
                                        <p>Klik Untuk Lihat Dokumen Legal Usaha</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['legal_bussiness_document'])){{$dataCustomer['visit_report']['legal_bussiness_document']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Dokumen Legal Usaha</p>
                                        @endif
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['family_card']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['family_card']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['family_card'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['family_card'], 'noimage.jpg'))
                                        <p>Kartu Keluarga Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['family_card'])){{$dataCustomer['visit_report']['family_card']}}@endif" class="img-responsive">
                                        <p>Kartu Keluarga</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['family_card'])){{$dataCustomer['visit_report']['family_card']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Kartu Keluarga</p>
                                        @endif
                                    </div>
                                </div>
                                @if(!empty($dataCustomer['customer']['personal']['status_id'] > 1))
                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['marrital_certificate']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['marrital_certificate']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['marrital_certificate'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['marrital_certificate'], 'noimage.jpg'))
                                        <p>Akta Nikah/Cerai Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['marrital_certificate'])){{$dataCustomer['visit_report']['marrital_certificate']}}@endif" class="img-responsive">
                                        <p>Akta Nikah/Cerai</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['marrital_certificate'])){{$dataCustomer['visit_report']['marrital_certificate']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Akta Nikah/Cerai</p>
                                        @endif
                                    </div>
                                </div>
                                @endif
                                @if(($dataCustomer['customer']['financial']['status_finance'] != "Join Income") && ($dataCustomer['customer']['personal']['status_id'] == 2 ))
                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['divorce_certificate']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['divorce_certificate']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['divorce_certificate'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['divorce_certificate'], 'noimage.jpg'))
                                        <p>Akta Pisah Harta Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['divorce_certificate'])){{$dataCustomer['visit_report']['divorce_certificate']}}@endif" class="img-responsive">
                                        <p>Akta Pisah Harta</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['divorce_certificate'])){{$dataCustomer['visit_report']['divorce_certificate']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Akta Pisah Harta</p>
                                        @endif
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        <img src="@if(!empty($dataCustomer['visit_report']['photo_with_customer'])){{$dataCustomer['visit_report']['photo_with_customer']}}@endif" class="img-responsive">
                                        <p>Foto Debitur</p>
                                    </div>
                                </div>

                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['offering_letter'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['offering_letter'], 'noimage.jpg'))
                                        <p>Surat Penawaran Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['offering_letter'])){{$dataCustomer['visit_report']['offering_letter']}}@endif" class="img-responsive">
                                        <p>Surat Penawaran</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['offering_letter'])){{$dataCustomer['visit_report']['offering_letter']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Surat Penawaran</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['down_payment']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['down_payment']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['down_payment'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['down_payment'], 'noimage.jpg'))
                                        <p>Bukti DP Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['down_payment'])){{$dataCustomer['visit_report']['down_payment']}}@endif" class="img-responsive">
                                        <p>Bukti DP</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['down_payment'])){{$dataCustomer['visit_report']['down_payment']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Bukti DP</p>
                                        @endif
                                    </div>
                                </div>

                                @if(($dataCustomer['visit_report']['use_reason'] == 2)||($dataCustomer['visit_report']['use_reason'] == 18))
                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['proprietary']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['proprietary']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['proprietary'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['proprietary'], 'noimage.jpg'))
                                        <p>Surat Hak Milik Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['proprietary'])){{$dataCustomer['visit_report']['proprietary']}}@endif" class="img-responsive">
                                        <p>Surat Hak Milik</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['proprietary'])){{$dataCustomer['visit_report']['proprietary']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Surat Hak Milik</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['building_permit']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['building_permit']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['building_permit'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['building_permit'], 'noimage.jpg'))
                                        <p>Izin Mendirikan Bangunan Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['building_permit'])){{$dataCustomer['visit_report']['building_permit']}}@endif" class="img-responsive">
                                        <p>Izin Mendirikan Bangunan</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['building_permit'])){{$dataCustomer['visit_report']['building_permit']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Izin Mendirikan Bangunan</p>
                                        @endif
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['building_tax']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['building_tax']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['building_tax'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['building_tax'], 'noimage.jpg'))
                                        <p>PBB Terakhir Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['building_tax'])){{$dataCustomer['visit_report']['building_tax']}}@endif" class="img-responsive">
                                        <p>PBB Terakhir</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['building_tax'])){{$dataCustomer['visit_report']['building_tax']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat PBB Terakhir</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($dataCustomer['visit_report']['other_document']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['other_document']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['other_document'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['visit_report']['other_document'], 'noimage.jpg'))
                                        <p>Dokumen Lainnya Kosong</p>
                                        @else
                                        <img src="@if(!empty($dataCustomer['visit_report']['other_document'])){{$dataCustomer['visit_report']['other_document']}}@endif" class="img-responsive">
                                        <p>Dokumen Lainnya</p>
                                        @endif
                                        @else
                                        <a href="@if(!empty($dataCustomer['visit_report']['other_document'])){{$dataCustomer['visit_report']['other_document']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat Dokumen Lainnya</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Mutasi</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-horizontal" role="form">
                            <div class="row">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Dokumen Mutasi</h4>
                                </div>
                                @foreach($dataCustomer['visit_report']['mutation'] as $mutation)
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(!empty($dataCustomer['recontest']))
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Recontest</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-horizontal" role="form">
                            <div class="row">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Dokumen Pendukung</h4>
                                </div>
                                @if(!empty($dataCustomer['recontest']['documents']))
                                @foreach($dataCustomer['recontest']['documents'] as $docs)
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Mutasi Recontest</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-horizontal" role="form">
                            <div class="row">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Dokumen Mutasi</h4>
                                </div>
                                @foreach($dataCustomer['recontest']['mutations'] as $mutation)
                                <div class="col-md-6" align="center">
                                    <div class="card-box">
                                        @if((pathinfo(strtolower($mutation['image']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($mutation['image']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($mutation['image'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        <img src="@if(!empty($mutation['image'])){{$mutation['image']}}@endif" class="img-responsive">
                                        <p>File Mutasi Recontest</p>
                                        @else
                                        <a href="@if(!empty($mutation['image'])){{$mutation['image']}}@endif" target="_blank"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p>Klik Untuk Lihat File Mutasi Recontest</p>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>