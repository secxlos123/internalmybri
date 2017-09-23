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

	$('#accountTable').on('click', '.delete-row', function () {
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
</script>