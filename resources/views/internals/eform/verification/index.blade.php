@section('title','My BRI - Form Verifikasi Data Nasabah')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Verifikasi Data Nasabah</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('indexAO')}}">Pengajuan</a>
                            </li>
                            <li class="active">
                                Verifikasi
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @if (\Session::has('success'))
            <div class="alert alert-success">{{ \Session::get('success') }}</div>
            @endif

            <form @if(!empty($dataCustomer)) action="{{route('verifyData', $dataCustomer['customer']['id'])}}" @endif method="POST" enctype="multipart/form-data" id="form1">
                {{ csrf_field() }}
                {{ method_field('PUT') }} 
                    <!--Bundle of data pribadi-->                             
                    @include('internals.eform.verification._personal-data')
                    <!--Field texts of data pribadi-->  
                    @include('internals.eform.verification._hidden-input')
                    <!--Bundle of data pasangan--> 
                    @include('internals.eform.verification._couple-data')
                    <!--Bundle of data pekerjaan--> 
                    @include('internals.eform.verification._work-data')
                    <!--Bundle of data finansial--> 
                    @include('internals.eform.verification._financial-data')
                    <!--Bundle of data Emergency contact--> 
                    @include('internals.eform.verification._family-data')
                    <!--Action button-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button type="submit" href="javascript:void(0);" id="save" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Kirim Verifikasi Data</button>
                            </div>
                        </div>
                    </div><!--End--> 
                </form>
            </div>
        </div>
    </div>

    <!-- Modals update -->
    @include('internals.eform.verification._cif-modal')

    <!-- Script --> 
    @include('internals.layouts.footer')
    @include('internals.layouts.foot') 
    @include('internals.eform.verification.verification-script')