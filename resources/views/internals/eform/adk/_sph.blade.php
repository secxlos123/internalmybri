<style type="text/css">
  .justify {
    text-align: justify;
  }
  .right {
    text-align: right;
  }
</style>
<p class="right"><font size="0">
1/6
</font></p>
<h3>PT BANK RAKYAT INDONESIA (PERSERO) Tbk.</h3>
<hr>
<p class="justify">
  <table>
    <tr>
      <td>KC/KCP/UNIT<font size='1'>1)</font></td>
      <td>:</td>
      <td>&nbsp;{{$data_sph['kantor_cabang']}}</td>
    </tr>
    <tr>
      <td>No. SKPP</td>
      <td>:</td>
      <td>&nbsp;{{$data_sph['no_skpp']}}</td>
    </tr>
    <tr>
      <td>No. Pangkal / CIF</td>
      <td>:</td>
      <td>&nbsp;{{$data_sph['cif_las']}}</td>
    </tr>
  </table>
</p>
<h3 align="center">SURAT PENGAKUAN HUTANG</h3>
<h4 align="center">Nomor : &nbsp;{{$data_sph['no_skpp']}}</h4>
<p class="justify">
  Untuk kepentingan PT. Bank Rakyat Indonesia (Persero) Tbk sebagai Badan Hukum yang berkedudukan di Jakarta berdasarkan Anggaran Dasar Perseroan yang dimuat dalam Akta Nomor 51 tanggal 26 Mei 2008 yang dibuat dihadapan Fathiah Helmi, SH Notaris di Jakarta dan telah diumumkan dalam Berita Negara RI Nomor 68 tanggal 25 Agustus 2009, Tambahan Nomor 23079, yang telah beberapa kali diubah, perubahan Anggaran Dasar terakhir dimuat dalam Akta No. 1 tanggal 1 April 2015 yang dibuat dihadapan Fathiah Helmi, S.H. Notaris di Jakarta, yang Penerimaan Pemberitahuan Perubahan Anggaran Dasarnya telah diterima dan dicatat dalam database Sistem Administrasi Badan Hukum Kementerian Hukum dan Hak Asasi Manusia Republik Indonesia sesuai dengan suratnya tanggal 8 April 2015 Nomor AHU-AH.01.03-0054353.<br>
  Pada hari ini tanggal {{$data_sph['bil_day']}} bulan {{$data_sph['bil_month']}} tahun {{$data_sph['bil_year']}} (<?php echo date('d/m/Y')?>)<br>
  Yang bertandatangan dibawah ini :<font size='1'>2)</font>
</p> 
  <br>
  <table width="100%">
    <tr>
      <td width="5%">1.</td>
      <td width="23%">Nama</td>
      <td width="2%" align="center">:</td>
      <td width="70%">&nbsp;{{$data_sph['nama_debitur']}}</td>
    </tr>
    <tr>
      <td></td>
      <td>Pemegang KTP No.</td>
      <td align="center">:</td>
      <td>&nbsp;{{$data_sph['ktp']}}</td>
    </tr>
    <tr>
      <td></td>
      <td>Pekerjaan</td>
      <td align="center">:</td>
      <td>&nbsp;{{$data_sph['pekerjaan']}}</td>
    </tr>
    <tr>
      <td></td>
      <td>Alamat</td>
      <td align="center">:</td>
      <td>&nbsp;{{$data_sph['alamat']}}</td>
    </tr>
    <tr>
      <td>2.</td>
      <td>Nama</td>
      <td align="center">:</td>
      <?php if($data_sph['status'] == '1'){ ?>
      <td>&nbsp;-</td>
      <?php } else { ?>
      <td>&nbsp;{{$data_sph['nama_pasangan']}}</td>
      <?php } ?>
    </tr>
    <tr>
      <td></td>
      <td>Pemegang KTP No.</td>
      <td align="center">:</td>
      <?php if($data_sph['status'] == '1'){ ?>
      <td>&nbsp;-</td>
      <?php } else { ?>
      <td>&nbsp;{{$data_sph['ktp_pasangan']}}</td>
      <?php } ?>
    </tr>
    <tr>
      <td></td>
      <td>Pekerjaan</td>
      <td align="center">:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td>Alamat</td>
      <td align="center">:</td>
      <?php if($data_sph['status'] == '1'){ ?>
      <td>&nbsp;-</td>
      <?php } else { ?>
      <td>&nbsp;{{$data_sph['alamat']}}</td>
      <?php } ?>
    </tr>
  </table>
