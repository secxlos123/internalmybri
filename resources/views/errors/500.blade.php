@section('title','MyBRI - 500 - Internal Server Error')
@include('internals.layouts.head')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="wrapper-page csm-has-404">
                    <img src="{{asset('assets/images/animat-customize-color.gif')}}" alt="" height="180">
                    <h1 style="font-size: 78px; color: #315374;"><b>500</b></h1>
                    <h3 class="text-uppercase text-danger"><b>Internal Server Error</b></h3>
                    <p class="text-muted">Maaf, sedang terdapat gangguan di sisi server.</p>

                    <a class="btn btn-primary waves-light waves-effect w-md m-b-15 top20" href="{{route('dashboard')}}"> Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('internals.layouts.foot')