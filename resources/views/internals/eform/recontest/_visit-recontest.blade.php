<div class="panel-body">
    <input type="hidden" name="status_id" value="{{$eformData['customer']['personal']['status_id']}}">
    <div class="row">
        <div class="col-md-6">
            <div class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-4 control-label">Pejabat BRI yang mengunjungi *:</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{ $data['name'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Tempat Kunjungan :</label>
                    <div class="col-md-8">
                        <input id="searchInput" class="input-controls " type="text" placeholder="Masukkan nama tempat atau nama jalan untuk lokasi pertemuan" name="place">
                        <div class="map" id="map" style="width: 100%; height: 200px;"></div>
                        <textarea class="form-control" rows="3" name="address" maxlength="255" id="location">{{ $eformData['address'] }}</textarea>
                        @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                        <input type="hidden" name="lng" id="lng" value="{{$eformData['longitude']}}"><input type="hidden" name="lat" id="lat" value="{{$eformData['latitude']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Tanggal Kunjungan :</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" name="date" value="{{ $eformData['appointment_date'] }}" readonly="">
                            <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                        </div>
                        @if ($errors->has('date')) <p class="help-block">{{ $errors->first('date') }}</p> @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Nama Calon Debitur/ Debitur :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['customer']['personal']['name'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Pendidikan Terakhir :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['visit_report']['title_name'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Agama :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['visit_report']['religion_name'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Riwayat Kepemilikan Rekening Pinjaman :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['visit_report']['loan_history_accounts_name'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Pekerjaan / Usaha :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['customer']['work']['work'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">No Telp Kantor / Tempat Usaha :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['visit_report']['office_phone'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Rekomendasi Recontest :</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="recommendation">{{ old('recommendation') }}</textarea>
                        @if ($errors->has('recommendation')) <p class="help-block">{{ $errors->first('recommendation') }}</p> @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-4 control-label">Status Kepegawaian :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['visit_report']['employment_status_name'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Usia MPP :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['visit_report']['age_of_mpp'] }} Tahun</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Nomor NPWP :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['visit_report']['npwp_number_masking'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">No Rekening Pinjaman / ID Aplikasi :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['ref_number'] }}</p>
                    </div>
                </div>
               <!--  <div class="form-group">
                    <label class="col-md-4 control-label">Jumlah Permohonan :</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <p class="form-control-static">Rp. {{number_format($eformData['nominal'], 2, ",", ".")}}</p>
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Jenis Permohonan :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{strtoupper($eformData['product_type']) }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Tujuan Kunjungan :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{ucwords($eformData['visit_report']['purpose_of_visit']) }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Hasil Kunjungan :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['visit_report']['visit_result'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>