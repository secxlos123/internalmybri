<script type="text/javascript">


	  $("#div1").show();
	  $("#div2").hide();
 $(document).on('click', "#btn-lanjut", function(){
	 document.getElementById("nama_pekerja2").readOnly = true;
	 document.getElementById("perubahan_data_pekerja2").readOnly = true;
	 document.getElementById("alamat_kantor2").readOnly = true;
	 document.getElementById("kantor_cabang2").readOnly = true;
	 $("#nama_pekerja2").val($("#nama_pekerja").val());
	 $("#perubahan_data_pekerja2").val($("#perubahan_data_pekerja").val());
	 $("#alamat_kantor2").val($("#alamat_kantor").val());
	 $("#kantor_cabang2").val($("#kantor_cabang").val());
	  $("#div1").hide();
	  $("#div2").show();
    })

</script>