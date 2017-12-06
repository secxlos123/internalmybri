<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Properti</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-5 control-label">Nama Proyek :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['property']['name']}}</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-5 control-label">Kota :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['property']['city']['name']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Kategori :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['property']['category']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Foto :</label>
                        <div class="col-md-7">
                            <img id="preview" @if(!empty($collateral['property']['photos'])) src="{{$collateral['property']['photos']['image']}}" @else src="{{asset('assets/images/no-image.jpg')}}" @endif width="300">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Deskripsi Properti :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{!! strip_tags($collateral['property']['description'], "<a><br><i><ul><li><ol>") !!}</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-5 control-label">Nama PIC Proyek :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['property']['pic_name']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Alamat Proyek :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['property']['address']}}</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-5 control-label">Nomor PKS :</label>
                        <div class="col-md-7">
                            <p class="form-control-static"> @if(!empty($collateral['property']['pks_number'])){{$collateral['property']['pks_number']}}@else - @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">No. HP PIC Project :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$collateral['property']['pic_phone']}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Fasilitas :</label>
                        <div class="col-md-7">
                            <p class="form-control-static">{!! strip_tags($collateral['property']['facilities'], "<a><br><i><ul><li><ol>") !!}</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>