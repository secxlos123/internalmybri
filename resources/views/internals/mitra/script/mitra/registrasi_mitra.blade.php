
<script type="text/javascript">
	function getpemeriksa(formarray){
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
			"name": "pemeriksa",
			"value": pemeriksa
		});
		formarray.push({
			"name": "jabatan_pemeriksa",
			"value": jabatan_pemeriksa
		});
		
		formarray.push({
			"name": "pemutus_name",
			"value": $("#pemutus_name").val(),
		});
		formarray.push({
			"name": "jabatan",
			"value": $("#jabatan").val(),
		});
		return formarray;
	}

  
function validasi_desimal(parameter){
		var persen_bunga = $(parameter).val();
		var nilai = persen_bunga.split('.');
		var countnilai2 = nilai[1].length;
		if(parseInt(countnilai2)>2){
			var koma =nilai[1].substr(0,2);
			$(parameter).val(nilai[0]+'.'+koma);
		}
}
	
	
function addinput(){
		var countpemutus = $("#countpemutus").val();
		addpemutus(countpemutus);
		addjabatan(countpemutus);
		$("#countpemutus").val(parseInt(countpemutus)+1);
	}

function addpemutus(countpemutus){
			
			var html = '<label class="col-md-3 control-label">Pemeriksa'+countpemutus+'</label><div class="col-md-8">' + 
					   '<input type="text" class="form-control" name="pemeriksa'+countpemutus+'" id="pemeriksa'+countpemutus+'" value="" maxlength="16">'+
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group pemeriksa'+countpemutus;
			div.innerHTML = html;
			document.getElementById('div_pemutus').appendChild(div);
	}
function empty(e) {
  switch (e) {
    case "":
    case 0:
    case "0":
    case null:
    case false:
    case typeof this == "undefined":
      return true;
    default:
      return false;
  }
}
function addjabatan(countpemutus){
			var html = '<label class="col-md-5 control-label">Jabatan Pemeriksa'+countpemutus+'</label><div class="col-md-7">' + 
					   '<input type="text" class="form-control" name="jabatan'+countpemutus+'" id="jabatan'+countpemutus+'" value="" maxlength="16">'+
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group jabatan'+countpemutus;
			div.innerHTML = html;
			document.getElementById('div_jabatan').appendChild(div);
}

function adddetail(formdetail){	
	var id_detail = Date.now();
	formdetail.push({
		"name" : "id_detail",
		"value" : id_detail
	});
	formdetail.push({
		"name" : "alamat_mitra",
		"value" : $("#alamat_mitra").val(),
	});
	formdetail.push({
		"name" : "no_telp_mitra",
		"value" : $("#no_telp_mitra").val(),
	});
	formdetail.push({
		"name" : "deskripsi_mitra",
		"value" : $("#deskripsi_mitra").val(),
	});
	formdetail.push({
		"name" : "hp_mitra",
		"value" : $("#hp_mitra").val(),
	});
	formdetail.push({
		"name" : "bendaharawan_mitra",
		"value" : $("#bendaharawan_mitra").val(),
	});
	formdetail.push({
		"name" : "telp_bendaharawan_mitra",
		"value" : $("#telp_bendaharawan_mitra").val(),
	});
	formdetail.push({
		"name" : "hp_bendaharawan_mitra",
		"value" : $("#hp_bendaharawan_mitra").val(),
	});
	formdetail.push({
		"name" : "jml_pegawai",
		"value" : $("#jml_pegawai").val(),
	});
	formdetail.push({
		"name" : "thn_pegawai",
		"value" : $("#thn_pegawai").val(),
	});
	formdetail.push({
		"name" : "tgl_pendirian",
		"value" : $("#tgl_pendirian").val(),
	});
	formdetail.push({
		"name" : "akta_pendirian",
		"value" : $("#akta_pendirian").val(),
	});
	formdetail.push({
		"name" : "akta_perubahan",
		"value" : $("#akta_perubahan").val(),
	});
	formdetail.push({
		"name" : "npwp_usaha",
		"value" : $("#npwp_usaha").val(),
	});
	formdetail.push({
		"name" : "laporan_keuangan",
		"value" : $("#laporan_keuangan").val(),
	});
	formdetail.push({
		"name" : "legalitas_perusahaan",
		"value" : $("#legalitas_perusahaan").val(),
	});
	var no_rek_mitra = $('#no_rek_mitra').val();
		formdetail.push({
			"name": "no_rek_mitra",
			"value": no_rek_mitra
		});

		
	var tipe_account = $("input:radio[name=tipe_account]:checked").val();
		formdetail.push({
			"name": "tipe_account",
			"value": tipe_account
		});
	formdetail.push({
		"name" : "tgl_pembayaran",
		"value" : $("#tgl_pembayaran").val(),
	});
	formdetail.push({
		"name" : "tgl_gajian",
		"value" : $("#tgl_gajian").val(),
	});
	var jenis_pengajuan = $("input:radio[name=jenis_pengajuan]:checked").val();
		formdetail.push({
			"name": "jenis_pengajuan",
			"value": jenis_pengajuan
		});

	var bank_jenis_pinjaaman = $('#bank_jenis_pinjaaman').val();
		formdetail.push({
			"name": "bank_jenis_pinjaaman",
			"value": bank_jenis_pinjaaman
		});
	
	var fasilitas_bank = $('#fasilitas_bank').val();
		formdetail.push({
			"name": "fasilitas_bank",
			"value": fasilitas_bank
		});
	formdetail.push({
		"name" : "upload_fasilitas_bank",
		"value" : $("#upload_fasilitas_bank").val(),
	});
	formdetail.push({
		"name" : "ijin_perinsip",
		"value" : $("#ijin_perinsip").val(),
	});
	formdetail.push({
		"name" : "upload_ijin",
		"value" : $("#upload_ijin").val(),
	});
	var daftar_ijin = $('#daftar_ijin').val();
		formdetail.push({
			"name": "daftar_ijin",
			"value": daftar_ijin
		});
	formdetail.push({
		"name" : "fasilitas_lainnya",
		"value" : $("#fasilitas_lainnya").val(),
	});
	formdetail.push({
		"name" : "deskripsi_fasilitas_lainnya",
		"value" : $("#deskripsi_fasilitas_lainnya").val(),
	});
	formdetail.push({
		"name" : "nomor_pks_notaril",
		"value" : $("#nomor_pks_notaril").val(),
	});
	formdetail.push({
		"name" : "nomor_perjanjian_kerjasama_bri",
		"value" : $("#nomor_perjanjian_kerjasama_bri").val(),
	});
	formdetail.push({
		"name" : "nomor_perjanjian_kerjasama_ketiga",
		"value" : $("#nomor_perjanjian_kerjasama_ketiga").val(),
	});
	formdetail.push({
		"name" : "tgl_perjanjian",
		"value" : $("#tgl_perjanjian").val(),
	});
	formdetail.push({
		"name" : "tgl_perjanjian_backdate",
		"value" : $("#tgl_perjanjian_backdate").val(),
	});
	formdetail.push({
		"name" : "ijin_prinsip",
		"value" : $("#ijin_prinsip").val(),
	});
	return formdetail;
}

