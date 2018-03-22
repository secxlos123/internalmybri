@section('title','MyBRI - Form Peninjauan Properti Baru')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>
<style>
.center-steps .wizard > .steps > ul > li {
    width: 10%;
}
.select2-container .select2-selection--single .select2-selection__rendered .select2-selection__clear{
  height: 34px;
  width: 24px;
  right: 3px;
}
</style>

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Form Peninjauan Properti Baru</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('dashboard')}}">Home MyBRI</a>
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

                                <h3>&nbsp;</h3>
                                <!-- step 7 -->
                                @include('internals.collateral.staff.lkn-collateral._step-7')

                                <h3>&nbsp;</h3>
                                <!-- step 7 -->
                                @include('internals.collateral.staff.lkn-collateral._step-8')

                                <h3>&nbsp;</h3>
                                <!-- step 7 -->
                                @include('internals.collateral.staff.lkn-collateral._step-9')

                                <h3>&nbsp;</h3>
                                <!-- step 7 -->
                                @include('internals.collateral.staff.lkn-collateral._step-10')
                                @include('form_audit._input_long_lat')
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
@include('internals.collateral.staff.lkn-collateral._render-upload')
<!-- {!! Html::style( 'assets/css/dropzone.min.css' ) !!} -->
<!-- {!! Html::script( 'assets/js/dropzone.min.js' ) !!} -->
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

        $('.cities').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();
            $('#city_name').val(text);
        });

        $('.insurance').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getInsurance")}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.insurances.data,
                        pagination: {
                            more: (params.page * data.insurances.per_page) < data.insurances.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.insurance').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();
            $('#insurance_company_name').val(text);
        });

        $('.appraiser').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getAppraiser")}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.appraisers.data,
                        pagination: {
                            more: (params.page * data.appraisers.per_page) < data.appraisers.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.appraiser').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();
            $('#independent_appraiser_name').val(text);
        });

        $('.filestyle-foto').filestyle({
            buttonText : "Unggah",
            htmlIcon : '<span class="icon-span-filestyle fa fa-cloud-upload"></span>',
            placeholder: "Tidak ada file"
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

    $('#add_photo').click(function(){
        var index = $('.photo').length;
        var x = $(".filestyle-foto").length;
        index++;
        $('#foto_div').append(
            '<div class="foto">'
                +'<div class="input-group">'
                +'<input type="file" class="filestyle-foto photo" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="other[image_area]['+index+'][image_data]" accept="image/*,application/pdf" id="filestyle-'+index+'">'
                +'<span class="input-group-addon b-0" style="padding: 1px 1px;background-color: #eee0;"><a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-danger delete-photo" title="Delete Photo">Hapus</a></span>'
                +'</div>'
            +'</div>'
        );
        // Append image field
        $(".img-previews").append(
            `<img id="preview-`+ x +`" src="#" width="40%">`
        );
        $('.filestyle-foto').filestyle({
            buttonText : "Unggah",
            htmlIcon : '<span class="icon-span-filestyle fa fa-cloud-upload"></span>',
            placeholder: "Tidak ada file"
        });
    });

    $('#foto_div').on('click', '.delete-photo', function () {
        var string = $(this).closest('div.foto').find('.filestyle-foto').attr('id');
        var id = string.substr(10, 1);
        var id = parseInt(id) - 1;
        $(this).closest('div.foto').remove();
        $("#preview-"+ id).remove();
    })

    // Preview image when finish button clicked
    $("a[href='#finish']").on("click", function(){
        $(".filestyle-foto").each(function(key, val){
            previewImage(this, key);
        });
    })

    $('#zip_code').on('input' , function() {
        var input=$(this).val();
        html = '<p class="help-block" style="color:red;" > Kode Pos tidak valid</p>';
        html_valid = '<p class="help-block" style="color:green;" > Kode Pos valid : </p>';
        html_error = '<p class="help-block" style="color:red;" >Server Kode pos Sedang Mengalami Gangguan</p>';
        if(input.length == 5 )
        {
            $.ajax({
            dataType: 'json',
            type: 'GET',
            url: '/dropdown/zipcodelist?search='+input,
        }).done(function(data){
            if(data.zipcodes.data.length == 0)
            {
                $('#err-zc').html(html);
                $('#zip_code').val('');
            }else
            {
             kota = data.zipcodes.data[0].kecamatan;
             $('#err-zc').html(html_valid + kota);
            }
        }).fail(function(errors) {
            $('#err-zc').html(html_error);
            $('#zip_code').val('');
        });
        }
    });

    $('#building_year').datepicker({
        minViewMode:2,
        format:"yyyy",
        clearBtn:true,
        autoclose:true,
        yearHighLight:true
    });

    // Function for previewing image
    function previewImage(input, key) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-'+key).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>