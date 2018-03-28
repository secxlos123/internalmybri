@section('title','My BRI - Index Referral')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
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
                <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-sync"></i> Sinkronisasi Profil Customer</a>
                <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a>
              </div>
            </fieldset>
            <div id="filter" class="m-b-15">
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
            </div>
            <div class="tab-scroll">
              <table id="datatable" class="table table-bordered">
                <thead class="bg-primary">
                  <tr>
                    <th>Nama Referral</th>
                    <th>Referral Id</th>
                    <th>Produk</th>
                    <th>Status</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($referral as $ref)
                  <tr>
                    <td>{{$ref['name']}}</td>
                    <td>{{$ref['ref_id']}}</td>
                    <td>{{$ref['product_type']}}</td>
                    <td>{{$ref['status']}}</td>
                    <td>{{$ref['point']}}</td>
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
