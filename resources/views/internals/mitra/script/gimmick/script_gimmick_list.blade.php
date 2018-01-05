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

function terjemahvalue(data,formarray){
	formarray.push({
					"name": "gimmick_name",
					"value": data.gimmick_name
				})
	formarray.push({
					"name": "gimmick_level",
					"value": data.gimmick_level
				})
	formarray.push({
					"name": "area_level",
					"value": data.area_level
				})
	formarray.push({
					"name": "segmen_level",
					"value": data.segmen_level
				})
	formarray.push({
					"name": "mitra_kerjasama",
					"value": data.mitra_kerjasama
				})
	formarray.push({
					"name": "mitra_kerjasama2",
					"value": data.mitra_kerjasama2
				})
	formarray.push({
					"name": "mitra_kerjasama3",
					"value": data.mitra_kerjasama3
				})
	formarray.push({
					"name": "mitra_kerjasama4",
					"value": data.mitra_kerjasama4
				})
	formarray.push({
					"name": "tgl_mulai",
					"value": data.tgl_mulai
				})
	formarray.push({
					"name": "tgl_berakhir",
					"value": data.tgl_berakhir
				})
	formarray.push({
					"name": "payroll",
					"value": data.payroll
				})
	formarray.push({
					"name": "admin_fee",
					"value": data.admin_fee
				})
	formarray.push({
					"name": "admin_minimum",
					"value": data.admin_minimum
				})
	formarray.push({
					"name": "provisi_fee",
					"value": data.provisi_fee
				})
	formarray.push({
					"name": "waktu_minimum",
					"value": data.waktu_minimum
				})
	formarray.push({
					"name": "waktu_maksimum",
					"value": data.waktu_maksimum
				})
	formarray.push({
					"name": "dir_rpc",
					"value": data.dir_rpc
				})
	formarray.push({
					"name": "asuransi_jiwa",
					"value": data.asuransi_jiwa
				})
	formarray.push({
					"name": "perhitungansuku_bunga",
					"value": data.perhitungansuku_bunga
				})
	formarray.push({
					"name": "first_month",
					"value": data.first_month
				})
	formarray.push({
					"name": "last_month",
					"value": data.last_month
				})
	formarray.push({
					"name": "suku_bunga",
					"value": data.suku_bunga
				})
	formarray.push({
					"name": "pemutus_name",
					"value": data.pemutus_name
				})
	formarray.push({
					"name": "jabatan",
					"value": data.jabatan
				})
	formarray.push({
					"name": "persen_bunga",
					"value": data.persen_bunga
				})
				alert((data.pemeriksa.split(";").length - 1));
	
	formarray.push({
					"name": "countpemutus",
					"value": (data.pemeriksa.split(";").length - 1)
				})			
	formarray.push({
					"name": "pemeriksa",
					"value": data.pemeriksa
				})
	formarray.push({
					"name": "jabatan_pemeriksa",
					"value": data.jabatan_pemeriksa
				})
}
 $(document).on('click', "#btn-add", function(){
      var x = window.location.href;
	  var url = x.replace("dir_rpc", "dir_rpc_add");
	  window.location.href = url; 
    })
	
	$('#datatable').on('click', '#btn-print', function (e) {
		var data = table1.row( $(this).parents('tr') ).data();
		var formarray = $( ":input" ).serializeArray();
		terjemahvalue(data,formarray);
		
		formarray.push({
					"name": "action",
					"value": 'print'
				})
				
 OpenWindowWithPost("GimmickStore", "", 
      "GimmickStore", formarray);	
	 } );
	 $('#datatable').on('click', '#btn-download', function (e) {
		var data = table1.row( $(this).parents('tr') ).data();
		var formarray = $( ":input" ).serializeArray();
		terjemahvalue(data,formarray);
		
		formarray.push({
					"name": "action",
					"value": 'unduh'
				})
				
 OpenWindowWithPost("GimmickStore", "", 
      "GimmickStore", formarray);	
	 } );
	  function OpenWindowWithPost(url, windowoption, name, params)
   {
            var form = document.createElement("form");
            form.setAttribute("method", "get");
            form.setAttribute("action", url);
            form.setAttribute("target", name);

             for (var i in params) {
                if (params.hasOwnProperty(i)) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = params[i].name;
                    input.value = params[i].value;
                    form.appendChild(input);
                }
            }
            
            document.body.appendChild(form);
            
            //note I am using a post.htm page since I did not want to make double request to the page 
           //it might have some Page_Load call which might screw things up.
            window.open("post.htm", name, windowoption);
            
            form.submit();
            
            document.body.removeChild(form); 
    }
   function table_dirrpc(gimmick_name, mitra_kerjasama, kantor_wilayah, kantor_cabang)
      {
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
                url : '/datatables/gimmick_list',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.gimmick_name = gimmick_name;
                }
            },
         aoColumns : [
                {   data: 'no', name: 'no', bSortable: false },
                {   data: 'gimmick_name', name: 'gimmick_name', bSortable: false  },
                {   data: 'gimmick_level', name: 'gimmick_level', bSortable: false  },
                {   data: 'first_month', name: 'area_level', bSortable: false },
                {   data: 'last_month', name: 'segmen_level', bSortable: false },
                {   data: 'persen_bunga', name: 'payroll', bSortable: false },
               // {   data: 'dir_rpc', name: 'dir_rpc', bSortable: false },
                {   data: 'action', name: 'action', bSortable: false },
            ],
      });
    }

</script>