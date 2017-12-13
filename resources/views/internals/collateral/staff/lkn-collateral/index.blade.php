@section('title','My BRI - Form Peninjauan Properti Baru')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Form Peninjauan Properti Baru</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('staff-collateral.index')}}">List Approval Pengajuan Properti Baru</a>
                            </li>
                            <li class="active">
                                Form Peninjauan Properti Baru
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                     <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="card-box center-steps">
                        <form role="role" method="POST" action="{{route('postLKNAgunan', $collateral['id'])}}" id="form-lkn" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div>

                                <h3>&nbsp;</h3>
                                <!-- step 1 -->
                                @include('internals.collateral.staff.lkn-collateral._step-1')

                                <h3>&nbsp;</h3>
                                <!-- step 2 -->
                                @include('internals.collateral.staff.lkn-collateral._step-2')

                                <h3>&nbsp;</h3>
                                <!-- step 3 -->                            
                                @include('internals.collateral.staff.lkn-collateral._step-3')

                                <h3>&nbsp;</h3>
                                <!-- step 4 -->                            
                                @include('internals.collateral.staff.lkn-collateral._step-4')

                                <h3>&nbsp;</h3>
                                <!-- step 5 -->                            
                                @include('internals.collateral.staff.lkn-collateral._step-5')

                                <h3>&nbsp;</h3>
                                <!-- step 6 -->                            
                                @include('internals.collateral.staff.lkn-collateral._step-6')

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.collateral.staff.lkn-collateral._modal-detail')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Collateral\LKNRequest', '#form-lkn'); !!}
@include('internals.collateral.staff.lkn-collateral.script')
<script type="text/javascript">
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });
        
        $('.name').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getAO")}}',
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
                    // console.log(data);
                    return {
                        results: data.officers.data,
                        pagination: {
                            more: (params.page * data.officers.per_page) < data.officers.total
                        }
                    };
                },
                cache: true
            },
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

        $('#detail-collateral-modal #btn-save').on('click', function() {
            HoldOn.open(options);
            $('#form-lkn').submit();
            HoldOn.close();
        });
</script>