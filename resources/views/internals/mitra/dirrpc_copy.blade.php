@section('title','My BRI - Daftar Profil Customer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
  
    <div class="content-page">
        <div class="content">
		{{ csrf_field() }}
		<form>
			<div class="row">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">DIR/RPC Kredit Briguna</h3>
                                </div>
								
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" >
                                                <div class="form-group gimmick_level">
                                                    <label class="col-md-4 control-label">Gimmick Program Level</label>
                                                    <div class="col-md-6">
												         <input type="text" class="form-control" name="gimmick_name" id="gimmick_name" value="" maxlength="16">
                                                    </div>
                                                </div>
												
                                                <div class="form-group mitra_kerjasama">
                                                    <label class="col-md-4 control-label">Mitra Kerjasama :</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="mitra_kerjasama" id="mitra_kerjasama">
                                                            <option value="Item1">Item1</option>
                                                            <option value="Item2">Item2</option>
                                                            <option value="Item3">Item3</option>
                                                            <option value="Item4">Item4</option>
                                                        </select>
													</div>
												</div>
                                                <div class="form-group mitra_kerjasama">
                                                    <label class="col-md-4 control-label">Kantor Wilayah :</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="kantor_wilayah" id="kantor_wilayah">
                                                            <option value="Item1">Item1</option>
                                                            <option value="Item2">Item2</option>
                                                            <option value="Item3">Item3</option>
                                                            <option value="Item4">Item4</option>
                                                        </select>
													</div>
												</div>
                                                <div class="form-group mitra_kerjasama">
                                                    <label class="col-md-4 control-label">Kantor Cabang :</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="kantor_cabang" id="kantor_cabang">
                                                            <option value="Item1">Item1</option>
                                                            <option value="Item2">Item2</option>
                                                            <option value="Item3">Item3</option>
                                                            <option value="Item4">Item4</option>
                                                        </select>
													</div>
												</div>
                                                <div class="form-group mitra_kerjasama">
												<label class="col-md-10 control-label"></label>
                                                    <div class="col-md-2">
                                             			<button type="button" class="btn btn-success waves-light waves-effect w-md" data-toggle="modal" id="btn-download" name="btn-download"><i class="mdi mdi-download"></i>Unduh </button>
													</div>
												</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal" >
											</div>
                                    </div>
                                </div>
									<div class="row">
										
									</div>
									
								</div>
                        
						</div>
                    </div>

			</div>
			<div class="row">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Suku Bunga Kredit Bunga</h3>
                                </div>
			                        <div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-horizontal" >
													<div class="form-group first_month {!! $errors->has('first_month') ? 'has-error' : '' !!}">
														<label class="col-md-1 control-label">Bulan Awal :</label>
														<div class="col-md-11">
															<input type="text" class="form-control numericOnly" name="first_month" id="first_month" value="1" readonly maxlength="16">
															@if ($errors->has('first_month')) <p class="help-block">{{ $errors->first('first_month') }}</p> @endif
														</div>
													</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-horizontal" >
													<div class="form-group last_month {!! $errors->has('last_month') ? 'has-error' : '' !!}">
														<label class="col-md-1 control-label">Bulan Akhir :</label>
														<div class="col-md-11">
															<input type="text" class="form-control numericOnly" name="last_month" id="last_month" value="1" readonly maxlength="16">
															@if ($errors->has('last_month')) <p class="help-block">{{ $errors->first('last_month') }}</p> @endif
														</div>
													</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-horizontal" >
											
											
											
												<div class="form-group suku_bunga">
                                                    <label class="col-md-1 control-label">Suku Bunga</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="suku_bunga" id="suku_bunga">
                                                            <option disabled="" value="" selected="">-- Pilih --</option>
                                                            <option value="Efektif">Efektif</option>
                                                            <option value="EfektifAnuitas">EfektifAnuitas</option>
                                                            <option value="Flat">Flat</option>
                                                        </select>
													</div>
													<div class="col-md-2">
															<input type="number" onchange="validasi_desimal(#persen_bunga)" class="form-control numericOnly"
															 onkeypress="event.charCode == 46 || event.charCode == 0"
															name="persen_bunga" id="persen_bunga" step="0.01">
													</div>
													<div class="col-md-1">
															<label>%</label>
													</div>
                                                </div>
											</div>
										</div>
									</div>		
										
									</div>
							</div>
					</div>
			</div>
			<div class="row">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pemeriksa / Pemutus</h3>
                                </div>
			                        <div class="panel-body">
									<div class="row">
										
                                        <div class="col-md-5">
                                            <div class="form-horizontal" id="div_pemutus">
                                                <div class="form-group pemutus_name">
                                                    <label class="col-md-3 control-label">Pemutus (PN/Nama) :</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="pemutus_name" id="pemutus_name" value="{{ old('pemutus_name') }}" maxlength="16">
														<input type="hidden" class="form-control" name="countpemutus" id="countpemutus" value="1" maxlength="16">
                                                    </div>
                                                </div>
											</div>
										</div>
										<div class="col-md-1">
                                            <div class="form-horizontal" >
                                                <div class="form-group button">
                                                    <div class="col-md-1">
														<button type="button" onclick="addinput()" class="btn btn-orange waves-light waves-effect w-md m-b-10" data-toggle="modal" id="btn-tambah"><i class="mdi mdi-plus"></i> </button>
													</div>
                                                </div>
											</div>
										</div>
										<div class="col-md-6">
                                            <div class="form-horizontal" id="div_jabatan">
                                                <div class="form-group jabatan">
                                                    <label class="col-md-5 control-label">Jabatan Pemutus :</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" maxlength="16">
                                                    </div>
                                                </div>
                                             </div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group submit3">
                                                <label class="col-md-6 control-label">
												</label>
                                            </div>
										</div>
										
										<div class="col-lg-6">
											<div class="form-group submit3">
													<div class="col-md-2">                               
														<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-download" name="btn-download"><i class="mdi mdi-download"></i>Unduh </button>
													</div>
													<div class="col-md-2">                               
														<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-print" name="btn-print"><i class="mdi mdi-printer"></i>Print </button>
													</div>
													<div class="col-md-2">                               
														<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save" name="btn-save"><i class="mdi mdi-content-save"></i>Simpan </button>
													</div>
                                            </div>
										</div>
										
									</div>
									
									<div class="row">
									<div class="col-lg-6">
											<div class="form-group submit3">
                                                <label class="col-md-6 control-label">
												Catatan :
												</label>
                                            </div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group submit3">
												<label class="col-md-6 control-label">
												Input pemeriksa terakhir sebagai Pemutus/Signer
												</label>
                                            </div>
										</div>
										
									</div>
									
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group submit3">
												<label class="col-md-6 control-label">
												Hanya pekerja yang berstatus sebagai pekerja tetap saja yang boleh dijadikan pemeriksa/pemutus
												</label>
                                            </div>
										</div>
										
									</div>
									</div>
							</div>
					</div>
			</div>
		</form>
		</div>
	</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot') 
<script type="text/javascript">
	function radio_mitra_kerjasama(){
		 $('#mitra_kerjasama option').prop('selected', true);
	}
	function disable_radio(){
		$('#mitra_kerjasama_radio').prop('checked', false);
	}
	function radio_mitra_kerjasama2(){
		 $('#mitra_kerjasama2 option').prop('selected', true);
	}
	function disable_radio2(){
		$('#mitra_kerjasama_radio2').prop('checked', false);
	}
	function radio_mitra_kerjasama3(){
		 $('#mitra_kerjasama3 option').prop('selected', true);
	}
	function disable_radio3(){
		$('#mitra_kerjasama_radio3').prop('checked', false);
	}
	function radio_mitra_kerjasama4(){
		 $('#mitra_kerjasama4 option').prop('selected', true);
	}
	function disable_radio4(){
		$('#mitra_kerjasama_radio4').prop('checked', false);
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
	function validasi_bulan_first(){
		var waktu_minimum = $("#waktu_minimum").val();
		var waktu_maksimum = $("#waktu_maksimum").val();
			if(waktu_maksimum==''){
				alert('Mohon isi Jangka Waktu Maksimum');
				$("#first_month").val('0');
				$("#last_month").val('0');
			}
			if(waktu_minimum==''){
				alert('Mohon isi Jangka Waktu Minimum');
				$("#first_month").val('0');
				$("#last_month").val('0');
			}
	}
	function validasi_bulan(){

		var waktu_maksimum = $("#waktu_maksimum").val();
		var last_month = $("#last_month").val();
		$("#last_month").val(waktu_maksimum);
	}
	function validasi_bulan_last(){
		var waktu_minimum = $("#waktu_minimum").val();
		var waktu_maksimum = $("#waktu_maksimum").val();
		
		var last_month = $("#last_month").val();
		var first_month = $("#first_month").val();
		var selisihbulan = parseInt(last_month) - parseInt(first_month);
			if(parseInt(last_month)<parseInt(first_month)){
				alert('Bulan Akhir harus lebih besar daripada bulan awal');
				$("#first_month").val('0');
				$("#last_month").val('0');
			}
			if(parseInt(selisihbulan)>=parseInt(waktu_maksimum) || parseInt(selisihbulan)<=parseInt(waktu_minimum)){
				alert('Jangka Waktu Bulan Tidak sesuai, mohon periksa kembali');
				$("#first_month").val('0');
				$("#last_month").val('0');
			}
			if(waktu_maksimum==''){
				alert('Mohon isi Jangka Waktu Maksimum');
				$("#first_month").val('0');
				$("#last_month").val('0');
			}
			if(waktu_minimum==''){
				alert('Mohon isi Jangka Waktu Minimum');
				$("#first_month").val('0');
				$("#last_month").val('0');
			}
		
		
	}
	function area_level_nasional(){
		document.getElementById('area_level_div').innerHTML = "";
			var html = '<label class="col-md-3 control-label">Area level Nasional :</label>' + 
					   '<div class="col-md-9">' +
					   '<select class="form-control" multiple="multiple" name="area_level_dropdown" id="area_level_dropdown">' +
					   '<option value="Nasional1" selected="">Nasional1</option>' +
					   '<option value="Nasional2">Nasional2</option>' +
					   '<option value="Nasional3">Nasional3</option>' +
					   '<option value="Nasional4">Nasional4</option>' +
					   '</select>' +
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group mitra_kerjasama_nasional';
			div.innerHTML = html;
			document.getElementById('area_level_div').appendChild(div);

	}
	function area_level_kantorcabang(){
		document.getElementById('area_level_div').innerHTML = "";
			var html = '<label class="col-md-3 control-label">Area Level Cabang :</label>' + 
					   '<div class="col-md-9">' +
					   '<select class="form-control" multiple="multiple" name="area_level_dropdown" id="area_level_dropdown">' +
					   '<option value="Cabang1" selected="">Cabang1</option>' +
					   '<option value="Cabang2">Cabang2</option>' +
					   '<option value="Cabang3">Cabang3</option>' +
					   '<option value="Cabang4">Cabang4</option>' +
					   '</select>' +
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group mitra_kerjasama_cabang';
			div.innerHTML = html;
			document.getElementById('area_level_div').appendChild(div);

	}
	function area_level_kantorwilayah(){
		document.getElementById('area_level_div').innerHTML = "";
			var html = '<label class="col-md-3 control-label">Area Level Wilayah :</label>' + 
					   '<div class="col-md-9">' +
					   '<select class="form-control" multiple="multiple" name="area_level_dropdown" id="area_level_dropdown">' +
					   '<option value="Wilayah1" selected="">Wilayah1</option>' +
					   '<option value="Wilayah2">Wilayah2</option>' +
					   '<option value="Wilayah3">Wilayah3</option>' +
					   '<option value="Wilayah4">Wilayah4</option>' +
					   '</select>' +
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group mitra_kerjasama_cabang';
			div.innerHTML = html;
			document.getElementById('area_level_div').appendChild(div);
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
	function addjabatan(countpemutus){
			var html = '<label class="col-md-5 control-label">Jabatan Pemeriksa'+countpemutus+'</label><div class="col-md-7">' + 
					   '<input type="text" class="form-control" name="jabatan'+countpemutus+'" id="jabatan'+countpemutus+'" value="" maxlength="16">'+
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group jabatan'+countpemutus;
			div.innerHTML = html;
			document.getElementById('div_jabatan').appendChild(div);
	}
	function selectvalue(formarray){
		var area_level = document.getElementById("area_level_dropdown");
//		var area_level_value = area_level.options[area_level.selectedIndex].value;
		var area_level_value = $('#area_level_dropdown').val();
		formarray.push({
			"name": "area_level",
			"value": area_level_value
		});
		var mitra_kerjasama = document.getElementById("mitra_kerjasama");
//		var mitra_kerjasama_value = mitra_kerjasama.options[mitra_kerjasama.selectedIndex].value;
		var mitra_kerjasama_value = $('#mitra_kerjasama').val();
		formarray.push({
			"name": "mitra_kerjasama",
			"value": mitra_kerjasama_value
		});
		var mitra_kerjasama2 = document.getElementById("mitra_kerjasama2");
//		var mitra_kerjasama_value2 = mitra_kerjasama2.options[mitra_kerjasama2.selectedIndex].value;
		var mitra_kerjasama_value2 = $('#mitra_kerjasama2').val();
		formarray.push({
			"name": "mitra_kerjasama2",
			"value": mitra_kerjasama_value2
		});
		var mitra_kerjasama3 = document.getElementById("mitra_kerjasama3");
//		var mitra_kerjasama_value3 = mitra_kerjasama3.options[mitra_kerjasama3.selectedIndex].value;
		var mitra_kerjasama_value3 = $('#mitra_kerjasama3').val();
		formarray.push({
			"name": "mitra_kerjasama3",
			"value": mitra_kerjasama_value3
		});
		
		var mitra_kerjasama4 = document.getElementById("mitra_kerjasama4");
//		var mitra_kerjasama_value4 = mitra_kerjasama4.options[mitra_kerjasama4.selectedIndex].value;
		var mitra_kerjasama_value4 = $('#mitra_kerjasama4').val();
		formarray.push({
			"name": "mitra_kerjasama4",
			"value": mitra_kerjasama_value4
		});
		
		var dir_rpc = document.getElementById("dir_rpc");
		var dir_rpc_value = dir_rpc.options[dir_rpc.selectedIndex].value;
		formarray.push({
			"name": "dir_rpc",
			"value": dir_rpc_value
		});
		
		var asuransi_jiwa = document.getElementById("asuransi_jiwa");
		var asuransi_jiwa_value = asuransi_jiwa.options[asuransi_jiwa.selectedIndex].value;
		formarray.push({
			"name": "asuransi_jiwa",
			"value": asuransi_jiwa_value
		});
		
		var suku_bunga = document.getElementById("suku_bunga");
		var suku_bunga_value = suku_bunga.options[suku_bunga.selectedIndex].value;
		formarray.push({
			"name": "suku_bunga",
			"value": suku_bunga_value
		});
		return formarray;
	}
	
	function radio(formarray){
/* 		var area_level = $("input:radio[name=area_level]:checked").val();
		formarray.push({
			"name": "area_level",
			"value": area_level
		}); */
		var segmen_level = $("input:radio[name=segmen_level]:checked").val();
		formarray.push({
			"name": "segmen_level",
			"value": segmen_level
		});
/* 		var mitra_kerjasama_radio = $("input:radio[name=mitra_kerjasama_radio]:checked").val();
		formarray.push({
			"name": "mitra_kerjasama_radio",
			"value": mitra_kerjasama_radio
		});
		var mitra_kerjasama_radio2 = $("input:radio[name=mitra_kerjasama_radio2]:checked").val();
		formarray.push({
			"name": "mitra_kerjasama_radio2",
			"value": mitra_kerjasama_radio2
		});
		var mitra_kerjasama_radio3 = $("input:radio[name=mitra_kerjasama_radio3]:checked").val();
		formarray.push({
			"name": "mitra_kerjasama_radio3",
			"value": mitra_kerjasama_radio3
		});
		var mitra_kerjasama_radio4 = $("input:radio[name=mitra_kerjasama_radio4]:checked").val();
		formarray.push({
			"name": "mitra_kerjasama_radio4",
			"value": mitra_kerjasama_radio4
		}); */
		var payroll = $("input:radio[name=payroll]:checked").val();
		formarray.push({
			"name": "payroll",
			"value": payroll
		});
		return formarray;
	}
	 function OpenWindowWithPost(url, windowoption, name, params)
   {
            var form = document.createElement("form");
            form.setAttribute("method", "get");
            form.setAttribute("action", url);
            form.setAttribute("target", name);

             for (var i in params) {
                if (params.hasOwnProperty(i)) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = params[i].name;
                    input.value = params[i].value;
                    form.appendChild(input);
                }
            }
            
            document.body.appendChild(form);
            
            //note I am using a post.htm page since I did not want to make double request to the page 
           //it might have some Page_Load call which might screw things up.
            window.open("post.htm", name, windowoption);
            
            form.submit();
            
            document.body.removeChild(form); 
    }
	$(document).on('click', "#btn-download", function(){
		var formarray = $( ":input" ).serializeArray();
		formarray = selectvalue(formarray);
		formarray = radio(formarray);
		formarray.push({
			"name": "action",
			"value": 'unduh'
		});
		
//		var dataform = JSON.stringify(formarray);
 OpenWindowWithPost("GimmickStore", "", 
      "GimmickStore", formarray);	
//		unduhform(formarray);
        /* var arrayform = getarrayserial(formarray);
		alert(JSON.stringify(arrayform)); */
    })

	$(document).on('click', "#btn-print", function(){
		var formarray = $( ":input" ).serializeArray();
		formarray = selectvalue(formarray);
		formarray = radio(formarray);
		formarray.push({
			"name": "action",
			"value": 'print'
		});
 OpenWindowWithPost("GimmickStore", "", 
      "GimmickStore", formarray);	
    })
	$(document).on('click', "#btn-save", function(){
		var formarray = $( ":input" ).serializeArray();
		formarray = selectvalue(formarray);
		formarray = radio(formarray);
		sentform(formarray);
        /* var arrayform = getarrayserial(formarray);
		alert(JSON.stringify(arrayform)); */
    })
	function getarrayserial(formarray){
		var array= [];
		formarray.forEach(function(form) {
			alert(form.name);
			array[form.name] = form.value;
			alert(array);
		});
		return array;
	}
	   function sentform(formdata)
    {
		var dataform = JSON.stringify(formdata);
		var k = 'm:m';
		  $.ajax({
		type: 'GET',
		url: 'GimmickStore',
		data: $.param(formdata),
		contentType: "application/json",
		dataType: "json",
		success: function(data) {
		 console.log("Data added!", data);
		}
		});
	}

		   function unduhform(formdata)
    {
		var dataform = JSON.stringify(formdata);
		var k = 'm:m';
		   new AjaxDownloadFile({
		type: 'GET',
		url: 'GimmickStore',
		data: $.param(formdata),
		contentType: "application/json",
		dataType: "json",
		success: function(data) {
		 console.log("Data added!", data);
		}
		});
	}

var AjaxDownloadFile = function (configurationSettings) {
    // Standard settings.
    this.settings = {
        // JQuery AJAX default attributes.
        url: "",
        type: "POST",
        headers: {
            "Content-Type": "application/json; charset=UTF-8"
        },
        data: {},
        // Custom events.
        onSuccessStart: function (response, status, xhr, self) {
        },
        onSuccessFinish: function (response, status, xhr, self, filename) {
        },
        onErrorOccured: function (response, status, xhr, self) {
        }
    };
    this.download = function () {
        var self = this;
        $.ajax({
            type: this.settings.type,
            url: this.settings.url,
            headers: this.settings.headers,
            data: this.settings.data,
            success: function (response, status, xhr) {
                // Start custom event.
                self.settings.onSuccessStart(response, status, xhr, self);

                // Check if a filename is existing on the response headers.
                var filename = "";
                var disposition = xhr.getResponseHeader("Content-Disposition");
                if (disposition && disposition.indexOf("attachment") !== -1) {
                    var filenameRegex = /filename[^;=\n]*=(([""]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1])
                        filename = matches[1].replace(/[""]/g, "");
                }

                var type = xhr.getResponseHeader("Content-Type");
                var blob = new Blob([response], {type: type});

                if (typeof window.navigator.msSaveBlob !== "undefined") {
                    // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed.
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    var URL = window.URL || window.webkitURL;
                    var downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                        // Use HTML5 a[download] attribute to specify filename.
                        var a = document.createElement("a");
                        // Safari doesn"t support this yet.
                        if (typeof a.download === "undefined") {
                            window.location = downloadUrl;
                        } else {
                            a.href = downloadUrl;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                        }
                    } else {
                        window.location = downloadUrl;
                    }

                    setTimeout(function () {
                        URL.revokeObjectURL(downloadUrl);
                    }, 100); // Cleanup
                }

                // Final custom event.
                self.settings.onSuccessFinish(response, status, xhr, self, filename);
            },
            error: function (response, status, xhr) {
                // Custom event to handle the error.
                self.settings.onErrorOccured(response, status, xhr, self);
            }
        });
    };
    // Constructor.
    {
        // Merge settings.
        $.extend(this.settings, configurationSettings);
        // Make the request.
        this.download();
    }
};
		    
</script>

