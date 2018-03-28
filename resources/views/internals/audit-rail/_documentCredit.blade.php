<div id="filter" class="m-b-15">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">NIK atau Nama Calon Debitur :</label>
                        <div class="col-sm-8">
                            {!! Form::select('action_document', ['' => ''], old('name'), [
                                'class' => 'select2 action_document',
                                'data-placeholder' => 'Pilih NIK atau Nama Calon Debitur',
                                'id' => 'modul_action_document'
                            ]) !!}
                        </div>
                    </div>
                </form>
            <div class="text-right">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="filter-document">Filter</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="table-responsive">
    <div class="tab-scroll">
        <table id="datatable-document" class="table table-bordered">
            <thead class="bg-primary">
                <tr>
                    <th>No. Ref Aplikasi</th>
                    <th>Nama Nasabah</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th style="width: 100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr role="row" class="odd">
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