function addheader(formheader){
	var id = Date.now();
	formheader.push({
		"name" : "id_approval_pemutus",
		"value" : id
	});
	formheader.push({
		"name" : "id_detail",
		"value" : id
	});
	formheader.push({
		"name" : "id_header",
		"value" : id
	});
	formheader.push({
		"name" : "jenis_mitra",
		"value" : $("#jenis_mitra").val(),
	});
	formheader.push({
		"name" : "golongan_mitra",
		"value" : $("#golongan_mitra").val(),
	});
	var golongan_mitra = $('#golongan_mitra').val();
		formheader.push({
			"name": "golongan_mitra",
			"value": golongan_mitra
		});
	var induk_mitra = $('#induk_mitra').val();
		formheader.push({
			"name": "induk_mitra",
			"value": induk_mitra
		});
	var anak_perusahaan_wilayah = $('#anak_perusahaan_wilayah').val();
		formheader.push({
			"name": "anak_perusahaan_wilayah",
			"value": anak_perusahaan_wilayah
		});
	var anak_perusahaan_kabupaten = $('#anak_perusahaan_kabupaten').val();
		formheader.push({
			"name": "anak_perusahaan_kabupaten",
			"value": anak_perusahaan_kabupaten
		});
	formheader.push({
		"name" : "id_mitra",
		"value" : $("#id_mitra").val(),
	});
	formheader.push({
		"name" : "email",
		"value" : $("#email").val(),
	});
	var payroll = $("input:radio[name=payroll]:checked").val();
		formheader.push({
			"name": "payroll",
			"value": payroll
		});
	var bank_payroll = $('#bank_payroll').val();
		formheader.push({
			"name": "bank_payroll",
			"value": bank_payroll
		});
	formheader.push({
		"name" : "status",
		"value" : "register",
	});
	return formheader;
}
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
	var formdetail = [];
	var formheader = [];
	var formpemutus = [];
	var formarray = [];
	formheader = addheader(formheader);
	formdetail = adddetail(formdetail);
	formpemutus = addapprovalpemutus(formpemutus);
	formarray.push({
			"name": "formheader",
			"value": JSON.stringify(formheader)
	});
	formarray.push({
			"name": "formdetail",
			"value": JSON.stringify(formdetail)
	});
	formarray.push({
			"name": "formpemutus",
			"value": JSON.stringify(formpemutus)
	});
	formarray.push({
			"name": "button",
			"value": 'submit_registrasi'
	});
		sentform(formarray);
})


function sentform(formdata)
    {
		var k = 'm:m';
		  $.ajax({
		type: 'GET',
		url: 'MitraStore',
		data: $.param(formdata),
		contentType: "application/json",
		dataType: "json",
		success: function(data) {
		 console.log("Data added!", data);
		 
		var url = window.location.href;
		url = url.replace("registrasi_mitra", "mitra_list");
		window.location.href = url; 
		}
		});
}

</script>