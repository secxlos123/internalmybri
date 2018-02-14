@section('title','MyBRI - Dashboard')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style media="screen">
  .morris-hover.morris-default-style {
    padding: 0px 130px;
    font-weight: bold;
  }
  .select2-selection__clear {
    display: none;
  }
  .morris-hover{position:absolute;z-index:1000;}
  .morris-hover.morris-default-style{border-radius:10px;padding:6px;color:#666;background:rgba(255, 255, 255, 0.8);border:solid 2px rgba(230, 230, 230, 0.8);font-family:sans-serif;font-size:12px;text-align:center;}
  .morris-hover.morris-default-style .morris-hover-row-label{font-weight:bold;margin:0.25em 0;}
  .morris-hover.morris-default-style .morris-hover-point{white-space:nowrap;margin:0.1em 0;}
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
             <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">CRM Dashboard </h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">Home MyBRI</a>
                        </li>
                        <li class="active">
                            <a href="#">CRM Dashboard</a>
                        </li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          @if(($data['role']=='mp') || ($data['role']=='pinca'))
            @include('internals.crm.dashboard.admin.index')
          @elseif(($data['role']=='fo' || ($data['role']=='staff')))
            @include('internals.crm.dashboard.fo.index')
          @endif
        </div>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')

<!-- <div id="disclaimer-modal" class="modal fade hide">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-horizontal" role="form">
                            <p>
                                Perhatian:<br/>
                                <ol style="padding-left: 30px;">
                                    <li style="text-align: justify;">Dalam setiap pengisian field data debitur dilarang menggunakan special character (:”;-‘&@) kecuali pengisian catatan dalam LKN</li>
                                    <li>Pengisian field alamat maksimal 40 karakter termasuk spasi</li>
                                </ol>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Mengerti</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- <script type="text/javascript">
    $(document).ready(function(){
        $("#disclaimer-modal").modal();
    })
</script> -->

<script src="{{asset('assets/js/morris.min.js')}}"></script>
<script src="{{asset('assets/js/raphael-min.js')}}"></script>
<!-- <script src="{{asset('assets/js/jquery.morris.init.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/jquery.morris2.init.js')}}"></script> -->
@if(($data['role']=='staff') || ($data['role']=='admin'))
    @include('internals.crm.dashboard.admin.script')
@elseif(($data['role']=='ao'))
    @include('internals.home.ao.script')
@elseif(($data['role']=='mp') || ($data['role']=='pinca'))
    @include('internals.home.mp.script')
@endif
