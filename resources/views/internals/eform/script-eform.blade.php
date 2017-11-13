<script type="text/javascript">
    $(document).ready(function() {
        var distance = 10;
        var long = $('#lng').val();
        var lat = $('#lat').val();
        get_offices(distance, long, lat);
    });

    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });

        $('#distance1').bootstrapSlider({
            formatter: function(value) {
                return 'Current value: ' + value;
            }
        });
        
        $('.nikSelect').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getCustomer")}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    // console.log(data);
                    if((data.customers.data.length) == 0 ){
                        $('#search').addClass('disabled');
                        $('#btn-leads').removeClass('disabled');
                        return {
                            results: '',
                        }; 
                    }else{
                        $('#search').removeClass('disabled');
                        $('#btn-leads').addClass('disabled', true);
                        params.page = params.page || 1;
                        return {
                            results: data.customers.data,
                            pagination: {
                                more: (params.page * data.customers.per_page) < data.customers.total
                            }
                        };  
                    }
                },
                cache: true
            },
        });

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
                    // console.log(data);
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

            if(text == "Non Kerja Sama"){
                $('#price').removeAttr('readonly');
                $('#home_location').removeAttr('readonly');
                $('#building_area').removeAttr('readonly');
                $('#property_name').attr('hidden',true);
                $('#property_unit').attr('hidden',true);
                $('#property_type').attr('hidden',true);
                $('#line').attr('hidden',true);
                
            }else{
                $('#price').attr('readonly', true);
                $('#home_location').attr('readonly', true);
                $('#building_area').attr('readonly', true); 
                $('#property_name').removeAttr('hidden');
                $('#property_type').removeAttr('hidden');
                $('#property_unit').removeAttr('hidden');
                $('#line').removeAttr('hidden');
                
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

        $('.property_name').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();
            $('#new_property_name').val(text);

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

        $('.property_item').on('select2:select', function (e) {
            var price = e.params.data.price;
            var address = e.params.data.address;
            $('#price').val(price).trigger('change');
            $('#home_location').val(address).trigger('change');
        });

        $('.property_type').on('select2:select', function (e) {
            var id = e.params.data.id;
            var luasBangunan = e.params.data.building_area;
            $('#building_area').val(luasBangunan).trigger('change');

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

       $('#search').on('click', function() {
           var id = $('#nik').val();

           if (id != "") {
                $.ajax({
                    dataType: 'json',
                    type: 'GET',
                    url: '{{route("detailCustomer")}}',
                    data: { id : id } 
                }).done(function(data){
                    // console.log(data);
                    $('#detail').html(data['view']);
                });
           }
           
       });

       //disable select kpr
        var price = $('#price');
        var building_area = $('#building_area');
        var active_kpr = $('#active_kpr');
        $('#building_area').on('input', function() {
            if((price !== null) && (building_area !== null)){
            // console.log(building_area);
                $('#active_kpr').removeAttr('disabled');
                $('#dp').removeAttr('disabled');
            }else{
                // console.log(building_area);
                $('#active_kpr').attr('disabled', true);
                $('#dp').attr('disabled', true);

            }
        });

        //count dp
        active_kpr.on('change', function() {
            var val = $(this).val();
            var dp = $('#dp');
            var down_payment = $('#down_payment');
            var request_amount = $('#request_amount');
            var price_without_comma = price.val().replace(',00', '');
            var static_price = price_without_comma.replace(/\./g, '');

            // payment = (15 / 100) * static_price;
            //             down_payment.val(payment);
            // console.log(payment);

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
        $('#dp').on('input', function() {
            var val = $(this).val();
            var down_payment = $('#down_payment');
            var request_amount = $('#request_amount');
            var price_without_comma = price.val().replace(',00', '');
            var static_price = price_without_comma.replace(/\./g, '');
            // console.log('as');
            payment = (val / 100) * static_price;
            down_payment.val(payment);
            amount = static_price - payment;
            down_payment.val(payment);
            request_amount.val(amount);
        });

        $('#dp').on('keyup', function(e){
            if ($(this).val() < $(this).attr('min') 
                && e.keyCode != 46 // delete
                && e.keyCode != 8 // backspace
               ) {
               e.preventDefault();
               $(this).val($(this).attr('min'));
            }else{
            // console.log($(this).attr('min'));
            return true;
                
            }
        });

        $('#year').on('keyup', function(e){
            if ($(this).val() > 240 
                && e.keyCode != 46 // delete
                && e.keyCode != 8 // backspace
               ) {
               e.preventDefault();
               $(this).val('240');
            }else{
                return true;
            }
        });

        //property status
        $('input[type=radio][name=status_property]').on('change', function() {
            // console.log(this.value);
            if (this.value == 'new') {
                $('#property_name').removeAttr('hidden');
                $('#property_type').removeAttr('hidden');
                $('#property_unit').removeAttr('hidden');
                $('#developer').removeAttr('hidden');

            }else if (this.value == 'second') {
                $('#property_name').attr('hidden', true);
                $('#property_type').attr('hidden', true);
                $('#property_unit').attr('hidden', true);
                $('#developer').attr('hidden', true);
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

    var options = {
         theme:"sk-bounce",
         message:'Mohon tunggu sebentar.',
         textColor:"white"
    };
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

    $('#changeDistance').on('click', function (e) {
        $('.offices').empty().select2({
            witdh : '100%',
            allowClear: true,
        });
    });

    $('#changeDistance').on('click', function (e) {
        // console.log('success');
        var distance = $('#distance1').val();
        var long = $('#lng').val();
        var lat = $('#lat').val();
        get_offices(distance, long, lat);
    });

    function get_offices(distance, long, lat) {
        $('.offices').empty().select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: `/offices`,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        distance : distance,
                        long : long,
                        lat : lat,
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
        $('.offices').on('select2:select', function (e) {
            var alamat = e.params.data.address;
            $('#branch_address').val(alamat).trigger('change');
        });


    //showing modal create leads
    $('#btn-leads').on('click', function() {
       $('#leads-modal').modal('show');
    });

    var options = {
         theme:"sk-bounce",
         message:'Mohon tunggu sebentar.',
         textColor:"white"
    };

    $('#btn-save').on('click', function() {
       HoldOn.open(options);
    });

    //storing leads
    // $('#leads-modal #btn-save').on('click', function() {
        // console.log('click');
       $("#form_data_personal").submit(function(){

            var formData = new FormData(this);
            console.log(formData);

            $.ajax({
                url: "/customers",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    // console.log(data)

                    if ( data.code != 422 ) {
                        $('#leads-modal').modal('toggle');
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
                    // $('#divForm').addClass('alert alert-success');
                    // $('#divForm').append('Data Berhasil Ditambahkan');
                },
                error: function (response) {
                    // console.log(response)
                    HoldOn.close();
                },
                cache: false,
                contentType: false,
                processData: false
            });

            return false;
        });
    // });

    //hide and show couple data div
    function hideCouple(){
        $('#leads-modal #couple_data').hide();

    }
    hideCouple();

    $('#leads-modal #status').on('change', function() {
        if(this.value==2){
            $('#leads-modal #couple_data').show();
        }else{
            hideCouple();
        }
    })

    $('#datepicker-date').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        endDate: new Date(),
        todayHighlight: true
    });

    $('#datepicker-date').datepicker("setDate",  "{{date('Y-m-d', strtotime('-20 years'))}}");
</script>
<!-- <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script> -->