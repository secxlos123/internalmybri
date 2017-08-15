@section('title','My BRI - Email Terkirim')
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
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
                                                    <path class="path" fill="none" stroke="#00529C" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
                                                        c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
                                                        c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
                                                    <circle class="path" fill="none" stroke="#00529C" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
                                                    <polyline class="path" fill="none" stroke="#00529C" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8
                                                        74.1,108.4 48.2,86.4 "/>

                                                    <circle class="spin" fill="none" stroke="#00529C" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="text-muted font-13 m-t-10"> Kami telah mengirimkan email ke <b>youremail@domain.com</b>. Silahkan cek email Anda dan klik pada link yang telah kami sediakan untuk me-reset Kata Sandi Anda. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Kembali ke halaman <a href="{{url('/login')}}" class="text-primary m-l-5"><b>Login</b></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('internals.layouts.foot')  