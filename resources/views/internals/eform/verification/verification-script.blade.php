<script type="text/javascript">
    $('.select2').select2({
        maximumInputLength : 16,
        witdh : '100%',
        allowClear: true
    });

    $(document).ready(function() {
        var options = {
            theme:"sk-bounce",
            message:'Mohon tunggu sebentar.',
            textColor:"white"
        };

        $('#save').on('click', function(e) {
            $("#form1").submit();
            // HoldOn.open(options);
        });


        $('#join_check').on('change', function() {
            if(this.checked){
                $('#couple_financial').show();
            }else{
                $('#couple_financial').hide();
            }
        });
           // console.log($('#status').val());
        if($('#status').val() == 2){
            $('#marrital_certificate').show();
            $('#couple_data').show();
            $('#join_income').show();
        }else if($('#status').val()== 3){
            $('#separate_certificate').show();
            $('#couple_data').hide();
            $('#join_income').hide();
            $('#couple_financial').hide();
        }else{
            hideCouple();
        }
    });

    function hideCouple(){
        $('#couple_data').hide();
        $('#separate_certificate').hide();
        $('#marrital_certificate').hide();
        $('#join_income').hide();

    }
    hideCouple();

    $('#status').on('change', function() {
        if(this.value == 2){
            $('#marrital_certificate').show();
            $('#couple_data').show();
            $('#join_income').show();
        }else if(this.value == 3){
            $('#separate_certificate').show();
            $('#couple_data').hide();
            $('#join_income').hide();
        }else{
            hideCouple();
        }
    })

    $('.datepicker-date').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        endDate: new Date(),
        todayHighlight: true
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
        var text = $(this).find("option:selected").text();
        $('#new_city').val(text);
    });

    $('.birth_place').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/birth_place',
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

    $('#birth_place').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_birth_place').val(text);
    });

    $('#couple_birth_place').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_couple_birth_place').val(text);
    });

    $('.gender').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_gender').val(text);
    });

    $('#status').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_status').val(text);
    });

    $('.address_status').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_address_status').val(text);
    });

    $('.work').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/jobs',
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
                    results: data.jobs.data,
                    pagination: {
                        more: (params.page * data.jobs.per_page) < data.jobs.total
                    }
                };
            },
            cache: true
        },
    });

    $('.work').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_job').val(text);
    });

    $('.work_type').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/job_types',
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
                    results: data.job_types.data,
                    pagination: {
                        more: (params.page * data.job_types.per_page) < data.job_types.total
                    }
                };
            },
            cache: true
        },
    });

    $('.work_type').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_job_type').val(text);
    });

    $('.work_field').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/job_fields',
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
                    results: data.job_fields.data,
                    pagination: {
                        more: (params.page * data.job_fields.per_page) < data.job_fields.total
                    }
                };
            },
            cache: true
        },
    });

    $('.work_field').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_job_field').val(text);
    });

    $('.positions').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/positions',
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
                    results: data.positions.data,
                    pagination: {
                        more: (params.page * data.positions.per_page) < data.positions.total
                    }
                };
            },
            cache: true
        },
    });

    $('.positions').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_position').val(text);
    });

    $('.citizenship').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/citizenship',
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
                    results: data.citizenship.data,
                    pagination: {
                        more: (params.page * data.citizenship.per_page) < data.citizenship.total
                    }
                };
            },
            cache: true
        },
    });

    $('.citizenship').on('change', function () {
        var text = $(this).find("option:selected").text();
        $('#new_citizenship').val(text);
    });

    function readURLCouple(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#couple_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#couple_identity").change(function(){
        readURLCouple(this);
    });

    $("#identity").change(function(){
        readURL(this);
    });

    function initVerifyData(field, target) {
        if (target == "cif") {
            target = 'CIF';
        } else if (target == "kemendagri") {
            target = 'KM';
        } else {
            target = 'BASE';
        }

        if ( $( '#'+field+target ).html() != "" || target == "BASE" ) {
            $('#'+field+'DF').html($( '#'+field+target ).html());
            $('#'+field).val($( '#'+field+target ).html());
            return true;

        } else {
            alert("Tidak dapat menyesuaikan dengan data yang tidak tersedia");
            return false;
        }


    }

    $(document).ready(function() {
       $('#btnSave').on('click', function(e) {
            var data = $('#data-source');
            if ( initVerifyData($("#update #field").val(), data.val()) ) {
                $('#update').modal('hide');
            };
       });

       $('.btn-change').on('click', function(e) {
            var field = $(this).data('field');
            $("#data-source").val("");
            $('#update').modal('show');
            $("#update #field").val(field);
       });
   });

    $(document).on('input', "input[name='work_duration_month']", function(){
        if ($(this).val() > 11) {
            $(this).val("11");
        }
    })

    $(document).on('change', '#myCheckBox', function(){
        checked = $(this).prop("checked");
        current_address = $("textarea[name='current_address']");
        address = $("input[name='address']").val();

        current_address.attr('readonly', checked);

        if ( checked ) {
            current_address.val(address).html(address);
        }
    });

    $(document).on('change', "input[name='address']", function(){
        checked = $('#myCheckBox').prop("checked");
        address = $(this).val();

        if ( checked ) {
            current_address.val(address).html(address);
        }
    });

    $(document).on('input', "input[name=new_nik]", function() {
        $("#change-nik-save").prop('disabled', !( $(this).val().length == 16 ));
    });

    $(document).on('click', ".change-nik", function(){
        $("#change-nik-modal").modal('show');
    });

    $(document).on('submit', "#change-nik-form", function(){
        HoldOn.open();
        var formData = new FormData(this);

        $.ajax({
            url: "/eform/search-nik",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                new_nik = $('input[name=new_nik]').val();

                $('#change-nik-modal').modal('toggle');

                $("#change-nik-save").prop('disabled', true);
                $('input[name=nik]').val(new_nik);
                $('input[name=new_nik]').val('');
                $("input[name=cif_number]").val(data.cif.cif_number);

                $.each(["name", "address", "phone", "mobile_phone", "mother_name"], function(key, field){
                    initVerifyData(field, 'BASE');
                    $("#"+field+"CIF").html(data.cif[field]);
                    $("#"+field+"KM").html(data.kemendagri[field]);
                });

                HoldOn.close();
            },
            error: function (response) {
                HoldOn.close();
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    });
</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Customer\CompleteCustomer', '#form1'); !!}
