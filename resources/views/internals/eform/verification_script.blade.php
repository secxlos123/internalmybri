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
                    case 'email':
                        $('#emailDF').text($( "#emailCIF" ).text());
                        $('#email').val($( "#emailCIF" ).text());
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
                    case 'salary':
                        $('#salaryDF').text($( "#salaryCIF" ).text());
                        $('#salary').val($( "#salaryCIF" ).text());
                        break;
                    case 'other_salary':
                        $('#other_salaryDF').text($( "#other_salaryCIF" ).text());
                        $('#other_salary').val($( "#other_salaryCIF" ).text());
                        break;
                    case 'loan_installment':
                        $('#loan_installmentDF').text($( "#loan_installmentCIF" ).text());
                        $('#loan_installment').val($( "#loan_installmentCIF" ).text());
                        break;
                    case 'dependent_amount':
                        $('#dependent_amountDF').text($( "#dependent_amountCIF" ).text());
                        $('#dependent_amount').val($( "#dependent_amountCIF" ).text());
                        break;
                    case 'phone':
                        $('#phoneDF').text($( "#phoneCIF" ).text());
                        $('#phone').val($( "#phoneCIF" ).text());
                        break;
                    case 'mobile_phone':
                        $('#mobile_phoneDF').text($( "#mobile_phoneCIF" ).text());
                        $('#mobile_phone').val($( "#mobile_phoneCIF" ).text());
                        break;
                    case 'emergency_contact':
                        $('#emergency_contactDF').text($( "#emergency_contactCIF" ).text());
                        $('#emergency_contact').val($( "#emergency_contactCIF" ).text());
                        break;
                    case 'emergency_relation':
                        $('#emergency_relationDF').text($( "#emergency_relationCIF" ).text());
                        $('#emergency_relation').val($( "#emergency_relationCIF" ).text());
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
                    case 'email':
                        $('#emailDF').text($( "#emailKM" ).text());
                        $('#email').val($( "#emailKM" ).text());
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
                    case 'salary':
                        $('#salaryDF').text($( "#salaryKM" ).text());
                        $('#salary').val($( "#salaryKM" ).text());
                        break;
                    case 'other_salary':
                        $('#other_salaryDF').text($( "#other_salaryKM" ).text());
                        $('#other_salary').val($( "#other_salaryKM" ).text());
                        break;
                    case 'loan_installment':
                        $('#loan_installmentDF').text($( "#loan_installmentKM" ).text());
                        $('#loan_installment').val($( "#loan_installmentKM" ).text());
                        break;
                    case 'dependent_amount':
                        $('#dependent_amountDF').text($( "#dependent_amountKM" ).text());
                        $('#dependent_amount').val($( "#dependent_amountKM" ).text());
                        break;
                    case 'phone':
                        $('#phoneDF').text($( "#phoneKM" ).text());
                        $('#phone').val($( "#phoneKM" ).text());
                        break;
                    case 'mobile_phone':
                        $('#mobile_phoneDF').text($( "#mobile_phoneKM" ).text());
                        $('#mobile_phone').val($( "#mobile_phoneKM" ).text());
                        break;
                    case 'emergency_contact':
                        $('#emergency_contactDF').text($( "#emergency_contactKM" ).text());
                        $('#emergency_contact').val($( "#emergency_contactKM" ).text());
                        break;
                    case 'emergency_relation':
                        $('#emergency_relationDF').text($( "#emergency_relationKM" ).text());
                        $('#emergency_relation').val($( "#emergency_relationKM" ).text());
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

       // $('#save').on('click', function(e) {
       //      $("#form1").submit();
       // });
   });
</script>