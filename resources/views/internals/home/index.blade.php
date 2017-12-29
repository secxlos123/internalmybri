@section('title','My BRI - Dashboard')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
             <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">Home </h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="active">
                            Admin
                        </li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(($data['role']=='staff') || ($data['role']=='admin'))
                @include('internals.home.admin.index')
            @elseif(($data['role']=='ao'))
                @include('internals.home.ao.index')
            @elseif(($data['role']=='mp') || ($data['role']=='pinca'))
                @include('internals.home.mp.index')
            @endif
        </div>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script src="{{asset('assets/js/morris.min.js')}}"></script>
<script src="{{asset('assets/js/raphael-min.js')}}"></script>
<!-- <script src="{{asset('assets/js/jquery.morris.init.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/jquery.morris2.init.js')}}"></script> -->
@if(($data['role']=='staff') || ($data['role']=='admin'))
    @include('internals.home.admin.script')
@elseif(($data['role']=='ao'))
    @include('internals.home.ao.script')
@elseif(($data['role']=='mp') || ($data['role']=='pinca'))
    @include('internals.home.mp.script')
@endif