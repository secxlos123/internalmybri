@section('title','My BRI - Daftar Profil Customer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
  

        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/selectevan.min.css')}}">

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
                                    <h3 class="panel-title">Gimmick Kredit Briguna</h3>
                                </div>
								
                                <div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-horizontal" >
													<div class="form-group gimmick_name {!! $errors->has('gimmick_name') ? 'has-error' : '' !!}">
														<label class="col-md-2 control-label">Nama Gimmick Program * :</label>
														<div class="col-lg-10">
															<input type="text" class="form-control" name="gimmick_name" id="gimmick_name" value="{{ old('gimmick_name') }}">
															@if ($errors->has('gimmick_name')) <p class="help-block">{{ $errors->first('gimmick_name') }}</p> @endif
														</div>
														
													</div>
											</div>
										</div>
									</div>
									<br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" >
                                                <div class="form-group gimmick_level">
                                                    <label class="col-md-4 control-label">Gimmick Program Level</label>
                                                    <div class="col-md-8">
                                                    </div>
                                                </div>
												<div class="form-group nasional">
													<label class="col-md-3 control-label">Area level Nasional :</label> 
													<div class="col-md-9">
														<div class="col-md-7">
															<select class="form-control" multiple name="area_level_nasional_dropdown" id="area_level_nasional_dropdown">
															</select>
														</div>
														<div class="col-md-2">
															<input type="checkbox" id="area_level_dropdown_nasional_checks" name="area_level_dropdown_nasional_checks">All
														</div>
													</div>
												</div>
												<div class="form-group nasional">
													<label class="col-md-3 control-label">Area level Kanwil :</label> 
													<div class="col-md-9">
														<div class="col-md-7">
															<select class="form-control" multiple name="area_level_kanwil_dropdown" id="area_level_kanwil_dropdown">
															</select>
														</div>
														<div class="col-md-2">
															<input type="checkbox" id="area_level_dropdown_kanwil_checks" name="area_level_dropdown_kanwil_checks">All
														</div>
													</div>
												</div>
												<div class="form-group nasional">
													<label class="col-md-3 control-label">Area level Kanca :</label> 
													<div class="col-md-9">
														<div class="col-md-7">
															<select class="form-control" multiple name="area_level_kanca_dropdown" id="area_level_kanca_dropdown">
															</select>
														</div>
														<div class="col-md-2">
															<input type="checkbox" id="area_level_dropdown_kanca_checks" name="area_level_dropdown_kanca_checks">All
														</div>
													</div>
												</div>
												<div class="form-group nasional">
													<label class="col-md-3 control-label">Area level Uker :</label> 
													<div class="col-md-9">
														<div class="col-md-7">
															<select class="form-control" multiple name="area_level_uker_dropdown" id="area_level_uker_dropdown">
															</select>
														</div>
														<div class="col-md-2">
															<input type="checkbox" id="area_level_dropdown_uker_checks" name="area_level_dropdown_uker_checks">All
														</div>
													</div>
												</div>
                                                <!--<div class="form-group area_level">
                                                    <label class="col-md-3 control-label">Area Level :</label>
                                                    <div class="col-md-9">
													   <input type="radio" id="area_level" onclick="area_level_nasional()"
															   name="area_level" value="Nasional">
														<label for="area_level">Nasional</label>
													   <input type="radio" id="area_level" onclick="area_level_kantorwilayah()"
															   name="area_level" value="Kantor_Wilayah">
														<label for="area_level">Kantor Wilayah</label>
													   <input type="radio" id="area_level" onclick="area_level_kantorcabang()"
															   name="area_level" value="Cabang">
														<label for="area_level">Kantor Cabang</label>
														 <input type="radio" id="area_level" onclick="area_level_unitkerja()"
															   name="area_level" value="Unit_Kerja">
														<label for="area_level">Unit Kerja</label>
                                                    </div>
                                                </div>-->
												<div id="area_level_div"></div>
                                                <div class="form-group segmen_level">
                                                    <label class="col-md-3 control-label">Segmen Level :</label>
                                                    <div class="col-md-9">
													   <input type="radio" id="segmen_level"
															   name="segmen_level" value="Ritel">
														<label for="segmen_level">Ritel</label>
													   <input type="radio" id="segmen_level2"
															   name="segmen_level" value="Mikro">
														<label for="segmen_level">Mikro</label>
													   <input type="radio" id="segmen_level"
															   name="segmen_level" value="All">
														<label for="segmen_level">All</label>
                                                    </div>
                                                </div>
                                                <div class="form-group mitra_kerjasama">
                                                    <label class="col-md-3 control-label">Mitra Kerjasama :</label>
                                                    <div class="col-md-7">
                                                       <!-- <select class="form-control" multiple="multiple" onchange="disable_radio()" name="mitra_kerjasama" id="mitra_kerjasama">-->
													    <select class="form-control" multiple name="mitra_kerjasama" id="mitra_kerjasama">
                                                            <option value="Item1">Item1</option>
                                                            <option value="Item2">Item2</option>
                                                            <option value="Item3">Item3</option>
                                                            <option value="Item4">Item4</option>
                                                        </select>
													</div>
													<div class="col-md-2"> 
														<input type="checkbox" id="mitra_kerjasama_radio"
															   name="mitra_kerjasama_radio">All
															   
														<!--<input type="radio" id="mitra_kerjasama_radio"
															   name="mitra_kerjasama_radio" value="All" onclick="radio_mitra_kerjasama()">
														<label for="mitra_kerjasama_radio">All</label>-->
                                                    </div>
                                                </div>
                                                <div class="form-group mitra_kerjasama2">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-7">
                                                       <!-- <select class="form-control" multiple name="mitra_kerjasama2" onchange="disable_radio2()" id="mitra_kerjasama2">-->
													   <select class="form-control" multiple name="mitra_kerjasama2" id="mitra_kerjasama2">
                                                            <option value="Item1" >Item1</option>
                                                            <option value="Item2">Item2</option>
                                                            <option value="Item3">Item3</option>
                                                            <option value="Item4">Item4</option>
                                                        </select>
													</div>
													<div class="col-md-2">
														<input type="checkbox" id="mitra_kerjasama_radio2"
															   name="mitra_kerjasama_radio2">All
														<!--<input type="radio" id="mitra_kerjasama_radio2"
															   name="mitra_kerjasama_radio2" value="All" onclick="radio_mitra_kerjasama2()">
														<label for="mitra_kerjasama_radio2">All</label>-->
                                                    </div>
                                                </div>
                                                <div class="form-group mitra_kerjasama3">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-7">
                                                        <!--<select class="form-control" multiple name="mitra_kerjasama3" onchange="disable_radio3()" id="mitra_kerjasama3">-->
														<select class="form-control" multiple name="mitra_kerjasama3" id="mitra_kerjasama3">
                                                            <option value="Item1">Item1</option>
                                                            <option value="Item2">Item2</option>
                                                            <option value="Item3">Item3</option>
                                                            <option value="Item4">Item4</option>
                                                        </select>
													</div>
													<div class="col-md-2">
														<input type="checkbox" id="mitra_kerjasama_radio3"
															   name="mitra_kerjasama_radio3">All
														<!--<input type="radio" id="mitra_kerjasama_radio3"
															   name="mitra_kerjasama_radio3" value="All" onclick="radio_mitra_kerjasama3()">
														<label for="mitra_kerjasama_radio3">All</label>-->
                                                    </div>
                                                </div>
                                                <div class="form-group mitra_kerjasama4">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-7">
                                                       <!-- <select class="form-control" multiple name="mitra_kerjasama4"  onchange="disable_radio4()" id="mitra_kerjasama4">-->
													   <select class="form-control" multiple name="mitra_kerjasama4" id="mitra_kerjasama4">
                                                            <option value="Item1">Item1</option>
                                                            <option value="Item2">Item2</option>
                                                            <option value="Item3">Item3</option>
                                                            <option value="Item4">Item4</option>
                                                        </select>
													</div>
													<div class="col-md-2">
														<input type="checkbox" id="mitra_kerjasama_radio4"
															   name="mitra_kerjasama_radio4">All
														<!--<input type="radio" id="mitra_kerjasama_radio4"
															   name="mitra_kerjasama_radio4" value="All" onclick="radio_mitra_kerjasama4()">
														<label for="mitra_kerjasama_radio4">All</label>-->
                                                    </div>
                                                </div>	
												<div class="form-group suku_bunga">
                                                    <label class="col-md-3 control-label">Suku Bunga</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control" name="suku_bunga" id="suku_bunga">
                                                            <option disabled="" value="" selected="">-- Pilih --</option>
                                                            <option value="Efektif">Efektif</option>
                                                            <option value="EfektifAnuitas">EfektifAnuitas</option>
                                                            <option value="Flat">Flat</option>
                                                        </select>
													</div>
												</div>	
											</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal" >
											
                                                <div class="form-group tgl_mulai">
                                                    <label class="col-md-5 control-label">Tanggal mulai gimmick :</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="datepicker-date-evan form-control" name="tgl_mulai" id="tgl_mulai" value="{{ old('tgl_mulai') }}" maxlength="16">
                                                    </div>
                                                </div>
										        <div class="form-group tgl_berakhir">
                                                    <label class="col-md-5 control-label">Tanggal berakhir gimmick :</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="datepicker-date-evan form-control" name="tgl_berakhir" id="tgl_berakhir" value="{{ old('tgl_berakhir') }}" maxlength="16">
                                                    </div>
                                                </div> 
												<div class="form-group payroll">
                                                    <label class="col-md-5 control-label">Payroll :</label>
                                                    <div class="col-md-7">
													
													<select class="form-control" multiple name="payroll" id="payroll">' +
														   <option value="bank bri" >BANK BRI</option>
														   <option value="bank lainnya">BANK LAINNYA</option>
														   <option value="partial bakn">PARTIAL BANK</option>
												   </select>
													  <!-- <input type="radio" id="payroll"
															   name="payroll" value="BANK BRI">
														<label for="payroll"></label>
													   <input type="radio" id="payroll"
															   name="payroll" value="BANK LAINNYA">
														<label for="payroll">BANK LAINNYA</label>
													   <input type="radio" id="payroll"
															   name="payroll" value="PARTIAL BANK">
														<label for="payroll">PARTIAL BANK</label>-->
														
													<div class="col-md-2">
														<input type="checkbox" id="payroll_radio"
															   name="payroll_radio">All
														<!--<input type="radio" id="mitra_kerjasama_radio3"
															   name="mitra_kerjasama_radio3" value="All" onclick="radio_mitra_kerjasama3()">
														<label for="mitra_kerjasama_radio3">All</label>-->
                                                    </div>
                                                    </div>
                                                </div>
                                            
                                               
                                                <div class="form-group admin_minimum">
                                                    <label class="col-md-5 control-label">Admin Minimum (Rp.) :</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control numericOnly" name="admin_minimum" id="admin_minimum" value="{{ old('admin_minimum') }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group provisi_fee">
                                                    <label class="col-md-5 control-label">Provisi fee (%) :</label>
                                                    <div class="col-md-7">
                                                        <input type="number" onchange="validasi_desimal(#provisi_fee)"
														 onkeypress="event.charCode == 46 || event.charCode == 0"  step="0.01"
														class="form-control numericOnly" name="provisi_fee" id="provisi_fee" 
														value="{{ old('provisi_fee') }}">
													</div>
                                                </div>
												
                                                <!--<div class="form-group waktu_minimum">
                                                    <label class="col-md-5 control-label">Jangka Waktu Minimum :</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control numericOnly" name="waktu_minimum" id="waktu_minimum" value="{{ old('waktu_minimum') }}">
                                                    </div>
													<div class="col-md-2">
														<label>BULAN</label>
                                                    </div>
                                                </div>
                                                <div class="form-group waktu_maksimum">
                                                    <label class="col-md-5 control-label">Jangka Waktu Maksimum :</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control numericOnly" name="waktu_maksimum" id="waktu_maksimum" value="{{ old('waktu_maksimum') }}" onchange="validasi_bulan()">
                                                    </div>
													<div class="col-md-2">
														<label>BULAN</label>
                                                    </div>
                                                </div>-->
												<div class="form-group dir_rpc">
                                                    <label class="col-md-5 control-label">DIR / RPC % :</label>
                                                    <div class="col-md-7">
													<!--<input type="text" class="form-control" name="dir_rpc" id="dir_rpc" value=""/>-->
													
                                                       <select class="form-control" name="dir_rpc" id="dir_rpc">
													    <option disabled selected> -- select an option -- </option>
																@if($dir_rpc!='')
																@foreach($dir_rpc as $dir)
																<option value="{{$dir['no']}}">
																	{{$dir['debt_name']}}
																</option>
																@endforeach
																@endif
														</select>
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
                                    <h3 class="panel-title">Suku Bunga Kredit Bunga</h3>
                                </div>
			                        <div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-horizontal" >
													<div class="form-group first_month {!! $errors->has('first_month') ? 'has-error' : '' !!}">
														<label class="col-md-1 control-label">Bulan Awal :</label>
														<div class="col-md-5">
															<input type="text" class="form-control numericOnly" name="first_month" id="first_month" value="1">
															@if ($errors->has('first_month')) <p class="help-block">{{ $errors->first('first_month') }}</p> @endif
														</div>
														<label class="col-md-1 control-label">Bulan Akhir :</label>
														<div class="col-md-5">
															<input type="text" class="form-control numericOnly" name="last_month" id="last_month" value="1" maxlength="16">
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
                                                    <label class="col-md-1 control-label">Persentase Bunga</label>
													<div class="col-md-3">
															<input type="number" onchange="validasi_desimal(#persen_bunga)" class="form-control numericOnly"
															 onkeypress="event.charCode == 46 || event.charCode == 0"
															name="persen_bunga" id="persen_bunga" step="0.01">
													</div>
													<div class="col-md-1">
															<label>%</label>
													</div>
													<div class="col-md-1">
														<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-10" data-toggle="modal" name="btn-add" id="btn-add"><i class="mdi mdi-plus"></i> </button>
													</div>
													<div class="col-md-1">
														<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-10" data-toggle="modal" onclick="btn_hapus()" name="hapus" id="hapus">Hapus</button>
													</div>
                                                </div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-horizontal" >
												<table id="datatable" name="datatable" class="display" width="100%" cellspacing="0">
													<thead>
														<tr>
															<th>Bulan Awal</th>
															<th>Bulan Akhir</th>
															<th>Persen Bunga</th>
														</tr>
													</thead>
												</table>
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
                                            <div class="form-horizontal">
                                                <div class="form-group" id="div_pemutus">
                                                </div>
											</div>
										</div>
										<div class="col-md-1">
                                            <div class="form-horizontal" >
                                                <div class="form-group button">
                                                    <div class="col-md-1">
													</div>
                                                </div>
											</div>
										</div>
										<div class="col-md-6">
                                            <div class="form-horizontal" >
                                                <div class="form-group" id="div_jabatan">
                                                </div>
                                             </div>
										</div>
									</div>
	
									<div class="row">
										
                                        <div class="col-md-5">
                                            <div class="form-horizontal">
                                                <div class="form-group pemutus_name">
                                                    <label class="col-md-3 control-label">Pemutus (PN/Nama) :</label>
                                                    <div class="col-md-8">
													<select class="form-control" name="pemutus_name" id="pemutus_name">' +
														   <option value="Signer1" >Signer1</option>
														   <option value="Signer2">Signer2</option>
														   <option value="Signer3">Signer3</option>
														   <option value="Signer4">Signer4</option>
												   </select>
                                                        <!--<input type="text" class="form-control" name="pemutus_name" id="pemutus_name" value="{{ old('pemutus_name') }}" >-->
														<input type="hidden" class="form-control" name="countpemutus" id="countpemutus" value="1">
                                                    </div>
                                                </div>
											</div>
										</div>
										<div class="col-md-1">
                                            <!--<div class="form-horizontal" >
                                                <div class="form-group button">
                                                    <div class="col-md-1">
														<button type="button" onclick="addinput()" class="btn btn-orange waves-light waves-effect w-md m-b-10" data-toggle="modal" id="btn-tambah"><i class="mdi mdi-plus"></i> </button>
													</div>
                                                </div>
											</div>-->
										</div>
										<div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group jabatan">
                                                    <label class="col-md-5 control-label">Jabatan Pemutus :</label>
                                                    <div class="col-md-7">
													<select class="form-control" name="jabatan" id="jabatan">' +
														   <option value="Dikeksi" >Dikeksi</option>
														   <option value="Kabag">Kabag</option>
														   <option value="Kadiv">Kadiv</option>
														   <option value="Wakadiv">Wakadiv</option>
												   </select>
                                                        <!--<input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ old('jabatan') }}">-->
                                                    </div>
                                                </div>
                                             </div>
										</div>
									</div>
	
									<div class="row">
										
                                        <div class="col-md-5">
                                            <div class="form-horizontal">
                                                <div class="form-group pemeriksa">
                                                    <label class="col-md-3 control-label">Pemeriksa (PN/Nama) :</label>
                                                    <div class="col-md-8">
													<select class="form-control" name="pemeriksa" id="pemeriksa">' +
														   <option value="checker1" >checker1</option>
														   <option value="checker2">checker2</option>
														   <option value="checker3">checker3</option>
														   <option value="checker4">checker4</option>
												   </select>
                                                        <!--<input type="text" class="form-control" name="pemutus_name" id="pemutus_name" value="{{ old('pemutus_name') }}" >-->
												    </div>
                                                </div>
											</div>
										</div>
										<div class="col-md-1">
                                            <!--<div class="form-horizontal" >
                                                <div class="form-group button">
                                                    <div class="col-md-1">
														<button type="button" onclick="addinput()" class="btn btn-orange waves-light waves-effect w-md m-b-10" data-toggle="modal" id="btn-tambah"><i class="mdi mdi-plus"></i> </button>
													</div>
                                                </div>
											</div>-->
										</div>
										<div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group jabatan_pemeriksa">
                                                    <label class="col-md-5 control-label">Jabatan Pemeriksa :</label>
                                                    <div class="col-md-7">
													
													<select class="form-control" name="jabatan_pemeriksa" id="jabatan_pemeriksa">' +
														   <option value="Dikeksi" >Dikeksi</option>
														   <option value="Kabag">Kabag</option>
														   <option value="Kadiv">Kadiv</option>
														   <option value="Wakadiv">Wakadiv</option>
												   </select>
                                                        <!--<input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ old('jabatan') }}">-->
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
													<!--<div class="col-md-2">                               
														<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-download" name="btn-download"><i class="mdi mdi-download"></i>Unduh </button>
													</div>
													<div class="col-md-2">                               
														<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-print" name="btn-print"><i class="mdi mdi-printer"></i>Print </button>
													</div>-->
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
	<script src="{{asset('assets/js/selectevan.min.js')}}"></script>

