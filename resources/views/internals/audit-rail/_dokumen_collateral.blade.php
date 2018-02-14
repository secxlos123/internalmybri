 <div class="card-box ">
                        <div id="filter" class="m-b-15">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-box">
                                        <form class="form-horizontal" role="form">

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Status Approval Properti :</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="status_doc_collateral">
                                                       <option selected="" value="" > Semua</option>
                                                        <option value="baru">Baru</option>
                                                        <option value="sedang di proses">Sedang Di Proses</option>
                                                        <option value="menunggu persetujuan">Menunggu Persetujuan</option>
                                                        <option value="disetujui">Disetujui</option>
                                                        <option value="ditolak">Ditolak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Tanggal Aksi :</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control datepicker-autoclose" name="action_date" id="doc_collateral_date">
                                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Staff Penilai :</label>
                                                <div class="col-sm-8">
                                                   <input type="text" class="form-control" id="doc_staff">
                                               </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Manager :</label>
                                                <div class="col-sm-8">
                                                   <input type="text" class="form-control" id="doc_manager">
                                               </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-sm-4 control-label">Kantor wilayah :</label>
                                                <div class="col-sm-8">
                                                 {!! Form::select('doc_kanwil', ['' => ''], old('name'), [
                                                                            'class' => 'select2 doc_kanwil',
                                                                            'data-placeholder' => 'Pilih Kantor Wilayah',
                                                 ]) !!}
                                                </div>
                                            </div>

                                          
                                        </form>
                                        <div class="text-right">
                                            <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter-doc-collateral">Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#developer" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-info"></i></span>
                                                <span class="hidden-xs">Developer</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#independent" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-info"></i></span>
                                                <span class="hidden-xs">Non Kerja Sama</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="developer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="tab-scroll">
                                                                        <table id="datatable-developer" class="table table-bordered">
                                                                            <thead class="bg-primary">
                                                                                <tr>
                                                                                    <th>Nama Proyek</th>
                                                                                    <th>Kota</th>
                                                                                    <th>Jumlah Tipe</th>
                                                                                    <th>Unit Properti</th>
                                                                                    <th>PIC</th>
                                                                                    <th>Telepon</th>
                                                                                    <th>Staff Penilai</th>
                                                                                    <th>Status Approval</th>
                                                                                    <th>Manager Collateral</th>
                                                                                    <th style="width: 150px">Detail</th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="independent">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="tab-scroll">
                                                                        <table id="datatable-non" class="table table-bordered">
                                                                            <thead class="bg-primary">
                                                                                <tr>
                                                                                    <th>Nama Pengaju</th>
                                                                                    <th>Kota</th>
                                                                                    <th>Telepon</th>
                                                                                    <th>Staff Penilai</th>
                                                                                    <th>Status Approval</th>
                                                                                    <th>Manager Collateral</th>
                                                                                    <th style="width: 150px">Detail</th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 