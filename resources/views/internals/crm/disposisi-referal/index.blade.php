@section('title','My BRI - Index Referral')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style>
  .select2-selection__clear {
    display: none;
  }
</style>
<div class="content-page">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">

          <div class="page-title-box">
            <h4 class="page-title">Daftar Referral</h4>
            <ol class="breadcrumb p-0 m-0">
              <li>
                <a href="">Dashboard</a>
              </li>
              <li class="active">
                Daftar Referral
              </li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      @if (\Session::has('success'))
      <div class="alert alert-success">{{ \Session::get('success') }}</div>
      @endif
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">
            <fieldset hidden>
              <div class="add-button">
                <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a>
                <!--  <a href="{{route('customers.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah Profil Customer</a> -->
                <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-sync"></i> Sinkronisasi Profil Customer</a>
                <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a>
              </div>
            </fieldset>
            <!-- <div id="filter" class="m-b-15">
              <div class="row">
                <div class="col-md-8">
                  <div class="card-box">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Status :</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="">
                            <option value="">Done</option>
                            <option value="">Prospek</option>
                          </select>
                        </div>
                      </div>

                    </form>
                    <div class="text-right">
                      <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="tab-scroll">
              <table id="datatable" class="table table-bordered">
                <thead class="bg-primary">
                  <tr>
                    <th>Nama Referral</th>
                    <th>Referral Id</th>
                    <th>Produk</th>
                    <th>Pemasar</th>
                    <th>Status</th>
                    <th>Assign</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($referral as $ref)
                  <tr>
                    <td>{{$ref['name']}}</td>
                    <td>{{$ref['ref_id']}}</td>
                    <td>{{$ref['product_type']}}</td>
                    <td>{{$ref['officer_name']}}</td>
                    <td>{{$ref['status']}}</td>
                    <td style="text-align:center">
                      @if($ref['status'] == 'ref')
                      <button value="{{$ref['ref_id']}}" class="btn btn-orange waves-light waves-effect w-md assign">Assign</button>
                      @elseif($ref['status'] == 'dispo')
                      <button value="{{$ref['ref_id']}}" class="btn btn-teal waves-light waves-effect w-md assign">Re-Assign</button>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="text-right">
              <a href="{{url('/add_referral')}}" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Buat Referral</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('internals.layouts.footer')
  @include('internals.layouts.foot')
  <div id="Assign-modal" class="modal fade">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form class="" action="{{url('/update_referral')}}" method="post">
              {{ csrf_field() }}
              <div class="modal-header"><h3>Pilih Pemasar</h3></div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-horizontal" role="form">
                      <div class="form-group">
                        <label class="col-md-3 control-label">Pemasar * :</label>
                        <div class="col-md-9">
                          <select required class="form-control select2" name="officer_ref" id="officer_ref">
                            <option disabled="" selected="">-- Pilih --</option>
                            @foreach($pemasar as $pm)
                            <option value="{{$pm['PERNR']}}">{{$pm['SNAME']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <input type="hidden" name="ref_id" id="ref_id" value="">
                      <input type="hidden" name="officer_name" id="officer_name" value="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="pull-right">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-orange waves-effect">Pilih</button>
                </div>
              </div>
            </form>
          </div>
      </div>
  </div>

  <script type="text/javascript">
  $(document).ready(function(){
    var table1 = $('#datatable').DataTable({
      searching : false,
      order : [[3, 'asc']],
      "language": {
        "emptyTable": "No data available in table"
      }
    });
  });
  </script>
  <script type="text/javascript">
  $(document).ready(function(){

    $('.assign').on('click', function(){
      var assign = $(this).val();
      $('#ref_id').val(assign);
      $("#Assign-modal").modal();
    });

    $('#officer_ref').on('change', function(){
      var idPemasar = $(this).val();
      var namaPemasar = $('#officer_ref option[value='+idPemasar+']').text();
      $('#officer_name').val(namaPemasar);
    });

  });
  </script>