@include('internals.layouts.footer')
@include('internals.layouts.foot') 
<script type="text/javascript">
$(document).ready(function() {

var select2 = $("#area_level_nasional_dropdown").select2({
  ajax: {
    url: "ListUkerKanwil",
    delay: 250
  }
});
select2.onSelect = (function(fn) {
alert('heres');	
});
/* $("#area_level_kanwil_dropdown").on('click', function(event){
$("#area_level_kanca_dropdown").select2({
  ajax: {
    url: "ListUkerKanwil2/"+$("#area_level_kanwil_dropdown").val(),
	contentType: "application/json",
	type: 'GET',
	dataType: "json",
//	data: $("#area_level_kanwil_dropdown").val(),
    delay: 250
  }
});
});
 */

	//$("#area_level_nasional_dropdown").select2().empty().append('<option value="id">text</option>').trigger('change');
	//$("#area_level_nasional_dropdown").select2();
//	$("#area_level_kanwil_dropdown").select2();
//	$("#area_level_kanca_dropdown").select2();
//	$("#area_level_uker_dropdown").select2();

/* 
		$("#area_level_dropdown_nasional_checks").click(function(){
			if($("#area_level_dropdown_nasional_checks").is(':checked') ){
				$("#area_level_nasional_dropdown > option").prop("selected","selected");
				$("#area_level_nasional_dropdown").trigger("change");
			}else{
				$("#area_level_nasional_dropdown > option").removeAttr("selected");
				 $("#area_level_nasional_dropdown").trigger("change");
			 }
		});
		$("#area_level_dropdown_kanwil_checks").click(function(){
	
			
			if($("#area_level_dropdown_kanwil_checks").is(':checked') ){
					var $option = '';
					var $select = $("#area_level_kanwil_dropdown");
					$select.append('').trigger('change');
					var val ='';
					$select.select2({
					  ajax: {
						url: "ListUkerKanwil/list",
						delay: 250
					  }
					});
					var n ='';
					val = '..';
					$.ajax({ 
					  type: 'GET',
					  url: 'ListUkerKanwil/all',
					  dataType: 'json'
					}).then(function (data) {
					  console.log(data);
						data.forEach(function(element) {
							n += '<option selected value='+element.id+'>'+element.text+'</option>';
						});
							$option = $(n);
							$select.append($option).trigger('change'); // append the option and update Select2
					});
			}else{
				$("#area_level_kanwil_dropdown > option").removeAttr("selected");
				 $("#area_level_kanwil_dropdown").trigger("change");
			 } 
		});
		
		$("#area_level_dropdown_kanca_checks").click(function(){
					var area_level_value = $('#area_level_kanwil_dropdown').val();

			if($("#area_level_dropdown_kanca_checks").is(':checked') ){
				$("#area_level_kanca_dropdown > option").prop("selected","selected");
				$("#area_level_kanca_dropdown").trigger("change");
			}else{
				$("#area_level_kanca_dropdown > option").removeAttr("selected");
				 $("#area_level_kanca_dropdown").trigger("change");
			 }
		});
		$("#area_level_dropdown_uker_checks").click(function(){
			if($("#area_level_dropdown_uker_checks").is(':checked') ){
				$("#area_level_uker_dropdown > option").prop("selected","selected");
				$("#area_level_uker_dropdown").trigger("change");
			}else{
				$("#area_level_uker_dropdown > option").removeAttr("selected");
				 $("#area_level_uker_dropdown").trigger("change");
			 }
		});
	 */
		$("#pemutus_name").select2();
		$("#jabatan").select2();
		$("#pemeriksa").select2();
		$("#jabatan_pemeriksa").select2();
		
	$("#payroll").select2();
	$("#payroll_radio").click(function(){
    if($("#payroll_radio").is(':checked') ){
        $("#payroll > option").prop("selected","selected");
        $("#payroll").trigger("change");
    }else{
        $("#payroll > option").removeAttr("selected");
         $("#payroll").trigger("change");
     }
	});
		
//-------------mitra_kerjasama
	$("#mitra_kerjasama").select2();
	$("#mitra_kerjasama_radio").click(function(){
    if($("#mitra_kerjasama_radio").is(':checked') ){
        $("#mitra_kerjasama > option").prop("selected","selected");
        $("#mitra_kerjasama").trigger("change");
    }else{
        $("#mitra_kerjasama > option").removeAttr("selected");
         $("#mitra_kerjasama").trigger("change");
     }
	});
		
//-------------mitra_kerjasama2
	$("#mitra_kerjasama2").select2();
	$("#mitra_kerjasama_radio2").click(function(){
    if($("#mitra_kerjasama_radio2").is(':checked') ){
        $("#mitra_kerjasama2 > option").prop("selected","selected");
        $("#mitra_kerjasama2").trigger("change");
    }else{
        $("#mitra_kerjasama2 > option").removeAttr("selected");
         $("#mitra_kerjasama2").trigger("change");
     }
	});
		
//-------------mitra_kerjasama3
	$("#mitra_kerjasama3").select2();
	$("#mitra_kerjasama_radio3").click(function(){
    if($("#mitra_kerjasama_radio3").is(':checked') ){
        $("#mitra_kerjasama3 > option").prop("selected","selected");
        $("#mitra_kerjasama3").trigger("change");
    }else{
        $("#mitra_kerjasama3 > option").removeAttr("selected");
         $("#mitra_kerjasama3").trigger("change");
     }
	});
		
//-------------mitra_kerjasama4
	$("#mitra_kerjasama4").select2();
	$("#mitra_kerjasama_radio4").click(function(){
    if($("#mitra_kerjasama_radio4").is(':checked') ){
        $("#mitra_kerjasama4 > option").prop("selected","selected");
        $("#mitra_kerjasama4").trigger("change");
    }else{
        $("#mitra_kerjasama4 > option").removeAttr("selected");
         $("#mitra_kerjasama4").trigger("change");
     }
	});
	
});
var tableling = $('#datatable').DataTable();

