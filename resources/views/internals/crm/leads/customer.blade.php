
<table id="tableCustomers" class="table table-bordered">
  <thead class="bg-primary">
    <tr>
      <th>No</th>
      <th>Nama Nasabah</th>
    </tr>
  </thead>
  <tbody><?php $i=1; ?>
    @foreach($customers as $c)
    <tr>
      <td>{{$i}}</td>
      <td><a href="{{url('/leads_detail?cif='.''.'&nik='.$c['nik'])}}">{{$c['first_name']}} {{$c['last_name']}}</a></td>
    </tr>
    <?php $i++ ?>
    @endforeach
  </tbody>
</table>
