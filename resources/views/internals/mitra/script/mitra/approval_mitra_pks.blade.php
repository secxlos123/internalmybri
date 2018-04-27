
<script type="text/javascript">
document.getElementById("nama_mitra").readOnly = true;
$("#nama_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['NAMA_INSTANSI']); ?>);
document.getElementById("signer_bri").readOnly = true;
$("#signer_bri").val(<?php echo json_encode($mitra_list['contents'][0]['pemutus_name']); ?>);
document.getElementById("id_header").readOnly = true;
$("#id_header").val(<?php echo json_encode($mitra_list['contents'][0]['id_header']); ?>);

//------------------------------------------------
document.getElementById("judul_perjanjian").readOnly = true;
$("#judul_perjanjian").val(<?php echo json_encode($dataperjanjian['contents'][0]['judul_perjanjian']); ?>);
document.getElementById("deskripsi_perjanjian").readOnly = true;
$("#deskripsi_perjanjian").val(<?php echo json_encode($dataperjanjian['contents'][0]['deskripsi_perjanjian']); ?>);
document.getElementById("signer_mitra").readOnly = true;
$("#signer_mitra").val(<?php echo json_encode($dataperjanjian['contents'][0]['signer_mitra']); ?>);
document.getElementById("nomor_notaril").readOnly = true;
$("#nomor_notaril").val(<?php echo json_encode($dataperjanjian['contents'][0]['nomor_notaril']); ?>);
document.getElementById("nomor_perjanjian_bri").readOnly = true;
$("#nomor_perjanjian_bri").val(<?php echo json_encode($dataperjanjian['contents'][0]['nomor_perjanjian_bri']); ?>);
document.getElementById("nomor_perjanjian_ketiga").readOnly = true;
$("#nomor_perjanjian_ketiga").val(<?php echo json_encode($dataperjanjian['contents'][0]['nomor_perjanjian_ketiga']); ?>);
document.getElementById("tgl_perjanjian").readOnly = true;
$("#tgl_perjanjian").val(<?php echo json_encode($dataperjanjian['contents'][0]['tgl_perjanjian']); ?>);
document.getElementById("tgl_berakhir_perjanjian").readOnly = true;
$("#tgl_berakhir_perjanjian").val(<?php echo json_encode($dataperjanjian['contents'][0]['tgl_berakhir_perjanjian']); ?>);
document.getElementById("tgl_perjanjian_backdate").readOnly = true;
$("#tgl_perjanjian_backdate").val(<?php echo json_encode($dataperjanjian['contents'][0]['tgl_perjanjian_backdate']); ?>);
document.getElementById("upload_perjanjian").readOnly = true;
$("#upload_perjanjian").val(<?php echo json_encode($dataperjanjian['contents'][0]['upload_perjanjian']); ?>);
document.getElementById("tgl_register").readOnly = true;
$("#tgl_register").val(<?php echo json_encode($dataperjanjian['contents'][0]['tgl_register']); ?>);
$("perjanjian_layanan:not(:checked)" ).attr('disabled', true);
$("jenis_perjanjian:not(:checked)" ).attr('disabled', true);

//-----------------------------------------------
function testbutton(){
	  setTimeout(function(){
         document.getElementById('load').style.visibility="visible";
      },1000);
}
$(document).ready(function() {
	//------------------all hidden---------------------------------
	$('#tgl_pembayaran').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
			$('#tgl_gajian1').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
		$("#step0").show();
		$("#step1").hide();
			
		$("#fasilitas_jasa").select2().change(function () {
				var fasilitas_jasa = $("#fasilitas_jasa").val();
				if(fasilitas_jasa=='simpanan'){	
						$("#step0").show();
						$("#step1").hide();
				}else if(fasilitas_jasa=='fasilitas'){
						$("#step0").hide();
						$("#step1").show();
				}
			});
		
		//----------------------------------------------------------
});

</script>