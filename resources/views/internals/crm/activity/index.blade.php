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
                                <button type="button" class="btn btn-default waves-effect" id="btn1" onclick="showActivityDet()">Tambah
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
                              <div class="form"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                    Batal
                                </button>
                                @if ($data['role'] == 'ao' || $data['role'] == 'fo')
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
            <div class="row" id="ActivityTam" style="display: none">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Tambah Activity</b></h4>
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
                                    <select class="select2 form-control" name="marketing" id="marketing">
                                            <option value="">Search Rencana Marketing</option>
                                    </select>  
                                </div>
                                <div class="form-group has-feedback has-search">
                                    <select class="select2 form-control" name="pemasar" id="pemasar">
                                            <option value="">Search Tenaga Pemasar Pendamping</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class='form-control appointment_date'  type='text' name='description' id='description' placeholder="Deskripsi"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
            <div class="row" id="ActivityDet" style="display: none">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Detail Activity</b></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name='tujuan' id="tujuan" type='text' class="form-control" placeholder="tujuan" disabled/>
                                </div>
                                <div class="form-group">
                                    <input name='event' id="event" type='text' class="form-control" placeholder="event" disabled/>
                                </div>
                                <div class="form-group">
                                    <input name='startdate' id="startdate" type='text' class="form-control" placeholder="Waktu Mulai" disabled/>
                                </div>
                                <div class="form-group">
                                    <input name='enddate' id="enddate" type='text' class="form-control" placeholder="Waktu Berakhir" disabled/>      
                                </div>
                                <div class="form-group">
                                    <input name='alamat' id="alamat" type='text' class="form-control" placeholder="Alamat" disabled/>
                                </div>
                                <div class="form-group">
                                    <input name='marketing' id="marketing" type='text' class="form-control" placeholder="Search Rencana Marketing" disabled/>
                                    </select>  
                                </div>
                                <div class="form-group">
                                    <input name='pemasar' id="pemasar" type='text' class="form-control" placeholder="Search Tenaga Pemasar Pendamping" disabled/>
                                </div>
                                <div class="form-group">
                                    <input name='description' id="description" type='text' class="form-control" placeholder="Deskripsi" disabled/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default waves-effect" id="btn1" onclick="showActivityDet()">RESCHEDULE</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-orange waves-effect" id="btn1" onclick="showActivityDet()">
                                    TINDAKLANJUT
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
    $(document).ready(function(){

        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker();
        
        $('#marketing').select2({
            ajax: {
            url: '/activity/marketing',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            processResults: function (data, params) {
              console.log(data);
                var select2Data = $.map(data, function (obj) {
                    return {
                        id: obj.id,
                        text: '<span>' + obj.nama + ", " + obj.activity_type + ', ' + obj.product_type + ' [' + obj.status + '] [Rp. ' + obj.target + ']' + '</span>' + '<span class="none">' + obj.name + '</span><span class="none">' + obj.id + '</span>'
                    }
                });
                // select2Data = select2Data.filter(function(data) {
                //     return data.text.indexOf(params.term) !== -1
                // });
                return {
                    results: select2Data
                };
            },
            escapeMarkup: function(markup) {
                return markup;
            },
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        });
        
        $('#pemasar').select2({
            ajax: {
            url: '/activity/pemasar',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            processResults: function (data, params) {
              console.log(data);
                var select2Data = $.map(data, function (obj) {
                    return {
                        id: obj.PERNR,
                        text: '<span>' + obj.SNAME + '</span>' + '<span class="none">' + obj.PERNR + '</span><span class="none">' + obj.PERNR + '</span>'
                    }
                });
                // select2Data = select2Data.filter(function(data) {
                //     return data.text.indexOf(params.term) !== -1
                // });
                return {
                    results: select2Data
                };
            },
            escapeMarkup: function(markup) {
                return markup;
            },
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        });  
    });
   
    function showActivityDet() {
        var x = document.getElementById("ActivityMar");
        var y = document.getElementById("ActivityTam");
        document.getElementById("startdate").value="";
        document.getElementById("enddate").value="";
        document.getElementsByName("alamat").value="";
        document.getElementById("marketing").value="";
        document.getElementById("pemasar").value="";
        document.getElementById("description").value="";
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "block";
        }
    }
    var address = {
        address: 'undefined',
        lat: "{{ env('DEF_LAT', '-6.21670') }}",
        long: "{{ env('DEF_LONG', '106.81350') }}",
    };
   
    // $('#calendar').fullCalendar({});
    // console.log(userRole);
</script>
