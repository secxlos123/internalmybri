@section('title','MyBRI - 404 - Halaman Tidak Ditemukan')
@include('internals.layouts.head')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="wrapper-page csm-has-404">
                        <img src="{{asset('assets/images/animat-search-color.gif')}}" alt="" height="200">
                        <h2 class="text-uppercase text-danger"><b>Halaman Tidak Ditemukan</b></h2>
                        <p class="text-muted">Maaf, halaman yang Anda tuju tidak ditemukan.</p>

                        <a class="btn btn-primary waves-light waves-effect w-md m-b-15 top20" href="{{route('dashboard')}}"> Kembali ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('internals.layouts.foot')