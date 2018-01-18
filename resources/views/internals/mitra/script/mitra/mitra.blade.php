<script type="text/javascript">
function goto(){
	var key = $("input:radio[name=registrasi_mitra_kerjasama]:checked").val();
 	var url = window.location.href;
	if(key=='registrasi_mitra'){
		url = url.replace("mitra_list", "registrasi_mitra");
		window.location.href = url;
	}else if(key=='cari_calon_mitra'){
		url = url.replace("mitra_list", "calon_mitra");
		window.location.href = url;
	}else if(key=='scoring_mitra'){
		url = url.replace("mitra_list", "scoring_mitra");
		window.location.href = url;
	}else if(key=='registrasi_perjanjian_mitra'){
		url = url.replace("mitra_list", "registrasi_perjanjian");
		window.location.href = url;
	}
}
  var table1 = $('#datatable').DataTable({
            searching: false,
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });
		

   function table_mitra1(mitra,kantor_wilayah,kantor_cabang)
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
                url : '/datatables/mitra_list',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                    d.mitra = mitra;
                    d.anak_perusahaan_wilayah = kantor_wilayah;
                    d.anak_perusahaan_kabupaten = kantor_cabang;
                }
            },
          aoColumns : [
                {   data: 'no', name: 'no', bSortable: false },
                {   data: 'jenis_mitra', name: 'Jenis Mitra', bSortable: false  },
                {   data: 'anak_perusahaan_wilayah', name: 'Kantor Wilayah', bSortable: false },
                {   data: 'anak_perusahaan_kabupaten', name: 'Kantor Cabang', bSortable: false },
                {   data: 'golongan_mitra', name: 'Perihal', bSortable: false }
            ],
      });
    }

  var table2 = $('#datatable2').DataTable({
            searching: false,
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });
	
function table_mitra2(mitra,kantor_wilayah,kantor_cabang)
      {
		 table2 = $('#datatable2').DataTable({
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
                url : '/datatables/mitra_list',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                    d.mitra = mitra;
                    d.anak_perusahaan_wilayah = kantor_wilayah;
                    d.anak_perusahaan_kabupaten = kantor_cabang;
                }
            },
          aoColumns : [
                {   data: 'no', name: 'no', bSortable: false },
                {   data: 'jenis_mitra', name: 'Jenis Mitra', bSortable: false  },
                {   data: 'anak_perusahaan_wilayah', name: 'Kantor Wilayah', bSortable: false },
                {   data: 'anak_perusahaan_kabupaten', name: 'Kantor Cabang', bSortable: false },
                {   data: 'golongan_mitra', name: 'Perihal', bSortable: false },
                {   data: 'status', name: 'status', orderable: false, searchable: false}
            ],
      });
    }

 $(document).on('click', "#btn-search", function(){
        table1.destroy();
        table_mitra1($('#mitra_search').val(),$('#wilayah_search').val(),$('#kantor_cabang_search').val());
    })

 $(document).on('click', "#btn-search2", function(){
        table2.destroy();
        table_mitra2($('#mitra_search2').val(),$('#wilayah_search2').val(),$('#kantor_cabang_search2').val());
    })
</script>