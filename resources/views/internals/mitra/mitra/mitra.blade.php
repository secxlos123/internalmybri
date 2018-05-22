@section('title','My BRI - Daftar Profil Customer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
  
    <div class="content-page">
        <div class="content">
	<?php if($message!=''){ if($key=='Gagal'){?>
			<style>
				.alert {
					padding: 20px;
					background-color: #f44336;
					color: white;
				}
			</style>
			<div class="alert">
			  <strong>ERROR !!</strong> <?php echo $message;?>.
				<br/> <a href="<? echo env('APP_URL').'/registrasi_mitra';?>">Klik disini untuk mengisi ulang data </a>
			</div>
		<?php }elseif($key=='Sukses'){ ?>
			<style>
				.alert {
					padding: 20px;
					background-color: #32CD32;
					color: white;
				}
			</style>
			<div class="alert">
			  <strong>SUKSES, </strong> <?php echo $message;?>.
			</div>
		<?php }} ?>
		{{ csrf_field() }}
		<form>
		<!--
					<div class="row">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Registrasi Mitra</h3>
                                </div>
			                        <div class="panel-body">
									
																		
									<div class="row">
										
                                        <div class="col-md-3">
                                            <div class="form-horizontal">
												<table class="display" width="100%" cellspacing="0">
													<tr><input type="radio" id="registrasi_mitra_kerjasama"
															   name="registrasi_mitra_kerjasama" value="registrasi_mitra">
														<label for="registrasi_mitra_kerjasama">Registrasi Mitra Kerjasama</label></tr><br/>
													<tr><input type="radio" id="registrasi_mitra_kerjasama"
															   name="registrasi_mitra_kerjasama" value="cari_calon_mitra">
														<label for="registrasi_mitra_kerjasama">Cari calon Mitra Kerjasama</label></tr><br/>
													<tr><input type="radio" id="registrasi_mitra_kerjasama"
															   name="registrasi_mitra_kerjasama" value="penilaian_mitra">
														<label for="registrasi_mitra_kerjasama">Penilaian Kelayakan Mitra Kerjasama</label></tr><br/>
													<tr><input type="radio" id="registrasi_mitra_kerjasama"
															   name="registrasi_mitra_kerjasama" value="scoring_mitra">
														<label for="registrasi_mitra_kerjasama">Scoring Mitra Kerjasama</label></tr><br/>
													<tr><input type="radio" id="registrasi_mitra_kerjasama"
															   name="registrasi_mitra_kerjasama" value="registrasi_perjanjian_mitra">
														<label for="registrasi_mitra_kerjasama">Registrasi Perjanjian Mitra Kerjasama</label></tr><br/>
													<tr></tr><br/>
													<tr><button type="button" onclick="goto()" class="btn btn-orange waves-light waves-effect w-md m-b-10" data-toggle="modal" id="btn-goto">
														<i class="mdi mdi-search"></i>Go To</button>
													</tr>
												</table>
											</div>
										</div>
										<div class="col-md-1">
                                            <div class="form-horizontal" >
											</div>
										</div>
										
                                        <div class="col-md-3">
                                            <div class="form-horizontal">
													<table>
													<tr></tr>
													<tr></tr>
													<tr></tr>
													<tr></tr>
													<tr></tr>
													</table>
											</div>
										</div>
										<div class="col-md-1">
                                            <div class="form-horizontal" >
											</div>
										</div>
										
                                        <div class="col-md-3">
                                            <div class="form-horizontal">
												<table class="display" width="100%" cellspacing="0">
													<tr><input type="radio" id="database_mitra" onclick="info_mitra_radio()"
															   name="database_mitra" value="info_mitra">
														<label for="database_mitra">Informasi Mitra Kerjasama</label></tr><br/>
													<tr><input type="radio" id="database_mitra" onclick="penilaian_kelayakan_mitra_radio()"
															   name="database_mitra" value="penilaian_kelayakan_mitra">
														<label for="database_mitra">Penilaian Kelayakan Mitra Kerjasama</label></tr><br/>
													<tr><input type="radio" id="database_mitra" onclick="scoring_mitra_radio()"
															   name="database_mitra" value="scoring_mitra">
														<label for="database_mitra">Scoring Mitra Kerjasama</label></tr><br/>
													<tr><input type="radio" id="database_mitra" onclick="perjanjian_mitra_radio()"
															   name="database_mitra" value="perjanjian_mitra">
														<label for="database_mitra">Perjanjian Kerjasama</label></tr><br/>
													<tr><input type="radio" id="database_mitra" onclick="ketentuan_internal_mitra_radio()"
															   name="database_mitra" value="ketentuan_internal_mitra">
														<label for="database_mitra">Ketentuan Internal</label></tr><br/>
													<tr><input type="radio" id="database_mitra" onclick="formulir_mitra_radio()"
															   name="database_mitra" value="formulir_mitra">
														<label for="database_mitra">Formulir</label></tr><br/>
													<tr><button type="button" onclick="goto2()" class="btn btn-orange waves-light waves-effect w-md m-b-10" data-toggle="modal" id="btn-goto">
														<i class="mdi mdi-search"></i>Go To</button>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
			</div>
		
		
		!-->
			<div class="row" id="table1">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informasi Mitra Kerjasama Terbaru</h3>
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
                                    <h3 class="panel-title">Notifikasi Mitra Kerjasama Terbaru</h3>
                                </div>
								<?php echo $view2;?>
							</div>
                    </div>

			</div>
			</form>
		</div>
	</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.mitra.script.mitra.mitra') 
