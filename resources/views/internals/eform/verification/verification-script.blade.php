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
                HoldOn.open(options);
                $("#form1").submit();
                HoldOn.close();
        });


        $('#join_check').on('change', function() {
            if(this.checked){
                $('#couple_financial').show();
                $('#join_val').val('joint');
            }else{
                $('#couple_financial').hide();
                $('#join_val').val('single');
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

        $('#status').on('change', function() {
            if(this.value == 2){
                $('#marrital_certificate').show();
                $('#couple_data').show();
                $('#join_income').show();
                // $('#couple_financial').show();
            }else if(this.value == 3){
                $('#separate_certificate').show();
                $('#couple_data').hide();
                $('#join_income').hide();
                $('#couple_financial').hide();
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

        $('.status_property').on('select2:select', function (e) {
            /*
            kalo baru muncul semua, gak perlu jenis properti
            kalo secondary muncul jenis KPR, jenus properti
            kalo baru + non kerja sama
            */

            $("select[name='developer']").html("");
            $("select[name='kpr_type_property']").val("").trigger("change");
            $("select[name='property']").html("");
            $("select[name='property_type']").html("");
            $("select[name='property_item']").html("");
            $("select[name='active_kpr']").val("").trigger("change");
            $("input[name='price']").val("");
            $("input[name='building_area']").val("");
            $("input[name='dp']").val(0);
            $("input[name='down_payment']").val(0);
            $("input[name='request_amount']").val(0);
            $("textarea[name='home_location']").val("").html("");
            if ($(this).val() == "1") {
                $("div#kpr_type_property").addClass('hide');
                $("div#developer").removeClass('hide');
                $("div#property_name").removeClass('hide');
                $("div#property_type").removeClass('hide');
                $("div#property_unit").removeClass('hide');

            } else {
                $("div#kpr_type_property").removeClass('hide');
                $("div#developer").addClass('hide');
                $("div#property_name").addClass('hide');
                $("div#property_type").addClass('hide');
                $("div#property_unit").addClass('hide');
                $('#price').removeAttr('readonly');
                $('#home_location').removeAttr('readonly');
                $('#building_area').removeAttr('readonly');

            }
        });

        //select2 developer
        $('.developers').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getDeveloper")}}',
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
                        results: data.developers.data,
                        pagination: {
                            more: (params.page * data.developers.per_page) < data.developers.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.developers').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();
            $('#new_developer_name').val(text);

            $("select[name='kpr_type_property']").val("").trigger("change");
            $("select[name='property']").html("");
            $("select[name='property_type']").html("");
            $("select[name='property_item']").html("");
            $("select[name='active_kpr']").val("").trigger("change");
            $("input[name='price']").val("");
            $("input[name='building_area']").val("");
            $("input[name='dp']").val(0);
            $("input[name='down_payment']").val(0);
            $("input[name='request_amount']").val(0);
            $("textarea[name='home_location']").val("").html("");

            if(text == "Non Kerja Sama"){
                $('#price').removeAttr('readonly');
                $('#home_location').removeAttr('readonly');
                $('#building_area').removeAttr('readonly');
                $('#property_name').addClass('hide');
                $('#property_unit').addClass('hide');
                $('#property_type').addClass('hide');
                $('#line').attr('hide',true);
                $("div#kpr_type_property").removeClass('hide');

            }else{
                // console.log('sini');
                $('#price').attr('readonly', true);
                $('#home_location').attr('readonly', true);
                $('#building_area').attr('readonly', true);
                $('#property_name').removeClass('hide');
                $('#property_type').removeClass('hide');
                $('#property_unit').removeClass('hide');
                $('#line').removeAttr('hide');
                $("div#kpr_type_property").addClass('hide');

            }

            $('.property_name').select2({
                witdh : '100%',
                allowClear: true,
                ajax: {
                    url: '/dropdown/properties',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            dev_id : id,
                            name: params.term,
                            page: params.page || 1
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        // console.log(data);
                        return {
                            results: data.properties.data,
                            pagination: {
                                more: (params.page * data.properties.per_page) < data.properties.total
                            }
                        };
                    },
                    cache: true
                },
            });
        });

        //select2 properti
        $('.property_name').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();

            $("select[name='kpr_type_property']").val("").trigger("change");
            $("select[name='property_type']").html("");
            $("select[name='property_item']").html("");
            $("select[name='active_kpr']").val("").trigger("change");
            $("input[name='price']").val("");
            $("input[name='building_area']").val("");
            $("input[name='dp']").val(0);
            $("input[name='down_payment']").val(0);
            $("input[name='request_amount']").val(0);
            $("textarea[name='home_location']").val("").html("");

            $('#new_property_name').val(text);
            // console.log(text);
            $('.property_type').select2({
                witdh : '100%',
                allowClear: true,
                ajax: {
                    url: '/dropdown/types',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            prop_id : id,
                            name: params.term,
                            page: params.page || 1
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        // console.log(data);
                        return {
                            results: data.types.data,
                            pagination: {
                                more: (params.page * data.types.per_page) < data.types.total
                            }
                        };
                    },
                    cache: true
                },
            });
        });

        $('.property_type').on('select2:select', function (e) {
            var id = e.params.data.id;
            var luasBangunan = e.params.data.building_area;

            $("select[name='property_item']").html("");
            $("select[name='active_kpr']").val("").trigger("change");
            $("input[name='price']").val("");
            $("input[name='building_area']").val("");
            $("input[name='dp']").val(0);
            $("input[name='down_payment']").val(0);
            $("input[name='request_amount']").val(0);
            $("textarea[name='home_location']").val("").html("");

            $('#building_area').val(luasBangunan).trigger('change');

            var text = $(this).find("option:selected").text();
            $('#new_property_type_name').val(text).trigger('change');

            $('.property_item').select2({
                witdh : '100%',
                allowClear: true,
                ajax: {
                    url: '/dropdown/units',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            prop_type_id : id,
                            name: params.term,
                            page: params.page || 1
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.units.data,
                            pagination: {
                                more: (params.page * data.units.per_page) < data.units.total
                            }
                        };
                    },
                    cache: true
                },
            });
        });

        $('.property_item').on('select2:select', function (e) {
            var price = e.params.data.price;
            var address = e.params.data.address;

            $("select[name='active_kpr']").val("").trigger("change");
            $("input[name='price']").val("");
            $("input[name='dp']").val(0);
            $("input[name='down_payment']").val(0);
            $("input[name='request_amount']").val(0);
            $("textarea[name='home_location']").val("").html("");

            $('#price').val(price).trigger('change');
            $('#home_location').val(address).trigger('change');

            var text = $(this).find("option:selected").text();
            $('#new_property_item_name').val(text).trigger('change');
        });

        $("#couple_identity").change(function(){
            readURLCouple(this);
        });

        $("#identity").change(function(){
            readURL(this);
        });
    });

    function hideCouple(){
        $('#couple_data').hide();
        $('#separate_certificate').hide();
        $('#marrital_certificate').hide();
        $('#join_income').hide();

    }
    hideCouple();

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

    // function printPage() {
    //     // window.print();

    // }

    //disable select kpr
        var price = $('#price');
        var building_area = $('#building_area');
        var active_kpr = $('#active_kpr');
        var dp = $('#dp');
        var year = $('#year');
        var down_payment = $('#down_payment');
        var request_amount = $('#request_amount');
        var price_without_comma = price.val();
        var static_price = price_without_comma.replace(/\,/g, '');

        building_area.on('input', function() {
            if((price !== null) && (building_area !== null)){
                active_kpr.removeAttr('disabled');
                dp.removeAttr('disabled');
            }else{
                active_kpr.attr('disabled', true);
                dp.attr('disabled', true);

            }
        });

        //count dp
        active_kpr.on('change', function() {
            var val = $(this).val();
            var down_payment = $('#down_payment');
            var request_amount = $('#request_amount');
            var price_without_comma = price.val();
            var static_price = price_without_comma.replace(/\,/g, '');

            if(building_area.val() < 21){
                switch (val) {
                    case '1':
                        dp.val('0');
                        dp.attr('min', '0');
                        payment = (0 / 100) * static_price;
                        amount = static_price - payment;
                        down_payment.val(payment);
                        request_amount.val(amount);
                        break;
                    case '2':
                        dp.val('0');
                        dp.attr('min', '0');
                        payment = (0 / 100) * static_price;
                        down_payment.val(payment);
                        amount = static_price - payment;
                        down_payment.val(payment);
                        request_amount.val(amount);
                        break;
                    case '3':
                        dp.val('15');
                        dp.attr('min', '15');
                        payment = (15 / 100) * static_price;
                        down_payment.val(payment);
                        amount = static_price - payment;
                        down_payment.val(payment);
                        request_amount.val(amount);
                        break;
                }
                // console.log('22');
            }if((building_area.val() >= 22) || (building_area <= 70)){
                switch (val) {
                    case '1':
                        dp.val('0');
                        dp.attr('min', '0');
                        payment = (0 / 100) * static_price;
                        down_payment.val(payment);
                        amount = static_price - payment;
                        down_payment.val(payment);
                        request_amount.val(amount);
                        break;
                    case '2':
                        dp.val('15');
                        dp.attr('min', '15');
                        payment = (15 / 100) * static_price;
                        down_payment.val(payment);
                        amount = static_price - payment;
                        down_payment.val(payment);
                        request_amount.val(amount);
                        break;
                    case '3':
                        dp.val('20');
                        dp.attr('min', '20');
                        payment = (20 / 100) * static_price;
                        down_payment.val(payment);
                        break;
                }
                // console.log('23');
            }if(building_area.val() > 70){
                switch (val) {
                    case '1':
                        dp.val('15');
                        dp.attr('min', '15');
                        payment = (15 / 100) * static_price;
                        down_payment.val(payment);
                        amount = static_price - payment;
                        down_payment.val(payment);
                        request_amount.val(amount);
                        break;
                    case '2':
                        dp.val('20');
                        dp.attr('min', '20');
                        payment = (20 / 100) * static_price;
                        down_payment.val(payment);
                        amount = static_price - payment;
                        down_payment.val(payment);
                        request_amount.val(amount);
                        break;
                    case '3':
                        dp.val('25');
                        dp.attr('min', '25');
                        payment = (25 / 100) * static_price;
                        down_payment.val(payment);
                        amount = static_price - payment;
                        down_payment.val(payment);
                        request_amount.val(amount);
                        break;
                }
                // console.log('70');
            }

        });

        //recounting dp
        dp
            .on('input', function() {
                change_dp(this);
            })
            .on('change', function() {
                change_dp(this);
            })
            .on('blur', function() {
                var val = $(this).val();
                var price = $('#price');
                var dp_min = dp.attr('min');
                var down_payment = $('#down_payment');
                var request_amount = $('#request_amount');
                var price_without_comma = price.val();
                var static_price = price_without_comma.replace(/\,/g, '');

                if (val < dp_min) {
                    val = dp_min;
                    $(this).val(dp_min);
                }

                payment = (val / 100) * static_price;
                down_payment.val(payment);
                amount = static_price - payment;
                down_payment.val(payment);
                request_amount.val(amount);
            });

        down_payment
            .on('input', function() {
                var val = $(this).val().replace(/\,/g, '');
                var static_price = $('#price').val().replace(/\,/g, '');
                var dp = $('#dp');
                var dp_min = dp.attr('min');
                var request_amount = $('#request_amount');
                var max = parseInt(static_price) * (90/100);

                if ( isNaN(parseInt(val)) ) {
                    val = 0;
                }

                if (parseInt(val) < max) {
                    payment = (val / static_price) * 100;

                } else {
                    $(this).val(max);
                    payment = 90;

                }

                if ( !isNaN(payment) ) {
                    dp.val(Math.round(payment));
                    total = static_price - val;

                    if (total > 0) {
                        request_amount.val(static_price - val);

                    } else {
                        request_amount.val(static_price - max);

                    }
                }
            })
            .on('blur', function() {
                var val = $(this).val().replace(/\,/g, '');
                var static_price = $('#price').val().replace(/\,/g, '');
                var dp = $('#dp');
                var dp_min = dp.attr('min');
                var min = parseInt(static_price) * (dp_min/100);

                if ( isNaN(parseInt(val)) ) {
                    val = 0;
                }

                if (parseInt(val) < min) {
                    $(this).val(min)
                    dp.val(dp_min);
                    request_amount.val(static_price - min);
                }
            });

        year.on('change', function () {
                if ( $(this).val() > 240 ) {
                    $(this).val(240);
                    return;
                }

                if ( $(this).val() < 12) {
                    $(this).val(12);
                    return;
                }
            })
            .on('blur', function () {
                if ( parseInt(year.val().replace( /[^0-9]/g, '' ) ) <= 12 ) {
                    year.val('12');

                } else if ( year.val() >= 240 ) {
                    year.val('240');
                    var val = year.val();

                } else if ( year.val() == '' ){
                    year.val('12');
                    var val = year.val();

                }
            });

    function change_dp(element) {
        var val = $(element).val();
        var down_payment = $('#down_payment');
        var request_amount = $('#request_amount');
        var price = $('#price');
        var price_without_comma = price.val();
        var static_price = price_without_comma.replace(/\,/g, '');

        if (parseInt(val) > 90) {
            val = 90;
            $(element).val(val);

        }

        payment = (val / 100) * static_price;
        down_payment.val(payment);
        amount = static_price - payment;
        down_payment.val(payment);
        request_amount.val(amount);
    }

       //search customer detail
    $('#print').on('click', function() {
       var id = $('#id').val();
       console.log(id);
       $.ajax({
            dataType: 'json',
            type: 'GET',
            url: '{{url("eform/verification/print")}}/'+id,
            // data: { nik : nik }
        }).done(function(data){
            console.log(data);
            // $('#detail').html(data['view']);
            var frame1 = $('<iframe />');
               frame1[0].name = "frame1";
               frame1.css({ "position": "absolute", "top": "-1000000px" });
               $("body").append(frame1);
               var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
               frameDoc.document.open();
               frameDoc.document.write(data['view']);
               frameDoc.document.close();
               setTimeout(function () {
                   window.frames["frame1"].focus();
                   window.frames["frame1"].print();
                   frame1.remove();
               }, 500);
        }).fail(function(errors) {
            console.log(errors);
            // toastr.error('Data tidak ditemukan')
        });

    });

    $('#zip_code').on('input' , function() {
        var input=$(this).val();
        $('#kelurahan').hide();
        $(".kelurahan").html('').select2();
        html = '<p class="help-block" style="color:red;" > Kode Pos tidak valid</p>';
        html_valid = '<p class="help-block" style="color:green;" > Silahkan Pilih Kelurahan </p>';
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
             kota = data.zipcodes.data;
             var kelurahan = $.map(kota, function (obj) {
              obj.id = obj.kelurahan;
              obj.text = obj.kecamatan +' - '+ obj.kelurahan;
              return obj;
             });
             $('#kelurahan').show();
             $('.kelurahan').select2({
                data: kelurahan
             });
             $('#err-zc').html(html_valid);
            }
        }).fail(function(errors) {
            $('#err-zc').html(html_error);
            $('#zip_code').val('');
        });
        }
        else
        {
            $('#err-zc').html('');
        }
    });

    $('#zip_code_current').on('input' , function() {
        var input=$(this).val();
        $('#kelurahan_current').hide();
        $(".kelurahan_current").html('').select2();
        html = '<p class="help-block" style="color:red;" > Kode Pos tidak valid</p>';
        html_valid = '<p class="help-block" style="color:green;" > Silahkan Pilih Kelurahan </p>';
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
                $('#err-zcd').html(html);
                $('#zip_code_current').val('');
            }else
            {
                kota = data.zipcodes.data;
                var kelurahan = $.map(kota, function (obj) {
                obj.id = obj.kelurahan;
                obj.text = obj.kecamatan +' - '+ obj.kelurahan;
                return obj;
                    });
                $('#kelurahan_current').show();
                $('.kelurahan_current').select2({
                    data: kelurahan
                    });
                $('#err-zcd').html(html_valid);
            }
        }).fail(function(errors) {
            $('#err-zcd').html(html_error);
            $('#zip_code_current').val('');
        });
        }
        else
        {
            $('#err-zcd').html('');
        }
    });

    $('#zip_code_office').on('input' , function() {
        var input=$(this).val();
        $('#kelurahan_office').hide();
        $(".kelurahan_office").html('').select2();
        html = '<p class="help-block" style="color:red;" > Kode Pos tidak valid</p>';
        html_valid = '<p class="help-block" style="color:green;" > Silahkan Pilih Kelurahan </p>';
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
                $('#err-zco').html(html);
                $('#zip_code_office').val('');
            }else
            {
             kota = data.zipcodes.data;
                var kelurahan = $.map(kota, function (obj) {
                obj.id = obj.kelurahan;
                obj.text = obj.kecamatan +' - '+ obj.kelurahan;
                return obj;
                    });
                $('#kelurahan_office').show();
                $('.kelurahan_office').select2({
                    data: kelurahan
                    });
                $('#err-zco').html(html_valid);
            }
        }).fail(function(errors) {
            $('#err-zco').html(html_error);
            $('#zip_code_office').val('');
        });
        }
         else
        {
            $('#err-zco').html('');
        }
    });

</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Customer\VerificationCustomer', '#form1'); !!}
