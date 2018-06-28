@section('title','My BRI - Activity')
@include('internals.layouts.head')
    <style type="text/css">
        .none {
            display: none;
        }
        .pac-container {
            z-index: 1051 !important;
        }
        #searchInput {
          margin-left: 0px !important;
          width: 100% !important;
        }
        .fc-time{
          display : none !important;
        }
        #btn1{
            padding: 5% !important;
            width: 90% !important;
        }
        #submitNewActivity{
            padding: 5% !important;
            width: 90% !important;
        }
        #idForm hover{
             cursor: pointer; 
        }
        .fc-event{
            background-color: #00529C !important;
        }
        .has-search .form-control-feedback {
            right: initial;
            left: 0;
            color: #ccc;
        }
        .has-search .form-control {
            padding-right: 12px;
            padding-left: 34px;
        }
        .modal{
            position: relative !important;
        }
        .modal-open{
            overflow: scroll !important;
        }
        .modal-backdrop{
            position: relative !important;
        }
        .modal-dialog{
            width: 100% !important;
        }
        .modal-content{
            border-color: #fff !important;
        }
        #act:hover{
          cursor: pointer;
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
                        <h4 class="page-title">Activity</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Home MyBRI</a>
                            </li>
                            <li class="active">
                                Marketing Activity
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row" id="ActivityMar">
                <div class="card-box col-md-8">
                        <h4 class="m-t-0 header-title"><b>Marketing Activity</b></h4>
                        <p class="text-muted m-b-30">
                        @if($data['role'] != 'ao' || $data['role'] != 'fo' )
                            Klik pada label jadwal yang telah ada
                            untuk melihat detail jadwal.
                        @else
                            Klik pada tanggal untuk menambahkan jadwal baru atau klik pada label jadwal yg telah ada
                            untuk merubah.
                        @endif
                        </p>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="calendar-activity"></div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default waves-effect" id="btn1" onclick="showActivityTam()">Tambah
                                </button>
                            </div>
                        </div>
                </div>
                <div class="fade none-border col-md-4" id="event-modal">
                    <div class="modal-dialog" style="margin: 0px auto !important">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Jadwal</h4>
                            </div>
                            <div class="modal-body p-20">
                                <a href="#" onclick="showActivityDet()">
                                    <div class="form" id="idForm"></div>
                                </a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                    Batal
                                </button>
                                <!--
                                @if ($data['role'] == 'ao' || $data['role'] == 'fo')
                                <button type="button" class="btn btn-orange save-event waves-effect waves-light">
                                    Simpan Jadwal
                                </button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                                        data-dismiss="modal">Hapus Jadwal Ini
                                </button>
                                @endif
                                -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="ActivityDet" style="display: none">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Detail Activity</b></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <select id="tujuan" class="select2 form-control" name="tujuan">
                                    <option value="">Tujuan Aktivitas</option>
                                    @foreach($activity as $act)
                                    <option>{{$act['activity_name']}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <select id="event" class="select2 form-control" name="event">
                                    <option value="">Telp / Kunjungan / Event / Email / Report</option>
                                    @foreach($event as $eve)
                                    <option>{{$eve['name']}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <div class='input-group date' id='datetimepicker1'>
                                     <input name='startdate' id="startdate" type='text' class="form-control" placeholder="Waktu Mulai" />
                                     <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                     </span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class='input-group date' id='datetimepicker2'>
                                     <input type='text' name='enddate' id="enddate" class="form-control" placeholder="Waktu Berakhir" />
                                     <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                     </span>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <input class='form-control' type="text" name="alamat" id="searchInput" placeholder="Alamat"/>
                                    <div class='map' id='map' style='width: 100%; height: 300px;'></div>
                                </div>
                                <div class="form-group has-feedback has-search">
                                    <select class="select2 form-control" name="marketing" id="marketing" data-live-search="true">
                                            <option value="">Search Rencana Marketing</option>
                                    </select>  
                                </div>
                                <div class="form-group has-feedback has-search">
                                    <select class="select2 form-control" name="pemasar" id="pemasar" data-live-search="true">
                                            <option value="">Search Tenaga Pemasar Pendamping</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class='form-control'  type='text' name='description' id='description' placeholder="Deskripsi"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="btnTam">
                            <div class="col-md-8"></div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default waves-effect" id="btn1" onclick="showActivityDet()">Batal</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-orange save-event waves-effect waves-light" id="submitNewActivity"
                                    Simpan
                                </button>
                            </div>
                        </div>
                        <div class="row" id="btnDet">
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default waves-effect" id="btn1" onclick="showActivityDet()">Batal</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default waves-effect" id="btn1" onclick="showReschedule()">RESCHEDULE</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default save-event waves-effect waves-light" id="btn1" onclick="showTindak()">
                                    TINDAKLANJUT
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- BEGIN MODAL-->
                    
                   
                </div>
            </div>
            <div class="row" id="ActivityRes" style="display: none">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Tindak Lanjut</b></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <textarea class="form-control" placeholder="Sebab Reschedule (600 character)">
                                      
                                  </textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" id="act" name="ActR" value="option1" checked>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Nasabah berhalangan
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" id="act" name="ActR" value="option1">
                                      <label class="form-check-label" for="exampleRadios1">
                                        Nasabah meminta pertemuan lanjutan
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" id="act" name="ActR" value="option1">
                                      <label class="form-check-label" for="exampleRadios1">
                                        Nasabah belum mengumpulkan dokumen
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" id="act" name="ActR" value="option1">
                                      <label class="form-check-label" for="exampleRadios1">
                                        Lainnya
                                      </label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                  <label class="control-label">
                                    Jadwal Selanjutnya
                                  </label>
                                </div>
                                <div class="form-group">
                                  <div class='input-group date' id='datetimepicker4'>
                                     <input type='text' class="form-control" placeholder="Waktu Mulai" />
                                     <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                     </span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class='input-group date' id='datetimepicker5'>
                                     <input type='text' class="form-control" placeholder="Waktu Berakhir" />
                                     <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                     </span>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="btnTam">
                            <div class="col-md-8"></div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default waves-effect" id="btn1" onclick="showActivityDet()">Batal</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-orange save-event waves-effect waves-light" id="btn1">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- BEGIN MODAL-->
                    
                   
                </div>
            </div>
            <div class="row" id="ActivityTin" style="display: none">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Tindak Lanjut</b></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <textarea class="form-control" placeholder="Tindaklanjut (600 character)">
                                      
                                  </textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" id="act" name="ActTL" value="TL1" checked>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Nasabah setuju, bersedia komitmen
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" id="act" name="ActTL" value="TL2">
                                      <label class="form-check-label" for="exampleRadios1">
                                        Nasabah meminta pertemuan lanjutan
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" id="act" name="ActTL" value="TL3">
                                      <label class="form-check-label" for="exampleRadios1">
                                        Nasabah Tidak Setuju
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class='form-control'  type='text' placeholder="Realisasi Nomor Rekening"/>
                                </div>
                                <div class="form-group">
                                    <input class='form-control'  type='text' placeholder="Realisasi Nomor Rekening"/>
                                </div>
                                <div class="form-group">
                                  <div class='input-group date' id='datetimepicker3'>
                                     <input type='text' class="form-control" placeholder="Target Komitmen" />
                                     <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                     </span>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="btnTam">
                            <div class="col-md-8"></div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default waves-effect" id="btn1" onclick="showActivityDet()">Batal</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-orange save-event waves-effect waves-light" id="btn1">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- BEGIN MODAL-->
                    
                   
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
@include('internals.crm.activity.script-calendar')
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>
<script src="{{ asset('assets/js/custom/schedule.js')  }}"></script>
<script src="{{ asset('assets/js/moment.min.js')  }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepickers.min.js')  }}"></script>
<script type="text/javascript">   
    // $('#calendar').fullCalendar({});
    // console.log(userRole);
</script>
