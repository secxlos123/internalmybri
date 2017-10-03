<script type="text/javascript">
	function renderForm(index, options) {
	    // console.log(index);
	  return index;
	  }

	// function resetBase() {
	//     $('select.selectpicker:not(.base-select)').each(function(){
	//       $("select.base-select option[value*=" + $(this).val() + "]").prop("disabled", true);
	//     });
	// }
		var bank = "0";
	$(document).on('click', '.add-row', function () {
		var row = $(this).data('row');
		// console.log(row);
		var	index = $('.add-row').length;
	    $('#accountTable'+row).append(
	    			'<tr data-tr="'+index+'">'
                      +'<td>'
                        +'<div class="input-group">'
                            +'<input type="text" class="form-control datepicker-mindate" id="datepicker-mindate" name="mutations['+row+'][tables]['+index+'][date]">'
                            +'<span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>'
                        +'</div>'
                      +'</td>'
                      +'<td>'
                        +'<div class="input-group">'
                            +'<span class="input-group-addon">Rp</span>'
                            +'<input type="text" class="form-control numericOnly currency-rp" name="mutations['+row+'][tables]['+index+'][amount]" maxlength="24">'
                        +'</div>'
                      +'</td>'
                     +' <td>'
                        +'<select class="form-control" name="mutations['+row+'][tables]['+index+'][type]">'
                          +'  <option selected="" disabled="">-- Pilih --</option>'
                          +'  <option value="1">Transaksi Tidak Terkait Usaha</option>'
                          +'  <option value="2">Transaksi Overbooking</option>'
                        +'</select>'
                     +' </td>'
                     +' <td>'
                       +' <input type="text" class="form-control" name="mutations['+row+'][tables]['+index+'][note]" maxlength="255">'
                     +' </td>'
                     +' <td>'
                       +' <a href="javascript:void(0);" class="btn-icon waves-effect waves-light btn btn-danger delete-row" title="Delete Row" id="delete-row" data-tr="'+row+'.'+index+'"><i class="mdi mdi-delete"></i></a>'
                     +'</td>'
                  +'</tr>')
	    $('.currency-rp').inputmask({ alias : "rupiah" });
	});

	$(document).on('click', '.delete-row', function () {
	    $(this).closest('tr').remove();
	})

	$('#nonfixed-income').hide();

	$('#source').on('change', function () {
	    if($(this).val() == 'fixed'){
	    	$('#fixed-salary').show();
	    	$('#fixed-allowance').show();
	    	$('#nonfixed-income').hide();
	    }else{
	    	$('#fixed-salary').hide();
	    	$('#fixed-allowance').hide();
	    	$('#nonfixed-income').show();
	    }
	})

	$('body').on('focus', ".datepicker-mindate", function(){
	    $(this).datepicker({
	        format: "yyyy-mm-dd",
	        clearBtn: true,
	        multidate: true,
	        multidateSeparator: ","
	    })
	});

	$('.use_reason').on('change', function(){
		$('#use_reason_id').val($(this).val());
		console.log($(this).val());
	});


	$(document).ready(function() {
		$('.kpp_type').select2({
            // width : '100%',
            allowClear: true,
            ajax: {
                url: '/dropdown/kpptypelist',
                dataType: 'json',
                delay: 250,
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.kppType.data,
                        pagination: {
                            more: (params.page * data.kppType.per_page) < data.kppType.total
                        }
                    };
                },
                cache: true
            },
        });
        $('.type_financed').select2({
            // width : '100%',
            allowClear: true,
            ajax: {
                url: '/dropdown/typefinanced',
                dataType: 'json',
                delay: 250,
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.typeFinanced.data,
                        pagination: {
                            more: (params.page * data.typeFinanced.per_page) < data.typeFinanced.total
                        }
                    };
                },
                cache: true
            },
        });
        $('.economy_sector').select2({
            // width : '100%',
            allowClear: true,
            ajax: {
                url: '/dropdown/economysectors',
                dataType: 'json',
                delay: 250,
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.economySector.data,
                        pagination: {
                            more: (params.page * data.economySector.per_page) < data.economySector.total
                        }
                    };
                },
                cache: true
            },
        });
        $('.project_list').select2({
            // width : '100%',
            allowClear: true,
            ajax: {
                url: '/dropdown/projectlist',
                dataType: 'json',
                delay: 250,
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.projectList.data,
                        pagination: {
                            more: (params.page * data.projectList.per_page) < data.projectList.total
                        }
                    };
                },
                cache: true
            },
        });
        $('.program_list').select2({
            // width : '100%',
            allowClear: true,
            ajax: {
                url: '/dropdown/programlist',
                dataType: 'json',
                delay: 250,
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.programList.data,
                        pagination: {
                            more: (params.page * data.programList.per_page) < data.programList.total
                        }
                    };
                },
                cache: true
            },
        });
        $('.use_reason').select2({
            // width : '100%',
            allowClear: true,
            ajax: {
                url: '/dropdown/usereason',
                dataType: 'json',
                delay: 250,
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.useReason.data,
                        pagination: {
                            more: (params.page * data.useReason.per_page) < data.useReason.total
                        }
                    };
                },
                cache: true
            },
        });
	});
</script>