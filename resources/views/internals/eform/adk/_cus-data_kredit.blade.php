<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Briguna Smart :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($briguna['Briguna_smart'] == '0')
                        Ya
                    @else
                        Tidak
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Sandi STP :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Sandi_stp']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Penggunaan Kredit :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Penggunaan_kredit']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Baru/Perpanjangan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($briguna['baru_atau_perpanjang'] == '0')
                        Kredit Baru
                    @else
                        Kredit Suplesi / Perpanjangan
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Biaya Administrasi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($briguna['Biaya_administrasi'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pengadilan Terdekat :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Pengadilan_terdekat']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Agribisnis :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($briguna['Agribisnis'] == 'N')
                        Tidak
                    @else
                        Ya
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Penggunaan(SID) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($briguna['Jenis_penggunaan'] == '10')
                        Modal Kerja - Kredit Modal Kerja Permanen (KMKP)
                    @elseif($briguna['Jenis_penggunaan'] == '16')
                        Modal Kerja - Kredit Umum Pedesaan (Kupedes)
                    @elseif($briguna['Jenis_penggunaan'] == '18')
                        Modal Kerja - Kredit kelolaan
                    @elseif($briguna['Jenis_penggunaan'] == '25')
                        Modal Kerja - Kredit Perkebunan Swasta Nasional (PSN)
                    @elseif($briguna['Jenis_penggunaan'] == '26')
                        Modal Kerja - Kredit Ekspor
                    @elseif($briguna['Jenis_penggunaan'] == '28')
                        Modal Kerja - Kredit Koperasi - Kredit Usaha Tani (KUT)
                    @elseif($briguna['Jenis_penggunaan'] == '32')
                        Modal Kerja - Kredit Koperasi - Kredit kepada Koperasi Unit Desa (KUD)
                    @elseif($briguna['Jenis_penggunaan'] == '36')
                        Modal Kerja - Kredit Koperasi - Kredit kepada Koperasi Primer untuk Anggotanya
                    @elseif($briguna['Jenis_penggunaan'] == '38')
                        Modal Kerja - Kredit Koperasi - Lainnya
                    @elseif($briguna['Jenis_penggunaan'] == '39')
                        Kredit modal kerja lainnya
                    @elseif($briguna['Jenis_penggunaan'] == '42')
                        Investasi - Kredit Investasi Kecil (KIK)
                    @elseif($briguna['Jenis_penggunaan'] == '45')
                        Investasi - PIR-BUN - Kredit Kebun Inti
                    @elseif($briguna['Jenis_penggunaan'] == '46')
                        Investasi - PIR-BUN - Kredit Kebun Plasma
                    @elseif($briguna['Jenis_penggunaan'] == '47')
                        Investasi - PIR-BUN - Kredit Pasca Konversi PIR-BUN
                    @elseif($briguna['Jenis_penggunaan'] == '48')
                        Investasi - UPP - Kredit Peremajaan Rehabilitasi Perluasan Tanaman Ekspor (PRPTE)
                    @elseif($briguna['Jenis_penggunaan'] == '49')
                        Investasi - UPP - Kredit Pasca Konversi PRPTE
                    @elseif($briguna['Jenis_penggunaan'] == '50')
                        Investasi - UPP - Lainnya
                    @elseif($briguna['Jenis_penggunaan'] == '51')
                        Investasi - PIR-TRANS - Kredit Kebun Inti
                    @elseif($briguna['Jenis_penggunaan'] == '52')
                        Investasi - PIR-TRANS - Kredit Kebun Plasma
                    @elseif($briguna['Jenis_penggunaan'] == '53')
                        Investasi - PIR-TRANS - Kredit Pasca Konversi
                    @elseif($briguna['Jenis_penggunaan'] == '54')
                        Investasi - Kredit Perkebunan Swasta Nasional (PSN)
                    @elseif($briguna['Jenis_penggunaan'] == '55')
                        Investasi - Bantuan Proyek - Nilai lawan valuta asing
                    @elseif($briguna['Jenis_penggunaan'] == '56')
                        Investasi - Bantuan Proyek - Biaya lokal Rekening Dana Investasi (RDI)
                    @elseif($briguna['Jenis_penggunaan'] == '57')
                        Investasi - Bantuan Proyek - Biaya lokal dana perbankan
                    @elseif($briguna['Jenis_penggunaan'] == '59')
                        Investasi - Kredit kelolaan di luar bantuan proyek
                    @elseif($briguna['Jenis_penggunaan'] == '60')
                        Investasi - Kredit Umum Pedesaan (Kupedes)
                    @elseif($briguna['Jenis_penggunaan'] == '62')
                        Investasi - Kredit Koperasi - Kredit kepada Koperasi Primer untuk Anggotanya
                    @elseif($briguna['Jenis_penggunaan'] == '63')
                        Investasi - Kredit Koperasi - Lainnya
                    @elseif($briguna['Jenis_penggunaan'] == '64')
                        Investasi - DLBS - Nilai lawan valuta asing
                    @elseif($briguna['Jenis_penggunaan'] == '67')
                        Investasi - DLBS - Kredit Rupiah
                    @elseif($briguna['Jenis_penggunaan'] == '74')
                        Investasi - Kredit Investasi sampai dengan Rp. 75 juta
                    @elseif($briguna['Jenis_penggunaan'] == '75')
                        Investasi - Kredit Investasi Biasa
                    @elseif($briguna['Jenis_penggunaan'] == '76')
                        Investasi - Kredit Ekspor
                    @elseif($briguna['Jenis_penggunaan'] == '79')
                        Investasi - Kredit Investasi Lainnya
                    @elseif($briguna['Jenis_penggunaan'] == '80')
                        KPR Sangat Sederhana (KPRSS) dan Kredit Pemilikan Kapling Siap Bangun (PKSB)
                    @elseif($briguna['Jenis_penggunaan'] == '81')
                        Pemilikan Rumah KPR Sederhana (KPRS) s.d. Tipe 21
                    @elseif($briguna['Jenis_penggunaan'] == '82')
                        Pemilikan Rumah Di atas tipe 21 s.d tipe 70
                    @elseif($briguna['Jenis_penggunaan'] == '83')
                        Pemilikan Rumah Di atas tipe 70
                    @elseif($briguna['Jenis_penggunaan'] == '85')
                        Perbaikan/Pemugaran Rumah
                    @elseif($briguna['Jenis_penggunaan'] == '86')
                        Kredit Kepada Guru untuk Pembelian Sepeda Motor (KPG)
                    @elseif($briguna['Jenis_penggunaan'] == '87')
                        Kredit Mahasiswa Indonesia
                    @elseif($briguna['Jenis_penggunaan'] == '88')
                        Kredit Rumah Toko
                    @elseif($briguna['Jenis_penggunaan'] == '89')
                        Kredit Konsumsi Lainnya
                    @elseif($briguna['Jenis_penggunaan'] == '90')
                        Pemilikan Rumah s/d Tipe 36
                    @else
                        Pemilikan Rumah Di atas Tipe 36
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Kredit(LBU) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($briguna['Jenis_kredit_lbu'] == '5')
                        Kredit yang diberikan
                    @elseif($briguna['Jenis_kredit_lbu'] == '10')
                        Dalam rangka pembiayaan bersama
                    @elseif($briguna['Jenis_kredit_lbu'] == '20')
                        Pihak ketiga melalui lembaga lain secara Channelling
                    @elseif($briguna['Jenis_kredit_lbu'] == '25')
                        Pihak ketiga melalui lembaga lain secara Executing
                    @elseif($briguna['Jenis_kredit_lbu'] == '45')
                        Surat Berharga denga Note Purchase Agreement
                    @elseif($briguna['Jenis_kredit_lbu'] == '80')
                        Giro Bersaldo Debet
                    @elseif($briguna['Jenis_kredit_lbu'] == '85')
                        Tagihan atas transaksi perdagangan
                    @else
                        Lainnya
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Penggunaan(LBU) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($briguna['Jenis_penggunaan_lbu'] == '10')
                        Modal Kerja - Kredit Modal Kerja Permanen (KMKP)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '16')
                        Modal Kerja - Kredit Umum Pedesaan (Kupedes)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '18')
                        Modal Kerja - Kredit kelolaan
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '25')
                        Modal Kerja - Kredit Perkebunan Swasta Nasional (PSN)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '26')
                        Modal Kerja - Kredit Ekspor
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '28')
                        Modal Kerja - Kredit Koperasi - Kredit Usaha Tani (KUT)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '32')
                        Modal Kerja - Kredit Koperasi - Kredit kepada Koperasi Unit Desa (KUD)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '36')
                        Modal Kerja - Kredit Koperasi - Kredit kepada Koperasi Primer untuk Anggotanya
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '38')
                        Modal Kerja - Kredit Koperasi - Lainnya
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '39')
                        Kredit modal kerja lainnya
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '42')
                        Investasi - Kredit Investasi Kecil (KIK)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '45')
                        Investasi - PIR-BUN - Kredit Kebun Inti
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '46')
                        Investasi - PIR-BUN - Kredit Kebun Plasma
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '47')
                        Investasi - PIR-BUN - Kredit Pasca Konversi PIR-BUN
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '48')
                        Investasi - UPP - Kredit Peremajaan Rehabilitasi Perluasan Tanaman Ekspor (PRPTE)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '49')
                        Investasi - UPP - Kredit Pasca Konversi PRPTE
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '50')
                        Investasi - UPP - Lainnya
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '51')
                        Investasi - PIR-TRANS - Kredit Kebun Inti
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '52')
                        Investasi - PIR-TRANS - Kredit Kebun Plasma
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '53')
                        Investasi - PIR-TRANS - Kredit Pasca Konversi
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '54')
                        Investasi - Kredit Perkebunan Swasta Nasional (PSN)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '55')
                        Investasi - Bantuan Proyek - Nilai lawan valuta asing
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '56')
                        Investasi - Bantuan Proyek - Biaya lokal Rekening Dana Investasi (RDI)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '57')
                        Investasi - Bantuan Proyek - Biaya lokal dana perbankan
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '59')
                        Investasi - Kredit kelolaan di luar bantuan proyek
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '60')
                        Investasi - Kredit Umum Pedesaan (Kupedes)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '62')
                        Investasi - Kredit Koperasi - Kredit kepada Koperasi Primer untuk Anggotanya
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '63')
                        Investasi - Kredit Koperasi - Lainnya
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '64')
                        Investasi - DLBS - Nilai lawan valuta asing
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '67')
                        Investasi - DLBS - Kredit Rupiah
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '74')
                        Investasi - Kredit Investasi sampai dengan Rp. 75 juta
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '75')
                        Investasi - Kredit Investasi Biasa
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '76')
                        Investasi - Kredit Ekspor
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '79')
                        Investasi - Kredit Investasi Lainnya
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '80')
                        KPR Sangat Sederhana (KPRSS) dan Kredit Pemilikan Kapling Siap Bangun (PKSB)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '81')
                        Pemilikan Rumah KPR Sederhana (KPRS) s.d. Tipe 21
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '82')
                        Pemilikan Rumah Di atas tipe 21 s.d tipe 70
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '83')
                        Pemilikan Rumah Di atas tipe 70
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '85')
                        Perbaikan/Pemugaran Rumah
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '86')
                        Kredit Kepada Guru untuk Pembelian Sepeda Motor (KPG)
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '87')
                        Kredit Mahasiswa Indonesia
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '88')
                        Kredit Rumah Toko
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '89')
                        Kredit Konsumsi Lainnya
                    @elseif($briguna['Jenis_penggunaan_lbu'] == '90')
                        Pemilikan Rumah s/d Tipe 36
                    @else
                        Pemilikan Rumah Di atas Tipe 36
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Perusahaan Asuransi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Perusahaan_asuransi']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Premi Beban BRI :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Premi_beban_bri']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pemrakarsa :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['branch_id']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Instansi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['npl_instansi']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jumlah Pekerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['jumlah_pekerja']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jumlah Debitur :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['jumlah_debitur']}}</p>
                </div>
            </div>
        </form>  
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Kode Fasilitas :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Kode_fasilitas']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Tujuan Penggunaan Kredit :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Tujuan_penggunaan_kredit']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Total Eksposure Group Debitur Selain Debitur :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{$briguna['total_exposure']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Provisi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Provisi_kredit']}} %</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pinalty :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Penalty']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Kredit Take Over :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['kredit_take_over']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">BUPLN :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{ $briguna['Bupln'] }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Sifat Kredit(SID) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($briguna['Sifat_kredit'] == '10')
                        Dalam rangka pembiayaan bersama
                    @elseif($briguna['Sifat_kredit'] == '15')
                        Dalam rangka restrukturisasi kredit
                    @elseif($briguna['Sifat_kredit'] == '20')
                        Penyaluran kredit melalui lembaga lain (channelling)
                    @elseif($briguna['Sifat_kredit'] == '30')
                        Kartu kredit
                    @elseif($briguna['Sifat_kredit'] == '40')
                        Pengambilalihan kredit
                    @elseif($briguna['Sifat_kredit'] == '45')
                        Surat berharga dengan Note Purchase Agreement (NPA)
                    @elseif($briguna['Sifat_kredit'] == '50')
                        Pembiayaan Musyarakah
                    @elseif($briguna['Sifat_kredit'] == '55')
                        Pembiayaan Mudharabah
                    @elseif($briguna['Sifat_kredit'] == '60')
                        Piutang Murabahah
                    @elseif($briguna['Sifat_kredit'] == '65')
                        Piutang Salam
                    @elseif($briguna['Sifat_kredit'] == '70')
                        Piutang Istishna
                    @elseif($briguna['Sifat_kredit'] == '79')
                        Lainnya dgn PK
                    @elseif($briguna['Sifat_kredit'] == '80')
                        Giro bersaldo debet
                    @elseif($briguna['Sifat_kredit'] == '85')
                        Tagihan atas transaksi perdagangan
                    @else
                        Lainnya Tanpa PK
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Sifat Kredit(LBU) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                    @if($briguna['Sifat_kredit_lbu'] == '1')
                        Kredit yang direstrukturisasi
                    @elseif($briguna['Sifat_kredit_lbu'] == '2')
                        Pengambilalihan Kredit
                    @elseif($briguna['Sifat_kredit_lbu'] == '3')
                        Kredit Subordinasi
                    @else
                        Lainnya
                    @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Sektor Ekonomi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Sektor_ekonomi_sid']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Kategori Kredit(LBU) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Ditetapkan untuk dijual berdasarkan nilai wajar</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Sumber Aplikasi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Sumber_aplikasi']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Premi Asuransi Jiwa :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Premi_asuransi_jiwa']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Premi Beban Debitur :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Premi_beban_debitur']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Uker Pemrakarsa :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['pemrakarsa_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Unit Kerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['npl_unitkerja']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>