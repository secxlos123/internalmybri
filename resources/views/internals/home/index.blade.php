@section('title','MyBRI - Home MyBRI')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
             <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">Home MyBRI </h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li class="active">
                            Home MyBRI
                        </li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if( ($data['role']=='admin'))
                @include('internals.home.admin.index')
            @elseif(($data['role']=='ao'))
                @include('internals.home.ao.index')
            @elseif(($data['role']=='mp') || ($data['role']=='pinca'))
                @include('internals.home.mp.index')
            @else
                @include('internals.home.others.index')
            @endif
        </div>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')

<div id="disclaimer-modal" class="modal fade">
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
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#disclaimer-modal").modal();
    })
</script>

<script src="{{asset('assets/js/morris.min.js')}}"></script>
<script src="{{asset('assets/js/raphael-min.js')}}"></script>
@if(($data['role']=='staff') || ($data['role']=='admin'))
    @include('internals.home.admin.script')
@elseif(($data['role']=='ao'))
    @include('internals.home.ao.script')
@elseif(($data['role']=='mp') || ($data['role']=='pinca'))
    @include('internals.home.mp.script')
@endif