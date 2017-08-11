@section('title','Dashboard')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Manajemen Role</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Manajemen Role
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="add-button">
                                        <a href="{{url('/roles/create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah Role</a>
                                    </div>
                                    <table id="datatable" class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Role</th>
                                                <th>Nama Slug</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dataRole as $role)
                                            <tr>
                                                <td class="align-middle">{{$role['id']}}</td>
                                                <td class="align-middle">{{$role['name']}}</td>
                                                <td class="align-middle">{{$role['slug']}}</td>
                                                <td>
                                                    <a href="{{route('roles.edit', $role['id'])}}" class="btn btn-icon waves-effect waves-light btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" data-id="{{$role['id']}}" data-name="{{$role['name']}}">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-info btn-view" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail" data-slug="{{$role['slug']}}" data-name="{{$role['name']}}" data-id="{{$role['id']}}">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')  
@include('internals.layouts.delete-modal') 
@include('internals.roles.detail-modal') 
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable({
        });   
    });
    TableManageButtons.init();

    // var table = $('#role-datatables').DataTable();
    //     table.destroy();
    //     $('#role-datatables').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ajax: '{!! URL::route("role.datatables") !!}',
    //         columns: [
    //             // {data: 'id', name: 'id', searchable: false, orderable: false},
    //             {data: 'slug', name: 'slug'},
    //             {data: 'name', name: 'name'},
    //             {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false},
    //         ]
    //     });
</script>  

<script>
   $(document).ready(function() {
       $('.btn-delete').on('click', function(e) {
           var id = $(this).attr('data-id');
           var name = $(this).attr('data-name');
           $('#destroy').attr('action', '{{ Request::url() }}/'+id+'/delete');
           $('#delete-modal').modal('show');
           $("#delete-modal #name").html(name);
           $("#delete-modal #id").val(id);
           e.preventDefault();
       });

       $('.btn-view').on('click', function(e) {
           var id = $(this).attr('data-id');
           var name = $(this).attr('data-name');
           var slug = $(this).attr('data-slug');         
           $('#view-status').attr('action', '{{ Request::url() }}/'+id);
           $('#view-modal').modal('show');
           $("#view-modal #name").html(name);
           $("#view-modal #slug").html(slug);
           e.preventDefault();
       });
   });
</script>