<div class="panel panel-default">
    <div class="panel-body">
        <div class="panel-heading">
            <h3 class="panel-title">Data Properti</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-5 control-label">Jenis KPR :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if($collateral['status_property'] == 1) Baru
                            @elseif($collateral['status_property'] == 2)Secondary
                            @elseif($collateral['status_property'] == 3)Refinancing
                            @elseif($collateral['status_property'] == 4)Renovasi
                            @elseif($collateral['status_property'] == 5)Top Up
                            @elseif($collateral['status_property'] == 6)Take Over
                            @elseif($collateral['status_property'] == 7)Take Over Top Up
                            @elseif($collateral['status_property'] == 8)Take Over Account In House (Cash Bertahap)
                            @endif</p>
                        </div>
                    </div>

                    @if($collateral['status_property'] == 1)
                    <div class="form-group">
                        <label class="col-md-5 control-label">Developer :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['developer_name']}}</p>
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="col-md-5 control-label">Jenis Properti :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">@if($collateral['kpr_type_property'] == 1) Rumah Tapak
                            @elseif($collateral['kpr_type_property'] == 2)Rumah Susun/Apartment
                            @elseif($collateral['kpr_type_property'] == 3)Rumah Toko
                            @endif</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-5 control-label">Lokasi Rumah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['home_location']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Harga Rumah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">Rp {{number_format($collateral['price'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Luas Bangunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['building_area']}} M <sup>2</sup></p>
                        </div>
                    </div>
                   <!--  <div class="form-group">
                        <label class="col-md-5 control-label">Foto :</label>
                        <div class="col-md-7">
                            <img id="preview" src="{{asset('assets/images/no-image.jpg')}}" width="300">
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
        <div class="row">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Pendukung</h3>
            </div>
            <div class="row">
                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['proprietary']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['proprietary']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['proprietary'])), PATHINFO_EXTENSION) == 'jpeg'))
                            <img src="@if(!empty($collateral['proprietary'])){{$collateral['proprietary']}}@endif" class="img-responsive">
                            <p>Surat Hak Milik</p>
                        @else
                            <a href="@if(!empty($collateral['proprietary'])){{$collateral['proprietary']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Surat Hak Milik</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['building_permit']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['building_permit']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['building_permit'])), PATHINFO_EXTENSION) == 'jpeg'))
                            <img src="@if(!empty($collateral['building_permit'])){{$collateral['building_permit']}}@endif" class="img-responsive">
                            <p>Izin Mendirikan Bangunan</p>
                        @else
                            <a href="@if(!empty($collateral['building_permit'])){{$collateral['building_permit']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Izin Mendirikan Bangunan</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['building_tax']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['building_tax']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['building_tax'])), PATHINFO_EXTENSION) == 'jpeg'))
                            <img src="@if(!empty($collateral['building_tax'])){{$collateral['building_tax']}}@endif" class="img-responsive">
                            <p>PBB Terakhir</p>
                        @else
                            <a href="@if(!empty($collateral['building_tax'])){{$collateral['building_tax']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat PBB Terakhir</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel-heading">
                <h3 class="panel-title">Dokumen Pendukung Collateral</h3>
            </div>
            <div class="row">
                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['ownership_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['ownership_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['ownership_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            <img src="@if(!empty($collateral['ots_doc']['ownership_doc'])){{$collateral['ots_doc']['ownership_doc']}}@endif" class="img-responsive">
                            <p>Surat SHM / SHGB / SHMRS</p>
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['ownership_doc'])){{$collateral['ots_doc']['ownership_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Surat SHM / SHGB / SHMRS</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['building_permit_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['building_permit_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['building_permit_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            <img src="@if(!empty($collateral['ots_doc']['building_permit_doc'])){{$collateral['ots_doc']['building_permit_doc']}}@endif" class="img-responsive">
                            <p>Izin Mendirikan Bangunan</p>
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['building_permit_doc'])){{$collateral['ots_doc']['building_permit_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat Izin Mendirikan Bangunan</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['sales_law_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['sales_law_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['sales_law_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            <img src="@if(!empty($collateral['ots_doc']['sales_law_doc'])){{$collateral['ots_doc']['sales_law_doc']}}@endif" class="img-responsive">
                            <p>AJB / PPJB</p>
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['sales_law_doc'])){{$collateral['ots_doc']['sales_law_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat AJB / PPJB</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['property_tax_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['property_tax_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['property_tax_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            <img src="@if(!empty($collateral['ots_doc']['property_tax_doc'])){{$collateral['ots_doc']['property_tax_doc']}}@endif" class="img-responsive">
                            <p>PBB Terakhir</p>
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['property_tax_doc'])){{$collateral['ots_doc']['property_tax_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat PBB Terakhir</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="card-box">
                        @if((pathinfo(strtolower($collateral['ots_doc']['sale_value_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['sale_value_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['sale_value_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                            <img src="@if(!empty($collateral['ots_doc']['sale_value_doc'])){{$collateral['ots_doc']['sale_value_doc']}}@endif" class="img-responsive">
                            <p>NJOP</p>
                        @else
                            <a href="@if(!empty($collateral['ots_doc']['sale_value_doc'])){{$collateral['ots_doc']['sale_value_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                            <p>Klik Untuk Lihat NJOP</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>