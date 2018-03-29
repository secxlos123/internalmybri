<script type="text/javascript">

  $(document).ready(function(){
    $('#jenis_investasi').on('change', function(){
      if ($(this).val() == "kombinasi") {
        $('#view_kombinasi').removeClass('hide');
      } else {
        $('#view_kombinasi').addClass('hide');
      }
    })

    $("#tanggalLahir").datepicker({
      todayBtn:  1,
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd',
    }).on("change", function (e) {
      var dob = new Date(e.target.value);
      var today = new Date();
      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
      console.log(age);
      $('#usia_sekarang').val(age);
    });

    $('#usia_pensiun').on('keyup', function() {
      var u_pensiun = $(this).val();
      var u_sekarang = $('#usia_sekarang').val();
      var j_tahun = u_pensiun - u_sekarang;
      console.log(j_tahun);
      $('#jumlah_tahun').val(j_tahun);
    });

    var akumulasiIuran = function (iuran_bulanan, kenaikan_pertahun, jumlah_tahun, setoran_awal) {

      var setoran = parseInt(setoran_awal.replace(/[^0-9\.-]+/g,""));
      var v1 = parseInt(iuran_bulanan.replace(/[^0-9\.-]+/g,""));
      var kenaikan = 1+kenaikan_pertahun/100;
      var v2 = 1 - Math.pow(kenaikan, jumlah_tahun);
      var v3 = 12 / -Math.abs(kenaikan_pertahun/100);

      console.log(v2);
      var vtotal = v1*v2*v3+setoran;

      return vtotal;
    };

    $('#iuran_bulanan').on('keyup', function() {
      var akumulasi = akumulasiIuran($('#iuran_bulanan').val(), $('#kenaikan_pertahun').val(), $('#jumlah_tahun').val(), $('#setoran_awal').val());
      console.log(akumulasi);
      $('#akumulasi_iuran').val(akumulasi);
    });

    $('#kenaikan_pertahun').on('keyup', function() {
      var akumulasi = akumulasiIuran($('#iuran_bulanan').val(), $('#kenaikan_pertahun').val(), $('#jumlah_tahun').val(), $('#setoran_awal').val());
      console.log(akumulasi);
      $('#akumulasi_iuran').val(akumulasi);
    });

    $('#usia_pensiun').on('keyup', function() {
      var akumulasi = akumulasiIuran($('#iuran_bulanan').val(), $('#kenaikan_pertahun').val(), $('#jumlah_tahun').val(), $('#setoran_awal').val());
      console.log(akumulasi);
      $('#akumulasi_iuran').val(akumulasi);
    });

    $('#setoran_awal').on('keyup', function() {
      var akumulasi = akumulasiIuran($('#iuran_bulanan').val(), $('#kenaikan_pertahun').val(), $('#jumlah_tahun').val(), $('#setoran_awal').val());
      console.log(akumulasi);
      $('#akumulasi_iuran').val(akumulasi);
    });


    var mpsp = function(setoran_awal, jumlah_tahun, iuran_bulanan, return_dplk, kenaikan_pertahun) {
      console.log(setoran_awal);
      console.log(jumlah_tahun);
      console.log(iuran_bulanan);
      console.log(return_dplk);
      console.log(kenaikan_pertahun);
      var a = parseInt(iuran_bulanan.replace(/[^0-9\.-]+/g,""));
      var m = parseInt(setoran_awal.replace(/[^0-9\.-]+/g,""));
      var g = parseInt(kenaikan_pertahun.replace(/[^0-9\.-]+/g,""));
      var t = jumlah_tahun;
      var i = parseInt(return_dplk.replace(/[^0-9\.-]+/g,""));
      var r = 1 + i * Math.pow(1 - 0.7/100/12, 12) - 1;
      var s1 = Math.pow(1 + r, t) * m;
      var s21 = Math.pow(1 + r, t) - Math.pow(1 + g, t)
      var s22 = r * s21;
      var s23 = Math.pow(1 + r, 1/12) - 1;
      var s24 = r - g;
      var s25 = s23 * s24;
      var s2 = a * s22 / s25;
      var s31 = Math.pow(1 + r, t) - 1;
      var s32 = Math.pow(1 + r, 1/12) - 1;
      var s3 = 2000 * s31 / s32;

      var hasil = s1 + s2 - s3;

      console.log(hasil);
      return hasil;

      // var setoran = parseInt(setoran_awal.replace(/[^0-9\.-]+/g,""));
      // var iuran = parseInt(iuran_bulanan.replace(/[^0-9\.-]+/g,""));
      // var rtrn = parseInt(return_dplk.replace(/[^0-9\.-]+/g,""));
      // var v1 = 1 + rtrn/jumlah_tahun
      // var v2 = Math.pow(v1, 12*jumlah_tahun);
      // var v3 = setoran * v2;
      // var v4 = 1 + rtrn/jumlah_tahun;
      // var v5 = Math.pow(v4, 12*jumlah_tahun) - 1;
      // var v6 = rtrn/12;
      // var v7 = v5 / v6;
      // var v8 = iuran * v7;
      // var v9 = 1 + rtrn /12;
      // var v10 = v3 + v8 * v9;
      // console.log("v1 "+v1);
      // console.log("v2 "+v2);
      // console.log("v3 "+v3);
      // console.log("v4 "+v4);
      // console.log("v5 "+v5);
      // console.log("v6 "+v6);
      // console.log("v7 "+v7);
      // console.log("v8 "+v8);
      // console.log("v9 "+v9);
      // console.log("v10 "+v10);
      // console.log(rtrn);
      // return v10;
    };

    $('#jenis_investasi').on('change', function() {
      if ($(this).val() != 'kombinasi') {

        var return_dplk = $('#asusmsi_'+$(this).val()).val();
        $('#return_dplk').val(return_dplk);
        console.log(return_dplk);
        var returnMpsp = mpsp($('#setoran_awal').val(), $('#jumlah_tahun').val(), $('#iuran_bulanan').val(), return_dplk, $('#kenaikan_pertahun').val());
        $('#manfaat_sebelum_pajak').val(returnMpsp);
        var pp = returnMpsp - 50000000;
        var pajakPensiun = pp * 5/100;
        $('#pajak_pensiun').val(pajakPensiun);
        if (returnMpsp > 50000000) {
          $('#pajak_pensiun').val(0);
        }
        var msp = returnMpsp - pajakPensiun;
        $('#manfaat_setelah_pajak').val(msp);

        if (msp > 625000000) {
          $('#maksimal_penarikan').val(msp * 20 / 100);
          $('#pembayaran_manfaat_pensiun').removeClass('hide');
        } else if (msp <= 625000000) {
          $('#maksimal_penarikan').val(msp);
          $('#pembayaran_manfaat_pensiun').addClass('hide');
        }

      }
    });
  });

  var defaultJangkaWaktu = 240;
  var defaultMinJangkaWaktu = 12;
  var interest_rate = $('#interest_rate_div');
  var interest_rate_floor = $('#interest_rate_floor_div');
  var interest_rate_float = $('#interest_rate_float_div');
  var interest_rate_fixed = $('#interest_rate_fixed_div');
  var time_period = $('#time_period_div');
  var time_period_floor = $('#time_period_floor_div');
  var time_period_total = $('#time_period_total_div');
  var time_period_fixed = $('#time_period_fixed_div');

    function hideFloorFloat(){
        interest_rate_floor.addClass('hidden');
        interest_rate_float.addClass('hidden');
        interest_rate_fixed.addClass('hidden');
        time_period_floor.addClass('hidden');
        time_period_total.addClass('hidden');
        time_period_fixed.addClass('hidden');
    }

    function hideDefaultInterest(){
        interest_rate.addClass('hidden');
        time_period.addClass('hidden');
    }

    function showDefaultInterest(){
        interest_rate.removeClass('hidden');
        time_period.removeClass('hidden');
    }

    function showFloorFloat(){
        interest_rate_float.removeClass('hidden');
        interest_rate_fixed.removeClass('hidden');
        interest_rate_floor.removeClass('hidden');
        time_period_total.removeClass('hidden');
        time_period_fixed.removeClass('hidden');
        time_period_floor.removeClass('hidden');
    }

    function showOnlyFloat(){
        interest_rate_floor.addClass('hidden');
        time_period_floor.addClass('hidden');
        interest_rate_float.removeClass('hidden');
        interest_rate_fixed.removeClass('hidden');
        time_period_total.removeClass('hidden');
        time_period_fixed.removeClass('hidden');
    }

    hideFloorFloat();
    hideDefaultInterest();
    showDefaultInterest();

    $('#interest_rate_type').on('change', function() {
        if($(this).val() == 1){
            hideFloorFloat();
            showDefaultInterest();
        }else if($(this).val() == 2){
            hideFloorFloat();
            showDefaultInterest();
        }else if($(this).val() == 3){
            hideDefaultInterest();
            showOnlyFloat();
        }else if($(this).val() == 4){
            hideDefaultInterest();
            showFloorFloat();
        }
    });



