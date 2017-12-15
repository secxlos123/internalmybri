<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Briguna Smart :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Briguna_smart']}}</p>
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
                <label class="col-md-5 control-label">Program Asuransi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['program_asuransi']}}</p>
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
                    <p class="form-control-static">{{$briguna['Agribisnis']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Penggunaan(SID) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Jenis_penggunaan']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Kredit(LBU) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Jenis_kredit_lbu']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Penggunaan(LBU) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Jenis_penggunaan_lbu']}}</p>
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
                    <p class="form-control-static">{{$briguna['total_exposure']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Provisi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Provisi_kredit']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pinalty :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Penalty']}}</p>
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
                    <p class="form-control-static">{{$briguna['Sifat_kredit']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Sifat Kredit(LBU) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['Sifat_kredit_lbu']}}</p>
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
                    <p class="form-control-static">{{$briguna['Kategori_kredit_lbu']}}</p>
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
            <div class="form-group">
                <label class="col-md-5 control-label">Kredit Take Over :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$briguna['kredit_take_over']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>