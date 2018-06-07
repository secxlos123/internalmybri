@section('title','MyBRI - Monitoring Collateral Properti')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style>
.distance{
    margin-bottom: 10px;
}
.icon-distance{
    margin-bottom: 20px;
}
.tab{
    padding-left:5em;
}
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <!-- header -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Collateral Checklist</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dasboard</a>
                            </li>
                            <li>
                                <a href="{{route('collateral.index')}}">List Pengajuan Properti Baru</a>
                            </li>
                            <li class="active">
                                Collateral Checklist
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- contains -->
            <form role="role" method="POST" action="{{route('postUploadDoc', $collateral['id'])}}" id="form-lkn" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        @if (\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        @endif
                        <div class="card-box m-t-30">
                            <h4 class="m-t-min30 m-b-30 header-title custom-title">Collateral Checklist</h4>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="distance"><b>Checklist Agunan</b></h5>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5">1. Pengikatan Agunan : </label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="collateral_binding_doc" id="collateral_binding_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['collateral_binding_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['collateral_binding_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['collateral_binding_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['collateral_binding_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">Pengikatan Agunan Kosong</p>
                                                        @else
                                                        <img id="preview_collateral_binding_doc" src="@if(!empty($collateral['ots_doc']['collateral_binding_doc'])){{$collateral['ots_doc']['collateral_binding_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">Pengikatan Agunan</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['collateral_binding_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['collateral_binding_doc'])){{$collateral['ots_doc']['collateral_binding_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat Pengikatan Agunan</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 icon-distance">
                                                <label class="col-md-5">2. Penutupan Asuransi :</label>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">a. Polis Asuransi Agunan :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="collateral_insurance_doc" id="collateral_insurance_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>     
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['collateral_insurance_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['collateral_insurance_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['collateral_insurance_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['collateral_insurance_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">Polis Asuransi Agunan Kosong</p>
                                                        @else
                                                        <img id="preview_collateral_insurance_doc" src="@if(!empty($collateral['ots_doc']['collateral_insurance_doc'])){{$collateral['ots_doc']['collateral_insurance_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">Polis Asuransi Agunan</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['collateral_insurance_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['collateral_insurance_doc'])){{$collateral['ots_doc']['collateral_insurance_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat Polis Asuransi Agunan</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">b. Polis Asuransi Jiwa :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="life_insurance_doc" id="life_insurance_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                  
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['life_insurance_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['life_insurance_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['life_insurance_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['life_insurance_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">Polis Asuransi Jiwa Kosong</p>
                                                        @else
                                                        <img id="preview_life_insurance_doc" src="@if(!empty($collateral['ots_doc']['life_insurance_doc'])){{$collateral['ots_doc']['life_insurance_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">Polis Asuransi Jiwa</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['life_insurance_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['life_insurance_doc'])){{$collateral['ots_doc']['life_insurance_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat Polis Asuransi Jiwa</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 icon-distance">
                                                <label class="col-md-5">3. Kelengkapan Dokumen :</label>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">a. SHM / SHGB / SHMRS :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="ownership_doc" id="ownership_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>       
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['ownership_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['ownership_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['ownership_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['ownership_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">SHM / SHGB / SHMRS Kosong</p>
                                                        @else
                                                        <img id="preview_ownership_doc" src="@if(!empty($collateral['ots_doc']['ownership_doc'])){{$collateral['ots_doc']['ownership_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">SHM / SHGB / SHMRS</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['ownership_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['ownership_doc'])){{$collateral['ots_doc']['ownership_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat SHM / SHGB / SHMRS</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">b. IMB :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="building_permit_doc" id="building_permit_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                     
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['building_permit_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['building_permit_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['building_permit_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['building_permit_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">IMB Kosong</p>
                                                        @else
                                                        <img id="preview_building_permit_doc" src="@if(!empty($collateral['ots_doc']['building_permit_doc'])){{$collateral['ots_doc']['building_permit_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">IMB</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['building_permit_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['building_permit_doc'])){{$collateral['ots_doc']['building_permit_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat IMB</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">c. AJB / PPJB :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="sales_law_doc" id="sales_law_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                    
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['sales_law_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['sales_law_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['sales_law_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['sales_law_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">AJB / PPJB Kosong</p>
                                                        @else
                                                        <img id="preview_sales_law_doc" src="@if(!empty($collateral['ots_doc']['sales_law_doc'])){{$collateral['ots_doc']['sales_law_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">AJB / PPJB</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['sales_law_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['sales_law_doc'])){{$collateral['ots_doc']['sales_law_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat AJB / PPJB</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">d. PBB :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="property_tax_doc" id="property_tax_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                   
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['property_tax_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['property_tax_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['property_tax_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['property_tax_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">PBB Kosong</p>
                                                        @else
                                                        <img id="preview_property_tax_doc" src="@if(!empty($collateral['ots_doc']['property_tax_doc'])){{$collateral['ots_doc']['property_tax_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">PBB</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['property_tax_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['property_tax_doc'])){{$collateral['ots_doc']['property_tax_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat PBB</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">e. NJOP :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="sale_value_doc" id="sale_value_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                 
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['sale_value_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['sale_value_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['sale_value_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['sale_value_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">NJOP Kosong</p>
                                                        @else
                                                        <img id="preview_sale_value_doc" src="@if(!empty($collateral['ots_doc']['sale_value_doc'])){{$collateral['ots_doc']['sale_value_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">NJOP</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['sale_value_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['sale_value_doc'])){{$collateral['ots_doc']['sale_value_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat NJOP</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 icon-distance">
                                                <label class="col-md-5">4. Retensi :</label>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">a. Progress 1 :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_one_doc" id="progress_one_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>   
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['progress_one_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['progress_one_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['progress_one_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['progress_one_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">Progress 1 Kosong</p>
                                                        @else
                                                        <img id="preview_progress_one_doc" src="@if(!empty($collateral['ots_doc']['progress_one_doc'])){{$collateral['ots_doc']['progress_one_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">Progress 1</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['progress_one_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['progress_one_doc'])){{$collateral['ots_doc']['progress_one_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat Progress 1</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">b. Progress 2 :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_two_doc" id="progress_two_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                      
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['progress_two_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['progress_two_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['progress_two_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['progress_two_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">Progress 2 Kosong</p>
                                                        @else
                                                        <img id="preview_progress_two_doc" src="@if(!empty($collateral['ots_doc']['progress_two_doc'])){{$collateral['ots_doc']['progress_two_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">Progress 2</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['progress_two_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['progress_two_doc'])){{$collateral['ots_doc']['progress_two_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat Progress 2</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">c. Progress 3 :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_three_doc" id="progress_three_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                  
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['progress_three_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['progress_three_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['progress_three_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['progress_three_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">Progress 3 Kosong</p>
                                                        @else
                                                        <img id="preview_progress_three_doc" src="@if(!empty($collateral['ots_doc']['progress_three_doc'])){{$collateral['ots_doc']['progress_three_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">Progress 3</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['progress_three_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['progress_three_doc'])){{$collateral['ots_doc']['progress_three_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat Progress 3</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">d. Progress 4 :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_four_doc" id="progress_four_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                      
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['progress_four_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['progress_four_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['progress_four_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['progress_four_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">Progress 4 Kosong</p>
                                                        @else
                                                        <img id="preview_progress_four_doc" src="@if(!empty($collateral['ots_doc']['progress_four_doc'])){{$collateral['ots_doc']['progress_four_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">Progress 4</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['progress_four_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['progress_four_doc'])){{$collateral['ots_doc']['progress_four_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat Progress 4</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">e. Progress 5 :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_five_doc" id="progress_five_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                      
                                            </div>
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 control-label"></label>
                                                <div class="col-md-7">
                                                    @if((pathinfo(strtolower($collateral['ots_doc']['progress_five_doc']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($collateral['ots_doc']['progress_five_doc']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($collateral['ots_doc']['progress_five_doc'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                        @if(strpos($collateral['ots_doc']['progress_five_doc'], 'noimage.jpg'))
                                                        <p style="margin-left:25px">Progress 5 Kosong</p>
                                                        @else
                                                        <img id="preview_progress_five_doc" src="@if(!empty($collateral['ots_doc']['progress_five_doc'])){{$collateral['ots_doc']['progress_five_doc']}}@endif" width="300">
                                                        <p style="margin-left:25px">Progress 5</p>
                                                        @endif
                                                    @elseif(!empty($collateral['ots_doc']['progress_five_doc']))
                                                        <a href="@if(!empty($collateral['ots_doc']['progress_five_doc'])){{$collateral['ots_doc']['progress_five_doc']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                        <p style="margin-left:25px">Klik Untuk Lihat Progress 5</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('form_audit._input_long_lat')
                            <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20 pull-right">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('internals.layouts.footer')
    @include('internals.layouts.foot')
    <script type="text/javascript">
        $("#collateral_binding_doc").change(function(){
            var img = '#preview_collateral_binding_doc';
            readURL(this, img);
        });

        $("#collateral_insurance_doc").change(function(){
            var img = '#preview_collateral_insurance_doc';
            readURL(this, img);
        });

        $("#life_insurance_doc").change(function(){
            var img = '#preview_life_insurance_doc';
            readURL(this, img);
        });

        $("#ownership_doc").change(function(){
            var img = '#preview_ownership_doc';
            readURL(this, img);
        });

        $("#building_permit_doc").change(function(){
            var img = '#preview_building_permit_doc';
            readURL(this, img);
        });

        $("#sales_law_doc").change(function(){
            var img = '#preview_sales_law_doc';
            readURL(this, img);
        });

        $("#property_tax_doc").change(function(){
            var img = '#preview_property_tax_doc';
            readURL(this, img);
        });

        $("#sale_value_doc").change(function(){
            var img = '#preview_sale_value_doc';
            readURL(this, img);
        });

        $("#progress_one_doc").change(function(){
            var img = '#preview_progress_one_doc';
            readURL(this, img);
        });

        $("#progress_two_doc").change(function(){
            var img = '#preview_progress_two_doc';
            readURL(this, img);
        });

        $("#progress_three_doc").change(function(){
            var img = '#preview_progress_three_doc';
            readURL(this, img);
        });

        $("#progress_four_doc").change(function(){
            var img = '#preview_progress_four_doc';
            readURL(this, img);
        });

        $("#progress_five_doc").change(function(){
            var img = '#preview_progress_five_doc';
            readURL(this, img);
        });

        function readURL(input, img) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(img).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>