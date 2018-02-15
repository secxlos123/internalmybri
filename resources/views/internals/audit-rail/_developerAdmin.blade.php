<div id="filter" class="m-b-15">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Aksi :</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="action_date" id="action_date_admin">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama User :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="admindev_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Detail Aksi :</label>
                        <div class="col-sm-8">
                            {!! Form::select('action_admindev', ['' => ''], old('name'), [
                                'class' => 'select2 action_admindev',
                                'data-placeholder' => 'Pilih Detail Aksi',
                                'id' => 'modul_name_admindev'
                            ]) !!}
                           <!-- <input type="text" class="form-control" id="modul_name_admindev"> -->
                       </div>
                   </div>

                   <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan Mitra :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="company_name">
                    </div>
                </div>
            </form>
            <div class="text-right">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="filter-dev-admin">Filter</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="table-responsive">
    <div class="tab-scroll">
        <table id="datatable-admindev" class="table table-bordered">
            <thead class="bg-primary">
                <tr>
                    <th>Tanggal</th>
                    <th>Detail Aksi</th>
                    <th>Nama User</th>
                    <th>Nama Perusahaan Mitra</th>
                    <th>Data Lama</th>
                    <th>Data Baru</th>
                    <th>IP Address</th>
                    <th>Lokasi Akses</th>
                </tr>
            </thead>
            <tbody>
                <tr role="row" class="odd">
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>