@section('title','My BRI - Logout')
@include('internals.layouts.head')
<body class="bg-grey">
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="wrapper-page">
                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="#" class="text-success">
                                            <span><img src="assets/images/logo.png" alt="" height="50"></span>
                                        </a>
                                    </h2>
                                </div>
                                <div class="account-content">
                                    <div class="text-center m-b-20">
                                        <div class="m-b-20">
                                            <div class="checkmark">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                                  <circle class="path circle" fill="none" stroke="#00529C" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                                                  <polyline class="path check" fill="none" stroke="#00529C" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                                                </svg>
                                            </div>
                                        </div>
                                        <h3>Logout Berhasil</h3>
                                        <p class="text-muted font-13 m-t-10"> Anda telah berhasil keluar dari aplikasi. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Kembali ke halaman <a href="{{url('/login')}}" class="text-primary m-l-5 m-r-5"><b>Log In</b></a> atau <a href="{{url('/')}}" class="text-primary m-l-5"><b>Homepage</b></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('internals.layouts.foot')  