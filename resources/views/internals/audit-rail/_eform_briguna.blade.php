<div id="filter" class="m-b-15">
    <a data-toggle="tab" class="btn btn-primary" href="#pengajuan">KPR</a>
    <a data-toggle="tab" class="btn btn-primary" href="#pengajuanbriguna">BRIGUNA</a>
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Pengajuan :</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="action_date_eform_briguna" id="action_date_eform_briguna">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kantor Wilayah :</label>
                        <div class="col-sm-8">
                            {!! Form::select('kanwil', ['' => ''], old('name'), [
                                'class' => 'select2 action_kanwil2',
                                'data-placeholder' => 'Pilih Kantor Wilayah'
                            ]) !!}
                        </div>
                        <input type="hidden" class="form-control" name="branch_id" id="branch_id">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kantor Cabang :</label>
                        <div class="col-sm-8">
                            {!! Form::select('branch', ['' => ''], old('name'), [
                                'class' => 'select2 branch',
                                'data-placeholder' => 'Pilih Kantor Cabang'
                            ]) !!}
                        </div>
                        <input type="hidden" class="form-control" name="branch" id="branch">
                        <input type="hidden" class="form-control" name="branch_name" id="branch_name">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Pemrakarsa :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ao_name" id="ao_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Status Pengajuan :</label>
                        <div class="col-sm-8">
                           {!! Form::select('action_pengajuan_kredit_briguna', ['' => ''], old('name'), [
                                'class' => 'select2 action_pengajuan_kredit_briguna',
                                'data-placeholder' => 'Pilih Status Pengajuan',
                                'id' => 'status_name'
                            ]) !!}
                       </div>
                   </div>

                   <div class="form-group">
                    <label class="col-sm-4 control-label">Nomor Referensi :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="no_ref" id="no_ref">
                    </div>
                </div>
            </form>
            <div class="text-right">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="filter-eform-briguna">Filter</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="table-responsive">
    <div class="tab-scroll">
        <table id="datatable-pengajuan_kredit_briguna" class="table table-bordered">
            <thead class="bg-primary">
                <tr>
                    <th>Tanggal Pengajuan</th>
                    <th>CIF</th>
                    <th>ID Aplikasi</th>
                    <th>Nomor Referensi</th>
                    <th>Produk</th>
                    <th>Nama Pemrakarsa</th>
                    <th>Tanggal Analisa</th>
                    <th>Nama Pemutus</th>
                    <th>Tanggal Putusan</th>
                    <th>Nama Debitur</th>
                    <th>Tanggal Pencairan</th>
                    <th>Nomor Rekening</th>
                    <th>Plafond</th>
                    <th>Status Pengajuan</th>
                    <th>Status Prescreening</th>
                </tr>
            </thead>
        </table>
    </div>
</div>