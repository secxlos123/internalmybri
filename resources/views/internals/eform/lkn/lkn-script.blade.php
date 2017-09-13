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

	$('#add_account').click(function(){
		$.ajax({
		  url:'{{route("renderMutation")}}',
		  type:"GET",
		  dataType: "json",
		  success: function (data)
		  {
		  	console.log(data);
		    $('.mutation_form').html(data['view']);
		  	$('#render_form').removeAttr("id");
		  },
		  error: function (xhr, status)
		  {
		    console.log(xhr.error);
		  }
		});
	});

	$('#add-row').click(function () {
	    $('#accountTable').append(
	    			'<tr>'
                      +'<td>1</td>'
                      +'<td>'
                        +'<div class="input-group">'
                            +'<input type="text" class="form-control" id="datepicker-inline" name="mutation_date">'
                            +'<span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>'
                        +'</div>'
                      +'</td>'
                      +'<td>'
                        +'<div class="input-group">'
                            +'<span class="input-group-addon">Rp</span>'
                            +'<input type="text" class="form-control numericOnly currency-rp" name="nominal" maxlength="12">'
                        +'</div>'
                      +'</td>'
                     +' <td>'
                        +'<select class="form-control" name="transaction_type">'
                          +'  <option selected="" disabled="">-- Pilih --</option>'
                          +'  <option value="1">Transaksi Tidak Terkait Usaha</option>'
                          +'  <option value="2">Transaksi Overbooking</option>'
                        +'</select>'
                     +' </td>'
                     +' <td>'
                       +' <input type="text" class="form-control" name="remark" maxlength="255">'
                     +' </td>'
                     +' <td>'
                       +' <span class="form-control btn btn-danger delete-row" title="Tambah Row" id="delete-row"><i class="mdi mdi-delete"></i></span>'
                     +' </td>'
                  +'</tr>')
	});

	$('#accountTable').on('click', 'span.delete-row', function () {
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
</script>