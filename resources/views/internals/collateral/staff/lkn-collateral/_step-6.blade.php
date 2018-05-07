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
                                {!! Form::select('other[bond_type]', array($collateral['ots_other']['bond_type'] ? $collateral['ots_other']['bond_type'] : "" => $collateral['ots_other']['bond_type'] ? $collateral['ots_other']['bond_type'] : "", 
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
                                {!! Form::select('other[use_of_building_function]', array($collateral['ots_other']['use_of_building_function'] ? $collateral['ots_other']['use_of_building_function'] : "" => $collateral['ots_other']['use_of_building_function'] ? $collateral['ots_other']['use_of_building_function'] : "", 
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
                                {!! Form::select('other[optimal_building_use]', array($collateral['ots_other']['optimal_building_use'] ? $collateral['ots_other']['optimal_building_use'] : "" => $collateral['ots_other']['optimal_building_use'] ? $collateral['ots_other']['optimal_building_use'] : "", 
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
                                {!! Form::select('other[building_exchange]', array($collateral['ots_other']['building_exchange'] ? $collateral['ots_other']['building_exchange'] : "" => $collateral['ots_other']['building_exchange'] ? $collateral['ots_other']['building_exchange'] : "", 
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
                                <textarea class="form-control" rows="4" name="other[things_bank_must_know]" id="things_bank_must_know">{{ $collateral['ots_other']['things_bank_must_know'] ? $collateral['ots_other']['things_bank_must_know'] : old('other.things_bank_must_know')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Foto Situasi Lapangan * :</label>
                            <div class="col-md-8" id="foto_div">
                                <div class="foto">
                                @if(isset($collateral['ots_other']['images']))
                                    <input type="file" class="filestyle-foto photo" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" name="other[image_area][2][image_data]" accept="image/*,application/pdf">
                                @else
                                    <input type="file" class="filestyle-foto photo" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" name="other[image_area][1][image_data]" accept="image/*,application/pdf">
                                @endif
                                </div>
                            </div>
                                <a href="javascript:void(0)" class="btn btn-info" title="Tambah Foto" id="add_photo">+ Tambah Foto</a> 
                        </div>
                        @if(isset($collateral['ots_other']['images']))
                        <i style="font-size: 11px; color: red;"><b>*Perhatian: Jika unggah Foto baru, maka Foto <!--Situasi Lapangan--> sebelumnya yang ada dibawah ini akan terhapus.</b> </i>
                        <hr>
                        <label class="col-md-12 pull-left">Foto Situasi Lapangan Sebelumnya :</label>
                        <br>
                            <?php $i = 1; ?>
                            @foreach($collateral['ots_other']['images'] as $image => $value)
                                <div class="col-md-4">
                                <label class="control-label">Foto <?php echo $i++ ?>:</label>
                                <img src="{{$value['image_data']}}" class="img img-responsive">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>