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
		
    <div class="content-page">

        <div class="content">
	
		<form action="ApprovalStore?i=<?php echo $_GET['i'];?>" method="post" enctype="multipart/form-data">
		
	<div class="title content">
    <h3></h3>
    <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
		<div class="row">
			<div class="panel panel-color panel-primary">
				<div class="col-md-12">
					<div class="panel-heading">
						<h3 class="panel-title">Data Mitra Kerjasama</h3>
					</div>
						<div class="col-md-4">
							<label>Fasilitas Jasa Perbankan Bank BRI</label>
						</div>
						<div class="col-md-8">
							<select id="fasilitas_jasa" name="fasilitas_jasa"><option value="simpanan">SIMPANAN</option><option value="fasilitas">FASILITAS</option></select>
						</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-4">
						<label>Daftar Ijin Prinsip</label>
					</div>
					<div class="col-md-8">
						<select id="daftar_ijin" name="daftar_ijin"></select>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>

			{{ csrf_field() }}
		<div role="application" class="wizard clearfix" id="steps-uid-0">
			<div class="steps clearfix">
				<ul role="tablist">
					<li role="tab" id="li-step-0" class="first current" aria-disabled="true">
						<a id="steps-uid-0-t-0" aria-controls="false">
							<span class="current-info audible">current step: </span>
							<span class="number">1.</span> SIMPANAN
						</a>
					</li>
					<li role="tab" id="li-step-1" class="disabled" aria-disabled="true">
						<a id="steps-uid-0-t-1" aria-controls="false">
							<span class="number">2.</span> FASILITAS
						</a>
					</li>
					</ul>
					</div>
					<div class="content clearfix" id="step0">
                        <h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">SIMPANAN</h3>
                            <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
								<div class="row">
									<div class="col-md-12">
											@if (\Session::has('error'))
											<div class="alert alert-danger">{{ \Session::get('error') }}</div>
											@endif
											<div class="panel panel-color panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">SIMPANAN</h3>
												</div> 
												<?php echo $view;?>
												<div class="col-md-12">
													<div class="col-md-10">
													</div>
													<div class="col-md-2">
														<button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" name="submit" id="submit"data-toggle="modal"><i class="mdi mdi-content-save"></i>Simpan</button>
													</div>
												</div>
											</div>
									</div>
								</div>
							</section>
					</div>
					<div class="content clearfix" id="step1">
                        <h3 id="steps-uid-0-h-1" tabindex="-2" class="title current">PINJAMAN</h3>
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
													<div class="col-md-12">
														<div class="col-md-10">
														</div>
														<div class="col-md-2">
															<button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" name="submit" id="submit"data-toggle="modal"><i class="mdi mdi-content-save"></i>Simpan</button>
														</div>
													</div>
												</div>
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
@include('internals.mitra.script.mitra.approval_mitra')
