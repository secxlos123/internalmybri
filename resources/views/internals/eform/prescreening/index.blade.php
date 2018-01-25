@section('title','MyBRI - Prescreening')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script> -->

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
                                    <h3 class="panel-title">Pefindo</h3>
                                </div>
                                <div class="panel-body">
                                    @foreach( json_decode($eform['pefindo_detail']) as $key => $pefindoAll )
                                        @if( count($pefindoAll) > 1 )
                                            <div class="card-box-head">{{ $key == 'individual' ? 'Calon Debitur' : 'Pasangan Calon Debitur' }}</div>
                                        @endif
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
                                    <h3 class="panel-title">Pefindo</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="card-box">
                                        <h4 class="header-title custom-title">Pefindo</h4>
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
                                                        <label class="col-md-2"> Hasil Pefindo </label>
                                                        <div class="col-md-10">: {{ $eform['pefindo_color'] }} </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-horizontal" role="form">
                                                    <div class="">
                                                        <label class="col-md-2"> Dokumen </label>
                                                        <div class="col-md-10">
                                                            @foreach( explode(',', $eform['uploadscore']) as $document )
                                                                <a href="{{ $document }}" target="_blank">
                                                                    <img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive">
                                                                </a><br/>
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
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&callback=initMap"></script> -->