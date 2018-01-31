<style type="text/css">
  .justify {
    text-align: justify;
  }
  .right {
    text-align: right;
  }
</style>
<p class="right"><font size="0">1/4</font></p>
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
<h3 align="center">ADDENDUM ................</h3>
<h3 align="center">SURAT PENGAKUAN HUTANG</h3>
<h4 align="center">Nomor : &nbsp;{{$data_sph['no_skpp']}}</h4>
<p class="justify">
  Untuk kepentingan PT. Bank Rakyat Indonesia (Persero) Tbk sebagai Badan Hukum yang berkedudukan di Jakarta berdasarkan Anggaran Dasar Perseroan yang dimuat dalam Akta Nomor 51 tanggal 26 Mei 2008 yang dibuat dihadapan Fathiah Helmi, SH Notaris di Jakarta dan telah diumumkan dalam Berita Negara RI Nomor 68 tanggal 25 Agustus 2009, Tambahan Nomor 23079, yang telah beberapa kali diubah, perubahan Anggaran Dasar terakhir dimuat dalam Akta No. 1 tanggal 1 April 2015 yang dibuat dihadapan Fathiah Helmi, S.H., Notaris di Jakarta, yang Penerimaan Pemberitahuan Perubahan Anggaran Dasarnya telah diterima dan dicatat dalam database Sistem Administrasi Badan Hukum Kementerian Hukum dan Hak Asasi Manusia Republik Indonesia sesuai dengan suratnya tanggal 8 April 2015 Nomor AHU-AH.01.03-0054353.<br>
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
  dengan ini menggabungkan diri masing-masing untuk menanggung hutang sejumlah dibawah ini atau segala hutang yang akan timbul sehubungan dengan Addendum Surat Pengakuan Hutang ini, sehingga dengan demikian baik bersama-sama maupun sendiri-sendiri atau salah seorang saja menanggung segala hutang (hoofdelijk)<font size='1'>3)</font>, selanjutnya disebut YANG BERHUTANG ;<br>
  YANG BERHUTANG terlebih dahulu menerangkan hal-hal sebagai berikut :
  <br><br><br>
  <hr>
  <font size='1'><i>1) Dicoret yang tidak perlu.</i></font><br>
  <font size='1'><i>2) Diisi dengan nama, alamat, dan pekerjaan dari YANG BERHUTANG.</i></font><br>
  <font size='1'><i>3) Dicoret kalimat ”dengan....s/d....segala hutang (hoofdelijk” apabila YANG BERHUTANG hanya 1 (satu) orang.</i></font><br>
</p>

<!-- pasal 1 -->
<p class="right"><font size="0">2/4</font></p>
<p class="justify">
  <ol class="justify">
    <li>
      YANG BERHUTANG  telah berhutang kepada PT. Bank Rakyat Indonesia (Persero) Tbk Kanca/Kancapem/Unit<font size='1'>4)</font> {{$data_sph['kantor_cabang']}} selanjutnya disebut BANK, karena telah menerima uang sebagai pinjaman sesuai dengan : Surat Pengakuan Hutang atas nama {{$data_sph['nama_debitur']}} Nomor .......................... tanggal ..........-..........-.............. berikut perubahannya yang dimuat dalam :
      <ol type="a">
        <li>
          Addendum I Surat Pengakuan Hutang Nomor .......................... tanggal ..........-..........-.............
        </li>
        <li>
          Addendum II Surat Pengakuan Hutang Nomor .......................... tanggal ..........-..........-............
        </li>
        <li>
          Terakhir dengan Addendum .......................... Surat Pengakuan Hutang Nomor .......................... tanggal ..........-..........-...........
        </li>
      </ol>
      Surat Pengakuan Hutang tersebut diatas / Surat Pengakuan Hutang beserta addendumnya tersebut diatas <font size='1'>4)</font>  selanjutnya disebut SPH. Atas pinjaman tersebut, YANG BERHUTANG menerima penambahan/suplesi dari BANK sejumlah Rp. ..................................... (.......................................................... Rupiah).
    </li>
    <li>
      Terhadap jumlah pinjaman yang tercantum dalam SPH tersebut diatas, pokok pinjamannya telah berkurang sehingga menjadi sebesar Rp. ....................................... (.............................................. Rupiah) dan dengan adanya pemberian  suplesi/penambahan dari BANK sebesar  Rp. ...................................... (.............................................. Rupiah) maka YANG BERHUTANG dengan sesungguhnya mengaku bahwa pokok pinjamannya kepada BANK pada saat ini menjadi sebesar Rp. {{number_format($data_sph['pinjaman'], 2, ",", ".")}} ({{$data_sph['bil_pinjaman']}} Rupiah)
    </li>
    <li>
      Terhadap pokok pinjaman YANG BERHUTANG sebagaimana pada butir 2 tersebut di atas BANK memberikan jangka waktu selama {{$data_sph['jangka_waktu']}} ({{$data_sph['bil_jangka']}}) bulan terhitung sejak tanggal ditandatanganinya addendum ini. Dengan demikian terhadap jangka waktu pinjaman, YANG BERHUTANG memperoleh perpanjangan selama ............ (......................) bulan.
    </li>
  </ol>
  Berdasarkan hal-hal tersebut diatas maka syarat-syarat dan ketentuan-ketentuan pinjaman yang terdapat dalam SPH diadakan perubahan, sehingga menjadi sebagai berikut :
