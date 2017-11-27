<script>
	$(document).ready(function () {
       	$('#datatable-type-property').DataTable({
       		"searching" : false,
       		"language": {
                    "paginate": {
                        "previous": '<i class="fa fa-angle-left" ></i>',
                        "next":     '<i class="fa fa-angle-right" ></i>'
                    },
                    "info": "Menampilkan _START_ - _END_ dari _TOTAL_",
                    "lengthMenu":     "<div>Tampilkan</div> _MENU_",
                    "infoFiltered":   "(disaring dari _MAX_ jumlah entri)"
                },
            "pageLength": 5,
            "bLengthChange": false
       	});

       	$('#datatable-item-property').DataTable({
       		"searching" : false,
       		"language": {
                    "paginate": {
                        "previous": '<i class="fa fa-angle-left" ></i>',
                        "next":     '<i class="fa fa-angle-right" ></i>'
                    },
                    "info": "Menampilkan _START_ - _END_ dari _TOTAL_",
                    "lengthMenu":     "<div>Tampilkan</div> _MENU_",
                    "infoFiltered":   "(disaring dari _MAX_ jumlah entri)"
                },
            "pageLength": 5,
            "bLengthChange": false
       	});        
    });
</script>