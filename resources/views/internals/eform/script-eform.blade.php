<script type="text/javascript">
    $(document).ready(function () {
        var distance = 10;
        var long = $('#lng').val();
        var lat = $('#lat').val();
        get_offices(distance, long, lat);

        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });


        //slider distance
        $('#distance1').bootstrapSlider({
            formatter: function(value) {
                return 'Current value: ' + value;
            }
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

        //select2 customer
        $('.nikSelect').select2({
            maximumInputLength : 16,
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getCustomer")}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        nik: params.term,
                        page: params.page || 1,
                        eform: false
                    };
                },
                processResults: function (data, params) {
                    $('.select2-search__field').attr('maxlength', 16);
                    $(".select2-search__field").keydown(function (e) {
                        // Allow: backspace, delete, tab, escape, enter and .
                        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                             // Allow: Ctrl+A
                            (e.keyCode == 65 && e.ctrlKey === true) ||
                             // Allow: Ctrl+C
                            (e.keyCode == 67 && e.ctrlKey === true) ||
                             // Allow: Ctrl+X
                            (e.keyCode == 88 && e.ctrlKey === true) ||
                            // Allow: backspace
                            (e.keyCode === 320 && e.ctrlKey === true) ||
                             // Allow: home, end, left, right
                            (e.keyCode >= 35 && e.keyCode <= 39)) {
                                 // let it happen, don't do anything
                                 return;
                        }
                        // Ensure that it is a number and stop the keypress
                          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                e.preventDefault();
                        }
                    });
                    if( (data.customers.data.length) == 0 ){
                        $('#search').addClass('disabled');
                        $('#btn-leads').removeClass('disabled');
                        return {
                            results: '',
                        };

                    } else {
                        $('#search').removeClass('disabled');
                        $('#btn-leads').addClass('disabled');
                        params.page = params.page || 1;
                        return {
                            results: data.customers.data,
                            pagination: {
                                more: (params.page * data.customers.per_page) < data.customers.total
                            }
                        };
                    }

                    var text = $(this).find("option:selected").text();
                        // $('#new_developer_name').val(text);
                        console.log(text);
                },
                cache: true
            },
        });

        // $('.nikSelect').on('select2:unselecting', function (e) {
        //     $('#search').addClass('disabled');
        //     $('#btn-leads').removeClass('disabled');
        // });

        // $('.nikSelect').on('select2:select', function (e) {
        //     $('#search').removeClass('disabled');
        //     $('#btn-leads').addClass('disabled');
        // });

        $('.nikSelect').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();
            // $('#nik_customer').val(text);
            // console.log(text);
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
                $('#property_name').attr('hidden',true);
                $('#property_unit').attr('hidden',true);
                $('#property_type').attr('hidden',true);
                $('#line').attr('hidden',true);
                $("div#kpr_type_property").removeClass('hide');

            }else{
                $('#price').attr('readonly', true);
                $('#home_location').attr('readonly', true);
                $('#building_area').attr('readonly', true);
                $('#property_name').removeAttr('hidden');
                $('#property_type').removeAttr('hidden');
                $('#property_unit').removeAttr('hidden');
                $('#line').removeAttr('hidden');
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

        //select2 city
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

        //search customer detail
        $('#search').on('click', function() {
           var nik = $('#nik').val();

           $.ajax({
                dataType: 'json',
                type: 'GET',
                url: '{{route("detailCustomer")}}',
                data: { nik : nik }
            }).done(function(data){
                // console.log(data);
                $('#detail').html(data['view']);
            }).fail(function(errors) {
                // toastr.error('Data tidak ditemukan')
            });

        });

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
            console.log(static_price);
            if(building_area.val() < 21){
                switch (val) {
                    case '1':
                        dp.val('0');
                        dp.attr('min', '0');
                        payment = (0 / 100) * static_price;
                        down_payment.val(Math.round(payment));
                        amount = static_price - payment;
                        request_amount.val(amount.toFixed(0));
                        break;
                    case '2':
                        dp.val('0');
                        dp.attr('min', '0');
                        payment = (0 / 100) * static_price;
                        amount = static_price - payment;
                        down_payment.val(Math.round(payment));
                        request_amount.val(amount.toFixed(0));
                        break;
                    case '3':
                        dp.val('15');
                        dp.attr('min', '15');
                        payment = (15 / 100) * static_price;
                        amount = static_price - payment;
                        down_payment.val(Math.round(payment));
                        request_amount.val(amount.toFixed(0));
                        break;
                }
                // console.log('22');
            }if((building_area.val() >= 22) || (building_area <= 70)){
                switch (val) {
                    case '1':
                        dp.val('0');
                        dp.attr('min', '0');
                        payment = (0 / 100) * static_price;
                        amount = static_price - payment;
                        down_payment.val(Math.round(payment));
                        request_amount.val(amount.toFixed(0));
                        break;
                    case '2':
                        dp.val('15');
                        dp.attr('min', '15');
                        payment = (15 / 100) * static_price;
                        amount = static_price - payment;
                        down_payment.val(Math.round(payment));
                        request_amount.val(amount.toFixed(0));
                        break;
                    case '3':
                        dp.val('20');
                        dp.attr('min', '20');
                        payment = (20 / 100) * static_price;
                        amount = static_price - payment;
                        down_payment.val(Math.round(payment));
                        request_amount.val(amount.toFixed(0));
                        break;
                }
                // console.log('23');
            }if(building_area.val() > 70){
                switch (val) {
                    case '1':
                        dp.val('15');
                        dp.attr('min', '15');
                        payment = (15 / 100) * static_price;
                        amount = static_price - payment;
                        down_payment.val(Math.round(payment));
                        request_amount.val(amount.toFixed(0));
                        break;
                    case '2':
                        dp.val('20');
                        dp.attr('min', '20');
                        payment = (20 / 100) * static_price;
                        amount = static_price - payment;
                        down_payment.val(Math.round(payment));
                        request_amount.val(amount.toFixed(0));
                        break;
                    case '3':
                        dp.val('25');
                        dp.attr('min', '25');
                        payment = (25 / 100) * static_price;
                        amount = static_price - payment;
                        down_payment.val(Math.round(payment));
                        request_amount.val(amount.toFixed(0));
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
                // down_payment.val(payment);
                amount = static_price - payment;
                down_payment.val(Math.round(payment));
                request_amount.val(amount.toFixed(0));
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
                    $(this).val(max.toFixed(0));
                    payment = 90;

                }

                if ( !isNaN(payment) ) {
                    dp.val(Math.round(payment));
                    total = static_price - val;

                    if (total > 0) {
                        request_amount.val((static_price - val).toFixed(0));

                    } else {
                        request_amount.val((static_price - max).toFixed(0));

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
                var real = parseInt(static_price) * (dp.val()/100);

                if (parseInt(val) < min) {
                    $(this).val(min.toFixed(0))
                    dp.val(dp_min);
                    request_amount.val((static_price - min).toFixed(0));

                } else {
                    $(this).val(real.toFixed(0));
                    request_amount.val((static_price - real).toFixed(0));

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

        //tab pane function
        $( "ul.nav.nav-pills.m-b-30 li" ).click(function() {
            $("ul.nav.nav-pills.m-b-30 li").removeClass('active');
            $(this).addClass('active');

            if($('li#li_kpr').hasClass('active')){
                $('#product_type').val('kpr');
                $("#kkb").removeClass('active');
                $("#briguna").removeClass('active');
                $("#britama").removeClass('active');
                $("#kur").removeClass('active');
                $("#kartu").removeClass('active');
                $("#kpr").addClass('active');
            }
            if($('li#li_kkb').hasClass('active')){
                $('#product_type').val('kkb');
                $("#briguna").removeClass('active');
                $("#britama").removeClass('active');
                $("#kur").removeClass('active');
                $("#kartu").removeClass('active');
                $("#kpr").removeClass('active');
                $("#kkb").addClass('active');
            }
            if($('li#li_briguna').hasClass('active')){
                $('#product_type').val('briguna');
                $("#kkb").removeClass('active');
                $("#kpr").removeClass('active');
                $("#britama").removeClass('active');
                $("#kur").removeClass('active');
                $("#kartu").removeClass('active');
                $("#briguna").addClass('active');
            }
            if($('li#li_britama').hasClass('active')){
                $('#product_type').val('britama');
                $("#kkb").removeClass('active');
                $("#briguna").removeClass('active');
                $("#kpr").removeClass('active');
                $("#kur").removeClass('active');
                $("#kartu").removeClass('active');
                $("#britama").addClass('active');
            }
            if($('li#li_kur').hasClass('active')){
                $('#product_type').val('kur');
                $("#kkb").removeClass('active');
                $("#briguna").removeClass('active');
                $("#britama").removeClass('active');
                $("#kpr").removeClass('active');
                $("#kartu").removeClass('active');
                $("#kur").addClass('active');
            }
            if($('li#li_kartu').hasClass('active')){
                $('#product_type').val('kartu');
                $("#kkb").removeClass('active');
                $("#briguna").removeClass('active');
                $("#britama").removeClass('active');
                $("#kur").removeClass('active');
                $("#kpr").removeClass('active');
                $("#kartu").addClass('active');
            }
        });
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
        // down_payment.val(payment);
        amount = static_price - payment;
        down_payment.val(Math.round(payment));
        request_amount.val(amount.toFixed(0));
    }

    //showing modal of eform
    $('#view-modal').on('click', '#agree', function() {
           HoldOn.open(options);
       $("#wizard-validation-form").submit();
    });

    $('.cities').on('select2:unselect', function (e) {
        $('.offices').empty().select2({
            witdh : '100%',
            allowClear: true,
        });
    });

    $('.cities').on('select2:select', function (e) {
        var citi_id = e.params.data.id;
        get_offices(citi_id);
    });

    $(document).on('click', '#changeDistance', function (e) {
        console.log("reset office");
        $('.offices').empty().select2({
            witdh : '100%',
            allowClear: true,
        });

        console.log("get params");
        var distance = $('#distance1').val();
        var long = $('#lng').val();
        var lat = $('#lat').val();
        console.log("get office");
        get_offices(distance, long, lat);
    });

    $(document).ready(function(){
        $('.offices').on('select2:select', function (e) {
            console.log(e.params.data);
            var alamat = e.params.data.address;
            $('#branch_address').val(alamat).html(alamat).trigger('change');
            var text = $(this).find("option:selected").text();
            $('#branch_id').val(text);
        });
    });

    function get_offices(distance, long, lat) {
        $('.offices').empty().select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/offices',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        distance : distance,
                        longitude : long,
                        latitude : lat,
                        name: params.term,
                        page: params.page || 1,
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.offices.data,
                        pagination: {
                            more: (params.page * data.offices.per_page) < data.offices.total
                        }
                    };
                },
                cache: true
            },
        });
    }

    //showing modal create leads
    $(document).on('click', '#btn-leads', function(){
       console.log("salah masuk");
       $('#leads-modal').modal('show');
    })

    $('#btn-save').on('click', function() {
       HoldOn.open(options);
    });

    //storing leads
    $("#form_data_personal").submit(function(e){
        var formData = new FormData(this);
        var status = $("select[name='status']").val();
        // console.log(status);
        // console.log($("input[name='birth_date']").val());
        // console.log(formData);

        var dob = new Date($("input[name='birth_date']").val());
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        // console.log(age);
        doSomething = 1;
        console.log(status);
        var html = '<p class="error-help-block" style="display:block;">Umur harus lebih dari 21 tahun.</p>';
        if (status == 1) {
            if (age < 21) {
                // $(".birth_date").removeClass("has-success");
                // $(".birth_date").addClass("has-error");
                $("#birth_date-error").html(html);
                HoldOn.close();
                doSomething = 2;
            } else {

            }
        }

        if (doSomething == 1) {
        console.log('ajax');
        $.ajax({
            url: "/customers",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                console.log(data);
                // toastr["success"]("Data Berhasil disimpan");
                $('#divForm').removeClass('alert alert-success');
                $('#divForm').html("");

                if ( data.code != 422 ) {
                    $('#leads-modal').modal('toggle');

                    nik = data.data.personal.nik;

                    $("#nik").html('<option value="'+nik+'">'+nik+'</option>');
                    $("#select2-nik-container").replaceWith('<span class="select2-selection__rendered" id="select2-nik-container" title="'+nik+'"><span class="select2-selection__clear">×</span>'+nik+'</span>');
                    $("#search").click();
                    // $("a[href='#finish']").click();
                    // currentClass = $('body').attr('class');
                    // $('body').attr('class', currentClass+' modal-open');
                    // console.log("pas submit data");

                    $('#divForm').addClass('alert alert-success');
                    $('#divForm').html('Data Berhasil Ditambahkan');

                } else {
                    setTimeout(
                        function(){
                            $.each(data.contents, function(key, value) {
                                // console.log(key);
                                $("#form_data_personal").find(".form-group." + key).eq(0).addClass('has-error');
                                $("#form_data_personal").find("span#"+key+"-error").eq(0).html(value);
                            });
                        }
                    , 2000);
                }

                HoldOn.close();
            },
            error: function (response) {
                // console.log(response)
                // toastr["error"]("Data Gagal disimpan");
                HoldOn.close();
            },
            cache: false,
            contentType: false,
            processData: false
        });
        }else{
            console.log('not ajax');
            $("#birth_date_div").removeClass("has-success");
            $("#birth_date_div").addClass("has-error");
            $("#birth_date-error").css({ display: "block", color: "red" });

            $("#birth_date-error").html("Umur harus lebih dari 21 tahun.");
            HoldOn.close();
        }

        return false;
    });

    //hide and show couple data div
    function hideCouple(){
        $('#leads-modal #couple_data').hide();

    }
    hideCouple();

    $('#leads-modal #status').on('change', function() {
        $('#leads-modal #datepicker-date').datepicker("destroy");
        if(this.value==2){
            $('#leads-modal #couple_data').show();
            $('#leads-modal #datepicker-date').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
        }else{
            $('#leads-modal #datepicker-date').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
                endDate: "-21y"
            });
            hideCouple();
        }
        $('#leads-modal #datepicker-date').datepicker("refresh");
    });

    $('#datepicker-date').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    // $('#datepicker-date').datepicker("setDate",  "{{date('Y-m-d', strtotime('-21 years'))}}");
</script>