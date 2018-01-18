<script type="text/javascript">
    var table1 = $('#datatable').DataTable({
            searching: false,
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });

 $(document).on('click', "#btn-search", function(){
        table1.destroy();
        table_dirrpc($('#gimmick_name').val());
    })
	
 $(document).on('click', "#btn-add", function(){
      var x = window.location.href;
	  var url = x.replace("dir_rpc", "dir_rpc_add");
	  window.location.href = url; 
    })
	   $('#datatable').on('click', '#BTN-EDIT', function (e) {
	  var data = table1.row($(this).parents('tr')).data();
	  var kode = data['nomor'];
	  var no = $("#NO"+kode).val();
      var x = window.location.href;
	  var url = x.replace("dir_rpc", "dir_rpc_maintance?no="+no);
	  window.location.href = url; 
    } );
	
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
			"value": "search"
			});
			sentform(formarray);
/*  var data = table1
		.rows()
		.data();
	var length = data.length;
	length = parseInt(length)-1;
	var formdetail = [];
	var id_header = Date.now();
	for(i=0;i<=length;i++){
	var rows = table1.rows( i ).data();
	formdetail.push(rows[0][0],rows[0][1],rows[0][2],rows[0][3],id_header
	);
	sentform(formdetail); */
     } );
function sentform(formdata)
    {
		var dataform = JSON.stringify(formdata);
		var k = 'm:m';
		  $.ajax({
		type: 'GET',
		url: 'DirRpcHapus',
		data: $.param(formdata),
		contentType: "application/json",
		dataType: "json",
		success: function(data) {
		 console.log("Data Delete!", data);
			var url = window.location.href;
			window.location.href = url;
			/* var url = window.location.href;
			window.location.href = url; */
		}
	});}	
	/*   $('#datatable').on('click', '#BTN-HAPUS', function (e) {
		   var data = table1.row( $(this).parents('tr') ).data();
		   $.ajax({
                dataType: 'json',
                type: 'GET',
                url: 'dirrpc',
                data: { data[0] : data[0] }
            }).done(function(data){
				var x = window.location.href;
				var url = x.replace("dir_rpc", "dir_rpc");
				window.location.href = url;
            }).fail(function(errors) {
                // toastr.error('Data tidak ditemukan')
            });
    } ); */
	
    function table_dirrpc(gimmick_name)
      {
		  var act = 'search';
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
                    d.gimmick_name = gimmick_name;
                }
            },
          aoColumns : [
                {   data: 'nomor', name: 'nomor', bSortable: false },
                {   data: 'debt_name', name: 'debt_name', bSortable: false  },
                {   data: 'maintance', name: 'maintance', bSortable: false },
                {   data: 'action', name: 'action', orderable: false, searchable: false}
            ],
      });
    }

</script>