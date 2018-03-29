@section('title','My BRI - Create Marketing')
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
            <h4 class="page-title">Create Marketing</h4>
            <ol class="breadcrumb p-0 m-0">
              <li>
                <a href="{{url('marketing')}}">Marketing</a>
              </li>
              <li class="active">
                Create Marketing
              </li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="card-box ">
            <div class="add-button">
            </div>
            <div id="filter" class="m-b-15">
              <div class="row">
                <div class="col-md-8">
                  <div class="card-box">
                    <form class="form-horizontal" role="form" method="post" action="{{url('marketing/store')}}">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Produk :</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="produk" name="product_type">
                            @foreach($product as $pr)
                            <option>{{$pr['product_name']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Jenis Kegiatan :</label>
                        <div class="col-sm-8">
                          <select id="jenisKegiatan" class="form-control" name="activity_type">
                            @foreach($activity as $act)
                            <option>{{$act['activity_name']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Target Nominal:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control numericOnly currency-rp" id="target" name="target">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Jenis Nasabah :</label>
                        <div class="col-sm-8">
                          <select id="jenisNasabah" class="form-control" name="type">
                            <option value="kelolaan">Kelolaan</option>
                            <option value="crossSell">Cross Sell</option>
                            <option value="myBri">My BRI</option>
                            <option value="cpp">CPP</option>
                            <option value="referral">Referral</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Nasabah :</label>
                        <div id="kelolaan" class="col-sm-8 namaNasabah">
                          <select class="form-control selectNasabah select2 hide" name="kelolaan" id="selectedNasabah">
                            @foreach($kelolaans as $kl)
                            <option value='{"nik" : "", "cif" : "{{$kl['CIFNO']}}", "name" : "{{$kl['short_name']}}"}'>{{$kl['short_name']}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div id="crossSell" class="col-sm-8 namaNasabah hide">
                          <select class="form-control selectNasabah select2 hide" name="crossSell">
                            @foreach($leads as $l)
                            <option value='{"nik" : "", cif" : "{{$l['CIF']}}", "name" : "{{$l['nama']}}"}'>{{$l['nama']}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div id="myBri" class="col-sm-8 namaNasabah hide">
                          <select class="form-control selectNasabah select2 hide" name="myBri">
                            @foreach($customers as $cs)
                            <option value='{"nik" : "{{$cs['nik']}}", "cif" : "", "name" : "{{$cs['first_name']}} {{$cs['last_name']}}"}'>{{$cs['first_name']}} {{$cs['last_name']}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div id="cpp" class="col-sm-8 namaNasabah hide">
                          <select class="form-control selectNasabah select2 hide" name="cpp">
                            @foreach($cpps as $cpp)
                            <option value='{"nik" : "{{$cpp['nik']}}", "cif" : "" , "name" : "{{$cpp['name']}}"}'>{{$cpp['name']}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div id="referral" class="col-sm-8 namaNasabah hide">
                          <select class="form-control selectNasabah select2 hide" name="referral">
                            @foreach($referrals as $ref)
                            <option value='{"nik" : "{{$ref['nik']}}", "cif" : "" , "name" : "{{$ref['name']}}"}'>{{$ref['name']}}</option>
                            @endforeach
                          </select>
                        </div>

                        <input type="hidden" id="nama_nasabah" name="nama_nasabah" value="">
                      </div>


                    <div class="text-right">
                      <button type="submit" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Simpan</button>
                    </div>
                  </form>
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
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>
<script src="{{ asset('assets/js/custom/schedule.js')  }}"></script>
<script type="text/javascript">
  var address = {
    address: 'undefined',
    lat: "{{ env('DEF_LAT', '-6.21670') }}",
    long: "{{ env('DEF_LONG', '106.81350') }}",
  };
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#jenisNasabah').on('change', function(){
      $('.namaNasabah').addClass('hide');
      $('#'+$('#jenisNasabah').val()).removeClass('hide');
      console.log($('#jenisNasabah').val());
    });
  });
</script>
