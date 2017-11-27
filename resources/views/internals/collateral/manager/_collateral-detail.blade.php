<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Informasi Penilaian</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-5 control-label">Tipe Agunan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['collateral_type']}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">Kota :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['city']['name']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Kecamatan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['district']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Kelurahan/Desa :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['sub_district']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">RT/RW :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['sub_district']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Jarak :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['distance']}} {{$collateral['ots_in_area']['unit_type'] == 1 ? 'KM' : 'Meter'}} dari {{$collateral['ots_in_area']['sub_district']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Posisi Terhadap Jalan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['position_from_road']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Bentuk Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['ground_type']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Jarak Posisi Terhadap Jalan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['distance_of_position']}} Meter</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-5 control-label">Batas Utara :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['north_limit']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Batas Timur :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['east_limit']}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">Batas Barat :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['west_limit']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Batas Selatan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['south_limit']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Keterangan Lain :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['another_information']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Permukaan Tanah :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['ground_level']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Luas Tanah Sesuai Lapangan :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['ots_in_area']['surface_area']}} meter persegi</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label"></label>
                        <a href="javascript:void(0);" id="view-detail"><label class="col-md-7 control-label">+ Lihat informasi lain</label></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>