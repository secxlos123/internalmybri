<table id="tableCpp" class="table table-bordered">
  <thead class="bg-primary">
    <tr>
      <th></th>
      <th>Nama Nasabah</th>
    </tr>
  </thead>
  <tbody><?php $i=1; ?>
    @foreach($cpps as $c)
    <tr>
      <td><a href="{{url('/leads_detail?cif='.''.'&nik='.$c['nik'])}}"><img src="{{asset('assets/images/users/usermobile.png')}}" alt="" height="70"></a></td>
      <td><a href="{{url('/leads_detail?cif='.''.'&nik='.$c['nik'])}}">{{$c['name']}}</a></td>
    </tr>
    <?php $i++ ?>
    @endforeach
  </tbody>
</table>
