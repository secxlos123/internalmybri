<!-- <div class="row">
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['customer']['other']['identity']}}" class="img-responsive">
            <p>Foto KTP</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['NPWP_nasabah']}}" class="img-responsive">
            <p>NPWP</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['SK_AWAL']}}" class="img-responsive">
            <p>SK Pertama</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['SKPG']}}" class="img-responsive">
            <p>SKPG</p>
        </div>
    </div>
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['KK']}}" class="img-responsive">
            <p>KK</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['SLIP_GAJI']}}" class="img-responsive">
            <p>Slip Gaji</p>
        </div>
        <div class="card-box">
            <img src="{{$detail['Url'].'/'.$detail['SK_AKHIR']}}" class="img-responsive">
            <p>SK Terakhir</p>
        </div>
    </div>
    @if( ($detail['customer']['personal']['status']) == 2 )
    <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$detail['customer']['personal']['couple_identity']}}" class="img-responsive">
            <p>Foto KTP Pasangan</p>
        </div>
    </div>
    @endif
</div> -->

<div class="row">
    <div class="col-md-12" align="center">
        <div class="card-box">
            <form class="form-horizontal" role="form" action="{{route('post_adk')}}" method="POST">
                <table class="table table-bordered">
                    <thead class="bg-primary">
                        <tr align="center">
                            <th>No</th>
                            <th>Dokumen Produk</th>
                            <th>MYBRI</th>
                            <th>Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>KK</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['KK']; ?>" width="100" height="100"></td>
                            <td><input type="checkbox" name="kk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>KTP</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SK_AWAL']; ?>" width="100" height="100"></td>
                            <td><input type="checkbox" name="kk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>NPWP</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['NPWP_nasabah']; ?>" width="100" height="100"></td>
                            <td><input type="checkbox" name="kk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Slip Gaji</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SLIP_GAJI']; ?>" width="100" height="100"></td>
                            <td><input type="checkbox" name="kk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>SK Pertama</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SK_AWAL']; ?>" width="100" height="100"></td>
                            <td><input type="checkbox" name="kk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>SK Terakhir</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SK_AKHIR']; ?>" width="100" height="100"></td>
                            <td><input type="checkbox" name="kk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>SKPU</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SKPG']; ?>" width="100" height="100"></td>
                            <td><input type="checkbox" name="kk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Surat Rekomendasi</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['REKOMENDASI']; ?>" width="100" height="100"></td>
                            <td><input type="checkbox" name="kk" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="text" name="catatan" class="form-control"></td>
                            <td>
                                <input type="submit" value="Verifikasi" class="btn btn-primary">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>