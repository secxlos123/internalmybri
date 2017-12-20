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
            <table class="table table-bordered">
                <thead class="bg-primary">
                    <tr align="center">
                        <th>No</th>
                        <th>Dokumen Produk</th>
                        <th>MYBRI</th>
                        <th>Dokumen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>KK</td>
                        <td><input type="checkbox" name="kk" class="form-control"></td>
                        <td><input type="checkbox" name="kk" class="form-control"></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>KTP</td>
                        <td><input type="checkbox" name="ktp" class="form-control"></td>
                        <td><input type="checkbox" name="kk" class="form-control"></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>NPWP</td>
                        <td><input type="checkbox" name="npwp" class="form-control"></td>
                        <td><input type="checkbox" name="kk" class="form-control"></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Slip Gaji</td>
                        <td><input type="checkbox" name="slip_gaji" class="form-control"></td>
                        <td><input type="checkbox" name="kk" class="form-control"></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>SK Pertama</td>
                        <td><input type="checkbox" name="sk_awal" class="form-control"></td>
                        <td><input type="checkbox" name="kk" class="form-control"></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>SK Terakhir</td>
                        <td><input type="checkbox" name="sk_akhir" class="form-control"></td>
                        <td><input type="checkbox" name="kk" class="form-control"></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>SKPU</td>
                        <td><input type="checkbox" name="skpu" class="form-control"></td>
                        <td><input type="checkbox" name="kk" class="form-control"></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Surat Rekomendasi</td>
                        <td><input type="checkbox" name="surat_rekomendasi" class="form-control"></td>
                        <td><input type="checkbox" name="kk" class="form-control"></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>