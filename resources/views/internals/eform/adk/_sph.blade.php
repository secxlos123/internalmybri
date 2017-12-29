<h3>PT BANK RAKYAT INDONESIA (PERSERO) Tbk.</h3>
<hr>
<p align="justify">
  <table>
    <tr>
      <td>KANTOR CABANG</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['nama_debitur']}}</td>
    </tr>
    <tr>
      <td>KANCAPEM/UNIT</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['alamat']}}</td>
    </tr>
  </table>
  <hr>
  <table>
    <tr>
      <td>No. SKPP</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['tgl_skpp']}}</td>
    </tr>
    <tr>
      <td>No. Pangkal / CIF</td>
      <td>:</td>
      <td>&nbsp;{{$data_debitur['perusahaan']}}</td>
    </tr>
  </table>
</p>
<br>
<p align="justify">
  <h3 align="center">SURAT PENGAKUAN HUTANG</h3>
  <h5 align="center">Nomor : </h5>
  <br>
  Untuk kepentingan PT. Bank Rakyat Indonesia (Persero) Tbk sebagai Badan Hukum yang berkedudukan di Jakarta berdasarkan Anggaran Dasar Perseroan yang dimuat dalam Akta Nomor 51 tanggal 26 Mei 2008 yang dibuat dihadapan Fathiah Helmi, SH Notaris di Jakarta dan telah diumumkan dalam Berita Negara RI Nomor 68 tanggal 25 Agustus 2009, Tambahan Nomor 23079, yang telah beberapa kali diubah, perubahan Anggaran Dasar terakhir dimuat dalam Akta No. 1 tanggal 1 April 2015 yang dibuat dihadapan Fathiah Helmi, S.H.
</p>
<table width="100%">
  <tr>
    <td width="5%">1.</td>
    <td width="15%">Nama</td>
    <td width="2%" align="center">:</td>
    <td>&nbsp;Rp. {{number_format($data_debitur['jumlah_kredit'], 2, ",", ".")}}</td>
  </tr>
  <tr>
    <td></td>
    <td>Pemegang KTP No.</td>
    <td align="center">:</td>
    <td>&nbsp;{{$data_debitur['jangka_waktu']}}</td>
  </tr>
  <tr>
    <td></td>
    <td>Pekerjaan</td>
    <td align="center">:</td>
    <td>&nbsp;{{$data_debitur['suku_bunga']}}</td>
  </tr>
  <tr>
    <td></td>
    <td>Alamat</td>
    <td align="center">:</td>
    <td>&nbsp;{{$data_debitur['provisi']}}</td>
  </tr>
  <tr>
    <td>2.</td>
    <td>Nama</td>
    <td align="center">:</td>
    <td>&nbsp;-</td>
  </tr>
  <tr>
    <td></td>
    <td>Pemegang KTP No.</td>
    <td align="center">:</td>
    <td>&nbsp;-</td>
  </tr>
  <tr>
    <td></td>
    <td>Pekerjaan</td>
    <td align="center">:</td>
    <td>&nbsp;-</td>
  </tr>
  <tr>
    <td></td>
    <td>Alamat</td>
    <td align="center">:</td>
    <td>&nbsp;-</td>
  </tr>
</table>
<p align="center">
  Integritas, Profesionalisme, Kepuasan Nasabah, Keteladanan, Penghargaan Kepada SDM
</p>