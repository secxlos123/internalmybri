<div id="filter" class="m-b-15">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Aksi :</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="action_date" id="action_agendev_date">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama User :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Detail Aksi :</label>
                        <div class="col-sm-8">
                           <!-- <input type="text" class="form-control" id="module_name1"> -->
                           {!! Form::select('action_agendev', ['' => ''], old('name'), [
                                'class' => 'select2 action_agendev',
                                'data-placeholder' => 'Pilih Detail Aksi',
                                'id' => 'module_name1'
                            ]) !!}
                       </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Agen Developer :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="agent_developer1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Perusahaan Mitra :</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" id="company_name1">
                       </div>
                    </div>
                </form>
            <div class="text-right">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="filter-agendev">Filter</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="table-responsive">
    <div class="tab-scroll">
        <table id="datatable-agendev" class="table table-bordered">
            <thead class="bg-primary">
                <tr>
                    <th>Tanggal</th>
                    <th>Detail Aksi</th>
                    <th>Nama User</th>
                    <th>Nama Sales</th>
                    <th>Nama Developer</th>
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
                    <td> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>