$(document).ready(function(){
    var interest_rate_type = $("#interest_rate_type").val();
    if(interest_rate_type == 1){
        hideFloorFloat();
        showDefaultInterest();
    }else if(interest_rate_type == 2){
        hideFloorFloat();
        showDefaultInterest();
    }else if(interest_rate_type== 3){
        hideDefaultInterest();
        showOnlyFloat();
    }else if(interest_rate_type == 4){
        hideDefaultInterest();
        showFloorFloat();
    }
});

$("#dp").keyup(function(){
   var dp =this.value;
   var dpPersen = dp /100;
   var price = $("#price").inputmask('unmaskedvalue');
   var priceint  = parseInt(price);
   var down_payment = hitungDP(priceint,dpPersen);
  });

function hitungDP(priceint,dpPersen){
  if(dpPersen > 0.99)
  {
    alert('Dp tidak boleh lebih besar dari 99.99');
    $("#dp").val('');
    dpPersen = 0;
    priceint = 0;
  }
  console.log(dpPersen);
  var down_payment = priceint * dpPersen;
  var price_platform = priceint - down_payment;
  $("#down_payment").val(down_payment);
  $("#price_platform").val(price_platform);
}

$("#price").keyup(function(){
  var price = $("#price").inputmask('unmaskedvalue');
  var priceint  = parseInt(price);
  var dp = $("#dp").val();
  var dpPersen = dp /100;
  var down_payment = hitungDP(priceint,dpPersen);
});

