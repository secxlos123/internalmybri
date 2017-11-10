@section('title','My BRI - Form LKN')
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

            <!--Visits-->
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

            <!--income-->
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

            @if(!empty($eformData['customer']['personal']['couple_nik']))
            <!--couple income-->
            <div class="row" id="couple_income">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Penghasilan Pasangan</h3>
                        </div>
                        @include('internals.eform.lkn._income-partners')
                    </div>
                </div>
            </div>
            @endif

            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Keluarga</h3>
                        </div>
                        @include('internals.eform.lkn._family')
                    </div>
                </div>
            </div> -->

            <!--kpp-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">KPP</h3>
                        </div>
                        @include('internals.eform.lkn._kpp-type')
                    </div>
                </div>
            </div>

            <!--mutation-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mutasi Rekening</h3>
                        </div>
                        @include('internals.eform.lkn._mutation')
                        </div>
                        <br>
                             <a href="javascript:void(0)" class="btn btn-info" title="Tambah Rekening" id="add_account">+ Tambah Rekening Bank</a>
                    </div>
                </div>
            </div>

            <!--Hanya muncul jika properti bekas-->
            <!--investigation-->
            <div class="row" hidden="" id="investigate">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Investigasi Jual Beli</h3>
                        </div>
                        @include('internals.eform.lkn._investigate')
                    </div>
                </div>
            </div>

            <!--common-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Dokumen Pendukung</h3>
                        </div>
                        @include('internals.eform.lkn._common')
                    </div>
                </div>
            </div>

            <!--analist-->
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

            <!--recommend-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Rekomendasi AO</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p>Dengan ini saya meyakini kebenaran data nasabah dan merekomendasikan permohonan kredit untuk dapat diproses lebih lanjut</p>
                                        @if ($errors->has('job')) <p class="help-block">{{ $errors->first('job') }}</p> @endif
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
                        <!-- <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <textarea class="form-control" name="recommendation" placeholder="Tulis Rekomendasi">{{ old('recommendation') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                        <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="saveBtn"><i class="mdi mdi-content-save"></i> Simpan</a>
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
                        <button type="button" id="btnSave" class="btn btn-orange waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.eform.lkn.lkn-script')
@include('internals.eform.lkn.render-mutation')
<!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&callback=initMap"></script> -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\EForm\LKNRequest', '#formLKN'); !!}
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>

<script type="text/javascript">
    var options = {
         theme:"sk-bounce",
         message:'Mohon tunggu sebentar.',
         textColor:"white"
    };
    $(document).ready(function() {
       $('#saveBtn').on('click', function(e) {
            HoldOn.open(options);
            $("#formLKN").submit();
            HoldOn.close();
       });

       npwp_masking($('#npwp_number'));
   });

function npwp_masking(element) {
   $(element).val($(element).val().replace(/[^\d+]/gi, ""));
   $(element).inputmask("9{0,2}.9{0,3}.9{0,3}.9{0,1}-9{0,3}.9{0,3}");
}


function initialize() {
    var lng = $('#lng').val();
    var lat = $('#lat').val();
    var latlng = new google.maps.LatLng(lat,lng);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13,
      disableDefaultUI: true
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true
      // anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);

    });
    // this function will work on marker move event into map
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
    }
    function bindDataToForm(address,lat,lng){
       document.getElementById('location').value = address;
       document.getElementById('lat').value = lat;
       document.getElementById('lng').value = lng;
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>
