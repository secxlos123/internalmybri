
<script type="text/javascript">


function testbutton(){
	  setTimeout(function(){
         document.getElementById('load').style.visibility="visible";
      },1000);
}
$(document).ready(function() {
	//------------------all hidden---------------------------------
	$("#lembaga_pemeringkat").select2({
			  ajax: {
				url: "ListFasilitas",
				delay: 250,
				type: 'GET',
			  }
			});
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
		$("#step2").hide();
		$("#step3").hide();
		$("#step4").hide();
		$("#div_golongan_mitra_text").hide();
		$("#div_induk_mitra_text").hide();
		$("#div_anak_perusahaan_wilayah_text").hide();
		$("#div_anak_perusahaan_kabupaten_text").hide();
		
		$('#div_bank_payroll').hide();
		$("#btn_modal_fasilitas").hide();
		//=========================================================
		
		//------------------all show-----------------------------
		$("#div_golongan_mitra_select").show();
		$("#div_induk_mitra_select").show();
		$("#div_anak_perusahaan_wilayah_select").show();
		$("#div_anak_perusahaan_kabupaten_select").show();
			
		$("#bank_payroll").select2({
			  ajax: {
				url: "ListBank",
				delay: 250,
				type: 'GET',
			  }
			});
			
		$("#fasilitas_bank").select2({
			  ajax: {
				url: "ListFasilitas",
				delay: 250,
				type: 'GET',
			  }
			}).change(function () {
				$('#myModal').modal('show');
				//$('#myModal').modal('hide');
				var fasilitas_bank = $("#fasilitas_bank").val();
				if(!fasilitas_bank){	
						$('#myModal').modal('show');
						/* $('#fasilitas_bank').next(".select2-container").hide();
						$("#btn_tambah_fasilitas").hide();
						$("#btn_modal_fasilitas").show(); */
				}
			});
		
		//----------------------------------------------------------
});

	function lanjutback(x){
		if(x=='0'){
			$("#step0").show();
			$("#step1").hide();
			$("#step2").hide();
			$("#step3").hide();
			$("#step4").hide();
			$("#li-step-0").attr('class', 'first current');
			$("#li-step-1").attr('class', 'disabled');
			$("#li-step-2").attr('class', 'disabled');
			$("#li-step-3").attr('class', 'disabled');
		}else if(x=='1'){
			$("#step0").hide();
			$("#step1").show();
			$("#step2").hide();
			$("#step3").hide();
			$("#step4").hide();
			$("#li-step-0").attr('class', 'disabled');
			$("#li-step-1").attr('class', 'first current');
			$("#li-step-2").attr('class', 'disabled');
			$("#li-step-3").attr('class', 'disabled');
		}else if(x=='2'){
			$("#step0").hide();
			$("#step1").hide();
			$("#step2").show();
			$("#step3").hide();
			$("#step4").hide();
			$("#li-step-0").attr('class', 'disabled');
			$("#li-step-1").attr('class', 'disabled');
			$("#li-step-2").attr('class', 'first current');
			$("#li-step-3").attr('class', 'disabled');
		}else if(x=='3'){
			$("#step0").hide();
			$("#step1").hide();
			$("#step2").hide();
			$("#step3").show();
			$("#step4").hide();
			$("#li-step-0").attr('class', 'disabled');
			$("#li-step-1").attr('class', 'disabled');
			$("#li-step-2").attr('class', 'disabled');
			$("#li-step-3").attr('class', 'first current');
		}else if(x=='4'){
			$("#step0").hide();
			$("#step1").hide();
			$("#step2").hide();
			$("#step3").hide();
			$("#step4").show();
			$("#li-step-0").attr('class', 'disabled');
			$("#li-step-1").attr('class', 'disabled');
			$("#li-step-2").attr('class', 'disabled');
			$("#li-step-3").attr('class', 'first current');
		}
	}
        $("#form_scoring").submit(function(){
            var formData = new FormData(this);
            $.ajax({
                url: "/fasilitas",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    HoldOn.close();
                    alert(data['message']);
                 },
                error: function (response) {
                    HoldOn.close();
                    alert('gagal');
                },
                cache: false,
                contentType: false,
                processData: false
            });
			
			$('#fasilitas_lainnya').val('');
			$('#deskripsi_fasilitas_lainnya').val('');
			$('#nomor_pks_notaril').val('');
			$('#nomor_perjanjian_kerjasama_bri').val('');
			$('#nomor_perjanjian_kerjasama_ketiga').val('');
			$('#tgl_perjanjian').val('');
			$('#tgl_perjanjian_backdate').val('');
			$('#ijin_prinsip').val('');
			$('#myModal').modal('hide');
            return false;
        });

		function getjenisbank(){
		
		var payroll = $("input:radio[name=payroll]:checked").val();
		if(payroll=='bri'){
			$('#div_bank_payroll').hide();
		}else{
			$('#div_bank_payroll').show();	
		}
	}
	function getjenis(){
		$('#golongan_mitra').val(null).trigger('change');		
		var jenis_mitra = $("input:radio[name=jenis_mitra]:checked").val();
		var datamitra;
		if(jenis_mitra=='non badan usaha'){
			datamitra = {"keys":"induknonusaha","data":"0"};
		}else if(jenis_mitra=='badan usaha'){
			datamitra = {"keys":"indukbadanusaha","data":"0"};
		}
		var select2 = $("#golongan_mitra").select2({
			  ajax: {
				url: "ListMitra",
				delay: 250,
				data : datamitra,
				type: 'GET',
			  }
			}).change(function () {
				if($('#golongan_mitra').val()=='xxx'){
					add_text(0);
				}
				
				$("#golongan_mitra_text").val($('#golongan_mitra').val());
				$("#anak_perusahaan_kabupaten_text").val($('#golongan_mitra').val());
			});
			
		
	}
	function text_list(x){
		if(x=='0'){
			$('#induk_mitra_text').val($('#golongan_mitra_text').val());
			$('#anak_perusahaan_wilayah_text').val($('#golongan_mitra_text').val());
			$('#anak_perusahaan_kabupaten_text').val($('#golongan_mitra_text').val());
		}else if(x=='1'){
			$('#anak_perusahaan_wilayah_text').val($('#induk_mitra_text').val());
			$('#anak_perusahaan_kabupaten_text').val($('#induk_mitra_text').val());
		}else if(x=='2'){
			$('#anak_perusahaan_kabupaten_text').val($('#anak_perusahaan_wilayah_text').val());
		}else if(x=='3'){
			
		}
	}
	function jenisinduk(){
		$('#induk_mitra').val(null).trigger('change');		
		var golongan_mitra = $('#golongan_mitra').val();
			var datamitra = {"keys":"induk","data":golongan_mitra};
			var select2 = $("#induk_mitra").select2({
			  ajax: {
				url: "ListMitra",
				delay: 250,
				data : datamitra,
				type: 'GET',
			  }
			}).change(function () {
				if($('#induk_mitra').val()=='xxx'){
						add_text(1);
				}
				
				$("#anak_perusahaan_kabupaten_text").val($('#induk_mitra').val());
				$("#induk_mitra_text").val($('#induk_mitra').val());
/* 				var induk_mitra = $("#induk_mitra").val();
				if(!induk_mitra){	
						$('#induk_mitra_button').show();
						$('#anak_perusahaan_wilayah_button').hide();
						$('#anak_perusahaan_kabupaten_button').hide();
						$('#induk_mitra_button_add').hide();
						$('#anak_perusahaan_wilayah_button_add').hide();
						$('#anak_perusahaan_kabupaten_button_add').hide();
				}else{
						$('#induk_mitra_button').hide();
						$('#anak_perusahaan_wilayah_button').hide();
						$('#anak_perusahaan_kabupaten_button').hide();
						$('#induk_mitra_button_add').show();
						$('#anak_perusahaan_wilayah_button_add').show();
						$('#anak_perusahaan_kabupaten_button_add').show();					
				} */
			});
	}
	function jeniswilayah(){
		$('#anak_perusahaan_wilayah').val(null).trigger('change');		
		var induk_mitra = $('#induk_mitra').val();
			var datamitra = {"keys":"wilayah","data":induk_mitra};
			var select2 = $("#anak_perusahaan_wilayah").select2({
			  ajax: {
				url: "ListMitra",
				delay: 250,
				data : datamitra,
				type: 'GET',
			  }
			}).change(function () {
				if($('#anak_perusahaan_wilayah').val()=='xxx'){
					add_text(2);
				}
				$("#anak_perusahaan_wilayah_text").val($('#anak_perusahaan_wilayah').val());
				$("#anak_perusahaan_kabupaten_text").val($('#anak_perusahaan_wilayah').val());
/* 				var anak_perusahaan_wilayah = $("#anak_perusahaan_wilayah").val();
				if(!anak_perusahaan_wilayah){	
						$('#induk_mitra_button').show();
						$('#anak_perusahaan_wilayah_button').show();
						$('#anak_perusahaan_kabupaten_button').show();
						$('#induk_mitra_button_add').hide();
						$('#anak_perusahaan_wilayah_button_add').hide();
						$('#anak_perusahaan_kabupaten_button_add').hide();
				}else{
						$('#induk_mitra_button').hide();
						$('#anak_perusahaan_wilayah_button').hide();
						$('#anak_perusahaan_kabupaten_button').hide();
						$('#induk_mitra_button_add').show();
						$('#anak_perusahaan_wilayah_button_add').show();
						$('#anak_perusahaan_kabupaten_button_add').show();							
				} */
			});				
	}
	function jeniskabupaten(){
		$('#anak_perusahaan_kabupaten').val(null).trigger('change');		
		var anak_perusahaan_wilayah = $('#anak_perusahaan_wilayah').val();
			var datamitra = {"keys":"kabupaten","data":anak_perusahaan_wilayah};
			var select2 = $("#anak_perusahaan_kabupaten").select2({
			  ajax: {
				url: "ListMitra",
				delay: 250,
				data : datamitra,
				type: 'GET',
			  }
			}).change(function () {
					if($('#anak_perusahaan_kabupaten').val()=='xxx'){
						add_text(3);
					}
				$("#anak_perusahaan_kabupaten_text").val($('#anak_perusahaan_kabupaten').val());
/* 				var anak_perusahaan_kabupaten = $("#anak_perusahaan_kabupaten").val();
				if(!anak_perusahaan_kabupaten){	
						$('#induk_mitra_button').show();
						$('#anak_perusahaan_wilayah_button').show();
						$('#anak_perusahaan_kabupaten_button').show();
						$('#induk_mitra_button_add').hide();
						$('#anak_perusahaan_wilayah_button_add').hide();
						$('#anak_perusahaan_kabupaten_button_add').hide();
				}else{
						$('#induk_mitra_button').hide();
						$('#anak_perusahaan_wilayah_button').hide();
						$('#anak_perusahaan_kabupaten_button').hide();
						$('#induk_mitra_button_add').show();
						$('#anak_perusahaan_wilayah_button_add').show();
						$('#anak_perusahaan_kabupaten_button_add').show();					
				} */
			});		
			
	}

	function add_payroll(){
		var countpayroll = $("#countpayroll").val();
		addpayroll(countpayroll);
		$("#countpayroll").val(parseInt(countpayroll)+1);
	}
	function addpayroll(countpayroll){
			var html = '<div class="form-group no_rek_mitra'+countpayroll+'"><label class="col-md-4"></label><div class="col-md-6">' + 
						'<input class="form-control" name="no_rek_mitra'+countpayroll+'" id="no_rek_mitra'+countpayroll+'" value="" type="text"></div></div>' +
						'<div class="form-group no_cif_mitra'+countpayroll+'"><label class="col-md-4"></label><div class="col-md-6">' + 
						'<input class="form-control" name="no_cif_mitra'+countpayroll+'" id="no_cif_mitra'+countpayroll+'" value="" type="text"></div></div>' +
						'<div class="form-group payroll'+countpayroll+'">' +
						'<label class="col-md-4"></label><div class="col-md-6">' + 
						'<div class="col-md-3">'+
						'<input name="tipe_account'+countpayroll+'" value="gl" type="radio">GL' +
						'</div><div class="col-md-3">'+
						'<input name="tipe_account'+countpayroll+'" value="cl" type="radio">CL' +
						'</div><div class="col-md-3">'+
						'<input name="tipe_account'+countpayroll+'" value="sa" type="radio">SA' +
						'</div>'+
						'<input name="tipe_account'+countpayroll+'" value="cash" type="radio">CASH</div></div>';
			
			/* var html = '<label class="col-md-3 control-label">Pemeriksa'+countpemutus+'</label><div class="col-md-8">' + 
					   '<input type="text" class="form-control" name="pemeriksa'+countpemutus+'" id="pemeriksa'+countpemutus+'" value="">'+
					   '</div>'; */
			var div = document.createElement('div');
			div.className = 'form-horizontal';
			div.innerHTML = html;
			document.getElementById('div_tipe_account').appendChild(div);
	}
	
	function add_tgl_gajian(){
		var countgajian = $("#countgajian").val();
		addgajian(countgajian);
		$("#countgajian").val(parseInt(countgajian)+1);
	}
	function addgajian(countgajian){
			var html = '<div class="form-group tgl_gajian'+countgajian+'"><label class="col-md-4"></label><div class="col-md-6">' + 
						'<input class="form-control" name="tgl_gajian'+countgajian+'" id="tgl_gajian'+countgajian+'" value="" maxlength="16" type="text">' +
						'</div></div>';
			
			/* var html = '<label class="col-md-3 control-label">Pemeriksa'+countpemutus+'</label><div class="col-md-8">' + 
					   '<input type="text" class="form-control" name="pemeriksa'+countpemutus+'" id="pemeriksa'+countpemutus+'" value="">'+
					   '</div>'; */
			var div = document.createElement('div');
			div.className = 'form-horizontal';
			div.innerHTML = html;
			document.getElementById('div_tgl_gajian').appendChild(div);
			$('#tgl_gajian'+countgajian).datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
	}

		function backs_select(key){
		if(key=='0'){		
				$("#div_golongan_mitra_select").show();
				$("#div_golongan_mitra_text").hide();
				$("#div_induk_mitra_select").show();
				$("#div_induk_mitra_text").hide();
				$("#div_anak_perusahaan_wilayah_select").show();
				$("#div_anak_perusahaan_wilayah_text").hide();
				$("#div_anak_perusahaan_kabupaten_select").show();
				$("#div_anak_perusahaan_kabupaten_text").hide();
				
		}else if(key=='1'){			
				$("#div_golongan_mitra_select").show();
				$("#div_golongan_mitra_text").hide();
				$("#div_induk_mitra_select").show();
				$("#div_induk_mitra_text").hide();
				$("#div_anak_perusahaan_wilayah_select").show();
				$("#div_anak_perusahaan_wilayah_text").hide();
				$("#div_anak_perusahaan_kabupaten_select").show();
				$("#div_anak_perusahaan_kabupaten_text").hide();

		}else if(key=='2'){			
				$("#div_golongan_mitra_select").show();
				$("#div_golongan_mitra_text").hide();
				$("#div_induk_mitra_select").show();
				$("#div_induk_mitra_text").hide();
				$("#div_anak_perusahaan_wilayah_select").show();
				$("#div_anak_perusahaan_wilayah_text").hide();
				$("#div_anak_perusahaan_kabupaten_select").show();
				$("#div_anak_perusahaan_kabupaten_text").hide();

		}else if(key=='3'){
				$("#div_golongan_mitra_select").show();
				$("#div_golongan_mitra_text").hide();
				$("#div_induk_mitra_select").show();
				$("#div_induk_mitra_text").hide();
				$("#div_anak_perusahaan_wilayah_select").show();
				$("#div_anak_perusahaan_wilayah_text").hide();
				$("#div_anak_perusahaan_kabupaten_select").show();
				$("#div_anak_perusahaan_kabupaten_text").hide();
		}

		}
		function add_text(key){
			/* $("#golongan_mitra_text").val('');
			$("#induk_mitra_text").val('');
			$("#anak_perusahaan_wilayah_text").val('');
			$("#anak_perusahaan_kabupaten_text").val(''); */
		if(key=='0'){		
				$("#div_golongan_mitra_select").hide();
				$("#div_golongan_mitra_text").show();
				$("#div_induk_mitra_select").hide();
				$("#div_induk_mitra_text").show();
				$("#div_anak_perusahaan_wilayah_select").hide();
				$("#div_anak_perusahaan_wilayah_text").show();
				$("#div_anak_perusahaan_kabupaten_select").hide();
				$("#div_anak_perusahaan_kabupaten_text").show();
				document.getElementById("induk_mitra_text").readOnly = true; 
				document.getElementById("anak_perusahaan_wilayah_text").readOnly = true; 
				document.getElementById("anak_perusahaan_kabupaten_text").readOnly = true; 
				
		}else if(key=='1'){			
				$("#div_golongan_mitra_select").show();
				$("#div_golongan_mitra_text").hide();
				$("#div_induk_mitra_select").hide();
				$("#div_induk_mitra_text").show();
				$("#div_anak_perusahaan_wilayah_select").hide();
				$("#div_anak_perusahaan_wilayah_text").show();
				$("#div_anak_perusahaan_kabupaten_select").hide();
				$("#div_anak_perusahaan_kabupaten_text").show();
				document.getElementById("induk_mitra_text").readOnly = false; 
				document.getElementById("anak_perusahaan_wilayah_text").readOnly = true; 
				document.getElementById("anak_perusahaan_kabupaten_text").readOnly = true; 

		}else if(key=='2'){			
				$("#div_golongan_mitra_select").show();
				$("#div_golongan_mitra_text").hide();
				$("#div_induk_mitra_select").show();
				$("#div_induk_mitra_text").hide();
				$("#div_anak_perusahaan_wilayah_select").hide();
				$("#div_anak_perusahaan_wilayah_text").show();
				$("#div_anak_perusahaan_kabupaten_select").hide();
				$("#div_anak_perusahaan_kabupaten_text").show();
				document.getElementById("induk_mitra_text").readOnly = true; 
				document.getElementById("anak_perusahaan_wilayah_text").readOnly = false; 
				document.getElementById("anak_perusahaan_kabupaten_text").readOnly = true; 

		}else if(key=='3'){
				$("#div_golongan_mitra_select").show();
				$("#div_golongan_mitra_text").hide();
				$("#div_induk_mitra_select").show();
				$("#div_induk_mitra_text").hide();
				$("#div_anak_perusahaan_wilayah_select").show();
				$("#div_anak_perusahaan_wilayah_text").hide();
				$("#div_anak_perusahaan_kabupaten_select").hide();
				$("#div_anak_perusahaan_kabupaten_text").show();
				document.getElementById("induk_mitra_text").readOnly = true; 
				document.getElementById("anak_perusahaan_wilayah_text").readOnly = true; 
				document.getElementById("anak_perusahaan_kabupaten_text").readOnly = false; 
		}
	}
	
	
	
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