<p class="justify">
  dengan ini menggabungkan diri masing-masing untuk menanggung hutang sejumlah dibawah ini atau segala hutang yang akan timbul sehubungan dengan Surat Pengakuan Hutang ini, sehingga dengan demikian baik bersama-sama maupun sendiri-sendiri atau salah seorang saja menanggung segala hutang (hoofdelijk)<font size='1'>3)</font>, selanjutnya disebut YANG BERHUTANG, menyatakan mengaku berhutang kepada PT. Bank Rakyat Indonesia (Persero) Tbk Kanca/Kancapem/Unit<font size='1'>4)</font> {{$data_sph['kantor_cabang']}} selanjutnya disebut BANK, karena telah menerima uang sebagai pinjaman sejumlah Rp {{number_format($data_sph['pinjaman'], 2, ",", ".")}} ({{$data_sph['bil_pinjaman']}} rupiah) menurut syarat-syarat dan ketentuan-ketentuan sebagaimana tersebut berikut ini :
  <br><br><br>
  <hr>
  <font size='1'><i>1) Dicoret yang tidak perlu</i></font><br>
  <font size='1'><i>2) Diisi dengan nama, alamat, dan pekerjaan dari YANG BERHUTANG</i></font><br>
  <font size='1'><i>3) Dicoret kalimat "dengan..s/d/..segala hutang (hoofdelijk)," apabila YANG BERHUTANG hanya 1 (satu) orang</i></font><br>
  <font size='1'><i>4) Dicoret yang tidak perlu</i></font>
</p>
<!-- pasal 1 -->
<p class="right"><font size="0">
2/6
</font></p>
<p class="justify">
  <h3 align="center">PENGGUNAAN PINJAMAN</h3>
  <h4 align="center">Pasal 1</h4>
  Pinjaman yang diterima oleh YANG BERHUTANG dari BANK dipergunakan untuk keperluan {{$data_sph['tujuan']}}
</p>
<br><br>
<!-- pasal 2 -->
<p class="justify">
  <h3 align="center">JANGKA WAKTU, ANGSURAN DAN PELUNASAN MAJU</h3>
  <h4 align="center">Pasal 2</h4>
  <ol style="text-align: justify;">
    <li>
      Pokok pinjaman berikut bunganya harus dibayar kembali oleh YANG BERHUTANG kepada BANK dalam jangka waktu {{$data_sph['jangka_waktu']}} ({{$data_sph['bil_jangka']}}) bulan terhitung sejak tanggal ditandatanganinya Surat Pengakuan Hutang ini.
    </li>
    <li>
      Pokok Pinjaman berikut bunganya harus dibayar kembali oleh YANG BERHUTANG tiap-tiap bulanan dengan angsuran yang sama besarnya yang meliputi angsuran pokok dan bunga dalam {{$data_sph['jangka_waktu']}} ({{$data_sph['bil_jangka']}}) kali angsuran masing-masing sebesar Rp {{number_format($data_sph['angsuran'], 2, ",", ".")}} ({{$data_sph['bil_angsuran']}} rupiah). Angsuran tersebut harus dibayar selambat-lambatnya setiap tanggal ……… pada bulan angsuran yang bersangkutan. Dalam hal tanggal tersebut jatuh pada hari libur maka angsuran harus dibayar oleh YANG BERHUTANG pada hari kerja sebelumnya.
    </li>
    <li>
      Yang berhutang wajib membayar angsuran kredit/pinjaman sesuai dengan jangka waktu dan periode angsuran yang telah disepakati. Apabila yang berhutang melakukan pelunasan maju sebelum jangka waktu yang disepakati, maka kepada debitur diwajibkan membayar :
      <ol type="a">
        <li>Sisa Pokok Pinjaman,</li>
        <li>Bunga Berjalan,</li>
        <li>Penalty/Denda Bunga (jika ada).</li>
      </ol>
    </li>
  </ol>
