@section('title','MyBRI - Lupa Kata Sandi')
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
                                    <form class="form-horizontal" id="forgotForm">
                                        {{ csrf_field() }}
                                        <div class="divError"></div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="email" required=""
                                                       placeholder="Masukkan email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-primary waves-effect waves-light"
                                                        type="submit" id="forgotButton" data-loading-text="Loading...">Kirim Email
                                                </button>
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

<script type="text/javascript">
    $("#forgotForm").submit(function (e) {
            e.preventDefault();
            var $btn = $('#forgotButton').button('loading');

            $.ajax({
                    url: "{!! route('postForgotPassword') !!}",
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (data) {
                       $btn.button('reset');
                       console.log(data);
                       // var win = window.open(data.url);
                       window.location = data.url;
                    },
                    error: function(response){
                        $btn.button('reset');
                        console.log(response);
                    }
                });
        });
</script>