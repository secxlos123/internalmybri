@section('title','My BRI - Form Disposisi')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Disposisi Pengajuan</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="{{url('/')}}">Dasboard</a>
                                    </li>
                                    <li>
                                        <a href="{{route('eform.index')}}">Pengajuan</a>
                                    </li>
                                    <li class="active">
                                        Disposisi
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="m-t-0 header-title"><b>Form Disposisi Pengajuan</b></h4>
                                        <p class="text-muted m-b-30 font-13">
                                            No. Referensi Pengajuan : {{$id}}
                                        </p>
                                        <form role="role" action="{{route('postDispotition', $id)}}" method="POST" >
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="control-label">Nama AO</label>
                                                {!! Form::select('name', ['' => ''], old('name'), [
                                                    'class' => 'select2 name',
                                                    'data-placeholder' => 'Pilih Nama AO',
                                                    'id' => 'name'
                                                ]) !!}
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Catatan Disposisi</label>
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success waves-effect waves-light" type="submit">Disposisi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

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
    });
</script>