@section('title','My BRI - Penjadwalan')
@include('internals.layouts.head')
    <style type="text/css">
        .none {
            display: none;
        }
        .pac-container {
            z-index: 1051 !important;
        }
        #searchInput {
          top: 10px !important;
        }
        .fc-time{
          display : none !important;
        }
        .fc-corner-right{
            background-color:/*#4682B4*/#1E90FF;
        }
        .fc-corner-left{
            background-color:/*#4682B4*/#1E90FF;
        }
        .fc-icon-right-single-arrow{
            color: white;
        }
        .fc-icon-left-single-arrow{
            color: red;
        }
        .fc-corner-right:hover{
            background-color: orange;
            color: white;
        }
        .fc-corner-left:hover{
            background-color: orange;
            color: white;
        }
        .fc-content:hover{
            background-color: orange;
            color: white;
        }
        .fc-today-button{
            color: white;
        }
    </style>
    <script type="text/javascript">
      var aoUserID = '{{ $data['pn'] }}'
      var userRole = '{{ $data['role'] }}'
    </script>
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Penjadwalan</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Home MyBRI</a>
                            </li>
                            <li class="active">
                                Penjadwalan
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Modul Penjadwalan</b></h4>
                        <p class="text-muted m-b-30">
                        @if($data['role'] != 'ao' )
                            Klik pada label jadwal yang telah ada
                            untuk melihat detail jadwal.
                        @else
                            Klik pada tanggal untuk menambahkan jadwal baru atau klik pada label jadwal yg telah ada
                            untuk merubah.
                        @endif
                        </p>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>

                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="event-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">Jadwal</h4>
                                </div>
                                <div class="modal-body p-20">
                                  <div class="form"></div>
                                  @if ($data['role'] == 'ao')
                                  <input type="text" name="" id="searchInput" class="form-control">
                                  @endif
                                  <div class='map' id='map' style='width: 100%; height: 200px;'></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                        Batal
                                    </button>
                                    @if ($data['role'] == 'ao')
                                    <button type="button" class="btn btn-orange save-event waves-effect waves-light">
                                        Simpan Jadwal
                                    </button>
                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                                            data-dismiss="modal">Hapus Jadwal Ini
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer text-right">
        2017 © Bank Rakyat Indonesia.
    </footer>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>
<script src="{{ asset('assets/js/custom/schedule.js')  }}"></script>
<script type="text/javascript">
    var address = {
        address: 'undefined',
        lat: "{{ env('DEF_LAT', '-6.21670') }}",
        long: "{{ env('DEF_LONG', '106.81350') }}",
    };
    $('#calendar').fullcalendar({});
</script>