</p>
<!-- pasal 3 -->
<p class="justify">
  <h3 align="center">PROVISI, DENDA DAN BIAYA-BIAYA</h3>
  <h4 align="center">Pasal 3</h4>
  <ol style="text-align: justify;">
    <li>
      YANG BERHUTANG harus membayar :
      <ol type="a">
        <li>
          Provisi sebesar {{$data_sph['provisi']}} ({{$data_sph['bil_provisi']}}) % dari Rp {{number_format($data_sph['pinjaman'], 2, ",", ".")}} ({{$data_sph['bil_pinjaman']}} rupiah) atau sebesar Rp {{number_format($data_sph['provisi_atau'], 2, ",", ".")}} ({{$data_sph['bil_prov_atau']}} rupiah).
        </li>
        <li>
          Biaya Administrasi sebesar Rp {{number_format($data_sph['biaya_adm'], 2, ",", ".")}} ({{$data_sph['bil_biaya_adm']}} rupiah). <br>
          Biaya-biaya tersebut dibayar sekaligus lunas pada saat penandatanganan Surat Pengakuan Hutang ini.
        </li>
      </ol>
    </li>
    <li>
      Tiap-tiap jumlah angsuran baik pokok dan atau bunga yang terlambat dibayarkan oleh YANG BERHUTANG dikenakan Denda sebesar 50% x suku bunga ({{$data_sph['suku_bunga']}} %) x tunggakan (pokok + bunga) setiap bulannya dan dihitung untuk setiap bulan keterlambatan.
    </li>
    <li>
      Biaya materai dan biaya lainnya yang timbul sehubungan dengan pemberian pinjaman ini merupakan beban dan harus dibayar oleh YANG BERHUTANG.
    </li>
  </ol>
  <br>
  <hr>
  <font size='1'><i>5) Kata biaya-biaya tersebut……dst, dicoret apabila biaya-biaya (provisi, administrasi dan/atau premi asuransi) dipotong dari pinjaman.</i></font><br><br><br>
</p>
<!-- pasal 4 -->
<p class="right"><font size="0">
3/6
</font></p>
<p class="justify">
  <h3 align="center">SUMBER PEMBAYARAN DAN JAMINAN</h3>
  <h4 align="center">Pasal 4</h4>
    Untuk pembayaran angsuran pinjaman dan atau untuk pelunasan segala pinjaman YANG BERHUTANG kepada BANK berupa pokok, bunga, denda dan biaya-biaya lainnya, maka YANG BERHUTANG menyerahkan dan mengalihkan kepada BANK <font size='1'>6)</font>:
  <ol style="text-align: justify;">
    <li>
      Segala Hak dari YANG BERHUTANG ({{$data_sph['nama_debitur']}})<font size='1'>7)</font> berupa gaji/upah dan atau hak-hak lainnya selaku pegawai/pekerja yang pengangkatan dan pangkat/golongan/jabatannya diterangkan dalam :
      <ul type="-">
        <li>
          Surat Keputusan Pengangkatan Pegawai yang pertama nomor {{$data_sph['no_sk_akhir']}} tanggal (-)
        </li>
        <li>
          Surat Keputusan Penetapan Pangkat Terakhir nomor {{$data_sph['no_sk_akhir']}} tanggal (-)
        </li>
      </ul>
    </li>
    <li>
      Segala hak dari YANG BERHUTANG ({{$data_sph['nama_debitur']}})<font size='1'>6)</font> berupa uang pensiun selaku pensiunan yang kepesertaan pensiunnya diterangkan dalam Surat Keputusan Pensiun Nomor (-) tanggal (-).
    </li>
    <li>
      Penghasilan dan hak-hak lain milik YANG BERHUTANG;
      <br>
      Sehingga BANK berhak untuk menerima gaji/upah/uang pensiun/hak-hak lain milik YANG BERHUTANG dimaksud sebagai pembayaran angsuran pinjaman. Untuk keperluan tersebut YANG BERHUTANG ({{$data_sph['nama_debitur']}})<font size='1'>7)</font> menyerahkan Surat Kuasa Potong Gaji/Upah/Uang Pensiun atau hak-hak lainnya milik YANG BERHUTANG (dalam hal gaji dan/atau pensiun tidak dibayarkan melalui BANK) kepada Bendaharawan/Jurubayar atau Surat Kuasa Debet Rekening kepada PT. Bank Rakyat Indonesia (Persero) Tbk)<font size='1'>8)</font>, yang akan dibuatkan kemudian dengan akta tersendiri.
    </li>
    <li><font size='1'>9)</font></li>
  </ol>
  <br><br><br><br><br>
