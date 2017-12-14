<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Usia MPP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$debitur['USIA_MPP']}} tahun</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Atasan Langsung :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Nama_atasan_Langsung']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPWP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['NPWP_nasabah']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. dan Tgl. Kenaikan SK Pangkat Terakhir :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$debitur['SK_KENAIKAN_PANGKAT_TERAKHIR']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Federal WH Code :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        @if($debitur['FEDERAL_WH_CODE'] == '1')
                            Kena Pajak dan Penduduk
                        @elseif($debitur['FEDERAL_WH_CODE'] == '2')
                            Kena Pajak dan Bukan Penduduk
                        @else
                            Tidak Kena Pajak
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Transaksi Normal Harian :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        @if($debitur['TRANSAKSI_NORMAL_HARIAN'] == '1')
                            0 s.d 10jt
                        @elseif($debitur['TRANSAKSI_NORMAL_HARIAN'] == '2')
                            Lebih dari 10jt s.d 50jt
                        @elseif($debitur['TRANSAKSI_NORMAL_HARIAN'] == '3')
                            Lebih dari 50jt s.d 100jt
                        @elseif($debitur['TRANSAKSI_NORMAL_HARIAN'] == '4')
                            Lebih dari 100jt s.d 1M
                        @else
                            Lebih dari 1M
                        @endif
                    </p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Tanggal Mulai Bekerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$debitur['TANGGAL_MULAI_BEKERJA']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jabatan Atasan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Jabatan_atasan']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. dan Tgl. SK Peningkatan Pegawai Pertama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$debitur['SK_PENGANGKATAN_PEGAWAI_PERTAMA']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Resident Flag :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$debitur['RESIDENT_FLAG']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pernah Pinjam di Bank Lain :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$debitur['APAKAH_PERNAH_PINJAM_DI_BANK_LAIN']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Perjanjian Pisah Harta :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($debitur['JENIS_PERJANJIAN'] == '0')
                        Tidak
                    @else
                        Ya
                    @endif
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>