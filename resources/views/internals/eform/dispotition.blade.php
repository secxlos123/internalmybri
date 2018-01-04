@section('title','My BRI - Form Disposisi')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <!-- header -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{($detail['ao_id'] == NULL || $detail['ao_id'] == '' ? 'Disposisi' : 'Re-Disposisi')}} Pengajuan</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dasboard</a>
                            </li>
                            <li>
                                <a href="{{route('eform.index')}}">Pengajuan</a>
                            </li>
                            <li class="active">
                                {{($detail['ao_id'] == NULL || $detail['ao_id'] == '' ? 'Disposisi' : 'Re-Disposisi')}}
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- contains -->
            <div class="row">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                     <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="m-t-0 header-title"><b>Form {{($detail['ao_id'] == NULL || $detail['ao_id'] == '' ? 'Disposisi' : 'Re-Disposisi')}} Pengajuan</b></h5>
                                <p class="text-muted m-b-30 font-13">
                                    No. Referensi Pengajuan : {{$ref_number}}
                                </p>
                                @if (\Session::has('error'))
                                 <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif
                                <!-- data pengajuan-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Pengajuan</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">No. Referensi Pengajuan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['ref_number']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jumlah Permohonan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Rp. {{number_format($detail['nominal'],2,',','.')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Produk :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{strtoupper($detail['product_type'])}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jangka Waktu :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['kpr']['year']}} Bulan</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Pemohon :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Kantor Cabang :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['branch']}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Nasabah :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer_name']}}</p>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Tanggal Pertemuan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['appointment_date']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                   </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Nasabah</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">NIK :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['nik']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Lengkap :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Tempat Lahir :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['birth_place']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Tanggal Lahir :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['birth_date']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Alamat :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['address']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">No. Telepon :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['phone']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">No. Handphone :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['mobile_phone']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jenis Kelamin :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['gender']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Kewarganegaraan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['citizenship']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Status Pernikahan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['status']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Status Tempat Tinggal :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['address_status']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Email :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['email']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Gadis Ibu Kandung :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['mother_name']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>

                                        <!--pasangan-->
                                        @if($detail['customer']['personal']['status_id'] == 2)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">NIK Pasangan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['personal']['couple_nik']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Pasangan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static"> {{$detail['customer']['personal']['couple_name']}}</p>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Tempat, Tanggal Lahir Pasangan :</label>
                                                        <div class="col-md-7">
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
                                                        <label class="col-md-5 control-label">Jenis Pekerjaan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['work']['type']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Pekerjaan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['work']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Perusahaan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['company_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Bidang Pekerjaan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['work_field']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jabatan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['position']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Lama Kerja :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static"> {{$detail['customer']['work']['work_duration']}} Tahun, {{ $detail['customer']['work']['work_duration_month'] }} Bulan</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Alamat Kantor :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">
                                                                 {{$detail['customer']['work']['office_address']}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>

                                        <!-- pendapatan -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label title ="Take Home Pay Per Bulan" class="col-md-5 control-label">Gaji/Pendapatan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">
                                                            Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ',','.') }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label title ="Rata-Rata Per Bulan" class="col-md-5 control-label">Pendapatan Lain :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['other_salary'], 2, ',','.') }}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Angsuran Permohonan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['loan_installment'], 2, ',','.') }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label title ="Anak Dalam Tanggungan" class="col-md-5 control-label">Jumlah Tanggungan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['financial']['dependent_amount']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>

                                        <!-- keluarga -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Kerabat :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nomor Handphone :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['contact']['emergency_contact']}}</p>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Hubungan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6" align="center">
                                                <div class="card-box">
                                                    <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
                                                    <p>Foto KTP</p>
                                                </div>
                                            </div>
                                            @if( ($detail['customer']['personal']['status_id']) == 2)
                                            <div class="col-md-6" align="center">
                                                <div class="card-box">
                                                    <img src="@if(!empty($detail['customer']['personal']['couple_identity'])){{$detail['customer']['personal']['couple_identity']}}@endif" class="img-responsive">
                                                    <p>Foto KTP Pasangan</p>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{($detail['ao_id'] == NULL || $detail['ao_id'] == '' ? 'Disposisi' : 'Re-Disposisi')}} Pengajuan</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!-- dispose form -->
                                        <form role="role" action="{{route('postDispotition', $id)}}" method="POST" >
                                        {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            @php( $name = isset($detail['ao_name']) ? $detail['ao_name'] : "" )
                                                            @php( $aoId = isset($detail['ao_id']) ? $detail['ao_id'] : "" )

                                                            <label class="col-md-5 control-label">Nama AO {{ $name != "" ? 'Sebelumnya ' : '' }}* :</label>
                                                            <div class="col-md-7">
                                                                {!! Form::select('name', [$aoId => $name], old('name'), [
                                                                    'class' => 'select2 name',
                                                                    'data-placeholder' => 'Pilih Nama AO',
                                                                    'id' => 'name'
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Catatan {{($detail['ao_id'] == NULL || $detail['ao_id'] == '' ? 'Disposisi' : 'Re-Disposisi')}} * </label>
                                                            <div class="col-md-7">
                                                                <textarea class="form-control" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('form_audit._input_long_lat')
                                            <input type="hidden" name="auditaction" value="{{($detail['ao_id'] == NULL || $detail['ao_id'] == '' ? 'Disposisi Kredit' : 'Re-Disposisi Kredit')}}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group pull-right">
                                                        <button class="btn btn-orange waves-effect waves-light" type="submit">{{($detail['ao_id'] == NULL || $detail['ao_id'] == '' ? 'Disposisi' : 'Re-Disposisi')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="hidden" id="fake-aoid" value="{{ $aoId }}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')

<script type="text/javascript">
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });

        $('.name').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getAO")}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        aoId: $('#fake-aoid').val(),
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.officers.data,
                        pagination: {
                            more: (params.page * data.officers.per_page) < data.officers.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.name').on('select2:select', function(){
            $('#fake-aoid').val($(this).val());
        });
    });
</script>
