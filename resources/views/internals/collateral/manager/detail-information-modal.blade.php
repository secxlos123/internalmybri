<style type="text/css">
.modal-dialog-custom {
    width: 1200px;
    margin: 50px auto;
}
</style>
<div id="detail-collateral-modal" class="modal fade">
    <div class="modal-dialog-custom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#step2" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="fa fa-info"></i></span>
                                        <span class="hidden-xs">Identifikasi Tanah Berdasarkan Surat Tanah</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step3" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-phone"></i></span>
                                        <span class="hidden-xs">Uraian Bangunan</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step4" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Identifikasi Data Lingkungan</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step5" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Penilaian</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step6" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Lain-lain</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="step2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"> Identifikasi Tanah Berdasarkan Surat Tanah</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jenis Surat Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_type">Sertifikat</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Hak Atas Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_authorization">Guna Bangunan</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kecocokan Data Dengan Kantor Anggara/BPN :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_match_bpn">Cocok</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kecocokan Pemeriksaan Lokasi Tanah Dilapangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_match_area">Cocok</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kecocokan Batas Tanah Dilapangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_match_limit_in_area">Tidak Cocok</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Luas Tanah Berdasarkan Surat Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="surface_area_by_letter">10 M<sup>2</sup></p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">No Surat Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_number">91971787788777</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Surat Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_date">2017-09-10</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Atas Nama :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_on_behalf_on">Angelina Jolie</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Masa Hak tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_duration">80</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nama Kantor Anggaran/BPN :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_bpn_name">Lorem ipsum</p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="step3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Uraian Bangunan</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">No Izin Mendirikan Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_permit_number">87187181186</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Izin Mendirikan Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_permit_date">2017-09-10</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Atas Nama Izin Mendirikan Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_on_behalf_of">Dinda</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jenis Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_type">Rumah Tinggal</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jumlah Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_count">2 Buah</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Luas Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_spacious">10 M<sup>2</sup></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tahun Mendirikan Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_year">Tidak Cocok</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Uraian Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_description">Lorem ipsum</p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Utara :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_north_limit">8 Meter dari  </p><p class="form-control-static" id="building_north_limit_from">Bangunan Indomaret</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Timur :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id=""></p><p class="form-control-static" id="building_east_limit">10 Meter dari </p><p class="form-control-static" id="building_east_limit_from">Bangunan SMP 2 Bandung</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Selatan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_south_limit">40 Meter dari </p><p class="form-control-static" id="building_south_limit_from">Bangunan Apartemen A</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Barat :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_west_limit">8 Meter dari </p><p class="form-control-static" id="building_west_limit_from">Bangunan Skywalk</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="step4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Identifikasi Data Lingkungan</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Peruntukan Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="designated_land">Bangunan Perdagangan</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Fasilitas Umum Yang Ada :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="designated">Telepon</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Fasilitas Umum Lain :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="other_designated">Warnet</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Sarana Transportasi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="transportation">8</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Lingkungan Terdekat Dari Lokasi Sebagian Besar :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="nearest_location">Bangunan Perumahan Penduduk</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Petunjuk Lain :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="other_guide">10 Meter dari Bangunan SMP 2 Bandung, dekat Hotel Grand Aquilla. Seberang Bandung Trade Center</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jarak Dari Lokasi</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="distance_from_transportation">40 Meter </p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="step5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Penilaian</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penilaian NPW Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="scoring_land_date">2017-01-10</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NPW Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="npw_land">90</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NL Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="nl_land">80</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNPW Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnpw_land">80</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNL Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnl_land">90</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penilaian NPW Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="scoring_building_date">2017-01-10</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NPW Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="npw_building">100</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NL Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="nl_building">80</p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNPW Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnpw_building">60</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNL Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnl_building">100</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penilaian NPW Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="scoring_all_date">2017-01-10 </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NPW Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="npw_all">70</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NL Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="nl_all">100</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNPW Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnpw_all">80 </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNL Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnl_all">40 </p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="step6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Lain-lain</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jenis Ikatan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="bond_type">Fiducia Pembangunan</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Penggunaan Bangunan Sesuai Fungsinya :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="use_of_building_function">Sesuai</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Penggunaan Bangunan Secara Optimal :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="optimal_building_use">Sesuai</p>
                                                                    </div>
                                                                </div> 
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Pertukaran Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_exchange">Fiducia Bangunan</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Hal-Hal Yang Perlu Diketahui Bank :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="things_bank_must_know">Lorem ipsum</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Foto Situasi Lapangan :</label>
                                                                    <div class="col-md-7">
                                                                        <img id="image_condition_area" width="300">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <a href="#" data-dismiss="modal" class="btn btn-default waves-light waves-effect w-md m-b-20">Tutup</a>
                                        <!-- <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Simpan</a> -->
                                        <!-- <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i>Simpan </button> -->
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
