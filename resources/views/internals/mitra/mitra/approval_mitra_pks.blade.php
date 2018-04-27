@section('title','My BRI - Daftar Profil Customer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
  
    <div class="content-page">
        <div class="content">
		
		<form action="PerjanjianStore" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		
			
			<div class="row">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Perjanjian Mitra Kerjasama</h3>
                                </div>
								<?php echo $view;?>
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
                                    <h3 class="panel-title">Unggah Perjanjian Mitra Kerjasama</h3>
                                </div>
								<?php echo $view2;?>
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
										
                                        <div class="col-md-12">
                                            <div class="form-horizontal">
                                                <div class="form-group tgl_register">
                                                    <label class="col-md-3 control-label">Tanggal Registrasi :</label>
                                                    <div class="col-md-8">
														<input type="text" id="tgl_register" name="tgl_register" class="form-control" value=""/>
                                                    </div>
                                                </div>
											</div>
										</div>
									</div>
									
									<div class="row">
										
                                        <div class="col-md-12">
                                            <div class="form-horizontal">
                                                <div class="form-group tgl_register">
                                                    <div class="col-md-8">
														 <input type="radio" id="penilaian_mitra_register_radio"
															   name="penilaian_mitra_register_radio" value="register_mitra">
														<label for="penilaian_mitra_register_radio">Register Mitra Kerjasama</label>
													   <input type="radio" id="penilaian_mitra_kelayakan_radio"
															   name="penilaian_mitra_kelayakan_radio" value="penilaian_kelayakan">
														<label for="penilaian_mitra_kelayakan_radio">Penilaian Kelayakan</label>
													   <input type="radio" id="penilaian_mitra_rks_radio" onclick="penilaian_mitra_rks()"
															   name="penilaian_mitra_rks_radio" value="softcopy_rks">
														<label for="penilaian_mitra_rks_radio">Softcopy RKS</label>
													  
                                                    </div>
                                                </div>
											</div>
										</div>
									</div>
									
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
													<select class="form-control" name="pemutus_name_perjanjian" id="pemutus_name_perjanjian">' +
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
													<select class="form-control" name="jabatan_perjanjian" id="jabatan_perjanjian">' +
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
													<select class="form-control" name="pemeriksa_perjanjian" id="pemeriksa_perjanjian">' +
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
													
													<select class="form-control" name="jabatan_pemeriksa_perjanjian" id="jabatan_pemeriksa_perjanjian">' +
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
														<button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save" name="btn-save"><i class="mdi mdi-content-save"></i>Simpan </button>
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
@include('internals.mitra.script.mitra.approval_mitra_pks') 
