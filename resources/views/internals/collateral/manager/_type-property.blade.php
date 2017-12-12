<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Tipe Properti</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered accountTable display responsive nowrap dataTable no-footer dtr-inline collapsed" id="datatable-type-property">
                    <thead>
                        <tr>
                            <th>Nama Tipe</th>
                            <th>Luas Bangunan (m<sup>2</sup>)</th>
                            <th>Luas Tanah (m<sup>2</sup>)</th>
                            <th>Sertifikat</th>
                            <!-- <th>Stok</th> -->
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($collateral['property']['propertyTypes'] as $index => $propType)
                        <tr>
                            <td>
                                <p class="form-control-static">{{$propType['name']}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{$propType['building_area']}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{$propType['surface_area']}}</p>
                            </td>
                            <td>
                                <p class="form-control-static">{{$propType['certificate']}}</p>
                            </td>
                           <!--  <td>
                                <p class="form-control-static">{{$propType['name']}}</p>
                            </td> -->
                            <td>
                                <img id="preview" @if(!empty($propType['photos'])) src="{{$propType['photos'][$index]['image']}}" @else src="{{asset('assets/images/no-image.jpg')}}" @endif width="200">
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