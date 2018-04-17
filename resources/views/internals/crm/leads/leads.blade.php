
<table id="tableLeads" class="table table-bordered">
  <thead class="bg-primary">
    <tr>
      <th>No</th>
      <th>Nama Nasabah</th>
    </tr>
  </thead>
  <tbody><?php $i=1; ?>
    @foreach($leads as $l)
    <tr>
      <td>{{$i}}</td>
      <td><a href="{{url('/leads_detail?cif='.$l['CIF']).'&nik='.''}}">{{$l['nama']}}</a></td>
    </tr>
    <?php $i++ ?>
    @endforeach
  </tbody>
</table>
