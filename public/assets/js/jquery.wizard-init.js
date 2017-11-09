!function($) {
    "use strict";

    var FormWizard = function() {};

    FormWizard.prototype.createBasic = function($form_container) {
        $form_container.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onFinishing: function (event, currentIndex) { 
                //NOTE: Here you can do form validation and return true or false based on your validation logic
                console.log("Form has been validated!");
                return true; 
            }, 
            onFinished: function (event, currentIndex) {
               //NOTE: Submit the form, if all validation passed.
               // alert("Submitted!");
                console.log("Form can be submitted using submit method. E.g. $('#basic-form').submit()"); 
                $("#basic-form").submit();

            }
        });
        return $form_container;
    },
    //creates form with validation
    FormWizard.prototype.createValidatorForm = function($form_container) {
        $form_container.validate({
            messages: {
                home_location: "Harus Diisi",
                postcode: {
                    required: "Harus Diisi"
                }
            },
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').length ||
                    element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                    error.insertAfter(element.parent());
                    // else just place the validation message immediatly after the input
                } else {
                    error.insertAfter(element);
                }
            },
        });

        $form_container.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex) {
                $form_container.validate().settings.ignore = ":disabled,:hidden";
                return $form_container.valid();
            },
            onFinishing: function (event, currentIndex) {
                $form_container.validate().settings.ignore = ":disabled";
                return $form_container.valid();
            },
            onFinished: function (event, currentIndex) {
                var request_amount = $('#request_amount').val();
                // console.log(request_amount);
                var year = $('#year').val();
                var office = $('#office').val();
                var appointment_date = $('#datepicker-mindate').val();
                var year = $('#year').val();
                var office = $('#branch_id').val();

                var id = $('#nik').val();

                $.ajax({
                    dataType: 'json',
                    type: 'GET',
                    url: '/getData',
                    data: { id : id },
                    success: function(result, data) {
                        var nik = result.data.nik;
                        var full_name = result.data.first_name+' '+result.data.last_name;
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
                        var ao_name = result.data.name;

                        if(result.data.status == 0){
                            var status = 'Tidak Menikah';
                            $('#view-modal #couple1').hide();
                            $('#view-modal #couple2').hide();
                            $('#view-modal #couple3').hide();
                            $('#view-modal #couple4').hide();
                            $('#view-modal #couple5').hide();
                        }else if(result.data.status == 1){
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
                        $("#view-modal #request_amount").html('Rp '+request_amount);
                        $("#view-modal #year").html(year+' tahun');
                        $("#view-modal #month").html(year+' bulan');
                        $("#view-modal #office").html(office);
                        $("#view-modal #appointment_date").html(appointment_date); 
                        $("#view-modal #nik").html(nik);
                        $("#view-modal #customer_name").html(full_name);
                        $("#view-modal #customer_fullname").html(full_name);
                        $("#view-modal #email").html(email); 
                        $("#view-modal #birth_place").html(birth_place);
                        $("#view-modal #birth_date").html(birth_date);
                        $("#view-modal #mother_name").html(mother_name);
                        $("#view-modal #mobile_phone").html(mobile_phone);
                        $("#view-modal #status").html(status); 
                        $("#view-modal #couple_nik").html(couple_nik); 
                        $("#view-modal #couple_name").html(couple_name); 
                        $("#view-modal #couple_birth_place").html(couple_birth_place); 
                        $("#view-modal #couple_birth_place").html(couple_birth_place); 
                        $("#view-modal #couple_identity").html('<img src="'+couple_identity+'" class="img-responsive">'); 
                        $("#view-modal #identity").html('<img src="'+identity+'" class="img-responsive">'); 
                        $("#view-modal #marritalstatus").val(status); 
                        $("#view-modal #office").val(office); 
                        $("#view-modal #ao_name").html(ao_name); 

                    },
                    error: function(result, data){
                        console.log('error');
                    }
               });
                return false;
            }
        });

        return $form_container;
    },
    //creates vertical form
    FormWizard.prototype.createVertical = function($form_container) {
        $form_container.steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "fade",
            stepsOrientation: "vertical"
        });
        return $form_container;
    },
    FormWizard.prototype.init = function() {
        //initialzing various forms

        //basic form
        this.createBasic($("#basic-form"));

        //form with validation
        this.createValidatorForm($("#wizard-validation-form"));

        //vertical form
        this.createVertical($("#wizard-vertical"));
    },
    //init
    $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.FormWizard.init()
}(window.jQuery);