</p>
<!-- pasal 5 -->
<p class="justify">
  <h3 align="center">ASURANSI</h3>
  <h4 align="center">Pasal 5</h4>
  <ol style="text-align: justify;">
    <li>
      Untuk kepentingan BANK, BANK mempertanggungkan atau mengasuransikan jiwa YANG BERHUTANG ({{$data_sph['nama_debitur']}})<font size='1'>10)</font> kepada Perusahaan Asuransi Jiwa rekanan BANK yang dipilih oleh YANG BERHUTANG atas beban YANG BERHUTANG dengan syarat-syarat asuransi yang berlaku.
    </li>
    <li>
      Apabila dianggap perlu BANK akan mempertanggungkan atau mengasuransikan agunan atas pinjaman ini kepada perusahaan asuransi yang rekanan BANK yang dipilih oleh YANG BERHUTANG dengan Banker’s Clause untuk dan atas nama BANK, atas beban biaya YANG BERHUTANG. 
    </li>
  </ol>
  <br><br><br>
  <hr>
  <font size='1'><i>6) Dicoret jenis jaminan yang tidak digunakan</i></font><br>
  <font size='1'><i>7) Diisi nama YANG BERHUTANG yang tercantum dalam Surat Keputusan</i></font><br>
  <font size='1'><i>8) Dicoret yang tidak perlu</i></font><br>
  <font size='1'><i>9) Diisi apabila ada agunan kebendaan</i></font><br>
  <font size='1'><i>10) Diisi nama YANG BERHUTANG yang diasuransikan sesuai ketentuan</i></font>
</p>
<!-- pasal 6 -->
<p class="right"><font size="0">
4/6
</font></p>
<p class="justify">
  <h3 align="center">KEWAJIBAN LAIN YANG BERHUTANG</h3>
  <h4 align="center">Pasal 6</h4>
    YANG BERHUTANG berkewajiban untuk menyerahkan kepada BANK :
  <ol>
    <li>Asli surat-surat keputusan</li>
    <li>Asli bukti kepemilikan agunan <font size='1'>11)</font></li>
  </ol>
  sebagaimana dimaksud pada pasal 4, untuk disimpan oleh BANK sampai dengan pinjaman lunas.
</p>
<br><br>
<!-- pasal 7 -->
<p class="justify">
  <h3 align="center">PENGAWASAN DAN PEMERIKSAAN</h3>
  <h4 align="center">Pasal 7</h4>
  BANK berhak baik dilakukan sendiri atau dilakukan oleh pihak lain yang ditunjuk BANK dan YANG BERHUTANG wajib mematuhinya untuk setiap waktu meminta keterangan dan melakukan pemeriksaan yang diperlukan BANK kepada YANG BERHUTANG.
</p>
<br><br>
<!-- pasal 8 -->
<p class="justify">
  <h3 align="center">PERNYATAAN</h3>
  <h4 align="center">Pasal 8</h4>
  YANG BERHUTANG dengan tegas menyatakan : 
  <ol style="text-align: justify;">
    <li>
      Bersedia memberikan setiap keterangan - keterangan dengan sebenar-benarnya yang diperlukan oleh BANK atau kuasanya guna keperluan pemberian pinjaman dan bersedia mempertanggungjawabkan setiap keterangan yang diberikan tersebut secara hukum apabila keterangan dimaksud tidak diberikan dengan sebenar-benarnya.
    </li>
    <li>
      Bahwa pinjaman yang diterima dari BANK tersebut akan dipergunakan untuk keperluan-keperluan sebagaimana yang diuraikan dalam pasal 1 dan setiap waktu BANK berhak memeriksa penggunaan pinjaman dimaksud.
    </li>
    <li>
      Bilamana pinjaman ternyata digunakan untuk keperluan lain, maka BANK berhak dengan seketika menagih pinjamannya dan YANG BERHUTANG diwajibkan tanpa menunda-menunda lagi membayar seluruh pinjamannya berupa pokok, bunga, denda, biaya-biaya dan kewajiban lainnya yang mungkin timbul dengan seketika dan sekaligus lunas.
    </li>
    <li>
      Bilamana pinjaman tidak dibayar lunas pada waktu yang telah ditetapkan, maka BANK berhak untuk menjual seluruh agunan sehubungan dengan pinjaman ini, baik secara dibawah tangan maupun dimuka umum, untuk dan atas nama permintaan BANK dan atas kerelaan sendiri tanpa paksaan YANG BERHUTANG dengan ini menyatakan dengan sesungguhnya akan menyerahkan/mengosongkan rumah/ bangunan sebagaimana tersebut dalam pasal 4 Surat Pengakuan Hutang ini.
    </li>
    <li>
      Apabila pernyataan ayat 4 tersebut diatas tidak dilaksanakan dengan semestinya, maka atas biaya YANG BERHUTANG sendiri, pihak BANK dengan bantuan yang berwenang dapat melaksanakannya.
    </li>
    <li>
      Apabila BANK memerlukan dan/atau untuk kepentingan YANG BERHUTANG, maka YANG BERHUTANG setuju memberikan kuasa kepada BANK untuk sewaktu-waktu dapat mengajukan permohonan dan pengurusan Nomor Pokok Wajib Pajak (NPWP) atas nama YANG BERHUTANG ke Kantor Pajak terkait.
    </li>
  </ol>
  <br>
  <hr>
  <font size='1'><i>11) Dicoret butir 2 apabila tidak ada agunan kebendaan </i></font><br>
