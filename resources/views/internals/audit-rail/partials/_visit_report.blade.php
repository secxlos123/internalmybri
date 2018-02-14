<div class="row">
	<div class="col-md-12">
		@if(!empty($dataCustomer['visit_report']))
		<div class="panel panel-color panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Data Kunjungan</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="panel-heading">
						<h4 class="panel-title">Kunjungan</h4>
					</div>
					<div class="col-md-6">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-md-5 control-label">Nama AO :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{ $dataCustomer['ao_name'] }}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Tempat Kunjungan :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{ $dataCustomer['address'] }}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Tanggal Kunjungan :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{ $dataCustomer['appointment_date'] }}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Nama Calon Debitur :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{ $dataCustomer['customer_name'] }}</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-5 control-label">Tujuan Kunjungan :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{ $dataCustomer['visit_report']['purpose_of_visit'] }}</p>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-md-5 control-label">No. Referensi Permohonan :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{ $dataCustomer['ref_number'] }}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Jumlah Permohonan :</label>
								<div class="col-md-7">
									<p class="form-control-static">Rp {{ number_format($dataCustomer['nominal'],2,',','.') }}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Jenis Permohonan :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{ strtoupper($dataCustomer['product_type']) }}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Nomor NPWP :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{ $dataCustomer['visit_report']['npwp_number_masking'] }}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Hasil Kunjungan :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{ $dataCustomer['visit_report']['visit_result'] }}</p>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="panel-heading">
						<h4 class="panel-title">Sumber Penghasilan</h4>
					</div>
					<div class="col-md-6">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								@if ($dataCustomer['visit_report']['source'] == 'fixed')
								<label class="col-md-5 control-label">Gaji / THP per-Bulan :</label>
								<div class="col-md-7">
									<p class="form-control-static">Rp. {{ number_format($dataCustomer['visit_report']['income_salary'], 2, ",", ".") }}</p>
									@else
									<label class="col-md-5 control-label">Penghasilan per-Bulan :</label>
									<div class="col-md-7">
										<p class="form-control-static">Rp. {{ number_format($dataCustomer['visit_report']['income'], 2, ",", ".") }}</p>
										@endif
									</div>
								</div>
								@if ($dataCustomer['visit_report']['source'] == 'fixed')
								<div class="form-group">
									<label class="col-md-5 control-label">Tunjangan / Insentif Lain :</label>
									<div class="col-md-7">
										<p class="form-control-static">Rp. {{ number_format($dataCustomer['visit_report']['income_allowance'], 2, ",", ".") }}</p>
									</div>
								</div>
								@endif
							</form>
						</div>
						@if(($dataCustomer['visit_report']['source_income'] != 'single') && ($dataCustomer['customer']['personal']['status_id'] == 2))
						<div class="col-md-6">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-md-5 control-label">Penghasilan Pasangan :</label>
									<div class="col-md-7">
										<p class="form-control-static">Rp. {{ number_format($dataCustomer['visit_report']['couple_salary'], 2, ",", ".") }}</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-5 control-label">Penghasilan Lain Pasangan :</label>
									<div class="col-md-7">
										<p class="form-control-static">Rp. {{ number_format($dataCustomer['visit_report']['couple_other_salary'], 2, ",", ".") }}</p>
									</div>
								</div>
							</form>
						</div>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="panel-heading">
						<h4 class="panel-title">KPP</h4>
					</div>
					<div class="col-md-6">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-md-5 control-label">KPP :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['kpp_type_name']}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Jenis Dibiayai :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['type_financed_name']}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Sektor Ekonomi :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['economy_sector_name']}}</p>
								</div>
							</div>            
						</form>
					</div>
					<div class="col-md-6">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-md-5 control-label">Project :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['project_list_name']}}</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-5 control-label">Program :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['program_list_name']}}</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-5 control-label">Tujuan Penggunaan :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['use_reason_name']}}</p>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="panel-heading">
						<h4 class="panel-title">Mutasi</h4>
					</div>
				</div>
				@foreach($dataCustomer['visit_report']['mutation'] as $mutation)
				<div id="mutations" class="mutations">
					<div class="panel-body" style="border-style:solid;border-width:0.5px;border-color:#f3f3f3">
						<div class="row">
							<div class="col-md-4">
								<div class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-md-4 control-label">Nama Bank *:</label>
										<div class="col-md-6">
											<p class="form-control-static">{{strtoupper($mutation['bank'])}}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-md-4 control-label">No. Rekening *:</label>
										<div class="col-md-6">
											<p class="form-control-static">{{$mutation['number']}}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2 pull-right">
								<div class="form-horizontal" role="form">

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered accountTable" id="accountTable0">
									<thead>
										<tr>
											<th>Tanggal *</th>
											<th>Nominal *</th>
											<th>Jenis Transaksi *</th>
											<th>Keterangan *</th>
										</tr>
									</thead>
									@foreach($mutation['bankstatement'] as $bank)
									<tbody>
										<tr>
											<td>
												<div class="input-group">
													<p class="form-control-static">{{$bank['date']}}</p>
												</div>
											</td>
											<td>
												<div class="input-group">
													<p class="form-control-static">Rp. {{ number_format($bank['amount'], 2, ",", ".") }}</p>
													<!-- <span class="input-group-addon">,00</span> -->
												</div>
											</td>
											<td>
												<p class="form-control-static">{{$bank['type']}}</p>
											</td>
											<td>
												<p class="form-control-static">{{$bank['note']}}</p>
											</td>
										</tr>
									</tbody>
									@endforeach
								</table>
								<div class="col-md-6">
									<div class="form-group ">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="row">
					<div class="panel-heading">
						<h4 class="panel-title">Investigasi Jual Beli</h4>
					</div>
					<div class="col-md-6">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-md-5 control-label">Nama Penjual :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['seller_name']}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">Alamat Penjual :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['seller_address']}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">No. Handphone Penjual :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['seller_phone']}}</p>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-md-5 control-label">Harga Jual :</label>
								<div class="col-md-7">
									<p class="form-control-static">Rp{{$dataCustomer['visit_report']['selling_price']}}</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-5 control-label">Alasan Dijual :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['reason_for_sale']}}</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-5 control-label">Hubungan dengan Pembeli :</label>
								<div class="col-md-7">
									<p class="form-control-static">{{$dataCustomer['visit_report']['relation_with_seller']}}</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>