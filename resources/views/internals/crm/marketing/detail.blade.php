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
</style>
<div class="content-page">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-title-box">
            <h4 class="page-title">Marketing</h4>
            <ol class="breadcrumb p-0 m-0">
              <li>
                <a href="{{url('/')}}">Home MyBRI</a>
              </li>
              <li class="active">
                Marketing
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
                <div class="col-md-6">
                  <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Info</h4>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-3">
                          <label for="">Nasabah</label>
                        </div>
                        <div class="col-md-9">
                          <span>{{$detail['nama']}}</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <label for="">Product</label>
                        </div>
                        <div class="col-md-9">
                          <span>{{$detail['product_type']}}</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <label for="">Kegiatan</label>
                        </div>
                        <div class="col-md-9">
                          <span>{{$detail['activity_type']}}</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <label for="">Target</label>
                        </div>
                        <div class="col-md-9">
                          <span>Rp. {{$detail['target']}}</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <label for="">Status</label>
                        </div>
                        <div class="col-md-9">
                          <span>{{$detail['status']}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Notes</h4>
                    <div class="panel-body">
                      @if (\Session::has('note_msg_success'))
                      <div class="alert alert-success">{{ \Session::get('note_msg_success') }}</div>
                      @endif
                      @if($notes != null)
                      <div class="row">
                        @foreach($notes as $note)
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-head">
                              <div class="row">
                                <div class="col-md-6">
                                  {{$note['pn_name']}}
                                </div>
                                <div class="col-md-6">
                                  <div class="text-right">{{$note['created_at']}}</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel-body">
                              <div class="actvity_type">{{$note['note']}}</div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                      @endif
                      <button id="create_note" class="btn btn-orange waves-light waves-effect w-md">Create Note</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Activity</h4>
                    <div class="panel-body">
                      <div class="row">
                        @foreach($detail['activity'] as $activity)
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-head">
                              <div class="row">
                                <div class="col-md-6">
                                  {{$activity['pn_name']}} melakukan {{$activity['action_activity']}}
                                </div>
                                <div class="col-md-6">
                                  <div class="text-right">{{$activity['start_date']}}</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-3">
                                  <label for="">Alamat</label>
                                </div>
                                <div class="col-md-9">
                                  <span>{{$activity['address']}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label for="">Object Activity</label>
                                </div>
                                <div class="col-md-9">
                                  <span>{{$activity['object_activity']}}</span>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <span>{{$activity['start_date']}}</span>
                                </div>
                                <div class="col-md-9">
                                  <span>{{$activity['start_time']}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <span>{{$activity['end_date']}}</span>
                                </div>
                                <div class="col-md-9">
                                  <span>{{$activity['end_time']}}</span>
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
</div>
<div id="create-note-modal" class="modal fade in">
    <div class="modal-dialog" role="document">
      <form class="" action="{{url('marketing/store_note')}}" method="post">
        {{ csrf_field() }}
        <div class="modal-content">
          <div class="modal-header">Create Note</div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-horizontal" role="form">
                  <input type="hidden" name="id" value="{{$detail['id']}}">
                  <textarea name="note" rows="8" style="width:100%; padding:10px;"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="pull-right">
              <button type="submit" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-orange waves-light waves-effect w-md">Create</button>
            </div>
          </div>
        </div>
      </form>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script type="text/javascript">
  $('#create_note').on('click', function(){
    $("#create-note-modal").modal();
  });
</script>
