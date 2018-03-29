@section('title','My BRI - Daftar Profil Customer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
  
    <div class="content-page">
        <div class="content">
			<form action="KelayakanStore" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		
			
			<div class="row">
			
                    <div class="col-md-12">
			            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Mitra Kerjasama</h3>
                                </div>
								<?php echo $view;?>
							</div>
							<div class="col-md-3">
							</div>
							<div class="col-md-3">
								<button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-submit" name="btn-submit"><i class="mdi mdi-content-save"></i>Submit </button>
							</div>
							<div class="col-md-3">
							</div>
							
                    </div>
			</div>
			</form>
		</div>
	</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.mitra.script.mitra.penilaian_kelayakan') 