var counter = 1;
 $('#btn-add').on( 'click', function () {
        tableling.row.add( [
            $("#first_month").val(),
            $("#last_month").val(),
            $("#persen_bunga").val(),
	    ] ).draw( false );
 
        counter++;
			$("#first_month").val('');
            $("#last_month").val('');
            $("#persen_bunga").val('');
			
    } );
  			
	 $('#datatable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tableling.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
	function btn_hapus(){
		 tableling.row('.selected').remove().draw( false );
	}
    $('.datepicker-date-evan').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        todayHighlight: true
    });

/* 	function radio_mitra_kerjasama(){
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
	} */
	
		

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
					   //'<select class="form-control" multiple="multiple" name="area_level_dropdown" id="area_level_dropdown">' +
					   '<div class="col-md-7"><select class="form-control" multiple name="area_level_dropdown" id="area_level_dropdown">' +
					   '<option value="Nasional1" >Nasional1</option>' +
					   '<option value="Nasional2">Nasional2</option>' +
					   '<option value="Nasional3">Nasional3</option>' +
					   '<option value="Nasional4">Nasional4</option>' +
					   '</select></div><div class="col-md-2"><input type="checkbox" id="area_level_dropdown_checks" name="area_level_dropdown_checks">All' +
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group mitra_kerjasama_nasional';
			div.innerHTML = html;
			document.getElementById('area_level_div').appendChild(div);
			$("#area_level_dropdown").select2();
			$("#area_level_dropdown_checks").click(function(){
			if($("#area_level_dropdown_checks").is(':checked') ){
				$("#area_level_dropdown > option").prop("selected","selected");
				$("#area_level_dropdown").trigger("change");
			}else{
				$("#area_level_dropdown > option").removeAttr("selected");
				 $("#area_level_dropdown").trigger("change");
			 }
			});


	}
	function area_level_unitkerja(){
		document.getElementById('area_level_div').innerHTML = "";
			var html = '<label class="col-md-3 control-label">Area level Unit Kerja :</label>' + 
					   '<div class="col-md-9">' +
					   //'<select class="form-control" multiple="multiple" name="area_level_dropdown" id="area_level_dropdown">' +
					   '<div class="col-md-7"><select class="form-control" multiple name="area_level_dropdown" id="area_level_dropdown">' +
					   '<option value="unit_kerja1" >Unit Kerja1</option>' +
					   '<option value="unit_kerja2">Unit Kerja2</option>' +
					   '<option value="unit_kerja3">Unit Kerja3</option>' +
					   '<option value="unit_kerja4">Unit Kerja4</option>' +
					   '</select></div><div class="col-md-2"><input type="checkbox" id="area_level_dropdown_checks" name="area_level_dropdown_checks">All' +
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group mitra_kerjasama_unitkerja';
			div.innerHTML = html;
			document.getElementById('area_level_div').appendChild(div);
			$("#area_level_dropdown").select2();
			$("#area_level_dropdown_checks").click(function(){
			if($("#area_level_dropdown_checks").is(':checked') ){
				$("#area_level_dropdown > option").prop("selected","selected");
				$("#area_level_dropdown").trigger("change");
			}else{
				$("#area_level_dropdown > option").removeAttr("selected");
				 $("#area_level_dropdown").trigger("change");
			 }
			});

	}
	function area_level_kantorcabang(){
		document.getElementById('area_level_div').innerHTML = "";
			var html = '<label class="col-md-3 control-label">Area Level Cabang :</label>' + 
					   '<div class="col-md-9">' +
					   //'<select class="form-control" multiple="multiple" name="area_level_dropdown" id="area_level_dropdown">' +
					   '<div class="col-md-7"><select class="form-control" multiple name="area_level_dropdown" id="area_level_dropdown">' +
					   '<option value="Cabang1" >Cabang1</option>' +
					   '<option value="Cabang2">Cabang2</option>' +
					   '<option value="Cabang3">Cabang3</option>' +
					   '<option value="Cabang4">Cabang4</option>' +
					   '</select></div><div class="col-md-2"><input type="checkbox" id="area_level_dropdown_checks" name="area_level_dropdown_checks">All' +
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group mitra_kerjasama_cabang';
			div.innerHTML = html;
			document.getElementById('area_level_div').appendChild(div);
			$("#area_level_dropdown").select2();
			$("#area_level_dropdown_checks").click(function(){
			if($("#area_level_dropdown_checks").is(':checked') ){
				$("#area_level_dropdown > option").prop("selected","selected");
				$("#area_level_dropdown").trigger("change");
			}else{
				$("#area_level_dropdown > option").removeAttr("selected");
				 $("#area_level_dropdown").trigger("change");
			 }
			});

	}
	function area_level_kantorwilayah(){
		document.getElementById('area_level_div').innerHTML = "";
			var html = '<label class="col-md-3 control-label">Area Level Wilayah :</label>' + 
					   '<div class="col-md-9">' +
					   //'<select class="form-control" multiple="multiple" name="area_level_dropdown" id="area_level_dropdown">' +
					   '<div class="col-md-7"><select class="form-control" multiple name="area_level_dropdown" id="area_level_dropdown">' +
					   '<option value="Wilayah1" >Wilayah1</option>' +
					   '<option value="Wilayah2">Wilayah2</option>' +
					   '<option value="Wilayah3">Wilayah3</option>' +
					   '<option value="Wilayah4">Wilayah4</option>' +
					   '</select></div><div class="col-md-2"><input type="checkbox" id="area_level_dropdown_checks" name="area_level_dropdown_checks">All' +
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group mitra_kerjasama_cabang';
			div.innerHTML = html;
			document.getElementById('area_level_div').appendChild(div);
			$("#area_level_dropdown").select2();
			$("#area_level_dropdown_checks").click(function(){
			if($("#area_level_dropdown_checks").is(':checked') ){
				$("#area_level_dropdown > option").prop("selected","selected");
				$("#area_level_dropdown").trigger("change");
			}else{
				$("#area_level_dropdown > option").removeAttr("selected");
				 $("#area_level_dropdown").trigger("change");
			 }
			});
	}
	function addinput(){
		var countpemutus = $("#countpemutus").val();
		addpemutus(countpemutus);
		addjabatan(countpemutus);
		$("#countpemutus").val(parseInt(countpemutus)+1);
	}
	function addpemutus(countpemutus){
			var html = '<label class="col-md-3 control-label">Pemeriksa'+countpemutus+'</label><div class="col-md-8">' + 
						'<select class="form-control" multiple name="pemeriksa'+countpemutus+'" id="pemeriksa'+countpemutus+'">' +
							'<option value="checker1">checker1</option>' +
                            '<option value="checker2">checker2</option>' +
                            '<option value="checker3">checker3</option>' +
                            '<option value="checker4">checker4</option>' +
                            '</select>' +
					   '</div>';
			
			/* var html = '<label class="col-md-3 control-label">Pemeriksa'+countpemutus+'</label><div class="col-md-8">' + 
					   '<input type="text" class="form-control" name="pemeriksa'+countpemutus+'" id="pemeriksa'+countpemutus+'" value="">'+
					   '</div>'; */
			var div = document.createElement('div');
			div.className = 'form-group pemeriksa'+countpemutus;
			div.innerHTML = html;
			document.getElementById('div_pemutus').appendChild(div);
	}
	function addjabatan(countpemutus){
		
			var html = '<label class="col-md-3 control-label">Jabatan Pemeriksa'+countpemutus+'</label><div class="col-md-8">' + 
						'<select class="form-control" multiple name="jabatan'+countpemutus+'" id="jabatan'+countpemutus+'">' +
							'<option value="checker1">checker1</option>' +
                            '<option value="checker2">checker2</option>' +
                            '<option value="checker3">checker3</option>' +
                            '<option value="checker4">checker4</option>' +
                            '</select>' +
					   '</div>';
			/* var html = '<label class="col-md-5 control-label">Jabatan Pemeriksa'+countpemutus+'</label><div class="col-md-7">' + 
					   '<input type="text" class="form-control" name="jabatan'+countpemutus+'" id="jabatan'+countpemutus+'" value="">'+
					   '</div>'; */
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
		
		/* var asuransi_jiwa = document.getElementById("asuransi_jiwa");
		var asuransi_jiwa_value = asuransi_jiwa.options[asuransi_jiwa.selectedIndex].value;
		formarray.push({
			"name": "asuransi_jiwa",
			"value": asuransi_jiwa_value
		}); */
		
		var suku_bunga = document.getElementById("suku_bunga");
		var suku_bunga_value = suku_bunga.options[suku_bunga.selectedIndex].value;
		formarray.push({
			"name": "suku_bunga",
			"value": suku_bunga_value
		});
		var pemutus_name = document.getElementById("pemutus_name");
		var pemutus_name_value = pemutus_name.options[pemutus_name.selectedIndex].value;
		formarray.push({
			"name": "pemutus_name",
			"value": pemutus_name_value
		});
		var payroll = document.getElementById("payroll");
		var payroll_value = payroll.options[payroll.selectedIndex].value;
		formarray.push({
			"name": "payroll",
			"value": payroll_value
		});
		var jabatan = document.getElementById("jabatan");
		var jabatan_value = jabatan.options[jabatan.selectedIndex].value;
		formarray.push({
			"name": "jabatan",
			"value": jabatan_value
		});
		return formarray;
	}
	
	function getpemeriksa(formarray){
/* 		var area_level = $("input:radio[name=area_level]:checked").val();
		formarray.push({
			"name": "area_level",
			"value": area_level
		}); */
		/* var count = $("#countpemutus").val();
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
		} */
		var pemeriksa = document.getElementById("pemeriksa");
		var pemeriksa_value = pemeriksa.options[pemeriksa.selectedIndex].value;
				
		var jabatan_pemeriksa = document.getElementById("jabatan_pemeriksa");
		var jabatan_pemeriksa_value = jabatan_pemeriksa.options[jabatan_pemeriksa.selectedIndex].value;
				
		formarray.push({
			"name": "pemeriksa",
			"value": pemeriksa_value
		});
		formarray.push({
			"name": "jabatan_pemeriksa",
			"value": jabatan_pemeriksa_value
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
		}); 
		var payroll = $("input:radio[name=payroll]:checked").val();
		formarray.push({
			"name": "payroll",
			"value": payroll
		});*/
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
	var data = tableling
		.rows()
		.data();
	var length = data.length;
	length = parseInt(length)-1;
	var formdetail = [];
	var id_header = Date.now();
	for(i=0;i<=length;i++){
	var rows = tableling.rows( i ).data();
	formdetail.push(rows[0][0],rows[0][1],rows[0][2],id_header
	);
	formarray.push({
		"name" : "data"+i,
		"value" : JSON.stringify(formdetail)});
	formdetail = [];
	};
	
	formarray.push({
			"name": "countminus1",
			"value": length
	});
	formarray.push({
			"name": "id_header",
			"value": id_header
	});
		formarray = selectvalue(formarray);
		formarray = radio(formarray);
		formarray.push({
			"name": "action",
			"value": 'submit'
		});
		formarray = getpemeriksa(formarray);
		sentform(formarray);
        var arrayform = getarrayserial(formarray);
    })
	function getarrayserial(formarray){
		var array= [];
		formarray.forEach(function(form) {
			//alert(form.name);
			array[form.name] = form.value;
			//alert(array);
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
		 
			var url = window.location.href;
			var url = url.replace("gimmick", "gimmick_list");
			window.location.href = url;
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

