@section('title','My BRI - Manajemen Role')
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
                                                <th>Nama Role</th>
                                                <th>Nama Slug</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
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
        var table = $('#datatable').dataTable({
            processing : true,
            serverSide : true,
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/roles',
            },
            aoColumns : [
                { data: 'name', name: 'name' },
                { data: 'slug', name: 'slug' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });   

        $('#datatable').on('click','.btn-delete', function(e) {
            $('#destroy').attr('action', $(this).data('url'));
            $('#delete-modal').modal('show');
            // $("#delete-modal #name").html(name);
            // $("#delete-modal #id").val(id);
            e.preventDefault();
        });

        $('#datatable').on('click', '.btn-view', function(e) {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var slug = $(this).attr('data-slug');   

            $.ajax({
                url: '{{ url("detailRole")}}/'+id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $("#permission tbody").html("");
                    $.each(response, function (index, value){
                        var html = '<tr><td width="150">'+ index +'</td><td  width="50">'+ value +'</td></tr>';
                        $("#permission tbody").append(html);

                    });

                    $('#view-modal').modal('show');
                    $("#view-modal #name").html(name);
                    $("#view-modal #slug").html(slug);
                }, 
                error: function(result){
                    console.log('error');
                }  
            });   
        });
    });
    TableManageButtons.init();
</script>