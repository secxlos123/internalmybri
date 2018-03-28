<script type="text/javascript">
document.getElementById("nama_mitra").readOnly = true;
$("#nama_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['NAMA_INSTANSI']); ?>);
document.getElementById("signer_bri").readOnly = true;
$("#signer_bri").val(<?php echo json_encode($mitra_list['contents'][0]['pemutus_name']); ?>);
document.getElementById("id_header").readOnly = true;
$("#id_header").val(<?php echo json_encode($mitra_list['contents'][0]['id_header']); ?>);
$('#tgl_perjanjian').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
$('#tgl_berakhir_perjanjian').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
$('#tgl_hasil').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
$('#tgl_perjanjian_backdate').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });			
$('#tgl_register').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });	
</script>