$("#down_payment").keyup(function(){
   var down_payment = $("#down_payment").inputmask('unmaskedvalue');
   var down_payment_int = parseInt(down_payment);

   var price = $("#price").inputmask('unmaskedvalue');
   var priceint  = parseInt(price);
    if(down_payment_int > priceint){
      alert('Dp tidak boleh lebih besar dari harga rumah');
      var persen = 0;
      $("#down_payment").val(persen);
    }else{
      var persen = (100/priceint)*down_payment_int;

    }
    if (isNaN(persen)) {
       persen = 0;
    }
    persen = persen.toFixed(4);
    $("#dp").val(persen);
    var price_platform = priceint - down_payment_int;
    if(price_platform <= 0 ){
        price_platform = 0;
    }
    $("#price_platform").val(price_platform);
});

//validasi nomer suku bunga
$("#rate").keyup(function(e){
     var nilai = $(this).val();
     var id =  "#rate";
     sukubunga(nilai,id,e);
});

//validasi suku bunga fixed

$("#interest_rate_efektif").keyup(function(e){
     var nilai = $(this).val();
     var id =  "#interest_rate_efektif";
     sukubunga(nilai,id,e);
});

$("#interest_rate_float").keyup(function(e){
     var nilai = $(this).val();
     var id =  "#interest_rate_float";
     sukubunga(nilai,id,e);
});


