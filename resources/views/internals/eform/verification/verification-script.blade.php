<script type="text/javascript">
    $(document).ready(function() {
        var options = {
            theme:"sk-bounce",
            message:'Mohon tunggu sebentar.',
            textColor:"white"
        };

        $('#save').on('click', function(e) {
            $("#form1").submit();
            HoldOn.open(options);
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
</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Customer\CompleteCustomer', '#form1'); !!}

<script type="text/javascript">
    $(document).ready(function() {
       $('#btnSave').on('click', function(e) {
            var data = $('#data-source');

            if(data.val() == 'cif'){
                switch ($("#update #field").val()) {
                    case 'nik':
                        $('#nikDF').text($( "#nikCIF" ).text());
                        $('#nik').val($( "#nikCIF" ).text());
                        break;
                    case 'name':
                        $('#nameDF').text($( "#nameCIF" ).text());
                        $('#name').val($( "#nameCIF" ).text());
                        break;
                    case 'birth_place':
                        $('#birth_placeDF').text($( "#birth_placeCIF" ).text());
                        $('#birth_place').val($( "#birth_placeCIF" ).text());
                        break;
                    case 'birth_date':
                        $('#birth_dateDF').text($( "#birth_dateCIF" ).text());
                        $('#birth_date').val($( "#birth_dateCIF" ).text());
                        break;
                    case 'address':
                        $('#addressDF').text($( "#addressCIF" ).text());
                        $('#address').val($( "#addressCIF" ).text());
                        break;
                    case 'gender':
                        $('#genderDF').text($( "#genderCIF" ).text());
                        $('#gender').val($( "#genderCIF" ).text());
                        break;
                    case 'citizenship':
                        $('#citizenshipDF').text($( "#citizenshipCIF" ).text());
                        $('#citizenship').val($( "#citizenshipCIF" ).text());
                        break;
                    case 'status':
                        $('#statusDF').text($( "#statusCIF" ).text());
                        $('#status').val($( "#statusCIF" ).text());
                        break;
                    case 'mother_name':
                        $('#mother_nameDF').text($( "#mother_nameCIF" ).text());
                        $('#mother_name').val($( "#mother_nameCIF" ).text());
                        break;
                    case 'type':
                        $('#typeDF').text($( "#typeCIF" ).text());
                        $('#type').val($( "#typeCIF" ).text());
                        break;
                    case 'work':
                        $('#workDF').text($( "#workCIF" ).text());
                        $('#work').val($( "#workCIF" ).text());
                        break;
                    case 'company_name':
                        $('#company_nameDF').text($( "#company_nameCIF" ).text());
                        $('#company_name').val($( "#company_nameCIF" ).text());
                        break;
                    case 'work_field':
                        $('#work_fieldDF').text($( "#work_fieldCIF" ).text());
                        $('#work_field').val($( "#work_fieldCIF" ).text());
                        break;
                    case 'position':
                        $('#positionDF').text($( "#positionCIF" ).text());
                        $('#position').val($( "#positionCIF" ).text());
                        break;
                    case 'work_duration':
                        $('#work_durationDF').text($( "#work_durationCIF" ).text());
                        $('#work_duration').val($( "#work_durationCIF" ).text());
                        break;
                    case 'office_address':
                        $('#office_addressDF').text($( "#office_addressCIF" ).text());
                        $('#office_address').val($( "#office_addressCIF" ).text());
                        break;
                    case 'phone':
                        $('#phoneDF').text($( "#phoneCIF" ).text());
                        $('#phone').val($( "#phoneCIF" ).text());
                        break;
                    case 'mobile_phone':
                        $('#mobile_phoneDF').text($( "#mobile_phoneCIF" ).text());
                        $('#mobile_phone').val($( "#mobile_phoneCIF" ).text());
                        break;
                    case 'address_status':
                        $('#address_statusDF').text($( "#address_statusKM" ).text());
                        $('#address_status').val($( "#address_statusKM" ).text());
                        break;
                }
                
            }else if(data.val() == 'kemendagri'){
                switch ($("#update #field").val()) {
                    case 'nik':
                        $('#nikDF').text($( "#nikKM" ).text());
                        $('#nik').val($( "#nikKM" ).text());
                        break;
                    case 'name':
                        $('#nameDF').text($( "#nameKM" ).text());
                        $('#name').val($( "#nameKM" ).text());
                        break;
                    case 'birth_place':
                        $('#birth_placeDF').text($( "#birth_placeKM" ).text());
                        $('#birth_place').val($( "#birth_placeKM" ).text());
                        break;
                    case 'birth_date':
                        $('#birth_dateDF').text($( "#birth_dateKM" ).text());
                        $('#birth_date').val($( "#birth_dateKM" ).text());
                        break;
                    case 'address':
                        $('#addressDF').text($( "#addressKM" ).text());
                        $('#address').val($( "#addressKM" ).text());
                        break;
                    case 'gender':
                        $('#genderDF').text($( "#genderKM" ).text());
                        $('#gender').val($( "#genderKM" ).text());
                        break;
                    case 'citizenship':
                        $('#citizenshipDF').text($( "#citizenshipKM" ).text());
                        $('#citizenship').val($( "#citizenshipKM" ).text());
                        break;
                    case 'status':
                        $('#statusDF').text($( "#statusKM" ).text());
                        $('#status').val($( "#statusKM" ).text());
                        break;
                    case 'mother_name':
                        $('#mother_nameDF').text($( "#mother_nameKM" ).text());
                        $('#mother_name').val($( "#mother_nameKM" ).text());
                        break;
                    case 'type':
                        $('#typeDF').text($( "#typeKM" ).text());
                        $('#type').val($( "#typeKM" ).text());
                        break;
                    case 'work':
                        $('#workDF').text($( "#workKM" ).text());
                        $('#work').val($( "#workKM" ).text());
                        break;
                    case 'company_name':
                        $('#company_nameDF').text($( "#company_nameKM" ).text());
                        $('#company_name').val($( "#company_nameKM" ).text());
                        break;
                    case 'work_field':
                        $('#work_fieldDF').text($( "#work_fieldKM" ).text());
                        $('#work_field').val($( "#work_fieldKM" ).text());
                        break;
                    case 'position':
                        $('#positionDF').text($( "#positionKM" ).text());
                        $('#position').val($( "#positionKM" ).text());
                        break;
                    case 'work_duration':
                        $('#work_durationDF').text($( "#work_durationKM" ).text());
                        $('#work_duration').val($( "#work_durationKM" ).text());
                        break;
                    case 'office_address':
                        $('#office_addressDF').text($( "#office_addressKM" ).text());
                        $('#office_address').val($( "#office_addressKM" ).text());
                        break;
                    case 'phone':
                        $('#phoneDF').text($( "#phoneKM" ).text());
                        $('#phone').val($( "#phoneKM" ).text());
                        break;
                    case 'mobile_phone':
                        $('#mobile_phoneDF').text($( "#mobile_phoneKM" ).text());
                        $('#mobile_phone').val($( "#mobile_phoneKM" ).text());
                        break;
                    case 'address_status':
                        $('#address_statusDF').text($( "#address_statusKM" ).text());
                        $('#address_status').val($( "#address_statusKM" ).text());
                        break;
                      }
            }
            $('#update').modal('hide');
       });

       $('.btn-change').on('click', function(e) {
            var field = $(this).data('field');
            $('#update').modal('show');
            $("#update #field").val(field);
       });

       var timeoutID = null;
        $('#work_duration_month').keyup(function(e) {
            clearTimeout(timeoutID);
            //timeoutID = setTimeout(findMember.bind(undefined, e.target.value), 500);
            timeoutID = setTimeout(function(){workDurationMonth()}, 1000);
        });

        function workDurationMonth(){
            if(parseInt($('#work_duration_month').val().replace( /[^0-9]/g, '' )) > 12){
                $('#work_duration_month').val('12');
            }
        }

       // $('#save').on('click', function(e) {
       //      $("#form1").submit();
       // });
   });
</script>