</p><br><br><br>
<!-- pasal 2 -->
<p class="justify">
  <h3 align="center">JANGKA WAKTU, ANGSURAN DAN PELUNASAN MAJU</h3>
  <h4 align="center">Pasal 2</h4>
  <ol style="text-align: justify;">
    <li>
      Pokok pinjaman berikut bunganya harus dibayar kembali oleh YANG BERHUTANG kepada BANK dalam jangka waktu {{$data_sph['jangka_waktu']}} ({{$data_sph['bil_jangka']}}) bulan terhitung sejak tanggal ditandatanganinya Surat Pengakuan Hutang ini.
    </li>
    <li>
      Pokok Pinjaman berikut bunganya harus dibayar kembali oleh YANG BERHUTANG tiap-tiap bulanan dengan angsuran yang sama besarnya yang meliputi angsuran pokok dan bunga dalam {{$data_sph['jangka_waktu']}} ({{$data_sph['bil_jangka']}}) kali angsuran masing-masing sebesar Rp. {{number_format($data_sph['angsuran'], 2, ",", ".")}} ({{$data_sph['bil_angsuran']}} Rupiah). Angsuran tersebut harus dibayar selambat-lambatnya setiap tanggal ............. pada bulan angsuran yang bersangkutan. Dalam hal tanggal tersebut jatuh pada hari libur maka angsuran harus dibayar oleh YANG BERHUTANG pada hari kerja sebelumnya.
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
  <hr>
  <font size='1'><i>4) Dicoret yang tidak perlu.</i></font><br>
</p>
<p class="right"><font size="0">3/4</font></p>
<!-- pasal 3 -->
<p class="justify">
  <h3 align="center">PROVISI, DENDA DAN BIAYA-BIAYA</h3>
  <h4 align="center">Pasal 3</h4>
  <ol style="text-align: justify;">
    <li>
      YANG BERHUTANG harus membayar :
      <ol type="a">
        <li>
          Provisi sebesar {{$data_sph['provisi']}} ({{$data_sph['bil_provisi']}}) % dari Rp {{number_format($data_sph['pinjaman'], 2, ",", ".")}} ({{$data_sph['bil_pinjaman']}} Rupiah) atau sebesar Rp {{number_format($data_sph['provisi_atau'], 2, ",", ".")}} ({{$data_sph['bil_prov_atau']}} Rupiah).
        </li>
        <li>
          Biaya Administrasi sebesar Rp {{number_format($data_sph['biaya_adm'], 2, ",", ".")}} ({{$data_sph['bil_biaya_adm']}} Rupiah). <br>
          Biaya-biaya tersebut dibayar sekaligus lunas pada saat penandatanganan addendum ini.
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
</p>
<!-- pasal 4 -->
<p class="justify">
  <h3 align="center">SUMBER PEMBAYARAN DAN AGUNAN</h3>
  <h4 align="center">Pasal 4</h4>
  <ol class="justify">
    <li>
      Sumber pembayaran angsuran pinjaman YANG BERHUTANG kepada BANK dapat bersumber dari<font size='1'>5)</font> :
      <ol type="a">
        <li>
          Segala Hak dari YANG BERHUTANG ({{$data_sph['nama_debitur']}}) <font size='1'>6)</font> berupa gaji/upah dan atau hak-hak lainnya selaku pegawai/pekerja yang pengangkatan dan pangkat/golongan/jabatannya diterangkan dalam :
          <ol type="-">
            <li>
              Surat Keputusan Pengangkatan Pegawai yang pertama Nomor {{$data_sph['no_sk_awal']}} tanggal ..................
            </li>
            <li>
              Surat Keputusan Penetapan Pangkat Terakhir Nomor {{$data_sph['no_sk_akhir']}} tanggal ..................
            </li>
          </ol>
        </li>
        <li>
          Segala hak dari YANG BERHUTANG ({{$data_sph['nama_debitur']}})<font size='1'>6)</font> berupa uang pensiun selaku pensiunan yang kepesertaan pensiunnya diterangkan dalam Surat Keputusan Pensiun Nomor .......................... tanggal ................;
        </li>
        <li>
          Penghasilan dan hak-hak lain milik YANG BERHUTANG;
        </li>
      </ol>
      Sehingga BANK berhak untuk menerima gaji/upah/uang pensiun/hak-hak lain milik YANG BERHUTANG dimaksud sebagai pembayaran angsuran pinjaman. Untuk keperluan tersebut YANG BERHUTANG ({{$data_sph['nama_debitur']}})<font size='1'>7)</font> menyerahkan Surat Kuasa Potong Gaji/Upah/Uang Pensiun atau hak-hak lainnya milik YANG BERHUTANG (dalam hal gaji dan/atau pensiun tidak dibayarkan melalui BANK) kepada Bendaharawan/Jurubayar atau Surat Kuasa Debet Rekening kepada PT. Bank Rakyat Indonesia (Persero) Tbk)<font size='1'>7)</font>, yang akan dibuatkan kemudian dengan akta tersendiri.
    </li>
    <li>
      Yang dijadikan Agunan adalah :
      <ol type="a">
        <li>
          Agunan Pokok : SK Asli Pengangkatan Pertama dan SK Kenaikan Pangkat Terakhir atau SK Pensiun dan KARIP (bagi debitur pensiunan).
        </li>
        <li>
          Agunan Tambahan :.....................................<font size='1'>8)</font>
        </li>
      </ol>
    </li>
    <li>
      Selambat-lambatnya setiap tanggal ............... pada bulan angsuran yang bersangkutan sebagaimana dimaksud pada Pasal 2 ayat 2 di atas, YANG BERHUTANG wajib menyediakan dana angsuran sebesar 1 (satu) kali angsuran di rekening milik YANG BERHUTANG yang digunakan sebagai sumber pembayaran angsuran pinjaman.
    </li>
  </ol>
  <br>
  <hr>
  <font size='1'><i>5) Dicoret jenis agunan yang tidak digunakan</i></font><br>
  <font size='1'><i>6) Diisi nama YANG BERHUTANG yang tercantum dalam Surat Keputusan</i></font><br>
