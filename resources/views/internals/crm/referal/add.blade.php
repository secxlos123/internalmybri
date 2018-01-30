@section('title','My BRI - Tambah Referral')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style>
  .select2-selection__clear {
    display: none;
  }
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah Referral</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('customers.index')}}">Referral</a>
                            </li>
                            <li class="active">
                                Tambah Referral
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                     <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Input Data</h3>
                        </div>
                        <form class="form-horizontal" role="form" action="{{url('store_referral')}}" method="POST" enctype="multipart/form-data" id="form1">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-horizontal" >
                                        <div class="form-group nik {!! $errors->has('nik') ? 'has-error' : '' !!}">
                                            <label class="col-md-3 control-label">NIK * :</label>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control numericOnly" name="nik" id="nik" value="{{ old('nik') }}" maxlength="16">
                                                @if ($errors->has('nik')) <p class="help-block">{{ $errors->first('nik') }}</p> @endif
                                                <div class="text-right">
                                                  <btn class="btn btn-orange waves-light waves-effect w-md" style="margin-top:10px;" id="btn-cek-nik">Cek</btn>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group full_name {!! $errors->has('full_name') ? 'has-error' : '' !!}">
                                            <label class="col-md-3 control-label">Nama Lengkap * :</label>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control" name="name" id="full_name" value="{{ old('full_name') }}" maxlength="50">
                                                 @if ($errors->has('full_name')) <p class="help-block">{{ $errors->first('full_name') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group birth_place {!! $errors->has('birth_place') ? 'has-error' : '' !!}">
                                            <label class="col-md-3 control-label">Nomor Handphone * :</label>
                                            <div class="col-md-9">
                                                <input required type="number" id="handphone" class="form-control" name="phone" value="" maxlength="20">
                                                @if ($errors->has('birth_place')) <p class="help-block">{{ $errors->first('birth_place') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group birth_date {!! $errors->has('birth_date') ? 'has-error' : '' !!}">
                                            <label class="col-md-3 control-label">Alamat * :</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <textarea required id="address" name="address" rows="6" cols="70"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group gender {!! $errors->has('gender') ? 'has-error' : '' !!}">
                                            <label class="col-md-3 control-label">Produk * :</label>
                                            <div class="col-md-9">
                                                <select required class="form-control select2" name="product_type">
                                                    <option disabled="" selected="">-- Pilih --</option>
                                                    @foreach($product as $pr)
                                                    <option>{{$pr['product_name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group gender {!! $errors->has('gender') ? 'has-error' : '' !!}">
                                            <label class="col-md-3 control-label">Pemasar * :</label>
                                            <div class="col-md-9">
                                                <select required class="form-control select2" name="officer_ref">
                                                    <option disabled="" selected="">-- Pilih --</option>
                                                    @foreach($pemasar as $pm)
                                                    <option value="{{$pm['PERNR']}}">{{$pm['SNAME']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group birth_date {!! $errors->has('birth_date') ? 'has-error' : '' !!}">
                                            <label class="col-md-3 control-label">Note * :</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <textarea required id="note" name="note" rows="4" cols="70"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                        <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Simpan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modals Save -->
<div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 text-center">
            <p>Apakah Anda yakin ingin menambah Referral "<b id="name"></b>" ?</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
        <button type="button" id="btnSave" class="btn btn-orange waves-effect waves-light">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!-- Modals nik -->
<div id="nik-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 text-center">
            <p id="nik-result"></p><b id="nik-result-name"></b>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-orange waves-effect waves-light" data-dismiss="modal">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script type="text/javascript">
    $(document).ready(function() {
       $('#btnSave').on('click', function(e) {
            $("#form1").submit();
       });

       $('#btn-save').on('click', function(e) {
            var name = $('#full_name').val();
            $('#save').modal('show');
            $("#save #name").html(name);
       });
   });

    function hideCouple(){
        $('#couple_data').hide();

    }
    hideCouple();

    $('#status').on('change', function() {
        if(this.value==1){
            $('#couple_data').show();
        }else{
            hideCouple();
        }
    })

    $('#datepicker-date').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        endDate: new Date(),
        todayHighlight: true
    });
    $('#datepicker-date').datepicker("setDate",  "{{date('Y-m-d', strtotime('-20 years'))}}");

</script>
<script type="text/javascript">
$(document).ready(function() {
  var options = {
       theme:"sk-bounce",
       message:'Mohon tunggu sebentar.',
       textColor:"white"
  };

  $('#btn-cek-nik').on('click', function(){
    HoldOn.open(options);
    var nik = $('#nik').val();
    var data ={
      'nik'    : nik
    }
    console.log(nik);
    $.ajax({
      type: 'POST',
      url: '{{ url("/cek_nik") }}',
      data: data,
      headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      }

    }).done(function(data){
      if (data.contents == '') {
        console.log(data);
        HoldOn.close();
        $('#nik-result').html('');
        $('#nik-result-name').html('');
        $('#full_name').html('');
        $('#nik-result').html('NIK belum terdaftar');
        $('#nik-modal').modal('show');
        $('#name').val('');
        $('#handphone').val('');
        $('#address').val('');
      } else {
        HoldOn.close();
        console.log(data.contents.info[0].handphone);
        $('#nik-result').html('');
        $('#nik-result').html('NIK terdaftar atas nama ');
        $('#nik-result-name').html('');
        $('#nik-result-name').html(data.contents.info[0].nama_sesuai_id.replace(/\s+$/, ''));
        $('#nik-modal').modal('show');
        $('#full_name').val('');
        $('#handphone').val('');
        $('#address').val('');
        $('#full_name').val(data.contents.info[0].nama_sesuai_id.replace(/\s+$/, ''));
        $('#handphone').val(data.contents.info[0].handphone.replace(/\s+$/, ''));
        $('#address').val(data.contents.info[0].alamat_id1.replace(/\s+$/, '') + ' ' +
        data.contents.info[0].alamat_id2.replace(/\s+$/, '') + ' ' +
        data.contents.info[0].alamat_id3.replace(/\s+$/, '') + ' ' +
        data.contents.info[0].alamat_id4.replace(/\s+$/, '') + ' '
      );
      }
    }).fail(function(errors) {
      HoldOn.close();
      alert("Gagal Terhubung ke Server");
    });
  });

   $('#btnSave').on('click', function(e) {
        $("#form1").submit();
   });

   $('#btn-save').on('click', function(e) {
        var name = $('#full_name').val();
        $('#save').modal('show');
        $("#save #name").html(name);
   });
});
</script>
