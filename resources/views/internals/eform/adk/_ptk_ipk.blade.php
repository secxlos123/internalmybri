<!-- <img src="/public/assets/images/favicon.png"> --><h3>PT BANK RAKYAT INDONESIA (PERSERO) Tbk.</h3>
<h3 align="center">FORMULIR PUTUSAN DAN PENCAIRAN KRETAP</h3>
<hr>
<p align="justify">
  SETUJU PEMBERIAN KREDIT KEPADA DEBITUR DIBAWAH INI :
  <table>
    <tr>
      <td>Nama Debitur</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['nama_debitur']}}</td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['alamat']}}</td>
    </tr>
    <tr>
      <td>No/Tgl SKPP</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['no_skpp']}}</td>
    </tr>
    <tr>
      <td>Instansi/Perusahaan</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['perusahaan']}}</td>
    </tr>
    <tr>
      <td>No Putusan</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['no_putusan']}}</td>
    </tr>
    <tr>
      <td>Scoring</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['scoring']}}</td>
    </tr>
  </table>
  <hr>
  Dengan struktur, tipe dan syarat kredit sebagai berikut
</p>
<table border="1" width="100%">
  <tr>
    <td width="40%">- Jumlah Kredit</td>
    <td width="2%" align="center">:</td>
    <td>&nbsp;Rp. {{number_format($data_debitur['jumlah_kredit'], 2, ",", ".")}}</td>
  </tr>
  <tr>
    <td>- Jangka Waktu Kredit</td>
    <td align="center">:</td>
    <td>&nbsp;{{$data_debitur['jangka_waktu']}} bulan</td>
  </tr>
  <tr>
    <td>- Suku bunga Kredit</td>
    <td align="center">:</td>
    <td>&nbsp;{{$data_debitur['suku_bunga']}} % pertahun</td>
  </tr>
  <tr>
    <td>- Provisi Kredit</td>
    <td align="center">:</td>
    <td>&nbsp;{{$data_debitur['provisi']}} % dari plafon kredit</td>
  </tr>
  <tr>
    <td>- Biaya Administrasi</td>
    <td align="center">:</td>
    <td>&nbsp;Rp. {{number_format($data_debitur['biaya_adm'], 2, ",", ".")}}</td>
  </tr>
  <tr>
    <td>- Penalty</td>
    <td align="center">:</td>
    <td>&nbsp;{{$data_debitur['penalty']}} % dari suku bunga yang berlaku atas tunggakan Pokok dan atau Bunga</td>
  </tr>
  <tr>
    <td>- Jumlah Angsuran</td>
    <td align="center">:</td>
    <td>&nbsp;Rp. {{number_format($data_debitur['angsuran'], 2, ",", ".")}}</td>
  </tr>
  <tr>
    <td>- Asuransi Jiwa Kredit</td>
    <td align="center">:</td>
    <td>
      &nbsp;{{$data_debitur['asuransi']}} % &nbsp; 
      Rp. {{number_format($data_debitur['premi_as_jiwa'], 2, ",", ".")}}
    </td>
  </tr>
  <tr>
    <td>- Premi Beban BRI</td>
    <td align="center">:</td>
    <td>
      &nbsp;{{$data_debitur['beban_bri']}} % &nbsp; 
      Rp. {{number_format($data_debitur['premi_beban_bri'], 2, ",", ".")}}
    </td>
  </tr>
  <tr>
    <td>- Premi Beban Debitur</td>
    <td align="center">:</td>
    <td>
      &nbsp;{{$data_debitur['beban_debitur']}} % &nbsp; 
      Rp. {{number_format($data_debitur['premi_beban_debitur'], 2, ",", ".")}}
    </td>
  </tr>
  <tr>
    <td>- Syarat-syarat lainnya</td>
    <td align="center">:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Pejabat Pemrakarsa</td>
    <td align="center">:</td>
    <td>&nbsp;{{$data_debitur['nama_ao']}}</td>
  </tr>
  <tr>
    <td>Pejabat Pemutus</td>
    <td align="center">:</td>
    <td>&nbsp;{{$data_debitur['nama_pemutus']}}</td>
  </tr>
</table>
<p align="justify">
  Setelah melakukan verifikasi dan penelitian terhadap kelengkapan dokumen dan persyaratan kredit, kami menyatakan bahwa dokumen telah lengkap dan sesuai dengan persyaratan yang ditetapkan, maka setuju untuk dilakukan pencairan kredit.
</p>
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
    <td>Nama &nbsp;&nbsp; : &nbsp; {{$data_debitur['name_adk']}}</td>
    <td>Nama &nbsp;&nbsp; : &nbsp;</td>
  </tr>
  <tr>
    <td>Jabatan &nbsp; : &nbsp;{{$data_debitur['jabatan_adk']}}</td>
    <td>Jabatan &nbsp; : &nbsp;</td>
  </tr>
  <tr>
    <td>Tanggal &nbsp; : &nbsp;<?php echo date('d/m/Y')?></td>
    <td>Tanggal &nbsp; : &nbsp;</td>
  </tr>
</table>
<p align="center">
  Integritas, Profesionalisme, Kepuasan Nasabah, Keteladanan, Penghargaan Kepada SDM
</p>