</p>
<p class="right"><font size="0">4/4</font></p>
<!-- pasal 5 -->
<p class="justify">
  <h3 align="center">ASURANSI</h3>
  <h4 align="center">Pasal 5</h4>
  <ol style="text-align: justify;">
    <li>
      Untuk kepentingan BANK, BANK mempertanggungkan atau mengasuransikan jiwa YANG BERHUTANG ({{$data_sph['nama_debitur']}})<font size='1'>9)</font> kepada Perusahaan Asuransi Jiwa rekanan BANK yang dipilih oleh YANG BERHUTANG atas beban YANG BERHUTANG dengan syarat-syarat asuransi yang berlaku.
    </li>
    <li>
      Apabila dianggap perlu BANK akan mempertanggungkan atau mengasuransikan agunan atas pinjaman ini kepada perusahaan asuransi yang rekanan BANK yang dipilih oleh YANG BERHUTANG dengan Banker’s Clause untuk dan atas nama BANK, atas beban biaya YANG BERHUTANG. 
    </li>
  </ol>
</p>
<p class="justify">
  Demikian, addendum ini dibuat dan berlaku sejak tanggal ditandatanganinya serta merupakan satu kesatuan yang tidak dapat dipisahkan dari SPH sehingga addendum ini tidak akan dibuat tanpa adanya SPH. Dengan dibuatnya addendum ini maka hal-hal dan ketentuan-ketentuan yang terdapat dalam SPH yang tidak secara tegas dirubah dengan addendum ini masih tetap berlaku dan mengikat.
  <br><br>
  <table width="100%">
    <tr>
      <td width="45%" align="center">Menerima Pengakuan dari yang BERHUTANG</td>
      <td width="10%" align="center"></td>
      <td width="45%" align="center">Ditandatangani di .......................</td>
    </tr>
    <tr>
      <td align="center"><b>BANK</b></td>
      <td></td>
      <td align="center"><b>YANG BERHUTANG</b><font size='1'> 10)</font></td>
    </tr>
    <tr>
      <td colspan="3"><br><br><br><br></td>
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
      <td colspan="3"><br><br><br><br></td>
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
  <br><br><br><br><br>
  <?php } ?>
  <br><br><br>
  <hr>
  <font size='1'><i>7) Dicoret yang tidak perlu</i></font><br>
  <font size='1'><i>8) Diisi apabila ada agunan kebendaan</i></font><br>
  <font size='1'><i>9) Diisi nama YANG BERHUTANG yang diasuransikan sesuai ketentuan</i></font><br>
  <font size='1'><i>10) Jika dapat menulis, YANG BERHUTANG harus menulis sendiri kalimat ”baik untuk sejumlah Rp................... (dengan huruf ......................................................) ditambah dengan bunga dan ongkos-ongkos.”</i></font>
</p>