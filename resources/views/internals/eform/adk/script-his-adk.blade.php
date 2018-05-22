<script type="text/javascript">
	$(document).ready(function(){
		$('#datatable-histori').DataTable({
            searching : true,
            processing : true,
            serverSide : false,
            // order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                // url : '/datatables/adk-his-list', <USE THIS IF ON PRODUCTION>
                url : '/internal/datatables/adk-his-list',
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
                {data: 'cif', name: 'cif', bSortable: true},
                {data: 'id_aplikasi', name: 'id_aplikasi', bSortable: true},
                {data: 'ref_number', name: 'ref_number', bSortable: true},
                {data: 'fid_tp_produk', name: 'fid_tp_produk', bSortable: true},
                {data: 'ao_name', name: 'ao_name', bSortable: true},
                {data: 'tgl_analisa', name: 'tgl_analisa', bSortable: true},
                {data: 'pinca_name', name: 'pinca_name', bSortable: true},
                {data: 'tgl_putusan', name: 'tgl_putusan', bSortable: true},
                {data: 'namadeb', name: 'namadeb', bSortable: true},
                {data: 'tgl_pencairan', name: 'tgl_pencairan', bSortable: true},
                {data: 'no_rekenings', name: 'no_rekenings', bSortable: true},
                {data: 'request_amount', name: 'request_amount', bSortable: true},
                {data: 'STATUS', name: 'STATUS', bSortable: true },
                {data: 'status_screening', name: 'status_screening', bSortable: true },
                {data: 'eform_id', name: 'eform_id', bSortable: false, className: 'hidden' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
	});
</script>