<style type="text/css">
.modal-dialog-custom {
    width: 1000px;
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
                                    <a href="#step1" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="fa fa-info"></i></span>
                                        <span class="hidden-xs">Step 1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step2" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="fa fa-info"></i></span>
                                        <span class="hidden-xs">Step 2</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step3" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-phone"></i></span>
                                        <span class="hidden-xs">Step 3</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step4" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Step 4</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step5" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Step 5</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step6" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Step 6</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step7" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Step 7</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step8" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Step 8</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step9" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Step 9</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#step10" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                                        <span class="hidden-xs">Step 10</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="step1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Identifikasi Tanah di Lapangan</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Lokasi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="location"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tipe Agunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="collateral_type"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kota/Kabupaten :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="district"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kecamatan/Desa :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="sub_district"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">RT/RW :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="rt">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kode Pos :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="zip_code"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jarak :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="distance"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Posisi Terhadap Jalan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="position_from_road"> M<sup>2</sup></p>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Bentuk Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="ground_type"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jarak Posisi terhadap Jalan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="distance_of_position"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Utara :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="north_limit"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Timur :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="east_limit"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Selatan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="south_limit"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Barat :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="west_limit"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Keterangan Lain :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="another_information"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Permukaan Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="ground_level"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Luas Tanah Sesuai Lapang :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="surface_area"></p>
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
                                <div class="tab-pane" id="step2">
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
                                                                        <p class="form-control-static" id="letter_type"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Hak Atas Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_authorization"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kecocokan Data Dengan Kantor Anggara/BPN :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_match_bpn"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kecocokan Pemeriksaan Lokasi Tanah Dilapangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_match_area"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kecocokan Batas Tanah Dilapangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_match_limit_in_area"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Luas Tanah Berdasarkan Surat Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="surface_area_by_letter"></p>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">No Surat Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_number"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Surat Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_date"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Atas Nama :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_on_behalf_of"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Masa Hak tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_duration"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nama Kantor Anggaran/BPN :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="letter_bpn_name"></p>
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
                                                                        <p class="form-control-static" id="building_permit_number"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Izin Mendirikan Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_permit_date"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Atas Nama Izin Mendirikan Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_on_behalf_of"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jenis Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_type"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jumlah Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_count"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Luas Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_spacious"><sup>2</sup></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tahun Mendirikan Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_year"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Uraian Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_description"></p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Utara :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_north_limit"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Timur :</label>
                                                                    <div class="col-md-7">
                                                                       <p class="form-control-static" id="building_east_limit"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Selatan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_south_limit"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Batas Barat :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="building_west_limit"></p>
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
                                                                        <p class="form-control-static" id="designated_land"></p>
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
                                                                        <p class="form-control-static" id="other_designated"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Sarana Transportasi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="transportation"></p>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Lingkungan Terdekat Dari Lokasi Sebagian Besar :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="nearest_location"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Petunjuk Lain :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="other_guide"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jarak Dari Lokasi</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="distance_from_transportation"></p>
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
                                <!-- <div class="tab-pane" id="step5">
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
                                                                        <p class="form-control-static" id="scoring_land_date"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NPW Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="npw_land"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NL Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="nl_land"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNPW Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnpw_land"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNL Tanah :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnl_land"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penilaian NPW Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="scoring_building_date"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NPW Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="npw_building"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NL Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="nl_building"></p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNPW Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnpw_building"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNL Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnl_building"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penilaian NPW Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="scoring_all_date"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NPW Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="npw_all"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">NL Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="nl_all"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNPW Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnpw_all"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">PNL Tanah & Bangunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="pnl_all"></p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
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
                                                                    <label class="col-md-6 control-label">Jenis Ikatan :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static" id="bond_type"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-6 control-label">Penggunaan Bangunan Sesuai Fungsinya :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static" id="use_of_building_function"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-6 control-label">Foto Kondisi Lapangan :</label>
                                                                    <div class="col-md-12 image_condition_area" id="image_condition_area">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-6 control-label">Pertukaran Bangunan :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static" id="building_exchange"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-6 control-label">Hal-Hal Yang Perlu Diketahui Bank :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static" id="things_bank_must_know"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-6 control-label">Penggunaan Bangunan Secara Optimal :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static" id="optimal_building_use"></p>
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
                                <div class="tab-pane" id="step7">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Agunan Tanah & Rumah Tinggal</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Status Agunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="collateral_status"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Atas Nama (Pemilik) :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="on_behalf_of"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">No. Bukti Kepemilikan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="ownership_number"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Lokasi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="location"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Alamat Agunan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="address_collateral"></p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Deskripsi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="description"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Status Bukti Kepemilikan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="ownership_status"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Bukti :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="date_evidence"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kelurahan/Desa :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="village"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Kecamatan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="districts"></p>
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
                                <div class="tab-pane" id="step8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Nilai Likuiditas saat Realisasi</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nilai Likuiditas saat Realisasi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="liquidation_realization"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nilai Pasar Wajar :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="fair_market"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nilai Likuidasi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="liquidation"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Proyeksi Nilai Pasar Wajar :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="fair_market_projection"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Proyeksi Nilai Likuidasi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="liquidation_projection"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nilai Jual Objek Pajak (NJOP) :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="njop"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Penilaian Dilakukan Oleh :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="appraisal_by"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group independent_appraiser">
                                                                    <label class="col-md-5 control-label">Penilai Independent :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="independent_appraiser"></p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penilaian Terakhir :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="date_assessment"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Jenis Pengikatan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="type_binding"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">No. Bukti Pengikatan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="binding_number"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nilai Pengikatan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="binding_value"></p>
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
                                <div class="tab-pane" id="step9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Pemecahan Sertifikat</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <h5>Pemecahan Sertifikat</h5>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Status :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="certificate_status"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penelitian :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="receipt_date"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Keterangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="information"></p>
                                                                    </div>
                                                                </div>
                                                                <h5>Dokumen Notaris Developer</h5>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Status :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="notary_status"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penelitian :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="receipt_date_notary"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Keterangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="information_notary"></p>
                                                                    </div>
                                                                </div>

                                                                <h5>Dokumen Take Over</h5>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Status :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="takeover_status"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penelitian :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="receipt_date_takeover"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Keterangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="information_takeover"></p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <h5>Perjanjian Kredit</h5>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Status :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="credit_status"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penelitian :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="receipt_date_credit"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Keterangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="information_credit"></p>
                                                                    </div>
                                                                </div>

                                                                <h5>SKMHT</h5>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Status :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="skmht_status"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penelitian :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="receipt_date_skmht"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Keterangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="information_skmht"></p>
                                                                    </div>
                                                                </div>

                                                                <h5>IMB</h5>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Status :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="imb_status"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penelitian :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="receipt_date_imb"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Keterangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="information_imb"></p>
                                                                    </div>
                                                                </div>

                                                                <h5>SHGB</h5>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Status :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="shgb_status"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Tanggal Penelitian :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="receipt_date_shgb"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Keterangan :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="information_shgb"></p>
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
                                <div class="tab-pane" id="step10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Paripasu</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Paripasu :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="paripasu"></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nilai Paripasu Agunan Bank :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="paripasu_bank"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Flag Asuransi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="insurance"></p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nama Perusahaan Asuransi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="insurance_company"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Nilai Asuransi :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="insurance_value"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">Eligibility :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="eligibility"></p>
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
                                        <!-- <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Ajukan</a> -->
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
