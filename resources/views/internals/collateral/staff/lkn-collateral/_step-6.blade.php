<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 6 Lain-lain</b></h4>
            <div class="row">
                <div class="col-md-7">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Jenis Ikatan * :</label>
                            <div class="col-md-8">
                                {!! Form::select('other[bond_type]', array("" => "", 
                                    "Akta Pembebanan Hak" => "Akta Pembebanan Hak", 
                                    "Fiducia Bangunan" => "Fiducia Bangunan", 
                                    "Lain-lain" => "Lain-lain"), 
                                    old('other.bond_type'), [
                                    'class' => 'select2 bond_type ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Penggunaan Bangunan Sesuai Fungsinya * :</label>
                            <div class="col-md-8">
                                {!! Form::select('other[use_of_building_function]', array("" => "", 
                                    "Sesuai" => "Sesuai", 
                                    "Tidak" => "Tidak"), 
                                    old('other.use_of_building_function'), [
                                    'class' => 'select2 use_of_building_function ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Penggunaan Bangunan Secara Optimal * :</label>
                            <div class="col-md-8">
                                {!! Form::select('other[optimal_building_use]', array("" => "", 
                                    "Sesuai" => "Sesuai", 
                                    "Tidak" => "Tidak"), 
                                    old('other.optimal_building_use'), [
                                    'class' => 'select2 optimal_building_use ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Peruntukan Bangunan * :</label>
                            <div class="col-md-8">
                                {!! Form::select('other[building_exchange]', array("" => "", 
                                    "Disewakan" => "Disewakan", 
                                    "Digunakan" => "Digunakan"), 
                                    old('other.building_exchange'), [
                                    'class' => 'select2 building_exchange ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Hal-Hal Yang Perlu Diketahui Bank * :</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="other[things_bank_must_know]" id="things_bank_must_know" maxlength="250">{{old('other.things_bank_must_know')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Foto Situasi Lapangan * :</label>
                            <div class="col-md-8" id="foto_div">
                                <div class="foto">
                                    <input type="file" class="filestyle-foto photo" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" name="other[image_area][1][image_data]" accept="image/*,application/pdf">
                                </div>
                            </div>
                            <!-- <div class="img-previews">
                                    <img id="preview-0" src="#" width="40%">
                            </div> -->
                                <a href="javascript:void(0)" class="btn btn-info" title="Tambah Foto" id="add_photo">+ Tambah Foto</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>