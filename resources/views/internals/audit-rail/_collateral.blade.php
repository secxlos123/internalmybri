<div id="filter" class="m-b-15">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Aksi :</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="action_date" id="action_collateral_date">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama User :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_name2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Detail Aksi :</label>
                        <div class="col-sm-8">
                           {!! Form::select('action_collateral', ['' => ''], old('name'), [
                                'class' => 'select2 action_collateral',
                                'data-placeholder' => 'Pilih Detail Aksi',
                                'id' => 'module_name2'
                            ]) !!}
                       </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Developer :</label>
                        <div class="col-sm-8">
                            {!! Form::select('developer_type', array("" => "", 
                            "Kerja Sama" => "Kerja Sama", 
                            "Non Kerja Sama" => "Non Kerja Sama"), 
                            old('developer_type'), [
                            'class' => 'select2 developer_type ',
                            'data-placeholder' => '-- Pilih --',
                            'id' => 'developer2'
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kantor Wilayah :</label>
                        <div class="col-sm-8">
                            {!! Form::select('kanwil', ['' => ''], old('name'), [
                                'class' => 'select2 action_kanwil',
                                'data-placeholder' => 'Pilih Kantor Wilayah',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Staff Penilai :</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" id="staff">
                       </div>
                    </div>
                </form>
            <div class="text-right">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="filter-collateral">Filter</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="table-responsive">
    <div class="tab-scroll">
        <table id="datatable-collateral" class="table table-bordered">
            <thead class="bg-primary">
                <tr>
                    <th>Tanggal</th>
                    <th>Detail Aksi</th>
                    <th>Nama User</th>
                    <th>Staff Penilai</th>
                    <th>Developer</th>
                    <th>Data Lama</th>
                    <th>Data Baru</th>
                    <th>Debitur</th>
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
                    <td> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>