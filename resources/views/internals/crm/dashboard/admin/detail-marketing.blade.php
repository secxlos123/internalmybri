
  <button type="button" name="button" data-class="list-detail-fo" data-class-prev="list-fo" class="backBtn btn btn-info">back</button>
  <table id="detail-marketing" class="table table-bordered ">
    <thead class="bg-primary">
      <tr>
        <th>Pemasar</th>
        <th>Produk</th>
        <th>Nasabah</th>
        <th>Jenis Aktivity</th>
        <th>Target</th>
        <th>Status</th>
        <!-- <th>Status</th> -->
      </tr>
    </thead>
    <tbody>
      @foreach($marketings as $m)
      <tr>
        <td>{{$m['pn_name']}}</td>
        <td>{{$m['product_type']}}</td>
        <td>{{$m['nama']}}</td>
        <td>{{$m['activity_type']}}</td>
        <td>Rp. {{$m['target']}}</td>
        <td>{{$m['status']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
