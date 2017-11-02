<div class="row">
    <div class="panel-heading">
        <h4 class="panel-title">Mutasi</h4>
    </div>
</div>
@foreach($detail['visit_report']['mutation'] as $mutation)
<div id="mutations" class="mutations">
    <div class="panel-body" style="border-style:solid;border-width:0.5px;border-color:#f3f3f3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama Bank *:</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{$mutation['bank']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-4 control-label">No. Rekening *:</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{$mutation['number']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 pull-right">
                <div class="form-horizontal" role="form">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered accountTable" id="accountTable0">
                    <thead>
                        <tr>
                            <th>Tanggal *</th>
                            <th>Nominal *</th>
                            <th>Jenis Transaksi *</th>
                            <th>Keterangan *</th>
                        </tr>
                    </thead>
                    @foreach($mutation['bankstatement'] as $bank)
                    <tbody>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <p class="form-control-static">{{$bank['date']}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="input-group">
                                    <p class="form-control-static">Rp{{$bank['amount']}}</p>
                                    <!-- <span class="input-group-addon">,00</span> -->
                                </div>
                            </td>
                            <td>
                                <p class="form-control-static">{{$bank['type']}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{$bank['note']}}</p>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="col-md-6">
                    <div class="form-group ">

                    </div>
                </div>
            </div>                    
        </div>
        <div class="col-md-6" align="center">
        <div class="card-box">
            <img src="{{$mutation['file']}}" class="img-responsive">
            <p>File Mutasi</p>
        </div>
    </div>
    </div>
</div>
@endforeach