<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-6 control-label">Tanggal Perkiraan Pensiun :</label>
                <div class="col-md-6">
                    <p class="form-control-static">
                    {{ substr($detail['Tgl_perkiraan_pensiun'], 0, 2) }}-{{ substr($detail['Tgl_perkiraan_pensiun'], 2, 2) }}-{{ substr($detail['Tgl_perkiraan_pensiun'], -4) }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Briguna Profesi :</label>
                <div class="col-md-6">
                    <p class="form-control-static">
                    @if($detail['Briguna_profesi'] == '1')
                        Ya
                    @else
                        Tidak
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Plafond Briguna Eksisting :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{number_format($detail['Plafond_briguna_existing'], 2, ",", ".")}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Suku Bunga :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['Suku_bunga']}} % pertahun</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Memiliki Rekening Simpanan BRI :</label>
                <div class="col-md-6">
                    <p class="form-control-static">
                    @if($detail['Rek_simpanan_bri'] == '1')
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
                    @if($detail['Penguasaan_cashflow'] == '0')
                        Pembayaran gaji dilakukan sendiri
                    @elseif($detail['Penguasaan_cashflow'] == '1')
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
                        {{number_format($detail['Pendapatan_profesi'], 2, ",", ".")}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Maksimum Angsuran Perbulan :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. 
                        {{number_format($detail['Maksimum_angsuran'], 2, ",", ".")}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Maksimum Plafond :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp.
                        {{number_format($detail['maksimum_plafond'], 2, ",", ".")}}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Baki Debet :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['Baki_debet']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Angsuran Sesuai Plafond Kredit yang di Usulkan :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. 
                        {{number_format($detail['angsuran_usulan'], 2, ",", ".")}}
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
                    <p class="form-control-static">{{$detail['Sifat_suku_bunga']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Potongan Perbulan :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{ number_format($detail['Potongan_per_bulan'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Angsuran Briguna Eksisting :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. 
                    {{number_format($detail['Angsuran_briguna_existing'], 2, ",", ".")}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Jangka Waktu :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['Jangka_waktu']}} bulan</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Riwayat Kepemilikan Rekening Pinjaman :</label>
                <div class="col-md-6">
                    <p class="form-control-static">
                        @if($detail['Riwayat_pinjaman'] == '0')
                            Pembayaran angsuran selalu ditepati dan tidak pernah menunggak
                        @elseif($detail['Riwayat_pinjaman'] == '1')
                            Debitur Baru
                        @elseif($detail['Riwayat_pinjaman'] == '2')
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
                        @if($detail['Payroll'] == '1')
                            Bank BRI
                        @else
                            Non Bank BRI
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Gaji Bersih Perbulan :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{ number_format($detail['Gaji_bersih_per_bulan'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Gimmick :</label>
                <div class="col-md-6">
                    <p class="form-control-static">
                        @if($detail['gimmick'] == '1')
                            001 - BRIGUNA BERHADIAH
                        @elseif($detail['gimmick'] == '2')
                            002 - BRIGUNA UNTUNG
                        @elseif($detail['gimmick'] == '4')
                            004 - UNTUNG UNTUNG
                        @elseif($detail['gimmick'] == '6')
                            UA1 - PROMO UAT PMS EDIT
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Jumlah Permohonan Kredit :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{ number_format($detail['request_amount'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Jumlah Plafond Kredit Yang Diusulkan :</label>
                <div class="col-md-6">
                    <p class="form-control-static">Rp. {{ number_format($detail['Plafond_usulan'], 2, ",", ".") }}</p>
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
                    <p class="form-control-static">{{$detail['score']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Grade :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['grade']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Definisi :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['definisi']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label" bgcolor="blue">DITERIMA</label>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <h3 align="center">Hasil Mitra Kerjasama</h3>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Skor Mitra Kerjasama :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['mitra']['Scoring']}} ({{$detail['mitra']['Ket_Scoring']}})</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Jumlah Pekerja :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['jumlah_pekerja']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Jumlah Debitur :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['jumlah_debitur']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">NPL Mitra Kerjasama :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['npl_instansi']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">NPL Unit Kerja :</label>
                <div class="col-md-6">
                    <p class="form-control-static">{{$detail['npl_unitkerja']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>