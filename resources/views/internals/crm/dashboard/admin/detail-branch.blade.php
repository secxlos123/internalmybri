<button type="button" name="button" data-class="list-fo" data-class-prev="list-branch" class="backBtn btn btn-info">back</button>
<table id="detail-branch" class="table table-bordered ">
  <thead class="bg-primary">
    <tr>
      <th>Pemasar</th>
      <th>Leads</th>
      <th>Prospect</th>
      <th>Sales Offered</th>
      <th>Sales Closed</th>
      <!-- <th>Status</th> -->
    </tr>
  </thead>
  <tbody>
    @foreach($marketings as $m)
    <tr>
      <td><a href="javascript:void(0);" data-branch="{{$branch}}" data-pn="{{$m['Pemasar']}}" class="sMarketing">{{$m['Nama']}}</a></td>
      <td>{{$m['Total']}}</td>
      <td>{{$m['Prospek']}}</td>
      <td>{{$m['On Progress']}}</td>
      <td>{{$m['Done']}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
