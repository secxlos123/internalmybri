<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Tanggal Perkiraan Pensiun :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Briguna Profesi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Plafond Briguna Eksisting :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Suku Bunga :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Memiliki Rekening Simpanan BRI :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Penguasaan CashFlow:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Pendapatan Profesi :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}} % pertahun</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Maksimum Angsuran Perbulan:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Maksimum Plafond:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Baki Debet:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Angsuran Sesuai Plafond Kredit yang di Usulkan:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
        </form>  
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Briguna dengan Bunga :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Potongan(Perbulan) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Angsuran Briguna Eksisting :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jangka Waktu :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Riwayat Kepemilikan Rekening Pinjaman :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_relation']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Status Payroll :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Gaji Bersih(Perbulan) :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp. {{ number_format($detail['customer']['financial']['salary'], 2, ",", ".") }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Gimmick :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jumlah Permohonan Kredit :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Jumlah Plafond Kredit Yang Diusulkan :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['customer']['contact']['emergency_name']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-10">
        <form class="form-horizontal" role="form">
            Hasil CRS
            <table>
                <tr>
                    <td>Skor Penilaian Risiko Kredit</td>
                    <td>:</td>
                    <td>{{$detail['customer']['contact']['emergency_relation']}}</td>
                </tr>
                <tr>
                    <td>Grade</td>
                    <td>:</td>
                    <td>{{$detail['customer']['contact']['emergency_relation']}}</td>
                </tr>
                <tr>
                    <td>Definisi</td>
                    <td>:</td>
                    <td>{{$detail['customer']['contact']['emergency_relation']}}</td>
                </tr>
            </table>
        </form>
    </div>
</div>