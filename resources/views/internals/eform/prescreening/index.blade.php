@section('title','MyBRI - Prescreening')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Prescreening</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('indexAO')}}">Pengajuan Kredit</a>
                            </li>
                            <li class="active">
                                Prescreening
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Hasil Verifikasi</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="">
                                            <label class="col-md-6 control-label"> Nama Calon Nasabah</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static">{{ $eform['customer']['personal']['name'] }}</p>
                                            </div>
                                        </div>
                                       <div class="">
                                            <label class="col-md-6 control-label"> NIK</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static">{{ $eform['customer']['personal']['nik'] }}</p>
                                            </div>
                                        </div>
                                        <div class="">
                                            <label class="col-md-6 control-label"> Tanggal Lahir</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static">{{ $eform['customer']['personal']['birth_date'] }}</p>
                                            </div>
                                        </div>
                                        <div class="">
                                            <label class="col-md-6 control-label"> Alamat</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static">{{ $eform['customer']['personal']['address'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if( $eform['customer']['personal']['status_id'] == '2' )
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="">
                                            <label class="col-md-6 control-label"> Nama Pasangan Calon Nasabah</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static">{{ $eform['customer']['personal']['couple_name'] }}</p>
                                            </div>
                                        </div>
                                       <div class="">
                                            <label class="col-md-6 control-label"> NIK</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static">{{ $eform['customer']['personal']['couple_nik'] }}</p>
                                            </div>
                                        </div>
                                        <div class="">
                                            <label class="col-md-6 control-label"> Tanggal Lahir</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static">{{ $eform['customer']['personal']['couple_birth_date'] }}</p>
                                            </div>
                                        </div>
                                        <div class="">
                                            <label class="col-md-6 control-label"> Alamat</label>
                                            <div class="col-md-6">
                                                <p class="form-control-static">{{ $eform['customer']['personal']['address'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading" data-toggle="collapse" href="#collapseImage" style="cursor: pointer;">
                            <h3 class="panel-title">Dokumen Sumber <small>(klik disini untuk melihat detail dokumen)</small></h3>
                        </div>
                        <div class="panel-body panel-collapse collapse" id="collapseImage">
                            <div class="row">
                                @if( isset( $eform['customer']['other']['identity'] ) )
                                        <div class="col-md-6" align="center">
                                            <div class="card-box">
                                                @if((pathinfo(strtolower($eform['customer']['other']['identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eform['customer']['other']['identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eform['customer']['other']['identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                    @if(strpos($eform['customer']['other']['identity'], 'noimage.jpg'))
                                                        <p>KTP Tidak Ada</p>
                                                        <img class="img-responsive" id="zoom">
                                                    @else
                                                        <img src="{{$eform['customer']['other']['identity']}}" class="img-responsive" id="zoom">
                                                        <p>KTP</p>
                                                    @endif
                                                @else
                                                    <a href="@if(!empty($eform['customer']['other']['identity'])){{$eform['customer']['other']['identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                    <p>Klik Untuk Lihat KTP</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @if( $eform['customer']['personal']['status_id'] == '2' )
                                    @if( isset( $eform['customer']['personal']['couple_identity'] ) )
                                        <div class="col-md-6" align="center">
                                            <div class="card-box">
                                                @if((pathinfo(strtolower($eform['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eform['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eform['customer']['personal']['couple_identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                    @if(strpos($eform['customer']['personal']['couple_identity'], 'noimage.jpg'))
                                                        <p>KTP Pasangan Tidak Ada</p>
                                                        <img class="img-responsive" id="zoom">
                                                    @else
                                                        <img src="{{$eform['customer']['personal']['couple_identity']}}" class="img-responsive" id="zoom">
                                                        <p>KTP Pasangan</p>
                                                    @endif
                                                @else
                                                    <a href="@if(!empty($eform['customer']['personal']['couple_identity'])){{$eform['customer']['personal']['couple_identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                    <p>Klik Untuk Lihat KTP Pasangan</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form id="formLKN" method="POST" action="{{route('postPrescreening', $id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                @if (\Session::has('error'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        </div>
                    </div>
                @endif

                @if( isset($eform['pefindo_detail']) )
                    <!-- Pefindo -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pefindo / SLIK</h3>
                                </div>
                                <div class="panel-body">
                                    @foreach( json_decode($eform['pefindo_detail']) as $key => $pefindoAll )
                                        <div class="card-box-head">{{ $key == 'individual' ? 'Calon Nasabah' : 'Pasangan Calon Nasabah' }}</div>
                                        @if( count($pefindoAll) == 0 )
                                            <div class="card-box">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        Data Tidak Tersedia
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach( $pefindoAll as $index => $pefindo )
                                                <div class="card-box">
                                                    <h4 class="header-title custom-title">
                                                        <input type="radio" id="dhn{{ $key }}{{ $pefindo->PefindoId }}" name="select_{{ $key }}_pefindo" value="{{ $index }}" {{ $index == 0 ? 'checked' : '' }}>
                                                        <label for="dhn{{ $key }}{{ $pefindo->PefindoId }}">Pefindo {{ $pefindo->PefindoId }}</label>
                                                    </h4>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-horizontal" role="form">
                                                                <div class="">
                                                                    <label class="col-md-2"> Nama Lengkap </label>
                                                                    <div class="col-md-10"> : {{ $pefindo->FullName }}</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-horizontal" role="form">
                                                                <div class="">
                                                                    <label class="col-md-2"> NIK </label>
                                                                    <div class="col-md-10"> : {{ $pefindo->KTP }}</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-horizontal" role="form">
                                                                <div class="">
                                                                    <label class="col-md-2"> Tanggal Lahir </label>
                                                                    <div class="col-md-10"> : {{ $pefindo->DateOfBirth }}</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-horizontal" role="form">
                                                                <div class="">
                                                                    <label class="col-md-2"> Alamat </label>
                                                                    <div class="col-md-10"> : {{ $pefindo->Address }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                @else
                    <!-- Pefindo -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pefindo / SLIK</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="card-box">
                                        <h4 class="header-title custom-title">Pefindo / SLIK</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Score </label>
                                                        <div class="col-md-10">: {{ $eform['pefindo_score'] }} </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Hasil Pefindo  / SLIK</label>
                                                        <div class="col-md-10">: {{ $eform['pefindo_color'] }} </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Keterangan Resiko </label>
                                                        <div class="col-md-10">: {{ $eform['ket_risk'] }} </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Dokumen </label>
                                                        <div class="col-md-10">
                                                            @foreach( explode(',', $eform['uploadscore']) as $document )
                                                                @if( !empty($document) )
                                                                    <a href="{{ $document }}" target="_blank">
                                                                        <img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive">
                                                                    </a><br/>
                                                                @endif
                                                            @endforeach
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
                @endif

                <!-- DHN -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">DHN</h3>
                            </div>
                            <div class="panel-body">
                                @php( $dhnDetail = json_decode($eform['dhn_detail']) )
                                @foreach( $dhnDetail->responseData as $index => $dhn )
                                    @php( $class = ( $dhn->warna == "Hijau" ? "success" : ( $dhn->warna == "Kuning" ? "warning" : ( $dhn->warna == "Merah" ? "danger" : "" ) ) ) )
                                    <div class="card-box">
                                        <h4 class="header-title custom-title">
                                            <input type="radio" id="dhn{{ $index }}" name="select_dhn" value="{{ $index }}" {{ $index == 0 ? 'checked' : '' }}> <label for="dhn{{ $index }}">DHN {{ $index+1 }}</label>
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Hasil DHN </label>
                                                        <div class="col-md-10">: <span class="text-{{ $class }}">{{ $dhn->warna }}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SICD -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">SICD</h3>
                            </div>
                            <div class="panel-body">
                                @php( $sicdDetail = json_decode($eform['sicd_detail']) )
                                @foreach( $sicdDetail->responseData as $index => $sicd )
                                    <div class="card-box">
                                        <h4 class="header-title custom-title">
                                            <input type="radio" id="sicd{{ $index }}" name="select_sicd" value="{{ $index }}" {{ $index == 0 ? 'checked' : '' }}> <label for="sicd{{ $index }}">SICD {{ $index+1 }}</label>
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Nama Nasabah </label>
                                                        <div class="col-md-10"> : {{ !$sicd->nama_debitur ? '-' : $sicd->nama_debitur }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> NIK </label>
                                                        <div class="col-md-10"> : {{ !$sicd->no_identitas ? '-' : $sicd->no_identitas }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Tanggal Lahir </label>
                                                        <div class="col-md-10"> : {{ !$sicd->tgl_lahir ? '-' : $sicd->tgl_lahir }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Kolektibilitas </label>
                                                        <div class="col-md-10"> : {{ !$sicd->bikole ? '-' : $sicd->bikole }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Hasil SICD </label>
                                                        <div class="col-md-10">:
                                                            @if( $sicd->bikole == 1 || $sicd->bikole == '-' || $sicd->bikole == null || $sicd->bikole == '' )
                                                                <span class="text-success">Hijau</span>

                                                            @elseif( $sicd->bikole == 2 )
                                                                <span class="text-warning">Kuning</span>

                                                            @elseif( $sicd->bikole == 3 )
                                                                <span class="text-danger">Merah</span>

                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                            <button class="btn btn-orange waves-light waves-effect w-md m-b-20" type="submit"><i class="mdi mdi-content-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    @include('internals.layouts.footer')
    @include('internals.layouts.foot')
