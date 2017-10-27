@section('title','My BRI - Form Approval Pengajuan')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Approval Pengajuan</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="{{route('eform.index')}}">E-Form</a>
                                        </li>
                                        <li class="active">
                                            Pengajuan
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                @if (\Session::has('error'))
                                 <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Pengajuan</h3>
                                    </div>
                                    <!-- data pengajuan-->
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Referensi Pengajuan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['ref_number']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jumlah Pinjaman :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['nominal']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Produk :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{strtoupper($detail['product_type'])}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jangka Waktu :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['kpr']['year']}} Tahun</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pengaju :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['ao_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kantor Cabang :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['branch_id']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Nasabah :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Pertemuan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['appointment_date']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Nasabah</h3>
                                    </div>
                                    <!-- data nasabah -->
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">NIK :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['nik']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Lengkap :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tempat Lahir :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['birth_place']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Lahir :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['birth_date']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['address']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Telepon :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['phone']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Handphone :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['mobile_phone']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Kelamin :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['gender']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kewarganegaraan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['citizenship']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Status Pernikahan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['status']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Status Tempat Tinggal :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['address_status']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['email']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Gadis Ibu Kandung :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['mother_name']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>

                                        @if($detail['customer']['personal']['status_id'] == 2)
                                        <!--pasangan-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">NIK Pasangan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['couple_nik']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Pasangan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$detail['customer']['personal']['couple_name']}}</p>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tempat, Tanggal Lahir Pasangan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['couple_birth_place']}}, {{$detail['customer']['personal']['couple_birth_date']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                        @endif

                                        <!--pekerjaan-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['work']['type']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['work']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Perusahaan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['company_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Bidang Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['work_field']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jabatan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['position']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lama Kerja :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['work_duration']}} Tahun</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat Kantor :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">
                                                                 {{$detail['customer']['work']['office_address']}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Gaji/Pendapatan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp{{($detail['customer']['financial']['salary'])}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pendapatan Lain :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp{{($detail['customer']['financial']['other_salary'])}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Angsuran Pinjaman :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp{{($detail['customer']['financial']['loan_installment'])}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jumlah Tanggungan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['financial']['dependent_amount']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Kerabat/Keluarga :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['contact']['emergency_contact']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nomor Handphone :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['contact']['emergency_contact']}}</p>
                                                        </div>
                                                    </div>
                                                    
                                                </form>  
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Hubungan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data LKN</h3>
                                    </div>
                                    <!-- data lkn -->
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Pegawai BRI yang Mengunjungi :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['ao_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label class="col-md-6 control-label">Tempat Kunjungan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static"></p>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Tanggal Kunjungan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['appointment_date']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Nama Calon Debitur :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['customer_name']}}</p>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Pros :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['visit_report']['pros']}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label class="col-md-6 control-label">Pekerjaan / Usaha :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['customer']['work']['work']}}</p>
                                                        </div>
                                                    </div> -->
                                                    
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Rekening Pinjaman :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['ref_number']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jumlah Permohonan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp{{number_format($detail['nominal'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Pinjaman :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{strtoupper($detail['product_type'])}}</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Cons :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['visit_report']['cons']}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label class="col-md-4 control-label">Tujuan Kunjuangan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"></p>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="form-group">
                                                        <label class="col-md-4 control-label">Hasil Kunjungan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"></p>
                                                        </div>
                                                    </div> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="form-horizontal" role="form" action="{{route('postApproval', $id)}}" method="POST" id="form1">
                        {{ csrf_field() }}
                            <input type="hidden" name="is_approved" id="is_approved">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Pros dan Cons</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group pros {!! $errors->has('pros') ? 'has-error' : '' !!}">
                                                            <label class="col-md-2 control-label">Pros *:</label>
                                                            <div class="col-md-10">
                                                                <textarea class="form-control" rows="3" name="pros" maxlength="255">{{ old('pros') }}</textarea>
                                                                @if ($errors->has('pros')) <p class="help-block">{{ $errors->first('pros') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group cons {!! $errors->has('cons') ? 'has-error' : '' !!}">
                                                            <label class="col-md-2 control-label">Cons *:</label>
                                                            <div class="col-md-10">
                                                                <textarea class="form-control" rows="3" name="cons" maxlength="255">{{ old('cons') }}</textarea>
                                                                @if ($errors->has('cons')) <p class="help-block">{{ $errors->first('cons') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Rekomendasi</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <p>Dengan ini saya meyakini kebenaran data nasabah dan merekomendasikan permohonan kredit untuk dapat diproses lebih lanjut</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" id="yes" value="yes" name="recommended" checked="">
                                                                <label for="yes"> Ya </label>
                                                            </div>
                                                            <div class="radio radio-pink radio-inline">
                                                                <input type="radio" id="no" value="no" name="recommended">
                                                                <label for="no"> Tidak </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                            <textarea class="form-control" name="recommendation" placeholder="Tulis Rekomendasi">{{ old('recommendation') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                        <div class="text-center">
                                            <button type="submit" href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" id="btn-approve">Terima</button>
                                            <button type="submit" href="#" class="btn btn-danger waves-light waves-effect w-md m-b-20" id="btn-reject">Tolak</button>
                                            <a href="{{URL::previous()}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                                        </div>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
        </div>

@include('internals.layouts.footer')
@include('internals.layouts.foot') 
<script type="text/javascript">
    var options = {
         theme:"sk-bounce",
         message:'Mohon tunggu sebentar.',
         textColor:"white"
    };
    $('#btn-approve').on('click', function(){
        $('#is_approved').attr('value', true);
        $('#form1').submit();
        HoldOn.open(options);
    })

    $('#btn-reject').on('click', function(){
        $('#is_approved').attr('value', false);
        $('#form1').submit();
        HoldOn.open(options);
    })

    $('#form1').on('keyup keypress', function(e) { 
        var keyCode = e.keyCode || e.which; 
        if (keyCode === 13) { e.preventDefault(); return false; } 
    });

    // $("#btn-approve").click(function (e) {
    //     e.preventDefault();
    //     HoldOn.open(options);
    //     // var $btn = $('#loginButton').button('loading');

    //     $.ajax({
    //             url: "{{route('postApproval', $id)}}",
    //             type: 'POST',
    //             data: $(this).serialize(),
    //             dataType: 'json',
    //             success: function (data) {
    //                 dd($data);
    //                // $btn.button('reset');
    //                HoldOn.close();
    //                // console.log(data);
    //                if(data.code >= 400){
    //                 $('.divError').html('<div class="alert alert-danger">' +data.message + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
    //                }else{
    //                     window.location = data.url;
    //                }
    //             },
    //             error: function(response){
    //                 // $btn.button('reset');
    //                 HoldOn.close();
    //             }
    //         });
    //     });
</script>