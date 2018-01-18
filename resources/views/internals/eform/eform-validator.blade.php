<script type="text/javascript">
    $form_container = $('#wizard-validation-form');

    $form_container.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            return currentIndex > newIndex ? true : $form_container.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            // reinit gmaps
            google.maps.event.trigger(map, 'resize');
        },
        onFinishing: function (event, currentIndex) {
            return $form_container.valid();
        },
        onFinished: function (event, currentIndex) {
           // $form_container.submit();

                var request_amount = $('#request_amount').val();
                // console.log(request_amount);
                var year = $('#year').val();
                var office = $('#office').val();
                var appointment_date = $('#datepicker-mindate').val();
                var year = $('#year').val();
                var office = $('#branch_id').val();
                var developer_code = $('#developer-kode').val();
                var developer_name = $('#new_developer_name').val();
                var jenis_kpr = $('#jenis_kpr').val();
                var jenis_properti = $('#kpr_type').val();
                var nama_proyek = $('#new_property_name').val();
                var tipe_properti = $('#new_property_type_name').val();
                var unit_properti = $('#new_property_item_name').val();
                var harga = $('#price').val();
                var luas_bangunan = $('#building_area').val();
                var lokasi_rumah = $('#home_location').val();
                var nik = $('#nik').val();

                $.ajax({
                    dataType: 'json',
                    type: 'GET',
                    url: '/getData',
                    data: { nik : nik },
                    success: function(result, data) {
                        console.log(result);
                        var nik = result.data.nik;
                        var full_name = (result.data.first_name ? result.data.first_name : '')+' '+(result.data.last_name ? result.data.last_name : '');
                        var email = result.data.email;
                        var birth_place = result.data.birth_place;
                        var birth_date = result.data.birth_date;
                        var mother_name = result.data.mother_name;
                        var mobile_phone = result.data.mobile_phone;
                        var couple_nik = result.data.couple_nik;
                        var couple_name = result.data.couple_name;
                        var couple_birth_place = result.data.couple_birth_place;
                        var couple_birth_date = result.data.couple_birth_date;
                        var couple_identity = result.data.couple_identity;
                        var identity = result.data.identity;
                        var address = result.data.address;
                        var ao_name = result.data.name;

                        if(result.data.status == 1){
                            var status = 'Belum Menikah';
                            $('#view-modal #couple1').hide();
                            $('#view-modal #couple2').hide();
                            $('#view-modal #couple3').hide();
                            $('#view-modal #couple4').hide();
                            $('#view-modal #couple5').hide();
                        }else if(result.data.status == 2){
                            var status = 'Menikah';
                            $('#view-modal #couple1').show();
                            $('#view-modal #couple2').show();
                            $('#view-modal #couple3').show();
                            $('#view-modal #couple4').show();
                            $('#view-modal #couple5').show();
                        }else{
                            var status = 'Janda/Duda';
                            $('#view-modal #couple1').hide();
                            $('#view-modal #couple2').hide();
                            $('#view-modal #couple3').hide();
                            $('#view-modal #couple4').hide();
                            $('#view-modal #couple5').hide();
                        }

                        $('#view-modal').modal('show');
                        // currentClass = $('body').attr('class');
                        // $('body').attr('class', currentClass+' modal-open');
                        // console.log("pas validasi data");
                        $("#view-modal #request_amount").html('Rp '+request_amount);
                        $("#view-modal #year").html(year+' tahun');
                        $("#view-modal #month").html(year+' bulan');
                        $("#view-modal #office").html(office);
                        $("#view-modal #appointment_date").html(appointment_date);
                        $("#view-modal #developer_name").html(developer_name);
                        $("#view-modal #nik").html(nik);
                        $("#view-modal #birth_date").html(birth_date);
                        $("#view-modal #customer_name").html(full_name);
                        $("#view-modal #customer_fullname").html(full_name);
                        $("#view-modal #email").html(email);
                        $("#view-modal #birth_place").html(birth_place);
                        $("#view-modal #birth_date").html(birth_date);
                        $("#view-modal #mother_name").html(mother_name);
                        $("#view-modal #mobile_phone").html(mobile_phone);
                        $("#view-modal #address").html(address);
                        $("#view-modal #status").html(status);
                        $("#view-modal #couple_nik").html(couple_nik);
                        $("#view-modal #couple_name").html(couple_name);
                        $("#view-modal #couple_birth_place").html(couple_birth_place);
                        $("#view-modal #couple_birth_date").html(couple_birth_date);
                        var ext_couple = couple_identity.substr((couple_identity.lastIndexOf('.') +1));
                        if(ext_couple == 'pdf'){
                            $("#view-modal #couple_identity").html('<a href="'+couple_identity+'" target="_blank" class="img-responsive"><img src="{{asset("assets/images/download-logo.png")}}" class="img-responsive"></a><p>Klik Untuk Lihat Foto KTP Pasangan</p> ');
                        }else{
                            $("#view-modal #couple_identity").html('<img src="'+couple_identity+'" class="img-responsive"><p>Foto KTP Pasangan</p>');
                        }

                        var ext = identity.substr( (identity.lastIndexOf('.') +1) );
                        if(ext == 'pdf'){
                            $("#view-modal #identity").html('<a href="'+identity+'" target="_blank" class="img-responsive"><img src="{{asset("assets/images/download-logo.png")}}" class="img-responsive"></a><p>Klik Untuk Lihat Foto KTP</p>');
                        }else{
                            $("#view-modal #identity").html('<img src="'+identity+'" class="img-responsive"><p>Foto KTP</p>');
                        }

                        $("#view-modal #marritalstatus").val(status);
                        $("#view-modal #office").val(office);
                        $("#view-modal #ao_name").html(ao_name);
                        if (jenis_kpr == 1){
                            var jkpr = 'Baru';
                        }
                        else if(jenis_kpr == 2){
                            var jkpr = 'Secondary';
                            $("#view-modal #kerjasama").hide();
                            $("#view-modal #dev").hide();
                        }
                         else if(jenis_kpr == 3){
                            var jkpr = 'Refinancing';
                            $("#view-modal #kerjasama").hide();
                            $("#view-modal #dev").hide();
                        }
                         else if(jenis_kpr == 4){
                            var jkpr = 'Renovasi';
                            $("#view-modal #kerjasama").hide();
                            $("#view-modal #dev").hide();
                        }
                         else if(jenis_kpr == 5){
                            var jkpr = 'Top Up';
                            $("#view-modal #kerjasama").hide();
                            $("#view-modal #dev").hide();
                        }
                         else if(jenis_kpr == 6){
                            var jkpr = 'Take Over';
                            $("#view-modal #kerjasama").hide();
                            $("#view-modal #dev").hide();
                        }
                         else if(jenis_kpr == 7){
                            var jkpr = 'Take Over Top Up';
                            $("#view-modal #kerjasama").hide();
                            $("#view-modal #dev").hide();
                        }
                         else if(jenis_kpr == 8){
                            var jkpr = 'Take Over Account In House (Cash Bertahap)';
                            $("#view-modal #kerjasama").hide();
                            $("#view-modal #dev").hide();
                        }
                        else{
                            var jkpr = " ";
                        }
                        if(developer_code > 1){
                            $("#view-modal #jp").hide();
                        }else{
                            $("#view-modal #kerjasama").hide();
                        }
                        $("#view-modal #harga").html('Rp. '+harga);
                        $("#view-modal #kpr").html(jkpr);
                        if( jenis_properti == 1 ){
                            jenis_properti = 'Rumah Tapak';
                        } else if( jenis_properti == 2 ){
                            jenis_properti = 'Rumah Susun/Apartment';
                        } else if( jenis_properti == 3 ){
                            jenis_properti = 'Rumah Toko';
                        }
                        $("#view-modal #jenis_property").html(jenis_properti);
                        $("#view-modal #project_name").html(nama_proyek);
                        $("#view-modal #property_type").html(tipe_properti);
                        $("#view-modal #property_unit").html(unit_properti);
                        $("#view-modal #luas_bangunan").html(luas_bangunan+' m'+'<sup>2</sup>');
                        $("#view-modal #lokasi_bangunan").html(lokasi_rumah);
                    },
                    error: function(result, data){
                        console.log('error');
                    }
               });
                return false;
            }
    });

    $('.select2').select2({width: '100%'});
</script>