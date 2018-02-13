<div id="filter" class="m-b-15">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Aksi :</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="action_date_eform" id="action_date_eform">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama User :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Detail Aksi :</label>
                        <div class="col-sm-8">
                           {!! Form::select('action_pengajuan_kredit', ['' => ''], old('name'), [
                                'class' => 'select2 action_pengajuan_kredit',
                                'data-placeholder' => 'Pilih Detail Aksi',
                                'id' => 'modul_name'
                            ]) !!}
                       </div>
                   </div>

                   <div class="form-group">
                    <label class="col-sm-4 control-label">Nomor Referensi :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ref_number">
                    </div>
                </div>
            </form>
            <div class="text-right">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="filter-eform">Filter</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="table-responsive">
    <div class="tab-scroll">
        <table id="datatable-pengajuan_kredit" class="table table-bordered">
            <thead class="bg-primary">
                <tr>
                    <th>Tanggal</th>
                    <th>Detail Aksi</th>
                    <th>Nama User</th>
                    <th>Nomor Referensi</th>
                    <th>Data Lama</th>
                    <th>Data Baru</th>
                    <th>IP Address</th>
                    <th>Lokasi Akses</th>
                </tr>
            </thead>
        </table>
    </div>
</div>