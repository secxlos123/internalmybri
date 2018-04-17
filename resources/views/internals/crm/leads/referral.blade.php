<table id="tableReferral" class="table table-bordered">
  <thead class="bg-primary">
    <tr>
      <th>No</th>
      <th>Nama Nasabah</th>
    </tr>
  </thead>
  <tbody><?php $i=1; ?>
    @foreach($referrals as $r)
    <tr>
      <td>{{$i}}</td>
      <td><a href="{{url('/leads_detail?cif='.''.'&nik='.$r['nik'])}}">{{$r['name']}}</a></td>
    </tr>
    <?php $i++ ?>
    @endforeach
  </tbody>
</table>