$("#interest_rate_floor").keyup(function(e){
     var nilai = $(this).val();
     var id =  "#interest_rate_floor";
     sukubunga(nilai,id,e);
});

function sukubunga(nilai,id,e){
  var rate = nilai;
  if(rate > 99)
  {
    alert('Suku Bunga tidak boleh lebih besar dari 100 %');
    $(id).val('');
  }
}

$("#time_period").keyup(function(e){
    var nilai = $(this).val();
    var id = "#time_period";
    validation_timeperiod(nilai,id);
});

$("#time_period_total").keyup(function(e){
    var nilai = $(this).val();
    var id = "#time_period_total";
    validation_timeperiod(nilai,id);
});

$("#time_period_fixed").keyup(function(e){
    var nilai = $(this).val();
    var id = "#time_period_fixed";
    validation_timeperiod(nilai,id);
});

$("#time_period_floor").keyup(function(e){
    var nilai = $(this).val();
    var id = "#time_period_floor";
    validation_timeperiod(nilai,id);
});

 // validsi inputan jangka waktu
function  validation_timeperiod(nilai,id){

    if(nilai > defaultJangkaWaktu){
       nilai = defaultJangkaWaktu;
    }
    $(id).val(nilai);
    console.log(nilai);
}

function isInteger(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
       return false;
   return true;
}

