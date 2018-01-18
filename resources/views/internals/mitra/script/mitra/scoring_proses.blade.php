
<script type="text/javascript">
$("#jenis_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['jenis_mitra']); ?>);
$("#golongan_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['golongan_mitra']); ?>);
$("#induk_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['induk_mitra']); ?>);
$("#anak_perusahaan_wilayah").val(<?php echo json_encode($mitra_list['contents'][0]['anak_perusahaan_wilayah']); ?>);
$("#anak_perusahaan_kabupaten").val(<?php echo json_encode($mitra_list['contents'][0]['anak_perusahaan_kabupaten']); ?>);
$("#id_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['id_mitra']); ?>);
$("#email").val(<?php echo json_encode($mitra_list['contents'][0]['email']); ?>);
$("#payroll").val(<?php echo json_encode($mitra_list['contents'][0]['payroll']); ?>);
$("#bank_payroll").val(<?php echo json_encode($mitra_list['contents'][0]['bank_payroll']); ?>);
$("#status").val(<?php echo json_encode($mitra_list['contents'][0]['status']); ?>);



$("#alamat_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['alamat_mitra']); ?>);
$("#no_telp_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['no_telp_mitra']); ?>);
$("#deskripsi_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['deskripsi_mitra']); ?>);
$("#hp_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['hp_mitra']); ?>);
$("#bendaharawan_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['bendaharawan_mitra']); ?>);
$("#telp_bendaharawan_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['telp_bendaharawan_mitra']); ?>);
$("#hp_bendaharawan_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['hp_bendaharawan_mitra']); ?>);
$("#jml_pegawai").val(<?php echo json_encode($mitra_list['contents'][0]['jml_pegawai']); ?>);
$("#thn_pegawai").val(<?php echo json_encode($mitra_list['contents'][0]['thn_pegawai']); ?>);
$("#tgl_pendirian").val(<?php echo json_encode($mitra_list['contents'][0]['tgl_pendirian']); ?>);
$("#akta_pendirian").val(<?php echo json_encode($mitra_list['contents'][0]['akta_pendirian']); ?>);
$("#akta_perubahan").val(<?php echo json_encode($mitra_list['contents'][0]['akta_perubahan']); ?>);
$("#npwp_usaha").val(<?php echo json_encode($mitra_list['contents'][0]['npwp_usaha']); ?>);
/*$("#laporan_keuangan").val(<?php echo json_encode($mitra_list['contents'][0]['laporan_keuangan']); ?>);
$("#legalitas_perusahaan").val(<?php echo json_encode($mitra_list['contents'][0]['legalitas_perusahaan']); ?>);*/

$("#no_rek_mitra").val(<?php echo json_encode($mitra_list['contents'][0]['no_rek_mitra']); ?>);
$("#tipe_account").val(<?php echo json_encode($mitra_list['contents'][0]['tipe_account']); ?>);
$("#tgl_pembayaran").val(<?php echo json_encode($mitra_list['contents'][0]['tgl_pembayaran']); ?>);
$("#tgl_gajian").val(<?php echo json_encode($mitra_list['contents'][0]['tgl_gajian']); ?>);
$("#jenis_pengajuan").val(<?php echo json_encode($mitra_list['contents'][0]['jenis_pengajuan']); ?>);
$("#bank_jenis_pinjaaman").val(<?php echo json_encode($mitra_list['contents'][0]['bank_jenis_pinjaaman']); ?>);
$("#fasilitas_bank").val(<?php echo json_encode($mitra_list['contents'][0]['fasilitas_bank']); ?>);
/*$("#upload_fasilitas_bank").val(<?php echo json_encode($mitra_list['contents'][0]['upload_fasilitas_bank']); ?>);*/
$("#ijin_perinsip").val(<?php echo json_encode($mitra_list['contents'][0]['ijin_perinsip']); ?>);
/*$("#upload_ijin").val(<?php echo json_encode($mitra_list['contents'][0]['upload_ijin']); ?>);*/
$("#daftar_ijin").val(<?php echo json_encode($mitra_list['contents'][0]['daftar_ijin']); ?>);
$("#fasilitas_lainnya").val(<?php echo json_encode($mitra_list['contents'][0]['fasilitas_lainnya']); ?>);
$("#deskripsi_fasilitas_lainnya").val(<?php echo json_encode($mitra_list['contents'][0]['deskripsi_fasilitas_lainnya']); ?>);
$("#nomor_pks_notaril").val(<?php echo json_encode($mitra_list['contents'][0]['nomor_pks_notaril']); ?>);
$("#nomor_perjanjian_kerjasama_bri").val(<?php echo json_encode($mitra_list['contents'][0]['nomor_perjanjian_kerjasama_bri']); ?>);
$("#nomor_perjanjian_kerjasama_ketiga").val(<?php echo json_encode($mitra_list['contents'][0]['nomor_perjanjian_kerjasama_ketiga']); ?>);
$("#tgl_perjanjian").val(<?php echo json_encode($mitra_list['contents'][0]['tgl_perjanjian']); ?>);
$("#tgl_perjanjian_backdate").val(<?php echo json_encode($mitra_list['contents'][0]['tgl_perjanjian_backdate']); ?>);
/*$("#ijin_prinsip").val(<?php echo json_encode($mitra_list['contents'][0]['ijin_prinsip']); ?>);*/
/*==========================================================*/


document.getElementById("id_mitra").readOnly = true;
document.getElementById("email").readOnly = true;
document.getElementById("alamat_mitra").readOnly = true;
document.getElementById("no_telp_mitra").readOnly = true;
document.getElementById("deskripsi_mitra").readOnly = true;
document.getElementById("hp_mitra").readOnly = true;
document.getElementById("bendaharawan_mitra").readOnly = true;
document.getElementById("telp_bendaharawan_mitra").readOnly = true;
document.getElementById("hp_bendaharawan_mitra").readOnly = true;
document.getElementById("jml_pegawai").readOnly = true;
document.getElementById("thn_pegawai").readOnly = true;
document.getElementById("tgl_pendirian").readOnly = true;
document.getElementById("akta_pendirian").readOnly = true;
document.getElementById("akta_perubahan").readOnly = true;
document.getElementById("npwp_usaha").readOnly = true;
document.getElementById("no_rek_mitra").readOnly = true;
document.getElementById("tgl_pembayaran").readOnly = true;
document.getElementById("tgl_gajian").readOnly = true;
document.getElementById("ijin_perinsip").readOnly = true;
document.getElementById("fasilitas_lainnya").readOnly = true;
document.getElementById("deskripsi_fasilitas_lainnya").readOnly = true;
document.getElementById("nomor_pks_notaril").readOnly = true;
document.getElementById("nomor_perjanjian_kerjasama_bri").readOnly = true;
document.getElementById("nomor_perjanjian_kerjasama_ketiga").readOnly = true;
document.getElementById("tgl_perjanjian").readOnly = true;
document.getElementById("tgl_perjanjian_backdate").readOnly = true;


	function addapprovalpemutus(formarray){
	
	var id_approval = Date.now();
	formarray.push({
		"name" : "id_approval",
		"value" : id_approval
	});
	/* 		var area_level = $("input:radio[name=area_level]:checked").val();
		formarray.push({
			"name": "area_level",
			"value": area_level
		}); */
		var count = $("#countpemutus").val();
		var pemeriksa = '';
		var jabatan_pemeriksa = '';
		for(i=1;i<parseInt(count);i++){
			if(i==1){
				pemeriksa = $("#pemeriksa"+i).val();
			}else{
				pemeriksa += ';'+$("#pemeriksa"+i).val();
			}
			if(i==1){
				jabatan_pemeriksa = $("#jabatan"+i).val();
			}else{
				jabatan_pemeriksa += ';'+$("#jabatan"+i).val();
			}
		}
		formarray.push({
			"name": "pemutus",
			"value": $('#pemutus_name').val()
		});
		formarray.push({
			"name": "pemeriksa",
			"value": $('#pemeriksa').val()
		});

		formarray.push({
			"name": "jabatan_pemeriksa",
			"value": jabatan_pemeriksa
		});
		
		formarray.push({
			"name": "jabatan",
			"value": $("#jabatan").val(),
		});
		formarray.push({
			"name": "status",
			"value": "register",
		});
		return formarray;
}
$(document).on('click', "#btn-submit", function(){
	var formarray = [];
	
	formarray.push({
			"name": "fasilitas_perbankan",
			"value": $("#fasilitas_perbankan").val(),
	});
	formarray.push({
			"name": "id_scoring",
			"value": <?php echo json_encode($_GET['id_header']); ?>,
	});
	formarray.push({
			"name": "ijin_prinsip_perbankan",
			"value": $("#ijin_prinsip_perbankan").val(),
	});
	formarray.push({
			"name": "daftar_ijin_prinsip",
			"value": $("#daftar_ijin_prinsip").val(),
	});
	formarray.push({
			"name": "persentase_npl",
			"value": $("#persentase_npl").val(),
	});
	formarray.push({
			"name": "total_os",
			"value": $("#total_os").val(),
	});
	formarray.push({
			"name": "jumlah_debitur",
			"value": $("#jumlah_debitur").val(),
	});
	formarray.push({
			"name": "os_pl",
			"value": $("#os_pl").val(),
	});
	formarray.push({
			"name": "jumlah_debitur_pl",
			"value": $("#jumlah_debitur_pl").val(),
	});
	formarray.push({
			"name": "os_npl",
			"value": $("#os_npl").val(),
	});
	formarray.push({
			"name": "jumlah_debitur_npl",
			"value": $("#jumlah_debitur_npl").val(),
	});
		sentform(formarray);
})


function sentform(formdata)
    {
		var k = 'm:m';
		  $.ajax({
		type: 'GET',
		url: 'ScoringMitraStore',
		data: $.param(formdata),
		contentType: "application/json",
		dataType: "json",
		success: function(data) {
		 console.log("Data added!", data);
		 
		var url = window.location.href;
		url = url.replace("scoringproses?id_header"+<?php echo json_encode($_GET['id_header']); ?>, "mitra_list");
		window.location.href = url; 
		}
		});
}

</script>