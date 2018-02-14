<div class="panel panel-default">
    <div class="panel-body">        
        <div class="row">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Pendukung</h3>
            </div>
            <div class="row">
                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['proprietary']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['proprietary']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['proprietary'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['proprietary'], 'noimage.jpg'))
                            <p>Surat Hak Milik Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['proprietary'])){{$collateral['proprietary']}}@endif" class="img-responsive">
                            <p>Surat Hak Milik</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['proprietary'])){{$collateral['proprietary']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Surat Hak Milik</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['building_permit']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['building_permit']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['building_permit'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['building_permit'], 'noimage.jpg'))
                            <p>Izin Mendirikan Bangunan Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['building_permit'])){{$collateral['building_permit']}}@endif" class="img-responsive">
                            <p>Izin Mendirikan Bangunan</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['building_permit'])){{$collateral['building_permit']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Izin Mendirikan Bangunan</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['building_tax']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['building_tax']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['building_tax'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['building_tax'], 'noimage.jpg'))
                            <p>PBB Terakhir Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['building_tax'])){{$collateral['building_tax']}}@endif" class="img-responsive">
                            <p>PBB Terakhir</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['building_tax'])){{$collateral['building_tax']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat PBB Terakhir</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($collateral['ots_doc']))
        <div class="row">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Pendukung Collateral</h3>
            </div>
            <div class="row">
                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['collateral_binding_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['collateral_binding_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['collateral_binding_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['ots_doc']['collateral_binding_doc'], 'noimage.jpg'))
                            <p>Dokumen Pengikatan Agunan Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['ots_doc']['collateral_binding_doc'])){{$collateral['ots_doc']['collateral_binding_doc']}}@endif" class="img-responsive">
                            <p>Dokumen Pengikatan Agunan</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['collateral_binding_doc'])){{$collateral['ots_doc']['collateral_binding_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Dokumen Pengikatan Agunan</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['collateral_insurance_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['collateral_insurance_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['collateral_insurance_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['ots_doc']['collateral_insurance_doc'], 'noimage.jpg'))
                            <p>Dokumen Polis Asuransi Agunan Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['ots_doc']['collateral_insurance_doc'])){{$collateral['ots_doc']['collateral_insurance_doc']}}@endif" class="img-responsive">
                            <p>Dokumen Polis Asuransi Agunan</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['collateral_insurance_doc'])){{$collateral['ots_doc']['collateral_insurance_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Dokumen Polis Asuransi Agunan</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['life_insurance_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['life_insurance_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['life_insurance_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['ots_doc']['life_insurance_doc'], 'noimage.jpg'))
                            <p>Dokumen Polis Asuransi Jiwa  Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['ots_doc']['life_insurance_doc'])){{$collateral['ots_doc']['life_insurance_doc']}}@endif" class="img-responsive">
                            <p>Dokumen Polis Asuransi Jiwa </p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['life_insurance_doc'])){{$collateral['ots_doc']['life_insurance_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Dokumen Polis Asuransi Jiwa </p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['ownership_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['ownership_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['ownership_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['ots_doc']['ownership_doc'], 'noimage.jpg'))
                            <p>Surat SHM / SHGB / SHMRS Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['ots_doc']['ownership_doc'])){{$collateral['ots_doc']['ownership_doc']}}@endif" class="img-responsive">
                            <p>Surat SHM / SHGB / SHMRS</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['ownership_doc'])){{$collateral['ots_doc']['ownership_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Surat SHM / SHGB / SHMRS</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['building_permit_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['building_permit_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['building_permit_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['ots_doc']['building_permit_doc'], 'noimage.jpg'))
                            <p>Izin Mendirikan Bangunan Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['ots_doc']['building_permit_doc'])){{$collateral['ots_doc']['building_permit_doc']}}@endif" class="img-responsive">
                            <p>Izin Mendirikan Bangunan</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['building_permit_doc'])){{$collateral['ots_doc']['building_permit_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Izin Mendirikan Bangunan</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['sales_law_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['sales_law_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['sales_law_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['ots_doc']['building_permit_doc'], 'noimage.jpg'))
                            <p>AJB / PPJB Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['ots_doc']['sales_law_doc'])){{$collateral['ots_doc']['sales_law_doc']}}@endif" class="img-responsive">
                            <p>AJB / PPJB</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['sales_law_doc'])){{$collateral['ots_doc']['sales_law_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat AJB / PPJB</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['property_tax_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['property_tax_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['property_tax_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['ots_doc']['property_tax_doc'], 'noimage.jpg'))
                            <p>PBB Terakhir Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['ots_doc']['property_tax_doc'])){{$collateral['ots_doc']['property_tax_doc']}}@endif" class="img-responsive">
                            <p>PBB Terakhir</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['property_tax_doc'])){{$collateral['ots_doc']['property_tax_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat PBB Terakhir</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['sale_value_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['sale_value_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['sale_value_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            @if(strpos($collateral['ots_doc']['sale_value_doc'], 'noimage.jpg'))
                            <p>NJOP Kosong</p>
                            @else
                            <img src="@if(!empty($collateral['ots_doc']['sale_value_doc'])){{$collateral['ots_doc']['sale_value_doc']}}@endif" class="img-responsive">
                            <p>NJOP</p>
                            @endif
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['sale_value_doc'])){{$collateral['ots_doc']['sale_value_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat NJOP</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(isset($detail) && isset($customer))
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Nasabah</h3>
                        </div>
                        <!-- data nasabah -->
                        <div class="panel-body">
                            @include('internals.eform.approval._customer-identity')
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Kunjungan LKN</h3>
                        </div>
                        @if (isset($detail['visit_report']['mutation']))
                        <div class="panel-body">
                            @include('internals.audit-rail.dokumen_collateral._lkn-mutation-nonindex')
                        </div>
                        @endif
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-common')
                        </div>
                    </div>
                </div>
            </div>
            @endif
    </div>
</div>