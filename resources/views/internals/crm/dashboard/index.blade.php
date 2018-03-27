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
          @if(($data['role']=='pincapem') || ($data['role']=='ampd') || ($data['role']=='mp') || ($data['role']=='pinca'))
            @include('internals.crm.dashboard.admin.index')
          @elseif(($data['role']=='ao') || ($data['role']=='fo'))
            @include('internals.crm.dashboard.fo.index')
          @endif
        </div>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')

<script src="{{asset('assets/js/morris.min.js')}}"></script>
<script src="{{asset('assets/js/raphael-min.js')}}"></script>
@if(($data['role']=='pincapem') || ($data['role']=='ampd') || ($data['role']=='mp') || ($data['role']=='pinca'))
  @include('internals.crm.dashboard.admin.script')
@elseif(($data['role']=='fo' || ($data['role']=='ao')))
  @include('internals.crm.dashboard.fo.script')
@endif
