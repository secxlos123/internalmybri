<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Unit Properti</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered accountTable display responsive nowrap dataTable no-footer dtr-inline collapsed" id="datatable-item-property">
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
                    <tbody>
                    @foreach($collateral['property']['propertyItems'] as $index => $propItem)
                        <tr>
                            <td>
                                <p class="form-control-static">{{$propItem['property_type_id']}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{$propItem['address']}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">Rp {{number_format($propItem['price'], 2, ",", ".")}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{($propItem['is_available'] == 1 ? 'Tersedia' : 'Tidak Tersedia')}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{ucwords($propItem['status'])}}</p>
                            </td>
                            <td>
                                @if ( isset($propItem['photos']) )
                                    <img id="preview" @if(isset($propItem['photos'][$index])) src="{{$propItem['photos'][$index]['image']}}" @else src="{{asset('assets/images/no-image.jpg')}}" @endif width="200">
                                @else
                                    <img id="preview" src="{{asset('assets/images/no-image.jpg')}}" width="200">
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="col-md-6">
                    <div class="form-group ">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>