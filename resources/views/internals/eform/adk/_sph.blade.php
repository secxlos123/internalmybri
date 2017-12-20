<h3>PT BANK RAKYAT INDONESIA (PERSERO) Tbk.</h3>
<hr>
<p align="justify">
  <table>
    <tr>
      <td>KANTOR CABANG</td>
      <td>:</td>
      <td>{{$data_debitur['nama_debitur']}}</td>
    </tr>
    <tr>
      <td>KANCAPEM/UNIT</td>
      <td>:</td>
      <td>{{$data_debitur['alamat']}}</td>
    </tr>
  </table>
  <hr>
  <table>
    <tr>
      <td>No. SKPP</td>
      <td>:</td>
      <td>{{$data_debitur['tgl_skpp']}}</td>
    </tr>
    <tr>
      <td>No. Pangkal / CIF</td>
      <td>:</td>
      <td>{{$data_debitur['perusahaan']}}</td>
    </tr>
  </table>
</p>
<br>
<p align="justify">
  <h3 align="center">SURAT PENGAKUAN HUTANG</h3>
  <h5 align="center">Nomor : </h5>
  Untuk kepentingan PT. Bank Rakyat Indonesia (Persero) Tbk sebagai badan hukum.
</p>
<table border="1" width="100%">
  <tr>
    <td width="40%">- Jumlah Kredit</td>
    <td width="2%" align="center">:</td>
    <td>Rp. {{number_format($data_debitur['jumlah_kredit'], 2, ",", ".")}}</td>
  </tr>
  <tr>
    <td>- Jangka Waktu Kredit</td>
    <td align="center">:</td>
    <td>{{$data_debitur['jangka_waktu']}} perbulan</td>
  </tr>
  <tr>
    <td>- Suku bunga Kredit</td>
    <td align="center">:</td>
    <td>{{$data_debitur['suku_bunga']}} % perbulan</td>
  </tr>
  <tr>
    <td>- Provisi Kredit</td>
    <td align="center">:</td>
    <td>{{$data_debitur['provisi']}} % dari plafon kredit</td>
  </tr>
  <tr>
    <td>- Biaya Administrasi</td>
    <td align="center">:</td>
    <td>Rp. {{number_format($data_debitur['biaya_adm'], 2, ",", ".")}}</td>
  </tr>
  <tr>
    <td>- Penalty</td>
    <td align="center">:</td>
    <td>{{$data_debitur['penalty']}} % dari suku bunga yang berlaku atas tunggakan Pokok dan atau Bunga</td>
  </tr>
  <tr>
    <td>- Jumlah Angsuran</td>
    <td align="center">:</td>
    <td>Rp. {{number_format($data_debitur['angsuran'], 2, ",", ".")}}</td>
  </tr>
  <tr>
    <td>- Asuransi Jiwa Kredit</td>
    <td align="center">:</td>
    <td>{{$data_debitur['asuransi']}}</td>
  </tr>
  <tr>
    <td>   - Premi Beban BRI</td>
    <td align="center">:</td>
    <td>{{$data_debitur['beban_bri']}}</td>
  </tr>
  <tr>
    <td>   - Premi Beban Debitur</td>
    <td align="center">:</td>
    <td>{{$data_debitur['beban_debitur']}}</td>
  </tr>
  <tr>
    <td>- Syarat-syarat lainnya</td>
    <td align="center">:</td>
    <td></td>
  </tr>
  <tr>
    <td>Pejabat Pemrakarsa</td>
    <td align="center">:</td>
    <td></td>
  </tr>
  <tr>
    <td>Pejabat Pemutus</td>
    <td align="center">:</td>
    <td></td>
  </tr>
</table>
<table border="1" width="100%">
  <tr>
    <td colspan="2" align="center">ADMINISTRASI KREDIT</td>
  </tr>
  <tr>
    <td width="50%" align="center">(MAKER)</td>
    <td align="center">
      (CHECKER/SIGNER)<br>
      Tanda tangan
    </td>
  </tr>
  <tr>
    <td>Nama : {{$data_debitur['name_adk']}}</td>
    <td>Nama : </td>
  </tr>
  <tr>
    <td>Jabatan : {{$data_debitur['jabatan_adk']}}</td>
    <td>Jabatan : </td>
  </tr>
  <tr>
    <td>Tanggal : <?php echo date('d/m/Y')?></td>
    <td>Tanggal : </td>
  </tr>
</table>
<p align="center">
  Integritas, Profesionalisme, Kepuasan Nasabah, Keteladanan, Penghargaan Kepada SDM
</p>