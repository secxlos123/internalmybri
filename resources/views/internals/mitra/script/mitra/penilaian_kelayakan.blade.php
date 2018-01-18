<script type="text/javascript">
document.getElementById("mitra_kerjasama").readOnly = true;
document.getElementById("rm").readOnly = true;
document.getElementById("kantor_cabang").readOnly = true;
document.getElementById("kantor_wilayah").readOnly = true;
document.getElementById("hasil_penilaian").readOnly = true;
document.getElementById("id_mitra").readOnly = true;
document.getElementById("tgl_hasil").readOnly = true;
$("#kantor_wilayah").val(<?php echo json_encode($mitra_list['contents'][0]['anak_perusahaan_wilayah']); ?>);
$("#kantor_cabang").val(<?php echo json_encode($mitra_list['contents'][0]['anak_perusahaan_kabupaten']); ?>);
$("#id_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['id_header']); ?>);
$(document).on('click', "#btn-submit", function(){
	var formarray = [];
	formarray.push({
			"name": "id_header",
			"value": $("#id_mitra").val()
	});
	formarray.push({
			"name": "rekomendasi_unit_kerja",
			"value": $("#rekomendasi_unit").val()
	});
		sentform(formarray);
})


function sentform(formdata)
    {
		var k = 'm:m';
		  $.ajax({
		type: 'GET',
		url: 'KelayakanStore',
		data: $.param(formdata),
		contentType: "application/json",
		dataType: "json",
		success: function(data) {
		 console.log("Data added!", data);
		 
		var url = window.location.href;
		url = url.replace("penilaian_kelayakan", "mitra_list");
		window.location.href = url; 
		}
		});
}

</script>