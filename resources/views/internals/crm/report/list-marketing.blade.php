<table id="datatable" class="table table-bordered">
  <thead class="bg-primary text-center">
    <tr>
      <th rowspan="2">No</th>
      <th rowspan="2">Bulan</th>
      <th rowspan="2">Tahun</th>
      <th rowspan="2">Wilayah</th>
      <th rowspan="2">Cabang</th>
      <th rowspan="2">Nama Pemasar</th>
      <th rowspan="2">Produk</th>
      <th rowspan="2">Jenis</th>
      <th rowspan="2">Nama Nasabah</th>
      <th rowspan="2">Target</th>
      <th colspan="3">Realisasi</th>
      <th rowspan="2">Status</th>
    </tr>
    <tr>
      <th>No Rekening</th>
      <th>Volume</th>
      <th>Tanggal Closing</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    @foreach($reports as $report)
    <tr>
      <td>{{$i}}</td>
      <td>{{$report['bulan']}}</td>
      <td>{{$report['tahun']}}</td>
      <td>{{$report['wilayah']}}</td>
      <td>{{$report['cabang']}}</td>
      <td>{{$report['fo_name']}}</td>
      <td>{{$report['product_type']}}</td>
      <td>{{$report['activity_type']}}</td>
      <td>{{$report['nama']}}</td>
      <td>{{$report['target']}}</td>
      <td>{{$report['rekening']}}</td>
      <td>{{$report['volume_rekening']}}</td>
      <td>{{$report['target_closing_date']}}</td>
      <td>{{$report['status']}}</td>
    </tr>
    <?php $i ++ ?>
    @endforeach
  </tbody>
</table>
