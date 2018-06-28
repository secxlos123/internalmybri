<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Mitra :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if(isset($detail['mitra']['NAMA_INSTANSI'])) 
                            ({{$detail['mitra']['NAMA_INSTANSI']}})
                    @endif</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NIP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['NIP']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Usia MPP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['usia_mpp']}} tahun</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Atasan Langsung :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['Nama_atasan_Langsung']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPWP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['no_npwp']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. dan Tgl. Kenaikan SK Pangkat Terakhir :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['no_dan_tanggal_sk_akhir']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Federal WH Code :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        <!-- hardcode las federal wh code-->
                        Kena Pajak dan Penduduk
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Transaksi Normal Harian :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        @if($detail['trans_normal_harian'] == '1')
                            s.d 10jt
                        @elseif($detail['trans_normal_harian'] == '2')
                            > 10jt s.d 50jt
                        @elseif($detail['trans_normal_harian'] == '3')
                            > 50jt s.d 100jt
                        @elseif($detail['trans_normal_harian'] == '4')
                            > 100jt s.d 1M
                        @elseif($detail['trans_normal_harian'] == '5')
                            > 1M
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Rekening :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        @if($detail['jenis_rekening'] == '1')
                            Simpanan
                        @elseif($detail['jenis_rekening'] == '2')
                            Pinjaman
                        @else
                            Tidak Ada
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Domisili / Lama Menetap :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['lama_menetap']}} tahun</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Kantor Cabang :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['mitra']['UNIT_KERJA']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Status Pekerjaan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($detail['Status_Pekerjaan'] == '0')
                        TETAP
                    @elseif($detail['Status_Pekerjaan'] == '1')
                        KONTRAK
                    @else
                        PENSIUNAN
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Tanggal Mulai Bekerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{ substr($detail['tgl_mulai_kerja'], 0, 2) }}-{{ substr($detail['tgl_mulai_kerja'], 2, 2) }}-{{ substr($detail['tgl_mulai_kerja'], -4) }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jabatan Atasan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['Jabatan_atasan']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. dan Tgl. SK Peningkatan Pegawai Pertama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['no_dan_tanggal_sk_awal']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Resident Flag :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    <!-- hardcode las, resident flag -->
                        Ya
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Perjanjian Pisah Harta :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($detail['perjanjian_pisah_harta'] == '0')
                        Tidak
                    @else
                        Ya
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Agama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($detail['agama'] == 'BUD')
                        Budha
                    @elseif($detail['agama'] == 'ISL')
                        Islam
                    @elseif($detail['agama'] == 'HIN')
                        Hindu
                    @elseif($detail['agama'] == 'KAT')
                        Katholik
                    @elseif($detail['agama'] == 'KRI')
                        Kristen
                    @else
                        Lainnya
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pernah Pinjam di Bank Lain :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['pernah_pinjam']}}</p>
                </div>
            </div>
            @if($detail['jenis_rekening'] <> '3' && !empty($detail['jenis_rekening']))
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Bank Lainnya :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['nama_bank_lain_name']}}</p>
                </div>
            </div>
            @endif
        </form>
    </div>
</div>