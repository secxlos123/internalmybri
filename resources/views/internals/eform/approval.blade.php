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
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Pengajuan</h3>
                                    </div>
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
                                                            <p class="form-control-static">Rp{{number_format($product->request_amount,2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Produk :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">KPR</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jangka Waktu :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$product->year}} Tahun</p>
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
                                                            <p class="form-control-static">{{$detail['office']}}</p>
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
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">NIK :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['nik']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Lengkap :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['customer_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tempat Lahir :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$customer['personal']['birth_place']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Lahir :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$customer['personal']['birth_date']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$customer['personal']['address']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jenis Kelamin :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$customer['personal']['gender']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Kewarganegaraan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$customer['personal']['citizenship']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Status Pernikahan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$customer['personal']['status']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Status Tempat Tinggal :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$customer['personal']['address_status']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Email :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$customer['personal']['email']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Gadis Ibu Kandung :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$customer['personal']['mother_name']}}</p>
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
                                                        <label class="col-md-4 control-label">Jenis Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$customer['work']['type']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$customer['work']['work']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Perusahaan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$customer['work']['company_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Bidang Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$customer['work']['work_field']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jabatan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$customer['work']['position']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lama Kerja :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"> {{$customer['work']['work_duration']}} Tahun</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat Kantor :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">
                                                                 {{$customer['work']['office_address']}}
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
                                                            <p class="form-control-static">Rp{{number_format($customer['financial']['salary'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pendapatan Lain :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp{{number_format($customer['financial']['other_salary'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Angsuran Pinjaman :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp{{number_format($customer['financial']['loan_installment'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jumlah Tanggungan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$customer['financial']['dependent_amount']}}</p>
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
                                                        <label class="col-md-4 control-label">No. Telepon :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$customer['contact']['phone']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Handphone :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$customer['contact']['mobile_phone']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Emergency Contact :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$customer['contact']['emergency_contact']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Hubungan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$customer['contact']['emergency_relation']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4" align="center">
                                                <div class="card-box">
                                                    <img src="{{$customer['other']['identity']}}" class="img-responsive">
                                                    <p>Foto KTP</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4" align="center">
                                                <div class="card-box">
                                                    <img src="{{$customer['other']['npwp']}}" class="img-responsive">
                                                    <p>Foto NPWP</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4" align="center">
                                                <div class="card-box">
                                                    <img src="{{$customer['other']['image']}}" class="img-responsive">
                                                    <p>Foto Nasabah</p>
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
                                        <h3 class="panel-title">Data LKN</h3>
                                    </div>
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
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Tempat Kunjungan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['visit_report']['place']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Tanggal Kunjungan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['visit_report']['date']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Nama Calon Debitur :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['visit_report']['name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Pekerjaan / Usaha :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['visit_report']['job']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">No. Telepon Kantor :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">{{$detail['visit_report']['phone']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Rekening Pinjaman :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['visit_report']['account']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jumlah Permohonan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp{{number_format($detail['visit_report']['amount'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Pinjaman :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['visit_report']['type']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tujuan Kunjuangan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['visit_report']['purpose_of_visit']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Hasil Kunjungan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['visit_report']['result']}}</p>
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
                                                        <label class="col-md-5 control-label">Penghasilan per-Bulan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Rp{{number_format($detail['visit_report']['income'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Gaji / THP :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Rp{{number_format($detail['visit_report']['income_salary'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Tunjangan / Insentif Lain :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Rp{{number_format($detail['visit_report']['income_allowance'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Bank Mutasi Rekening :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">BNI</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">No. Rekening :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['visit_report']['bussiness_mutation_number']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6" align="center">
                                                <div class="card-box">
                                                    <img src="{{asset('assets/images/slip.png')}}" class="img-responsive">
                                                    <p>Foto Slip Gaji</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Pros :</label>
                                                        <div class="col-md-10">
                                                            <p class="form-control-static">{{$detail['visit_report']['pros']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Cons :</label>
                                                        <div class="col-md-10">
                                                            <p class="form-control-static">{{$detail['visit_report']['cons']}}</p>
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
                                                        <label class="col-md-4 control-label">Nama Penjual :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['visit_report']['seller_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['visit_report']['seller_address']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Telepon :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$detail['visit_report']['seller_phone']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Harga Jual :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Rp{{number_format($detail['visit_report']['selling_price'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Alasan Dijual :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['visit_report']['reason_for_sale']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Hubungan dengan Pembeli :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['visit_report']['relation_with_seller']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="form-horizontal" role="form" action="{{route('postApproval', $id)}}" method="POST" id="form1">
                                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" href="#" class="btn btn-success waves-light waves-effect w-md m-b-20">Terima</button>
                                    <button type="submit" href="#" class="btn btn-danger waves-light waves-effect w-md m-b-20">Tolak</button>
                                    <button type="submit" href="#" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>

@include('internals.layouts.footer')
@include('internals.layouts.foot') 