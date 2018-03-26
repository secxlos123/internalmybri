<!-- set current longitude latitude -->
<div class="hidden-content hide">
    <input name="hidden-long" value="{{ env('DEF_LONG', '106.81350') }}">
    <input name="hidden-lat" value="{{ env('DEF_LAT', '-6.21670') }}">

</div>
<!-- end -->

<script>
    var resizefunc = [];
</script>

<script type="text/javascript">
    function goPrev(){
        window.history.back();
    }
</script>

<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/fastclick.js')}}"></script>
<script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/js/switchery.min.js')}}"></script>

<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>

<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('assets/js/jquery.datatables.init.js')}}"></script>
<script src="{{asset('assets/js/dataTables.responsive.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.editor.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.select.min.js')}}"></script> -->

<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>

<script src="{{asset('assets/pack/bx-slider/jquery.bxslider.min.j')}}s"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('assets/js/daterangepicker.js')}}"></script>

<!-- Calendar -->
<script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/locale/id.js') }}"></script>
<script src="{{asset('assets/js/jquery.fullcalendar.js')}}"></script>

<!-- Init js -->
<!-- <script src="{{asset('assets/js/jquery.form-pickers.init.js')}}"></script> -->

<!-- App js -->
<script src="{{asset('assets/js/jquery.core.js')}}"></script>
<script src="{{asset('assets/js/jquery.app.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-slider.js')}}"></script>

<script src="{{asset('assets/js/jquery.steps.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-timepicker.js')}}"></script>

<!-- <script src="{{asset('assets/js/jquery.wizard-init.js')}}" type="text/javascript"></script> -->
<script src="{{asset('assets/js/jquery.date-pickers.init.js')}}"></script>
<script src="{{asset('assets/js/jquery.time-pickers.init.js')}}"></script>
<!-- <script src="{{asset('assets/js/jquery.gmaps.js')}}"></script> -->

<script src="{{asset('js/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('js/inputmask.numeric.extensions.js')}}"></script>
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/HoldOn.min.js')}}"></script>

<script src="{{asset('assets/js/toastr.min.js')}}"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script> -->
<script src="{{asset('assets/js/jquery.viewbox.min.js')}}"></script>
<!-- <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script> -->
<script type="text/javascript">
        $('tr[data-href]').on("click", function() {
            document.location = $(this).data('href');
        });
</script>
<script type="text/javascript">
    // Handling get longitude - latitude
    $(document).ready(function(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, getError);

        } else {
            alert("Geolocation is not supported by this browser.");
            console.log("Geolocation is not supported by this browser.");

        }
    })

    // Success get longitude - latitude
    function showPosition(position) {
        $('input[name="hidden-long"]').val(position.coords.longitude);
        $('input[name="hidden-lat"]').val(position.coords.latitude);

        console.log("Success generate longitude" + position.coords.longitude + " - latitude : " + position.coords.latitude + ".");
    }

    // Fail get longitude - latitude
    function getError() {
        console.log("Default longitude - latitude set.");
    }

    $.ajaxSetup({
        data: {
            long: $('input[name="hidden-long"]').val(),
            lat: $('input[name="hidden-lat"]').val()
        }
    });

    // handling serialize
    $.ajaxPrefilter(function(options, originalData, xhr){
        if (options.data) {
            if (typeof(options.data) == 'string') {
                options.data += "&long="+$('input[name="hidden-long"]').val();
                options.data += "&lat="+$('input[name="hidden-lat"]').val();
            }
        }
    });

</script>

<script>
    $(document).ready(function() {
        $('#logout,#signout').on('click', function(e) {
            $('#out').attr('action', '{{url("logout")}}');
            $('#sign-out').modal('show');
            e.preventDefault();
        });

        $('#btn-logout').on('click', function() {
            HoldOn.open(options);
        });

        $('#distance1').slider({
            formatter: function(value) {
                return 'Current value: ' + value;
            }
        });
    });
    var options = {
        theme:"sk-bounce",
        message:'Mohon tunggu sebentar.',
        textColor:"white"
    };

    $(document).ready(function() {
        Inputmask.extendAliases({
            rupiah: {
                // prefix: "Rp ",
                radixPoint: ".",
                groupSeparator: ".",
                alias: "numeric",
                // placeholder: "0",
                autoGroup: !0,
                // digits: 2,
                // digitsOptional: !1,
                clearMaskOnLostFocus: !1,
                rightAlign: false
            }
        });

        $(document).ready(function() {
            $('.currency-rp').inputmask({ alias : "rupiah" });
        });
    });

    $(document).on('keydown', ".numericOnly", function (e) {
        // curVal = $(this).val();
        // if ( e.keyCode == 190 ) {
        //     if ( $(this).hasClass('nonSeparator') || ( curVal[curVal.length -1] == "." ) ) {
        //         e.preventDefault();
        //     }
        // }

        // Allow: backspace, delete, tab, escape, enter
        if ( $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
            // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
            // Allow: backspace
            (e.keyCode === 320 && e.ctrlKey === true) ||
            // Allow: Home MyBRI, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39) )
        {
            // let it happen, don't do anything
            return;
        }

        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $(document).on('keypress', ".alphaOnly", function (e) {
        // var regex = new RegExp("^[a-zA-Z ]+$");
        var regex = new RegExp("^[a-zA-Z \b\0 ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }

        e.preventDefault();
        return false;
    });

    $('.datepicker-date').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        endDate: new Date(),
        todayHighlight: true
    });

    //init city select2
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });

        $('.cities').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/cities',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.cities.data,
                        pagination: {
                            more: (params.page * data.cities.per_page) < data.cities.total
                        }
                    };
                },
                cache: true
            },
        });
    });

    $('.cities').on('select2:select', function (e) {
        var citi_id = e.params.data.id;
    });

    function openSide() {
        document.getElementById("rightSide").style.width = "285px";
    }

    function closeSide() {
        document.getElementById("rightSide").style.width = "0px";

    }

    $( window ).resize( function() {
        var rightsidebar_height = $( '.rightSide' ).height(),
            rightsidebar_notif  = $( '.rightSide .notif-head').height(),
            rightsidebar_item   = $( '.rightSide li' ).not( '.notif-head' );

        rightsidebar_item.css( 'height', parseFloat( rightsidebar_height - rightsidebar_notif ) + 'px' );
    } );

    var rightsidebar_height = $( '.rightSide' ).height(),
        rightsidebar_notif  = $( '.rightSide .notif-head').height(),
        rightsidebar_item   = $( '.rightSide li' ).not( '.notif-head' );

    rightsidebar_item.css( 'height', parseFloat( rightsidebar_height - rightsidebar_notif ) + 'px' );

</script>

@stack('scripts')
@include('internals.layouts.signout')

</body>
</html>