<script type="text/javascript">
	$(document).ready(function(){
		$('#datatable-histori').DataTable({
            searching : true,
            processing : false,
            serverSide : false,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/adk-his-list',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                }
            },
            aoColumns : [
                {data: 'tgl_pengajuan', name: 'tgl_pengajuan', bSortable: true},
                {data: 'id_aplikasi', name: 'id_aplikasi', bSortable: true},
                {data: 'ref_number', name: 'ref_number', bSortable: true},
                {data: 'fid_tp_produk', name: 'fid_tp_produk', bSortable: true},
                {data: 'pinca_name', name: 'pinca_name', bSortable: true},
                {data: 'ao_name', name: 'ao_name', bSortable: true},
                {data: 'namadeb', name: 'namadeb', bSortable: true},
                {data: 'no_rekening', name: 'no_rekening', bSortable: true},
                {data: 'request_amount', name: 'request_amount', bSortable: true},
                {data: 'STATUS', name: 'STATUS', bSortable: true },
                // {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
	});
</script>