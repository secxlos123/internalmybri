<script type="text/javascript">

  var table2 = $('#datatable').DataTable({
            searching: false,
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });
$('#datatable').on('click', '#btn-penilaian', function (e) {
		var data = table2.row($(this).parents('tr')).data();
		var kode = data['noid'];
//		var no = $("#NO"+kode).val();
//    alert(kode);
      var x = window.location.origin+"/penilaian_kelayakan?i="+window.btoa(kode);
	  window.location.href = x; 
    } );
	
$('#datatable').on('click', '#btn-perjanjian', function (e) {
		var data = table2.row($(this).parents('tr')).data();
		var kode = data['noid'];
//		var no = $("#NO"+kode).val();
//    alert(kode);

      var x = window.location.origin+"/registrasi_perjanjian?i="+window.btoa(kode);
	  window.location.href = x; 
    } );
	
	
$('#datatable').on('click', '#btn-approval', function (e) {
		var data = table2.row($(this).parents('tr')).data();
		var kode = data['noid'];
//		var no = $("#NO"+kode).val();
//    alert(kode);

      var x = window.location.origin+"/approval_mitra?i="+window.btoa(kode);
	  window.location.href = x; 
    } );
	
function table_mitra2(mitra,kantor_wilayah,kantor_cabang)
      {
		 table2 = $('#datatable').DataTable({
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
                url : '/datatables/calon_mitra_list',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                    d.NAMA_INSTANSI = mitra;
                    d.UNIT_KERJA = kantor_wilayah;
                   // d.anak_perusahaan_kabupaten = kantor_cabang;
                }
            },
			  dom: 'Bfrtip',
        buttons: [
            {
                text: 'My button',
                action: function ( e, dt, node, config ) {
                    alert( 'Button activated' );
                }
            }
        ],
          aoColumns : [
                {   data: 'noid', name: 'noid', bSortable: false },
                {   data: 'NAMA_INSTANSI', name: 'NAMA_INSTANSI', bSortable: false  },
                {   data: 'UNIT_KERJA', name: 'UNIT_KERJA', bSortable: false },
                {   data: 'nomor_perjanjian_kerjasama_bri', name: 'no_perjanjian_kerjasama', bSortable: false },
                {   data: 'golongan_mitra', name: 'Perihal', bSortable: false },
                {   data: 'status', name: 'status', bSortable: false },
                {   data: 'action_status', name: 'action_status', orderable: false, searchable: false},
                {   data: 'action_hapus', name: 'action_hapus', orderable: false, searchable: false}
            ],
      });
    }


 $(document).on('click', "#btn-search", function(){
        table2.destroy();
        table_mitra2($('#mitra_search').val(),$('#wilayah_search').val(),$('#kantor_cabang_search').val());
    })
</script>