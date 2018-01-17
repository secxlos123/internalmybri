<style type="text/css">
  .modal-dialog-custom {
    width: 1000px;
    margin: 50px auto;
}
</style>
<div id="view-modal" class="modal fade">
    <div class="modal-dialog-custom" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Pengajuan Pinjaman</h4>
           </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Pengajuan</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <!-- <div class="form-group">
                                                <label class="col-md-5 control-label">Nomor Referensi :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="ref_number"></p>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Jumlah Permohonan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="request_amount"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nama Product :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static">KPR</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Jangka Waktu :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="month"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nama RM :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="ao_name">
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Kantor Cabang :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="office"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nama Nasabah :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="customer_name"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Tanggal Pertemuan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="appointment_date"></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Data Developer -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Properti</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group" id="dev">
                                                <label class="col-md-5 control-label">Developer :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="developer_name"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Jenis KPR :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="kpr"></p>
                                                </div>
                                            </div>
                                            <div class="form-group" id="jp">
                                                <label class="col-md-5 control-label">Jenis Properti :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="jenis_property"></p>
                                                </div>
                                            </div>
                                            <div class="form-group" id="kerjasama">
                                                <label class="col-md-5 control-label">Nama Proyek :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="project_name"></p>
                                                </div>
                                            </div>
                                            <div class="form-group" id="kerjasama">
                                                <label class="col-md-5 control-label">Tipe Properti :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="property_type">
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group" id="kerjasama">
                                                <label class="col-md-5 control-label">Unit Properti :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="property_unit"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Harga :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="harga"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Luas Bangunan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="luas_bangunan"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Lokasi Rumah :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="lokasi_bangunan"></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Data Developer -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Nasabah</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">NIK :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="nik"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nama Lengkap :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="customer_fullname"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Tanggal Lahir :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="birth_date"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nomor HP :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="mobile_phone"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Alamat :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="address"></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Email :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="email"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Status Pernikahan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="status"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nama Gadis Ibu Kandung :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="mother_name">
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <hr>
                                            <div class="form-group" id="couple1">
                                                <label class="col-md-5 control-label">NIK Pasangan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="couple_nik"></p>
                                                </div>
                                            </div>
                                            <div class="form-group" id="couple2">
                                                <label class="col-md-5 control-label">Nama Lengkap Pasangan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="couple_name"></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <hr>
                                            <div class="form-group" id="couple3">
                                                <label class="col-md-5 control-label">Tempat Lahir Pasangan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="couple_birth_place"></p>
                                                </div>
                                            </div>
                                            <div class="form-group" id="couple4">
                                                <label class="col-md-5 control-label">Tanggal Lahir Pasangan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="couple_birth_date"></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row foto-nasabah">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Foto KTP</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6" align="center">
                                        <div class="card-box" id="identity">
                                            <img src="@if(!empty($dataCustomer['other']['identity'])){{$dataCustomer['other']['identity']}}@endif" class="img-responsive">
                                            <p>Foto KTP</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6" align="center" id="couple5">
                                        <div class="card-box" id="couple_identity">
                                            <img src="@if(!empty($dataCustomer['other']['npwp'])){{$dataCustomer['other']['npwp']}}@endif" class="img-responsive">
                                            <p>Foto KTP Pasangan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                   <a href="#" class="btn btn-default" data-dismiss="modal" >Batal</a>
                   <a id="agree" href="#" class="btn btn-orange" data-dismiss="modal" >Ajukan</a>
               </form>
           </div>
        </div>
    </div>
</div>