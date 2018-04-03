<table id="datatable" class="table table-bordered">
  <thead class="bg-primary text-center">
    <tr>
      <th>No</th>
      <th>Wilayah</th>
      <th>Cabang</th>
      <th>Nama FO</th>
      <th>Activity</th>
      <th>Tujuan</th>
      <th>Tanggal</th>
      <th>Alamat</th>
      <th>Jenis Marketing</th>
      <th>Nama Nasabah</th>
      <th>Deskripsi</th>
      <th>Hasil Activity</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    @foreach($reports as $report)
    <tr>
      <td>{{$i}}</td>
      <td>{{$report['wilayah']}}</td>
      <td>{{$report['cabang']}}</td>
      <td>{{$report['fo_name']}}</td>
      <td>{{$report['activity']}}</td>
      <td>{{$report['tujuan']}}</td>
      <td>{{$report['tanggal']}}</td>
      <td>{{$report['alamat']}}</td>
      <td>{{$report['marketing_type']}}</td>
      <td>{{$report['nama']}}</td>
      <td>{{$report['desc']}}</td>
      <td>{{$report['result']}}</td>
    </tr>
    <?php $i++ ?>
    @endforeach
  </tbody>
</table>
