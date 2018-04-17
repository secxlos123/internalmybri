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
	
		<form action="ManagementStore" method="post" enctype="multipart/form-data">
		
			{{ csrf_field() }}
		<div role="application" class="wizard clearfix" id="steps-uid-0">
					<div class="content clearfix" id="step0">
                        <h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">List User</h3>
                            <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
								<div class="row">
									<div class="col-md-12">
											@if (\Session::has('error'))
											<div class="alert alert-danger">{{ \Session::get('error') }}</div>
											@endif
											<div class="panel panel-color panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">List User</h3>
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
													<h3 class="panel-title">Data User</h3>
												</div> 
												<?php echo $view2;?>
											</div>
									</div>
								</div>
									<div class="row">
										<div class="col-md-8">
										</div>
										<div class="col-md-1">
										</div>
										<div class="col-md-1">
											<button type="submit" class="btn btn-orange waves-light waves-effect w-md">Simpan</button>
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
