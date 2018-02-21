@section('title','My BRI - Detail Document Credit')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Document Credit </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('auditrail.index')}}">Audit Rail</a>
                            </li>
                            <li class="active">
                                Detail Document Credit
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#eform" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-list"></i></span>
                                    <span class="hidden-xs">Data Pengajuan</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#personal" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-info"></i></span>
                                    <span class="hidden-xs">Data Calon Debitur</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#other" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-list"></i></span>
                                    <span class="hidden-xs">Dokumen Lain-lain</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#visit_report" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-list"></i></span>
                                    <span class="hidden-xs">Data Kunjungan</span>
                                </a>
                            </li>
                          <!--   <li class="">
                                <a href="#visit_docs" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-list"></i></span>
                                    <span class="hidden-xs">Dokumen Kunjungan</span>
                                </a>
                            </li> -->
                            <li class="">
                                <a href="#visit_docs_upload" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-list"></i></span>
                                    <span class="hidden-xs">Dokumen Upload</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="eform">
                                @include('internals.audit-rail.partials._eform')
                            </div>

                            <div class="tab-pane" id="personal">
                                @include('internals.audit-rail.partials._customer')
                            </div>

                            <div class="tab-pane" id="other">
                                @include('internals.audit-rail.partials._other')
                            </div>

                            <div class="tab-pane" id="visit_report">
                                @include('internals.audit-rail.partials._visit_report')
                            </div>

                            <!-- <div class="tab-pane" id="visit_docs">
                                @include('internals.audit-rail.partials._visit_docs')
                            </div> -->

                            <div class="tab-pane" id="visit_docs_upload">
                                @include('internals.audit-rail.partials._docs_upload')
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
