<script type="text/javascript">
var kode_mitra = <?php echo json_encode($_GET['kode_mitra']); ?>;

	var	 table1 = $('#datatable').DataTable({
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
                url : '/datatables/list_pekerja',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                    d.kode_mitra = kode_mitra;
                }
            },
          aoColumns : [
                {   data: 'no', name: 'no', bSortable: false },
                {   data: 'jenis_mitra', name: 'Jenis Mitra', bSortable: false  },
                {   data: 'anak_perusahaan_wilayah', name: 'Kantor Wilayah', bSortable: false },
                {   data: 'anak_perusahaan_kabupaten', name: 'Kantor Cabang', bSortable: false }
            ],
      });
    		

  
</script>