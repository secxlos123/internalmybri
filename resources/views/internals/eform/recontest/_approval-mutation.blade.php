<div class="row">
    <div class="panel-heading">
        <h4 class="panel-title">Mutasi</h4>
    </div>
</div>
@foreach($detail['recontest']['mutations'] as $mutation)
<div id="mutations" class="mutations">
    <div class="panel-body" style="border-style:solid;border-width:0.5px;border-color:#f3f3f3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama Bank *:</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{strtoupper($mutation['bank'])}}</p>
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
                    @foreach($mutation['tables'] as $bank)
                    <tbody>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <p class="form-control-static">{{$bank['date']}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="input-group">
                                    <p class="form-control-static">Rp. {{ number_format($bank['amount'], 2, ",", ".") }}</p>
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
            @if((pathinfo(strtolower($mutation['image']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($mutation['image']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($mutation['image'])), PATHINFO_EXTENSION) == 'jpeg'))
                <img src="@if(!empty($mutation['image'])){{$mutation['image']}}@endif" class="img-responsive">
                <p>image Mutasi</p>
            @else
                <a href="@if(!empty($mutation['image'])){{$mutation['image']}}@endif" target="_blank"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat File Mutasi</p>
            @endif
        </div>
    </div>
    </div>
</div>
@endforeach