@section('title','MyBRI - Detail Mitra Kerjasama')
@include('internals.layouts.head')
<link href="{{asset('assets/pack/bx-slider/jquery.bxslider.css')}}" rel="stylesheet" type="text/css" />
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Detail Property "Puri Pasir Mas Residence"</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('developers.index')}}">Mitra Kerjasama</a>
                                        </li>
                                        <li>
                                            <a href="{{route('developers.show', $id)}}">Detail Mitra Kerjasama</a>
                                        </li>
                                        <li class="active">
                                            Detail Property
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="property-detail-wrapper">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="">
                                        <ul class="bxslider property-slider">
                                            <li><img src="{{asset('assets/images/property/3.jpg')}}" /></li>
                                            <li><img src="{{asset('assets/images/property/4.jpg')}}" /></li>
                                            <li><img src="{{asset('assets/images/property/5.jpg')}}" /></li>
                                            <li><img src="{{asset('assets/images/property/6.jpg')}}" /></li>
                                        </ul>

                                        <div id="bx-pager" class="text-center hide-phone">
                                            <a data-slide-index="0" href=""><img src="{{asset('assets/images/property/3.jpg')}}" height="70" /></a>
                                            <a data-slide-index="1" href=""><img src="{{asset('assets/images/property/4.jpg')}}" height="70" /></a>
                                            <a data-slide-index="2" href=""><img src="{{asset('assets/images/property/5.jpg')}}" height="70" /></a>
                                            <a data-slide-index="3" href=""><img src="{{asset('assets/images/property/6.jpg')}}" height="70" /></a>
                                        </div>
                                    </div>

                                    <div class="m-t-30">
                                        <h3>Puri Pasir Mas Residence, Bandung</h3>
                                        <p class="text-muted text-overflow"><i class="mdi mdi-map-marker-radius m-r-5"></i>Jl. Cibaduyut Indah No. 21-26, Bandung</p>

                                        <p class="m-t-20">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus. Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum a. Curabitur sit amet pretium lectus, nec consequat orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus in libero sollicitudin venenatis eu sed enim. Nam felis lorem, suscipit ac nisl ac, iaculis dapibus tellus. Cras ante justo, aliquet quis placerat nec, molestie id turpis.
                                        </p>

                                        <h4 class="m-t-30 m-b-20">Fitur</h4>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <ul class="list-unstyled proprerty-features">
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 1
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 2
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 3
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 4
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 5
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 6
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 7
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-4">
                                                <ul class="list-unstyled proprerty-features">
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 8
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                         Fitur 9
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 10
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 11
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 12
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 13
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 14
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-4">
                                                <ul class="list-unstyled proprerty-features">

                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 15
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 16
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 17
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 18
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 19
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 20
                                                    </li>
                                                    <li>
                                                        <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                        Fitur 21
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-center card-box">
                                        <div class="text-left">
                                            <h4 class="header-title m-t-0 m-b-20">Mitra Kerjasama</h4>
                                        </div>
                                        <div class="member-card">
                                            <div class="member-thumb m-b-10 center-block">
                                                <img src="{{asset('assets/images/logo_dummy.png')}}" class="img-responsive img-thumbnail">
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-5">PT. Propertindo Abadi</h4>
                                                <p>Bandung</p>
                                            </div>

                                            <div class="m-t-20">
                                                <ul class="list-inline">
                                                    <li>
                                                        <h4>20</h4>
                                                        <p>Project Dikembangkan</p>
                                                    </li>
                                                    <li class="m-l-15">
                                                        <h4>100</h4>
                                                        <p>Unit Terjual</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-box">
                                        <div class="table-responsive">
                                            <table class="table table-bordered m-b-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Detail 1:</th>
                                                        <td>Detail 1</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 2: </th>
                                                        <td><span class="label label-danger">Detail 2</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 3:</th>
                                                        <td>Detail 3</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 4:</th>
                                                        <td>Detail 4</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 5:</th>
                                                        <td>Detail 5</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 6:</th>
                                                        <td>Detail 6</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 7:</th>
                                                        <td>Detail 7</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 8:</th>
                                                        <td>Detail 8</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 9:</th>
                                                        <td>Detail 9</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 10:</th>
                                                        <td>Detail 10</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Detail 11:</th>
                                                        <td>Detail 11</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end card-box -->

                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                    </div>
                </div>
                </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
 <script>
    $(document).ready(function () {
        $('.property-slider').bxSlider({
            pagerCustom: '#bx-pager'
        });
    });
</script>