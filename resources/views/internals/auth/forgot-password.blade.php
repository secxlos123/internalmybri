@section('title','Dashboard')
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
                                        <p class="text-muted m-b-0 font-13">Masukkan email Anda dan kami akan mengirimkan instruksi untuk me-reset Kata Sandi melalui email Anda.  </p>
                                    </div>
                                    <form class="form-horizontal" action="#">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="email" required=""
                                                       placeholder="Masukkan email">
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <a href="{{url('email-sent')}}" class="btn w-md btn-bordered btn-primary waves-effect waves-light"
                                                        type="submit">Kirim Email
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Untuk bantuan email ke <a href="#" class="text-primary m-l-5"><b>mail@bri.co.id</b></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('internals.layouts.foot')  