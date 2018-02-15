@section('title','My BRI - Daftar Profil Customer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
  
  <!-- Modal -->
				
<style>
#load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("http://localhost:9000/assets/images/loading-image.gif") no-repeat center center rgba(0,0,0,0.25)
}
</style>		
												
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <div class="row">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">DATA FASILITAS</h3>
                                </div>
								<?php echo $view5?>
							</div>
                    </div>

			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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
                                    <h3 class="panel-title">Informasi Dasar Mitra Kerjasama</h3>
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
                                    <h3 class="panel-title">Data Mitra Kerjasama</h3>
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
                                    <h3 class="panel-title">Data Sistem Payroll Mitra Kerjasama</h3>
                                </div>
								<?php echo $view3;?>
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
                                    <h3 class="panel-title">Informasi Mitra Kerjasama Lainnya</h3>
                                </div>
								<?php echo $view4;?>
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
														<button type="button" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-submit" name="btn-submit"><i class="mdi mdi-content-save"></i>Simpan </button>
														
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
@include('internals.mitra.script.mitra.registrasi_mitra') 
