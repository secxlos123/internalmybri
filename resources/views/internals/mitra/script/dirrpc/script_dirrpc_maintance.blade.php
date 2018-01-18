<script type="text/javascript">
$("#nama_debt").val(<?php echo json_encode($clients['debt_name']); ?>);
var table1 = $('#datatable').DataTable({
            searching: false,
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });
$(document).on('click', "#btn-search", function(){
        table1.destroy();
        table_dirrpc($('#nama_debt').val(),$("input:radio[name=payroll]:checked").val());
    })


	   $('#datatable').on('click', '#BTN-EDIT', function (e) {
		var data = table1.row($(this).parents('tr')).data();
		var kode = data['nomor'];
		var no = $("#NO"+kode).val();
      var x = window.location.href;
	  var url = x.replace("dir_rpc_maintance?", "dir_rpc_edit?id_detail="+no+"&");
	  window.location.href = url; 
    } );
	$(document).on('click', "#btn_add", function(){
      var x = window.location.href;
	  var url = x.replace("dir_rpc_maintance", "dir_rpc_add");
	  window.location.href = url; 

    })

	  function table_dirrpc(nama_debt,payroll)
      {
		  var act = 'maintance';
        table1 = $('#datatable').DataTable({
           searching : false,
           processing : true,
           serverSide : true,
           order : [[3, 'asc']],
           lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
           language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/dirrpc',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
					d.act = act;
                    d.nama_debt = nama_debt;
                    d.payroll = payroll;
                }
            },
          aoColumns : [
                {   data: 'nomor', name: 'nomor', bSortable: false },
                {   data: 'penghasilan_maksimal', name: 'penghasilan_maksimal', bSortable: false  },
                {   data: 'penghasilan_minimal', name: 'penghasilan_minimal', bSortable: false },
                {   data: 'dir_persen', name: 'dir_persen', orderable: false, searchable: false},
                {   data: 'action', name: 'action', orderable: false, searchable: false},
            ],
      });
    }

  $('#datatable').on('click', '#BTN-HAPUS', function (e) {
		    var data = table1.row($(this).parents('tr')).data();
			var kode = data['nomor'];
			var no = $("#NO"+kode).val();
			var formarray = [];
			formarray.push({
			"name": "no",
			"value": no
			});
			formarray.push({
			"name": "act",
			"value": "maintance"
			});
			sentform(formarray);
	    } );
function sentform(formdata)
    {
		var dataform = JSON.stringify(formdata);
		var k = 'm:m';
		  $.ajax({
		type: 'GET',
		url: 'DirRpcHapusDetail',
		data: $.param(formdata),
		contentType: "application/json",
		dataType: "json",
		success: function(data) {
		 console.log("Data Delete!", data);
			
			 var url = window.location.href;
			 url = url.replace("dir_rpc_maintance", data['response']['contents']);
			window.location.href = url; 
		}
	});}	

</script>