</p>
<!-- pasal 9 -->
<p class="right"><font size="0">
5/6
</font></p>
<p class="justify">
  <h3 align="center">KLAUSULA-KLAUSULA</h3>
  <h4 align="center">Pasal 9</h4>
  <ol style="text-align: justify;">
    <li>
      Klausula Publikasi<br>
      Dalam rangka penyelesaian kewajiban YANG BERHUTANG, BANK berhak memanggil YANG BERHUTANG dan atau mengumumkan nama YANG BERHUTANG bermasalah di media massa atau media lain yang ditentukan BANK dan atau melakukan perbuatan lain yang diperlukan sampai dengan kewajiban YANG BERHUTANG lunas dan YANG BERHUTANG dengan ini memberikan ijin kepada BANK untuk melakukan tindakan-tindakan tersebut.
    </li>
    <li>
      Klausula Sell Down<br>
      BANK berhak dengan ketentuan dan syarat-syarat yang dianggap baik oleh BANK untuk :
      <ol type="a">
        <li>
          Menjual atau mengalihkan dengan cara lain sebagian atau seluruh pinjaman/ tagihan berdasarkan Surat Pengakuan Hutang serta Dokumen Agunan kepada pihak ketiga yang ditunjuk oleh BANK sendiri; dan atau
        </li>
        <li>
          Mengalihkan sebagian/seluruh piutang/hak tagih BANK (cessie) yang timbul dari Surat Pengakuan Hutang dan Dokumen Agunan (termasuk Perjanjian Pengikatan (apabila ada) beserta Dokumen bukti pengikatan dan kepemilikan Agunan) kepada pihak ketiga yang ditunjuk oleh BANK;
        </li>
        <li>
          DEBITUR dengan ini menegaskan bahwa dengan menandatangani Surat Pengakuan Hutang, DEBITUR menyetujui penjualan/pengalihan dan penyerahan hak oleh BANK tersebut yang dilakukan sesuai ketentuan dan syarat-syarat yang dianggap baik oleh BANK. 
        </li>
      </ol>
    </li>
    <li>
      Klausula Pelaporan<br>
      YANG BERHUTANG dengan Surat Pengakuan Hutang ini memberikan kuasa (persetujuan) kepada BANK:
      <ol type="a">
        <li>
          Untuk memberikan data dan/atau informasi termasuk tetapi tidak terbatas pada data/informasi tentang penyediaan dana dan/atau pinjaman yang diterima untuk dilaporkan kepada Bank Indonesia sesuai Peraturan Bank Indonesia Nomor 18/21/PBI/2016 tanggal 3 Oktober 2016 tentang Perubahan Atas PBI No. 9/14/PBI/2007 tentang Sistem Informasi Debitur berikut perubahannya.
        </li>
        <li>
          Kuasa sebagaimana dimaksud diatas tidak dapat berakhir karena sebab apapun termasuk sebagaimana ditentukan pada 1813, 1814 dan 1816 Kitab Undang-Undang Hukum Perdata. Kuasa dimaksud telah diberikan dengan ditandatanganinya Surat Pengakuan Hutang ini, sehingga tidak diperlukan kuasa tersendiri.
        </li>
      </ol>
    </li>
  </ol>
</p>
<!-- pasal 10 -->
<h3 align="center">DOMISILI</h3>
<h4 align="center">Pasal 10</h4>
<p class="justify">
  Tentang Surat Pengakuan Hutang ini dan segala akibatnya serta pelaksanaannya YANG BERHUTANG memilih tempat kedudukan hukum (domisili) yang tetap dan umum di Kantor Kepaniteraan Pengadilan Negeri {{$data_sph['pengadilan']}} dengan tidak mengurangi hak dan wewenangnya BANK untuk menuntut pelaksanaan/eksekusi atau mengajukan tuntutan hukum terhadap YANG BERHUTANG berdasarkan Surat Pengakuan Hutang ini melalui atau dihadapan Pengadilan-Pengadilan lainnya dimanapun juga di dalam wilayah Republik Indonesia.
