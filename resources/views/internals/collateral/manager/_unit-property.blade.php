<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Unit Properti</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered accountTable" id="accountTable0">
                    <thead>
                        <tr>
                            <th>Tipe Proyek</th>
                            <th>Alamat</th>
                            <th>Harga</th>
                            <th>Available</th>
                            <th>Status</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    @foreach($collateral['property']['propertyItems'] as $propItem)
                    <tbody>
                        <tr>
                            <td>
                                <p class="form-control-static">{{$propItem['property_type_id']}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{$propItem['address']}}a</p>
                            </td>
                            <td>
                                <p class="form-control-static">Rp{{$propItem['price']}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{$propItem['is_available']}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{$propItem['status']}}</p>
                            </td>
                            <td>
                                <img id="preview" @if(!empty($propItem['photos'])) src="{{$propItem['photos']['name']}}" @else src="{{asset('assets/images/no-image.jpg')}}" @endif width="200">
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
    </div>
</div>