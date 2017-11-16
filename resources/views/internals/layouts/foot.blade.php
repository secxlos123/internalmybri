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

        <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>

        <script src="{{asset('assets/pack/bx-slider/jquery.bxslider.min.j')}}s"></script>
        <script src="{{asset('assets/js/moment.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{asset('assets/js/daterangepicker.js')}}"></script>


        <!-- Calendar -->
        <script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
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

        {{--init toastr--}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
        <script src="{{asset('assets/js/toastr.min.js')}}"></script>


        <!-- <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script> -->

        <script>
           $(document).ready(function() {
               $('#logout').on('click', function(e) {
                   $('#out').attr('action', '{{url("logout")}}');
                   $('#sign-out').modal('show');
                   e.preventDefault();
               });
           });
        </script>

        <script>
            var options = {
                 theme:"sk-bounce",
                 message:'Mohon tunggu sebentar.',
                 textColor:"white"
            };
           $(document).ready(function() {
               $('#signout').on('click', function(e) {
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


           $(document).ready(function() {
                Inputmask.extendAliases({
                    rupiah: {
                        // prefix: "Rp ",
                        radixPoint: ",",
                        groupSeparator: ".",
                        alias: "numeric",
                        placeholder: "0",
                        autoGroup: !0,
                        digits: 2,
                        digitsOptional: !1,
                        clearMaskOnLostFocus: !1,
                        rightAlign: false
                    }
                });
                $(document).ready(function() {
                    $('.currency-rp').inputmask({ alias : "rupiah" });
                });
            });

           $(".numericOnly").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                 // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                 // Allow: Ctrl+C
                (e.keyCode == 67 && e.ctrlKey === true) ||
                 // Allow: Ctrl+X
                (e.keyCode == 88 && e.ctrlKey === true) ||
                // Allow: backspace
                (e.keyCode === 320 && e.ctrlKey === true) ||
                 // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
              if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
            }
        });

        $(".alphaOnly").keypress(function (e) {
            if (e.which >= 48 && e.which <= 57 ) {
                // $("#errmsg").html("Nama Belakang harus diisi hanya menggunakan huruf").show().fadeOut("slow");
                return false;
            }
        });

        $('.datepicker-date').datepicker({
            format: "yyyy-mm-dd",
            clearBtn: true,
            autoclose: true,
            endDate: new Date(),
            todayHighlight: true
        });
        </script>
        @stack('scripts')
        @include('internals.layouts.signout')
    </body>
</html>