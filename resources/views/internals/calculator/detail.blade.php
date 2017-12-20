@section('title','My BRI - Kalkulator Simulasi Kredit')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Kalkulator Simulasi Kredit</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li class="active">
                                Kalkulator Simulasi Kredit
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <section id="property" class="padding listing1">
              <div class="container">
                <h2></h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Simulasi Perhitungan Kredit</h3>
                            </div>
                            <div class="panel-body" style="border: none;">
                                @include('internals.calculator._form_calculator')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                     <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#developer-info" data-toggle="tab" aria-expanded="true">
                                <span class="visible-xs"><i class="fa fa-info"></i></span>
                                <span class="hidden-xs text-uppercase">Rincian Pinjaman</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#contact-list" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="fa fa-phone"></i></span>
                                <span class="hidden-xs text-uppercase">Detail Angsuran</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#property-list" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="fa fa-list"></i></span>
                                <span class="hidden-xs text-uppercase">Download</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="developer-info">
                            @include('internals.calculator._loan_installment')
                        </div>
                        <div class="tab-pane" id="contact-list">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box table-responsive for-table-detail">
                                        @include('internals.calculator._installment_detail')
                                        <p class="term2">Catatan: Perhitungan ini adalah hasil perkiraan aplikasi KPR secara umum Data perhitungan di atas dapat berbeda dengan perhitungan bank. Untuk perhitungan yang akurat, silahkan hubungi bank</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="property-list">
                            <div class="row">
                                <div class="col-sm-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="bottom-space"></div>
        </div>
    </section>
</div>
</div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')    
@include('internals.calculator.calculator-script')