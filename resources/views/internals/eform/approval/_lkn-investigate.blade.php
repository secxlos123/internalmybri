<div class="row">
    <div class="panel-heading">
        <h4 class="panel-title">Investigasi Jual Beli</h4>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Nama Penjual :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['seller_name']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">Alamat Penjual :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['seller_address']}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 control-label">No. Handphone Penjual :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['seller_phone']}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-5 control-label">Harga Jual :</label>
                <div class="col-md-7">
                    <p class="form-control-static">Rp{{$detail['visit_report']['selling_price']}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-5 control-label">Alasan Dijual :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['reason_for_sale']}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-5 control-label">Hubungan dengan Pembeli :</label>
                <div class="col-md-7">
                    <p class="form-control-static">{{$detail['visit_report']['relation_with_seller']}}</p>
                </div>
            </div>
        </form>
    </div>
</div>