function add_mitra_detail_dasar(mitra_detail_dasar,id_detail){
	mitra_detail_dasar.push({
		"name" : "id",
		"value" : id_detail
	});
	var jenis_mitra = $("input:radio[name=jenis_mitra]:checked").val();
		mitra_detail_dasar.push({
			"name": "jenis_mitra",
			"value": jenis_mitra
		});
	mitra_detail_dasar.push({
		"name" : "golongan_mitra",
		"value" : golongan_mitra
	});
	mitra_detail_dasar.push({
		"name" : "induk_mitra",
		"value" : induk_mitra
	});
	mitra_detail_dasar.push({
		"name" : "anak_perusahaan_wilayah",
		"value" : anak_perusahaan_wilayah
	});
	mitra_detail_dasar.push({
		"name" : "anak_perusahaan_kabupaten",
		"value" : anak_perusahaan_kabupaten
	});
	mitra_detail_dasar.push({
		"name" : "alamat_mitra",
		"value" : alamat_mitra
	});
	mitra_detail_dasar.push({
		"name" : "no_telp_mitra",
		"value" : no_telp_mitra
	});
	mitra_detail_dasar.push({
		"name" : "id_mitra",
		"value" : id_mitra
	});
}

function add_mitra_detail_data(mitra_detail_data,id_detail){
	mitra_detail_dasar.push({
		"name" : "id",
		"value" : id_detail
	});
	mitra_detail_dasar.push({
		"name" : "deskripsi_mitra",
		"value" : deskripsi_mitra
	});
	mitra_detail_dasar.push({
		"name" : "hp_mitra",
		"value" : hp_mitra
	});
	mitra_detail_dasar.push({
		"name" : "bendaharawan_mitra",
		"value" : bendaharawan_mitra
	});
	mitra_detail_dasar.push({
		"name" : "telp_bendaharawan_mitra",
		"value" : telp_bendaharawan_mitra
	});
	mitra_detail_dasar.push({
		"name" : "hp_bendaharawan_mitra",
		"value" : hp_bendaharawan_mitra
	});
	mitra_detail_dasar.push({
		"name" : "email",
		"value" : email
	});
	mitra_detail_dasar.push({
		"name" : "jml_pegawai",
		"value" : jml_pegawai
	});
	mitra_detail_dasar.push({
		"name" : "thn_pegawai",
		"value" : thn_pegawai
	});
	mitra_detail_dasar.push({
		"name" : "tgl_pendirian",
		"value" : tgl_pendirian
	});
	mitra_detail_dasar.push({
		"name" : "akta_pendirian",
		"value" : akta_pendirian
	});
	mitra_detail_dasar.push({
		"name" : "akta_perubahan",
		"value" : akta_perubahan
	});
	mitra_detail_dasar.push({
		"name" : "npwp_usaha",
		"value" : npwp_usaha
	});
	var laporan_keuangan =  $('input[type=file]')[0].files[0];
	mitra_detail_dasar.push({
		"name" : "laporan_keuangan",
		"value" : laporan_keuangan
	});
	var legalitas_perusahaan  =  $('input[type=file]')[0].files[0];
	mitra_detail_dasar.push({
		"name" : "legalitas_perusahaan ",
		"value" : legalitas_perusahaan 
	});
	
}

$(document).on('click', "#btn-submits", function(){
	var id_detail = Date.now();
	var mitra_detail_dasar = [];
	var mitra_detail_data = [];
	var mitra_detail_fasilitas = [];
	var mitra_detail_fasilitas_perbankan = [];
	var mitra_detail_payroll = [];
	var mitra_pemutus = [];
	
	mitra_detail_dasar = add_mitra_detail_dasar(mitra_detail_dasar,id_detail);
	mitra_detail_data = add_mitra_detail_data(mitra_detail_data,id_detail);
	mitra_detail_fasilitas = add_mitra_detail_fasilitas(mitra_detail_fasilitas,id_detail);
	mitra_detail_payroll = add_mitra_detail_payroll(mitra_detail_payroll,id_detail);
	mitra_pemutus = add_mitra_pemutus(mitra_pemutus,id_detail);

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