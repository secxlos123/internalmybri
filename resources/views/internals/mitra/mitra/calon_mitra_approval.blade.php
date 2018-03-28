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
		


			<div class="row">
                    <div class="col-md-12">
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                            @endif
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Notifikasi Mitra Kerjasama Terbaru</h3>
                                </div>
								<?php echo $view;?>
							</div>
                    </div>

			</div>
			</form>
		</div>
	</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.mitra.script.mitra.calon_mitra_approval') 
