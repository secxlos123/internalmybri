<div id="filter" class="m-b-15">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Aksi :</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="action_date">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama User :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="customer_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Modul :</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" id="module_name">
                       </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Proyek :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="property_name">
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
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="table-responsive">
    <table id="datatable" class="table table-bordered responsive">
        <thead class="bg-primary">
            <tr>
                <th>Tanggal</th>
                <th>Nama Modul</th>
                <th>Nama User</th>
                <th>Nama Proyek</th>
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