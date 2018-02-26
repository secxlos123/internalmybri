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

            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" id="form_scoring"> 
			{{ csrf_field() }}

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">FASILITAS LAINNYA</h4>
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
        <button type="submit" class="btn btn-primary" id="save_modal" name="save_modal" >Save changes</button>
      </div>
    </div>
	</form>
  </div>
</div>
    <div class="content-page">
        <div class="content">
		{{ csrf_field() }}
		<form>
		<div role="application" class="wizard clearfix" id="steps-uid-0">
			<div class="steps clearfix">
				<ul role="tablist">
					<li role="tab" id="li-step-0" class="first current" aria-disabled="true">
						<a id="steps-uid-0-t-0" aria-controls="false">
							<span class="current-info audible">current step: </span>
							<span class="number">1.</span> Informasi Mitra Kerjasama
						</a>
					</li>
					<li role="tab" id="li-step-1" class="disabled" aria-disabled="true">
						<a id="steps-uid-0-t-1" aria-controls="false">
							<span class="number">2.</span> Data Mitra Kerjasama
						</a>
					</li>
					<li role="tab" id="li-step-2" class="disabled" aria-disabled="true">
						<a id="steps-uid-0-t-2" aria-controls="false">
						<span class="number">3.</span> Data Sistem Payroll Mitra Kerjasama
						</a>
					</li>
					<li role="tab" id="li-step-3" class="disabled last" aria-disabled="true">
						<a id="steps-uid-0-t-3" aria-controls="false">
						<span class="number">4.</span> Informasi Mitra Kerjasama Lainnya
						</a>
					</li>
					</ul>
					</div>
					<div class="content clearfix" id="step0">
                        <h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">Informasi Mitra Kerjasama</h3>
                            <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
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
										<div class="col-md-8">
										</div>
										<div class="col-md-1">
										</div>
										<div class="col-md-1">
											<button type="button" onclick="lanjutback(1)" class="btn btn-orange waves-light waves-effect w-md">Lanjut</button>
										</div>
									</div>
							</section>
					</div>
					<div class="content clearfix" id="step1">
                        <h3 id="steps-uid-0-h-1" tabindex="-2" class="title current">Data Mitra Kerjasama</h3>
                            <section id="steps-uid-0-p-1" role="tabpanel" aria-labelledby="steps-uid-0-h-1" class="body current" aria-hidden="true">
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
										<div class="col-md-8">
										</div>
										<div class="col-md-1">
											<button type="button" onclick="lanjutback(0)" class="btn btn-orange waves-light waves-effect w-md">Back</button>
										</div>
										<div class="col-md-1">
											<button type="button" onclick="lanjutback(2)" class="btn btn-orange waves-light waves-effect w-md">Lanjut</button>
										</div>
									</div>
							</section>
					</div>
					<div class="content clearfix" id="step2">
                        <h3 id="steps-uid-0-h-2" tabindex="-3" class="title current">Data Sistem Payroll Mitra Kerjasama</h3>
                            <section id="steps-uid-0-p-2" role="tabpanel" aria-labelledby="steps-uid-0-h-2" class="body current" aria-hidden="true">
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
										<div class="col-md-8">
										</div>
										<div class="col-md-1">
											<button type="button" onclick="lanjutback(1)" class="btn btn-orange waves-light waves-effect w-md">Back</button>
										</div>
										<div class="col-md-1">
											<button type="button" onclick="lanjutback(3)" class="btn btn-orange waves-light waves-effect w-md">Lanjut</button>
										</div>
									</div>
							</section>
					</div>
					<div class="content clearfix" id="step3">
                        <h3 id="steps-uid-0-h-3" tabindex="-3" class="title current">Informasi Mitra Kerjasama Lainnya</h3>
                            <section id="steps-uid-0-p-3" role="tabpanel" aria-labelledby="steps-uid-0-h-3" class="body current" aria-hidden="true">
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
										<div class="col-md-8">
										</div>
										<div class="col-md-1">
											<button type="button" onclick="lanjutback(2)" class="btn btn-orange waves-light waves-effect w-md">Back</button>
										</div>
										<div class="col-md-1">
											<button type="button" onclick="lanjutback(4)" class="btn btn-orange waves-light waves-effect w-md">Lanjut</button>
										</div>
									</div>
							</section>
					</div>
					<div class="content clearfix" id="step4">
                        <h3 id="steps-uid-0-h-4" tabindex="-3" class="title current">Informasi Mitra Kerjasama Lainnya</h3>
                            <section id="steps-uid-0-p-4" role="tabpanel" aria-labelledby="steps-uid-0-h-4" class="body current" aria-hidden="true">
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
								</div>
							
									<div class="row">
										<div class="col-md-8">
										</div>
										<div class="col-md-1">
											<button type="button" onclick="lanjutback(3)" class="btn btn-orange waves-light waves-effect w-md">Back</button>
										</div>
									</div>
							</section>
					</div>
		</div>
		</form>
	</div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.mitra.script.mitra.registrasi_mitra') 
