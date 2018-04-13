@section('title','MyBRI - List Approval Pengajuan Properti Baru')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style media="screen">
.panel-head{
  background-color: #00529C;
  color: #fff;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  padding: 10px 20px;
}
.panel-head span{
  color: #f7941e;
}
.infoNasabah{
  margin-bottom: 5px;
}
.infoNasabah label{
  font-weight: bold;
  margin-bottom: 1px;
}
.infoNasabah span{
  padding: 1px;
  height: auto;
}
</style>
<div class="content-page">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-title-box">
            <h4 class="page-title">Leads</h4>
            <ol class="breadcrumb p-0 m-0">
              <li>
                <a href="{{url('/')}}">Leads</a>
              </li>
              <li class="active">
                Detail
              </li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card-box m-t-30">
            <h4 class="m-t-min30 m-b-30 header-title custom-title">Detail</h4>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Profile</h4>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="infoNasabah">
                            <label for="">Nama</label>
                            <br>
                            <span>{{$info['nama_sesuai_id']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">CIF</label>
                            <br>
                            <span>{{$info['cifno']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">NIK</label>
                            <br>
                            <span>{{$info['id_number']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">NPWP</label>
                            <br>
                            <span>{{$info['npwp']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Jenis Kelamin</label>
                            <br>
                            <span>{{(($info['jenis_kelamin'] == "M")?  "Pria" : "Wanita")}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Status</label>
                            <br>
                            <span>{{$info['status_nikah']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Tempat Tanggal Lahir</label>
                            <br>
                            <span>{{$info['tanggal_lahir']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Agama</label>
                            <br>
                            <span>{{$info['agama']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Pendidikan</label>
                            <br>
                            <span>{{$info['pendidikan']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">No Telp</label>
                            <br>
                            <span>{{$info['telp_rumah']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Handphone</label>
                            <br>
                            <span>{{$info['handphone']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Email</label>
                            <br>
                            <span>{{$info['email']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Prioritas</label>
                            <br>
                            <span>{{(($info['prioritas'] == "N") ? "Tidak" : "Prioritas")}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Alamat</label>
                            <br>
                            <span>{{$info['alamat_id1']}} {{$info['alamat_id2']}} {{$info['alamat_id3']}} {{$info['alamat_id4']}}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="infoNasabah">
                            <label for="">Pekerjaan</label>
                            <br>
                            <span>{{$info['jenis_pekerjaan']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Nama Kantor</label>
                            <br>
                            <span>{{$info['nama_kantor']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Bidang Pekerjaan</label>
                            <br>
                            <span>{{$info['bidang_pekerjaan']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Jabatan</label>
                            <br>
                            <span>{{$info['jabatan']}}</span>
                          </div>
                          <div class="infoNasabah">
                            <label for="">Tiering Gaji</label>
                            <br>
                            <span>{{$info['penghasilan_per_bulan']}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Portfolio</h4>
                    <div class="panel-body">
                      @foreach($portfolio as $portfolio)
                      <div class="row">
                        <div class="infoNasabah">
                          <label for="">Kelompok</label>
                          <br>
                          <span>{{$portfolio['kelompok']}}</span>
                        </div>
                        <div class="infoNasabah">
                          <label for="">Nomor Rekening</label>
                          <br>
                          <span>{{$portfolio['rekening']}}</span>
                        </div>
                        <div class="infoNasabah">
                          <label for="">Mata Uang</label>
                          <br>
                          <span>{{$portfolio['mata_uang']}}</span>
                        </div>
                        <div class="infoNasabah">
                          <label for="">Saldo</label>
                          <br>
                          <span>Rp. {{$portfolio['saldo_rupiah']}}</span>
                        </div>
                      </div>
                      @endforeach

                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Marketing</h4>
                    <div class="panel-body">
                      @foreach($marketingsFiltered as $marketing)
                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-head">
                              <div class="row">
                                <div class="col-md-6">
                                  {{$marketing['product_type']}} - {{$marketing['activity_type']}}
                                </div>
                                <div class="col-md-6">
                                  <div class="text-right">{{$marketing['created_at']}}</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-3">
                                  <label for="">Pemasar</label>
                                </div>
                                <div class="col-md-9">
                                  <span>{{$marketing['pn_name']}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label for="">Target</label>
                                </div>
                                <div class="col-md-9">
                                  <span>Rp. {{$marketing['target']}}</span>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <label for="">Target Closing Date</label>
                                </div>
                                <div class="col-md-9">
                                  <span>{{$marketing['target_closing_date']}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label for="">Status</label>
                                </div>
                                <div class="col-md-9">
                                  <span>{{$marketing['status']}}</span>
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
                <div class="col-md-6">
                  <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Activity</h4>
                    <div class="panel-body">
                      @foreach($activities as $activity)

                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-head">
                              <div class="row">
                                <div class="col-md-6">
                                  {{$activity['pn_name']}} melakukan {{str_replace("Create Marketing ", "", $activity['action_activity'])}}
                                </div>
                                <div class="col-md-6">
                                  <div class="text-right">{{$activity['start_date']}} {{$activity['start_time']}}</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-3">
                                  <label for="">Pemasar</label>
                                </div>
                                <div class="col-md-9">
                                  <span>{{$activity['pn_name']}}</span>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
