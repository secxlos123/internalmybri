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

        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('assets/js/jquery.datatables.init.js')}}"></script>

        <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/jquery.core.js')}}"></script>
        <script src="{{asset('assets/js/jquery.app.js')}}"></script>

        <script src="{{asset('assets/js/jquery.date-pickers.init.js')}}"></script>

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
           $(document).ready(function() {
               $('#signout').on('click', function(e) {
                   $('#out').attr('action', '{{url("logout")}}');
                   $('#sign-out').modal('show');
                   e.preventDefault();
               });
           });
        </script>
@include('internals.layouts.signout')
    </body>
</html>