<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-6 control-label">Tanggal Perkiraan Pensiun :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['Tgl_perkiraan_pensiun']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Briguna Profesi :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{ number_format($briguna['Briguna_profesi'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Plafond Briguna Eksisting :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{number_format($briguna['Plafond_briguna_existing'], 2, ",", ".")}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Suku Bunga :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['Suku_bunga']}} % pertahun</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Memiliki Rekening Simpanan BRI :</label>
                <div class="col-md-6">
                    <p class="form-control-static">
                    @if($briguna['Rek_simpanan_bri'] == '1')
                        Ya
                    @else
                        Tidak
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Penguasaan CashFlow :</label>
                <div class="col-md-6">
                    <p class="form-control-static">
                    @if($briguna['Penguasaan_cashflow'] == '0')
                        Pembayaran gaji dilakukan sendiri
                    @elseif($briguna['Penguasaan_cashflow'] == '1')
                        Pembayaran gaji dilakukan melalui bendahara
                    @else
                        Debet rekening melalui BRI
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Pendapatan Profesi :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. 
                        {{number_format($briguna['Pendapatan_profesi'], 2, ",", ".")}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Maksimum Angsuran Perbulan :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. 
                        {{number_format($briguna['Maksimum_angsuran'], 2, ",", ".")}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Maksimum Plafond :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp.
                        {{number_format($briguna['maksimum_plafond'], 2, ",", ".")}}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Baki Debet :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['Baki_debet']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Angsuran Sesuai Plafond Kredit yang di Usulkan :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. 
                        {{number_format($briguna['angsuran_usulan'], 2, ",", ".")}}
                    </p>
                </div>
            </div>
        </form>  
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-6 control-label">Briguna dengan Bunga :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['Sifat_suku_bunga']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Potongan(Perbulan) :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{ number_format($briguna['Potongan_per_bulan'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Angsuran Briguna Eksisting :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. 
                    {{number_format($briguna['Angsuran_briguna_existing'], 2, ",", ".")}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Jangka Waktu :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['Jangka_waktu']}} bulan</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Riwayat Kepemilikan Rekening Pinjaman :</label>
                <div class="col-md-6">
                    <p class="form-control-static">
                        @if($briguna['Riwayat_pinjaman'] == '0')
                            Pembayaran angsuran selalu ditepati dan tidak pernah menunggak
                        @elseif($briguna['Riwayat_pinjaman'] == '1')
                            Debitur Baru
                        @elseif($briguna['Riwayat_pinjaman'] == '2')
                            Pernah menunggak namun tunggakan angsuran sudah dilunasi
                        @else
                            Masih ada tunggakan
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Status Payroll :</label>
                <div class="col-md-6">
                    <p class="form-control-static">
                    @if($briguna['Payroll'] == '1')
                        Payroll Bank BRI
                    @else
                        Payroll Non BRI
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Gaji Bersih(Perbulan) :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Gimmick :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['gimmick']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Jumlah Permohonan Kredit :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{ number_format($briguna['request_amount'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Jumlah Plafond Kredit Yang Diusulkan :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{ number_format($briguna['Plafond_usulan'], 2, ",", ".") }}</p>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <h3 align="center">Hasil CRS</h3>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Skor Penilaian Risiko Kredit :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['score']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Grade :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['grade']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Definisi :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['definisi']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Scoring Mitra :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$briguna['scoring_mitra']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>