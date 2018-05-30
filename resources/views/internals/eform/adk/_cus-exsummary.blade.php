<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['personal']['name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Gaji :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">CRS :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['score']}} 
                        @if($detail['cutoff'] == 'Y')
                            (DITERIMA)
                        @else
                            (DITOLAK)
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jabatan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['work']['position']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Scoring Mitra :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        {{$detail['mitra']['Scoring']}}
                        @if($detail['mitra']['KET_Scoring'] != "" || !empty($detail['mitra']['KET_Scoring']) || $detail['mitra']['KET_Scoring'] != "null") 
                            ({{$detail['mitra']['KET_Scoring']}})
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Status Pengajuan Kredit :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$status}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Suku Bunga :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['Suku_bunga']}} % pertahun</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jangka Waktu :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['Jangka_waktu']}} bulan</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jenis Pinjaman :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        @if($detail['jenis_pinjaman_id'] == '1' || $detail['jenis_pinjaman_id'] == '' || $detail['jenis_pinjaman_id'] == 'null' || empty($detail['jenis_pinjaman_id']))
                            Briguna Karya
                        @elseif($detail['jenis_pinjaman_id'] == '4')
                            Briguna Talangan
                        @elseif($detail['jenis_pinjaman_id'] == '5')
                            Briguna Pekerja BRI
                        @elseif($detail['jenis_pinjaman_id'] == '2')
                            Briguna Umum
                        @else
                            Briguna Purna
                        @endif
                    </p>
                </div>
            </div>
        </form>  
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Mitra Kerjasama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['mitra']['NAMA_INSTANSI']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jumlah Permohonan Kredit :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['Plafond_usulan'], 2, ",", ".") }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Mitra Kerjasama :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['npl_instansi']}} %</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">NPL Unit Kerja :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['npl_unitkerja']}} %</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Status Payroll :</label>
                <div class="col-md-7">
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
                <label class="col-md-5 control-label">Nomor Rekening Simpanan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">
                        @if($detail['Payroll'] == '1')
                            {{$detail['no_rek_simpanan']}}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Angsuran Sesuai Plafond Kredit yang di Usulkan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['angsuran_usulan'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Portofolio Mitra Kerjasama :</label>
                <div class="col-md-7">
                    <p class="form-control-static"> -/- </p>
                </div>
            </div>
        </form>
    </div>
</div>