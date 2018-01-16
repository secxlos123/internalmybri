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
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="collateral_binding_doc" accept="image/*,application/pdf,application/rar,application/zip">
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
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="collateral_insurance_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                             
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">b. Polis Asuransi Jiwa :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="life_insurance_doc" accept="image/*,application/pdf,application/rar,application/zip">
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
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="ownership_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                             
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">b. IMB :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="building_permit_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">c. AJB / PPJB :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="sales_law_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">d. PBB :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="property_tax_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">e. NJOP :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="sale_value_doc" accept="image/*,application/pdf,application/rar,application/zip">
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
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_one_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                             
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">b. Progress 2 :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_two_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">c. Progress 3 :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_three_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">d. Progress 4 :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_four_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="form-horizontal" role="form">
                                            <div class="col-md-12 distance">
                                                <label class="col-md-5 tab">e. Progress 5 :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="progress_five_doc" accept="image/*,application/pdf,application/rar,application/zip">
                                                </div>                                          
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20 pull-right">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('internals.layouts.footer')
    @include('internals.layouts.foot')