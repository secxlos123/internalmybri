@section('title','My BRI - Form LKN')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Laporan Kunjungan Nasabah dan Rekomendasi Pengajuan Kredit</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('indexAO')}}">E-Form</a>
                            </li>
                            <li class="active">
                                Form LKN
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        <form id="formLKN" method="POST" action="{{route('postLKN', $id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <input type="hidden" name="id" value="{{$id}}">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                     <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Kunjungan</h3>
                        </div>
                        @include('internals.eform.lkn._visit')
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Penghasilan</h3>
                        </div>
                        @include('internals.eform.lkn._income')
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Rincian Mutasi Rekening</h3>
                        </div>
                        @include('internals.eform.lkn._mutation')
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Analisa</h3>
                        </div>
                        @include('internals.eform.lkn._analist')
                    </div>
                </div>
            </div>
            <!--Hanya muncul jika properti bekas-->
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Investigasi Jual Beli</h3>
                        </div>
                        @include('internals.eform.lkn._investigate')
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                        <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Simpan</a>
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>

    <!-- Modals Save -->
        <div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>Apakah Anda yakin ingin menyimpan form LKN ini ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <button type="button" id="btnSave" class="btn btn-success waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

@include('internals.layouts.footer')
@include('internals.layouts.foot') 
@include('internals.eform.lkn.lkn-script')
@include('internals.eform.lkn.render-mutation')

<script type="text/javascript">
    $(document).ready(function() {
       $('#btnSave').on('click', function(e) {
            $("#formLKN").submit();
       });
   });
</script>