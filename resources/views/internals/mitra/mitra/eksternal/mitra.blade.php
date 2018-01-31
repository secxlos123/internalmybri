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
                                    <h3 class="panel-title">Mitra Kerjasama</h3>
                                </div>
			                        <div class="panel-body">
										<div class="row">
											<div class="col-md-4">
												<div id="piediv" style="width:600px; height:400px;"></div>
											</div>
											<div class="col-md-4">
												<div id="chartdiv" style="width:600px; height:400px;"></div>
											</div>
											<div class="col-md-4">
												<div id="bardiv" style="width:600px; height:400px;"></div>
											</div>
										</div>
																			
									<div class="row">
										
											<div class="col-md-4">
															<input type="checkbox" id="list_pekerja_checks" name="list_pekerja_checks"/>
																<label for="list_pekerja_checks"><font color="grey" size="4px"><b>List Pekerja</b></font>
																</label>
											</div>
											<div class="col-md-4">								
																<input type="checkbox" id="input_kolektif_checks"
																	   name="input_kolektif_checks"/>
																<label for="input_kolektif_checks"><font color="yellow" size="4px"></b>Input Data Kolektif<b></font></label>
											</div>
											<div class="col-md-4">
																<input type="checkbox" id="input_individu_checks"
																	name="input_individu_checks"/>
																<label for="input_individu_checks"><font color="green" size="4px"><b>Input Data Individu</b></font></label>
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
                                    <h3 class="panel-title">Informasi Mitra Kerjasama Terbaru</h3>
                                </div>
								<?php echo $view;?>
							</div>
                    </div>

			</div>
			
			</form>
		</div>
	</div>
	
<script src="{{asset('assets/js/amchart/amcharts/amcharts.js')}}"></script>
<script src="{{asset('assets/js/amchart/amcharts/pie.js')}}"></script>
<script src="{{asset('assets/js/amchart/amcharts/serial.js')}}"></script>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.mitra.script.mitra.eksternal.mitra') 
