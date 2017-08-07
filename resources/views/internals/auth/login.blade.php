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
                                    <form class="form-horizontal" action="#">
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="email" required="" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" required="" placeholder="Kata Sandi" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12" align="center">
                                            {!! Recaptcha::render() !!}
                                            </div>
                                          </div>
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox-signup" type="checkbox" name="remember_me">
                                                    <label for="checkbox-signup">
                                                        Ingatkan saya
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center m-t-30">
                                            <div class="col-sm-12">
                                                <a href="{{url('/forgot-password')}}" class="text-muted"><i class="fa fa-lock m-r-5"></i> Lupa kata sandi?</a>
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <a href="{{url('/')}}" class="btn w-md btn-bordered btn-primary waves-effect waves-light" type="submit">Masuk</a>
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
<script src='https://www.google.com/recaptcha/api.js'></script> 