</p>
<br><br><br><br><br>
<!-- pasal 11 -->
<p class="right"><font size="0">
6/6
</font></p>
<p class="justify">
  <h3 align="center">KETENTUAN LAIN-LAIN</h3>
  <h4 align="center">Pasal 11</h4>
  <ol style="text-align: justify;">
    <li>
      Kuasa-kuasa yang diberikan YANG BERHUTANG kepada BANK sehubungan pemberian pinjaman ini diberikan dengan hak substitusi dan tidak dapat ditarik kembali/diakhiri, baik oleh ketentuan Undang-Undang yang mengakhiri pemberian kuasa sebagaimana ditentukan dalam pasal 1813 Kitab Undang-Undang Hukum Perdata maupun oleh sebab apapun juga, dan kuasa-kuasa tersebut merupakan bagian yang tidak dapat dipisahkan dari pemberian pinjaman ini yang tanpa adanya kuasa-kuasa tersebut pengakuan hutang ini tidak akan dibuat.
    </li>
    <li>
      Segala sesuatu yang belum cukup diatur dalam pengakuan hutang ini yang oleh BANK diatur dalam surat menyurat maupun dibuatkan dengan dokumen-dokumen/akta-akta lain, merupakan bagian yang tidak dapat dipisahkan dari Surat Pengakuan Hutang ini.  
    </li>
    <li>
      Apabila selain pinjaman ini, YANG BERHUTANG memperoleh juga fasilitas pinjaman lainnya dari PT. Bank Rakyat Indonesia (Persero) Tbk, maka antara pinjaman-pinjaman tersebut berlaku cross default, yaitu apabila salah satu pinjaman macet maka mengakibatkan pinjaman lainnya macet pula, sehingga PT. Bank Rakyat Indonesia (Persero) Tbk mempunyai hak untuk mengeksekusi agunan-agunan yang telah diberikan pada masing-masing pinjaman.
    </li>
    <li>
      Terhadap pengakuan hutang ini dan segala akibatnya berlaku pula “SYARAT-SYARAT UMUM PERJANJIAN PINJAMAN DAN KREDIT PT. BANK RAKYAT INDONESIA (PERSERO) TBK” yang telah disetujui oleh YANG BERHUTANG dan mengikat YANG BERHUTANG serta merupakan satu kesatuan yang tidak dapat dipisahkan dari pengakuan hutang ini.
    </li>
    <li>
      Perjanjian ini telah disesuaikan dengan ketentuan peraturan perundang-undangan termasuk ketentuan peraturan Otoritas Jasa Keuangan.
    </li>
  </ol>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian, Surat Pengakuan Hutang ini dibuat tanpa didasarkan atas unsur paksaan, kekhilafan, penipuan dan penyalahgunaan keadaan, serta berlaku sejak tanggal ditandatanganinya.<br><br>
  <table width="100%">
    <tr>
      <td width="45%" align="center">Menerima Pengakuan dari yang BERHUTANG</td>
      <td width="10%" align="center"></td>
      <td width="45%" align="center">Ditandatangani di .......................</td>
    </tr>
    <tr>
      <td align="center"><b>BANK</b></td>
      <td></td>
      <td align="center"><b>YANG BERHUTANG</b><font size='1'> 12)</font></td>
    </tr>
    <tr>
      <td colspan="3"><br><br><br><br><br></td>
    </tr>
    <tr>
      <td><hr></td>
      <td></td>
      <td><hr></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td align="center">{{$data_sph['nama_debitur']}}</td>
    </tr>
    <?php if($data_sph['status'] != '1'){ ?>
    <tr>
      <td colspan="3"><br><br><br><br><br></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><hr></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td align="center">{{$data_sph['nama_pasangan']}}</td>
    </tr>
  </table>
  <?php } else { ?>
  </table>
  <br><br><br><br><br><br>
  <?php } ?>
  <hr>
  <font size='1'><i>12) Jika dapat menulis, YANG BERHUTANG harus menulis sendiri kalimat ”baik untuk sejumlah Rp.............. (dengan huruf ....................................) ditambah dengan bunga dan ongkos-ongkos.” </i></font><br>
</p>