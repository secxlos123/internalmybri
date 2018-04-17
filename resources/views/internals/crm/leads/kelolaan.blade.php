
<table id="tableKelolaan" class="table table-bordered">
  <thead class="bg-primary">
    <tr>
      <th>No</th>
      <th>Nama Nasabah</th>
    </tr>
  </thead>
  <tbody><?php $i=1; ?>
    @foreach($kelolaans as $kl)
    <tr>
      <td>{{$i}}</td>
      <td><a href="{{url('/leads_detail?cif='.$kl['CIFNO']).'&nik='.''}}">{{$kl['short_name']}}</a></td>
    </tr>
    <?php $i++ ?>
    @endforeach
  </tbody>
</table>
