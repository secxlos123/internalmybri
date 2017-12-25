@section('title','My BRI - 404 - Page Not Found')
@include('internals.layouts.head')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="wrapper-page csm-has-404">
                        <img src="{{asset('assets/images/animat-search-color.gif')}}" alt="" height="200">
                        <h2 class="text-uppercase text-danger"><b>Halaman Tidak Ditemukan</b></h2>
                        <p class="text-muted">It's looking like you may have taken a wrong turn. Don't worry... it
                            happens to the best of us. You might want to check your internet connection. Here's a
                        little tip that might help you get back on track.</p>

                        <a class="btn btn-primary waves-light waves-effect w-md m-b-15 top20" href="{{route('dashboard')}}"> Return Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('internals.layouts.foot')