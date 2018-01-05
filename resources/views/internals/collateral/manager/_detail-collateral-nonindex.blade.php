<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Properti</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-5 control-label">Jenis KPR :</label>
                    <div class="col-md-7">
                        <p class="form-control-static">@if($collateral['status_property'] == 1) Baru
                        @elseif($collateral['status_property'] == 2)Secondary
                        @elseif($collateral['status_property'] == 3)Refinancing
                        @elseif($collateral['status_property'] == 4)Renovasi
                        @elseif($collateral['status_property'] == 5)Top Up
                        @elseif($collateral['status_property'] == 6)Take Over
                        @elseif($collateral['status_property'] == 7)Take Over Top Up
                        @elseif($collateral['status_property'] == 8)Take Over Account In House (Cash Bertahap)
                        @endif</p>
                    </div>
                </div>

                @if($collateral['status_property'] == 1)
                <div class="form-group">
                    <label class="col-md-5 control-label">Developer :</label>
                    <div class="col-md-7">
                        <p class="form-control-static">{{$collateral['developer_name']}}</p>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label class="col-md-5 control-label">Jenis Properti :</label>
                    <div class="col-md-7">
                        <p class="form-control-static">@if($collateral['kpr_type_property'] == 1) Rumah Tapak
                        @elseif($collateral['kpr_type_property'] == 2)Rumah Susun/Apartment
                        @elseif($collateral['kpr_type_property'] == 3)Rumah Toko
                        @endif</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-5 control-label">Lokasi Rumah :</label>
                    <div class="col-md-7">
                        <p class="form-control-static">{{$collateral['home_location']}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-5 control-label">Harga Rumah :</label>
                    <div class="col-md-7">
                        <p class="form-control-static">Rp {{number_format($collateral['price'], 2, ",", ".")}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-5 control-label">Luas Bangunan :</label>
                    <div class="col-md-7">
                        <p class="form-control-static">{{$collateral['building_area']}} M <sup>2</sup></p>
                    </div>
                </div>
               <!--  <div class="form-group">
                    <label class="col-md-5 control-label">Foto :</label>
                    <div class="col-md-7">
                        <img id="preview" src="{{asset('assets/images/no-image.jpg')}}" width="300">
                    </div>
                </div> -->
            </form>
        </div>
    </div>
</div>