$('#form-calculator').on('submit', function() {
 var interset_type = $("#interest_rate_type").val();
 var dp = $("#dp").val();

  if(dp <=  0 ){
    alert('Dp belum diisi');
    return false;
  }

  if(interset_type==1 || interset_type == 2){
    var time_period =  $('#time_period').val();
    var rate =  $('#rate').val();
    if(  time_period === ""  ){
        alert('Jangka Waktu Belum Diisi');
        $("#time_period" ).focus();
        return false;
    }else if(rate === "" ){
        alert('Suku Bunga Belum Diisi');
        $("#rate" ).focus();
        return false;
    }

    if(time_period < defaultMinJangkaWaktu){
      alert('Jangka Waktu minimal 12');
      $("#time_period" ).focus();
      return false;
    }
    else if(time_period > defaultJangkaWaktu){
      alert('Jangka Waktu tidak boleh melebihi 240');
      return false;
    }
  }else if(interset_type == 3){
    var time_period_total = $('#time_period_total').val();
    var time_period_fixed = $('#time_period_fixed').val();
    var interest_rate_efektif = $('#interest_rate_efektif').val();
    var interest_rate_float = $('#interest_rate_float').val();

    if(time_period_total === ""){
      alert('Jangka Waktu Total Belum Diisi');
       $('#time_period_total').focus();
      return false;
    }else if(time_period_fixed === ""){
      alert('Jangka Waktu Fixed Belum Diisi');
      $('#time_period_fixed').focus();
      return false;
    }else if(interest_rate_efektif === ""){
      alert('Suku Bunga Fixed Belum Diisi');
      $('#interest_rate_efektif').focus();
      return false;
    }else if(interest_rate_float ===""){
      alert('Suku Bunga Float Belum Diisi');
      $('#interest_rate_float').focus();
      return false;
    }

    if(time_period_total < defaultMinJangkaWaktu){
      alert('Jangka Waktu Total minimal 12');
      $('#time_period_total').focus();
      return false;
    }else if (time_period_fixed  < defaultMinJangkaWaktu){
       alert('Jangka Waktu Fixed minimal 12');
      $('#time_period_fixed').focus();
      return false;
    }

    var jwt = parseInt(time_period_total);
    var jwf = parseInt(time_period_fixed);

    if(jwf > jwt){
      alert('Jangka Waktu Fixed tidak boleh melebihi Jangka Waktu Total');
      $('#time_period_fixed').focus();
      return false;
    }else if(jwf == jwt){
      alert('Jangka Waktu Fixed tidak boleh sama dengan Jangka Waktu Total');
      $('#time_period_fixed').focus();
      return false;
    }

    if(time_period_total > defaultJangkaWaktu){
      alert('Jangka Waktu Total tidak boleh melebihi 240');
      return false;
    }

    if(time_period_fixed > defaultJangkaWaktu){
      alert('Jangka Waktu Fixed tidak boleh melebihi 240');
      return false;
    }

  }else if (interset_type == 4){
    var time_period_total = $('#time_period_total').val();
    var time_period_fixed = $('#time_period_fixed').val();
    var time_period_floor = $('#time_period_floor').val();
    var interest_rate_efektif = $('#interest_rate_efektif').val();
    var interest_rate_float = $('#interest_rate_float').val();
    var interest_rate_floor = $('#interest_rate_floor').val();

    if(time_period_total === ""){
      alert('Jangka Waktu Total Belum Diisi');
      $('#time_period_total').focus();
      return false;
    }else if(time_period_fixed === ""){
      alert('Jangka Waktu Fixed Belum Diisi');
      $('#time_period_fixed').focus();
      return false;
    }else if( time_period_floor === ""){
       alert('Jangka Waktu Floor Belum Diisi');
       $('#time_period_floor').focus();
       return false;
    }else if(interest_rate_efektif === ""){
      alert('Suku Bunga Fixed Belum Diisi');
      $('#interest_rate_efektif').focus();
      return false;
    }else if(interest_rate_float ===""){
      alert('Suku Bunga Float Belum Diisi');
      $('#interest_rate_float').focus();
      return false;
    }else if(interest_rate_floor ===""){
        alert('Suku Bunga Floor Belum Diisi');
        $('#interest_rate_floor').focus();
      return false;
    }

    if(time_period_total < defaultMinJangkaWaktu){
      alert('Jangka Waktu Total minimal 12');
      $('#time_period_total').focus();
      return false;
    }else if (time_period_fixed  < defaultMinJangkaWaktu){
       alert('Jangka Waktu Fixed minimal 12');
      $('#time_period_fixed').focus();
      return false;
    } else if (time_period_floor < defaultMinJangkaWaktu){
      alert('Jangka Waktu Floor minimal 12');
      $('#time_period_floor').focus();
      return false;
    }


    var jwt = parseInt(time_period_total);
    var jwf = parseInt(time_period_fixed);
    var jwfloor = parseInt(time_period_floor);

    if(jwf > jwt){
      alert('Jangka Waktu Fixed tidak boleh melebihi Jangka Waktu Total');
      $('#time_period_fixed').focus();
      return false;
    }else if (jwf == jwt){
       alert('Jangka Waktu Fixed tidak boleh sama dengan Jangka Waktu Total');
       $('#time_period_fixed').focus();
      return false;
    }
    if(jwfloor > jwt){
      alert('Jangka Waktu Floor tidak boleh melebihi Jangka Waktu Total');
       $('#time_period_floor').focus();
      return false;
    }else if(jwfloor == jwt){
      alert('Jangka Waktu Floor tidak boleh sama dengan Jangka Waktu Total');
       $('#time_period_floor').focus();
      return false;
    }
    if(time_period_total > defaultJangkaWaktu){
      alert('Jangka Waktu Total tidak boleh melebihi 240');
      return false;
    }
    if(time_period_fixed > defaultJangkaWaktu){
      alert('Jangka Waktu Fixed tidak boleh melebihi 240');
      return false;
    }
    if(time_period_floor > defaultJangkaWaktu){
      alert('Jangka Waktu Floor tidak boleh melebihi 240');
      return false;
    }
  }
});
</script>
