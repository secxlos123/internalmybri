<script type="text/javascript">
document.getElementById("mitra_kerjasama").readOnly = true;
document.getElementById("rm").readOnly = true;
document.getElementById("kantor_cabang").readOnly = true;
document.getElementById("kantor_wilayah").readOnly = true;
document.getElementById("id_mitra").readOnly = true;
$("#mitra_kerjasama").val(<?php echo json_encode($mitra_list['contents'][0]['NAMA_INSTANSI']); ?>);
$("#kantor_wilayah").val(<?php echo json_encode($mitra_list['contents'][0]['anak_perusahaan_wilayah']); ?>);
$("#kantor_cabang").val(<?php echo json_encode($mitra_list['contents'][0]['anak_perusahaan_kabupaten']); ?>);
$("#id_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['id_header']); ?>);
$('#tgl_hasil').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
</script>