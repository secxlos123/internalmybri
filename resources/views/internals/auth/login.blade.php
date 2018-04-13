@section('title','MyBRI - Login')
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
                                            <span><img src="{{asset('assets/images/logo.png')}}" alt="" height="50"></span>
                                        </a>
                                    </h2>
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" id="loginForm" autocomplete="off">
                                        {{ csrf_field() }}
                                        <div class="divError"></div>
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control numericOnly" type="text" required="" placeholder="Personal Number" name="pn" maxlength="8">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" required="" placeholder="Kata Sandi" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div align="center">
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
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-primary waves-effect waves-light" type="submit" id="loginButton" data-loading-text="Loading...">Masuk</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Untuk bantuan email ke <a href="#" class="text-primary m-l-5"><b>consumer.support@corp.bri.co.id</b></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('internals.layouts.foot')
<script type="text/javascript">
    var options = {
         theme:"sk-bounce",
         message:'Mohon tunggu sebentar.',
         textColor:"white"
    };

    $('#loginForm').on('paste contextmenu', function(e) {
    e.preventDefault();
    });

    $("#loginForm").submit(function (e) {
        e.preventDefault();
        HoldOn.open(options);

        $.ajax({
            url: "{!! route('postLogin') !!}",
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
               HoldOn.close();
               if(data.code >= 400){
                $('.divError').html('<div class="alert alert-danger">' +data.message + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
               }else{
                    window.location = data.url;
               }
            },
            error: function(response){
                HoldOn.close();
            }
        });
    });
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>