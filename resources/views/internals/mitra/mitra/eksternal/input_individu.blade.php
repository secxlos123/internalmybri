@section('title','My BRI - Daftar Profil Customer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
  
    <div class="content-page">
        <div class="content">
		{{ csrf_field() }}
			
			<div class="row" id="div1">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Input Data Individual Pekerja</h3>
                                </div>
								<?php echo $view;?>
							</div>
                    </div>

			</div>
			
		<form>
		
			<div class="row" id="div2">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Data Individual Pekerja</h3>
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
@include('internals.mitra.script.mitra.eksternal.input_individu') 
