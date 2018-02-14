<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Informasi Penilaian</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
            @if(!empty($collateral['ots_other']['images']))
              <div class="form-group">
                    <label class="col-md-6 control-label">Foto Kondisi Lapangan :</label>
                    <div class="col-md-12 image_condition_area" id=" ">
                   <?php
                    $list_gambar = $collateral['ots_other']['images'];
                    ?> 
                    @foreach ($list_gambar as $key => $value)
                    <div class="card-box">
                        <img src="{{$value['image_data']}}" class="img-responsive">
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
            @else
              Informasi tidak ada
            @endif
        </div>
    </div>
</div>