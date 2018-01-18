<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-horizontal">
                <div class="form-group seller_name {!! $errors->has('seller_name') ? 'has-error' : '' !!}">
                    <label class="col-md-4 control-label">Nama Penjual :</label>
                    <div class="col-md-8">
                        <p class="form-control-static"> {{($eformData['visit_report']['seller_name'])}}</p>
                    </div>
                </div>
                <div class="form-group seller_address {!! $errors->has('seller_address') ? 'has-error' : '' !!}">
                    <label class="col-md-4 control-label">Alamat :</label>
                    <div class="col-md-8">
                        <p class="form-control-static"> {{($eformData['visit_report']['seller_address'])}}</p>
                    </div>
                </div>
                <div class="form-group seller_phone {!! $errors->has('seller_phone') ? 'has-error' : '' !!}">
                    <label class="col-md-4 control-label">No. Telepon :</label>
                    <div class="col-md-8">
                        <p class="form-control-static"> {{($eformData['visit_report']['seller_phone'])}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-horizontal">
                <div class="form-group selling_price {!! $errors->has('selling_price') ? 'has-error' : '' !!}">
                    <label class="col-md-5 control-label">Harga Jual :</label>
                    <div class="col-md-7">
                        <p class="form-control-static"> Rp. {{($eformData['visit_report']['selling_price'])}}</p>
                    </div>
                </div>
                <div class="form-group reason_for_sale {!! $errors->has('reason_for_sale') ? 'has-error' : '' !!}">
                    <label class="col-md-5 control-label">Alasan Dijual :</label>
                    <div class="col-md-7">
                        <p class="form-control-static"> {{($eformData['visit_report']['reason_for_sale'])}}</p>
                    </div>
                </div>
                <div class="form-group relation_with_seller {!! $errors->has('relation_with_seller') ? 'has-error' : '' !!}">
                    <label class="col-md-5 control-label">Hubungan dengan Pembeli :</label>
                    <div class="col-md-7">
                        <p class="form-control-static"> {{($eformData['visit_report']['relation_with_seller'])}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>