<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-save').on('click', function(e) {
            $("#form-calculator").submit();
        });

        $('.cities').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/cities',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    console.log(data);
                    return {
                        results: data.cities.data,
                        pagination: {
                            more: (params.page * data.cities.per_page) < data.cities.total
                        }
                    };
                },
                cache: true
            },
        });

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

            if($('#interest_rate_type').val() == 1){
                hideFloorFloat();
                showDefaultInterest();
            }else if($('#interest_rate_type').val() == 2){
                hideFloorFloat();
                showDefaultInterest();
            }else if($('#interest_rate_type').val() == 3){
                hideDefaultInterest();
                showOnlyFloat();
            }else if($('#interest_rate_type').val() == 4){
                hideDefaultInterest();
                showFloorFloat();
            }
    });

var defaultJangkaWaktu = 240;

// // $(document).ready(function(){
//     var interest_rate_type = $("#interest_rate_type").val();
//     if(interest_rate_type == 1){
//         hideFloorFloat();
//         showDefaultInterest();
//     }else if(interest_rate_type == 2){
//         hideFloorFloat();
//         showDefaultInterest();
//     }else if(interest_rate_type== 3){
//         hideDefaultInterest();
//         showOnlyFloat();
//     }else if(interest_rate_type == 4){
//         hideDefaultInterest();
//         showFloorFloat();
//     }
// // });

$("#dp").keyup(function(){
 var dp =this.value;
 var dpPersen = dp /100;
 var price = $("#price").inputmask('unmaskedvalue');
 var priceint  = parseInt(price);
 var down_payment = hitungDP(priceint,dpPersen);
});

 

function hitungDP(priceint,dpPersen){
  var down_payment = priceint *   dpPersen;
  var price_platform = priceint - down_payment;
  $("#down_payment").val(down_payment.toFixed(0));
  $("#price_platform").val(price_platform);
}

$("#price").keyup(function(){
  var price = $("#price").inputmask('unmaskedvalue'); 
  var priceint  = parseInt(price);
  var dp = $("#dp").val();
  var dpPersen = dp /100;
  var down_payment = hitungDP(priceint,dpPersen);
});

// $("#down_payment").keyup(function(){
//    var down_payment = $("#down_payment").inputmask('unmaskedvalue');
//    var down_payment_int = parseInt(down_payment);
 
//    var price = $("#price").inputmask('unmaskedvalue'); 
//    var priceint  = parseInt(price);
//     if(down_payment_int > priceint){
//       alert('Dp tidak boleh lebih besar dari harga rumah');
//       var persen = 0;
//       $("#down_payment").val(persen);
//     }else{
//       var persen = (100/priceint)*down_payment_int;
      
//     }
//     if (isNaN(persen)) {
//        persen = 0;
//     }

//     persen = persen.toFixed(2);
//       $("#dp").val(persen);
// });
var down_payment = $('#down_payment');
 down_payment
            .on('input', function() {
                var val = $(this).val().replace(/\,/g, '');
                var static_price = $('#price').val().replace(/\,/g, '');
                var dp = $('#dp');
                var dp_min = dp.attr('min');
                var price_platform = $('#price_platform');
                var max = parseInt(static_price) * (90/100);

                if ( isNaN(parseInt(val)) ) {
                    val = 0;
                }

                if (parseInt(val) < max) {
                    payment = (val / static_price) * 100;

                } else {
                    $(this).val(max);
                    payment = 90;

                }

                if ( !isNaN(payment) ) {
                    persen = payment.toFixed(4);
                    dp.val(persen);
                    total = static_price - val;

                    if (total > 0) {
                        price_platform.val(static_price - val);

                    } else {
                        price_platform.val(static_price - max);
                    }
                }
            })
            .on('blur', function() {
                var val = $(this).val().replace(/\,/g, '');
                var static_price = $('#price').val().replace(/\,/g, '');
                var dp = $('#dp');
                var dp_min = dp.attr('min');
                var price_platform = $('#price_platform');
                var max = parseInt(static_price) * (90/100);

                if ( isNaN(parseInt(val)) ) {
                    val = 0;
                }

                if (parseInt(val) < max) {
                    payment = (val / static_price) * 100;

                } else {
                    $(this).val(max);
                    payment = 90;

                }

                if ( !isNaN(payment) ) {
                    persen = payment.toFixed(4);
                    dp.val(persen);
                    total = static_price - val;

                    if (total > 0) {
                        price_platform.val(static_price - val);

                    } else {
                        price_platform.val(static_price - max);

                    }
                }
            });

//validasi nomer suku bunga
$("#rate").keyup(function(){
    var values = $(this).val();
    var length = values.length;
    $(this).inputmask('Regex', {regex: "^[0-9]{1,2}(\\.\\d{1,2})?$"});
});

//validasi suku bunga fixed

$("#interest_rate_efektif").keyup(function(e){
    var nilai = $(this).val();
    var id =  "#interest_rate_efektif";
    $(this).inputmask('Regex', {regex: "^[0-9]{1,2}(\\.\\d{1,2})?$"});
}); 

$("#interest_rate_float").keyup(function(e){
    var nilai = $(this).val();
    var id =  "#interest_rate_float";
    $(this).inputmask('Regex', {regex: "^[0-9]{1,2}(\\.\\d{1,2})?$"});
}); 


$("#interest_rate_floor").keyup(function(e){
    var nilai = $(this).val();
    var id =  "#interest_rate_floor";
    $(this).inputmask('Regex', {regex: "^[0-9]{1,2}(\\.\\d{1,2})?$"});
}); 



function sukubunga(nilai,id,e){
    var rate = nilai;
    var numberstring = $(id).val().length;  
    if(numberstring == 1 && rate =='.'){
      $(id).val('');
    }else if(e.keyCode==8 && numberstring == 2){
     
    }else if(numberstring == 2){       
       var rate = rate+'.';
       $(id).val(rate);
    }else if(numberstring > 2){
      var chekKomavalue = rate.search('.');
      console.log(chekKomavalue); 
        var arr = rate.split("");
        var pangjangKata = arr.length; 
      if(chekKomavalue== -1){
        var rate = arr[0]+arr[1]+','+arr[2];
        $(id).val(rate);
      }else if (pangjangKata  == 3){
        var rate = arr[0]+arr[1];
        $(id).val(rate);
      }
      console.log(pangjangKata);
    }
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

       if(interset_type==1 || interset_type == 2){
          var time_period =  $('#time_period').val();
          var rate =  $('#rate').val();
          if(  time_period === ""  ){
              alert('Jangka Waktu Belum Diisi');
              return false;
          }else if(rate === "" ){
              alert('Suku Bunga Belum Diisi');
              return false;
          }
          if(time_period > defaultJangkaWaktu){
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
            return false;
          }else if(time_period_fixed === ""){
            alert('Jangka Waktu Fixed Belum Diisi');
            return false;
          }else if(interest_rate_efektif === ""){
            alert('Suku Bunga Fixed Belum Diisi');
            return false;
          }else if(interest_rate_float ===""){
            alert('Suku Bunga Float Belum Diisi');
            return false;
          }

          var jwt = parseInt(time_period_total);
          var jwf = parseInt(time_period_fixed);

          if(jwf > jwt){
            alert('Jangka Waktu Fixed tidak boleh melebihi Jangka Waktu Total');
            return false;
          }else if(jwf == jwt){
            alert('Jangka Waktu Fixed tidak boleh sama dengan Jangka Waktu Total');
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
            return false;
          }else if(time_period_fixed === ""){
            alert('Jangka Waktu Fixed Belum Diisi');
            return false;
          }else if( time_period_floor === ""){
             alert('Jangka Waktu Floor Belum Diisi');
             return false;
          }else if(interest_rate_efektif === ""){
            alert('Suku Bunga Fixed Belum Diisi');
            return false;
          }else if(interest_rate_float ===""){
            alert('Suku Bunga Float Belum Diisi');
            return false;
          }else if(interest_rate_floor ===""){
              alert('Suku Bunga Floor Belum Diisi');
            return false;
          }

          var jwt = parseInt(time_period_total);
          var jwf = parseInt(time_period_fixed);
          var jwfloor = parseInt(time_period_floor);

          if(jwf > jwt){
            alert('Jangka Waktu Fixed tidak boleh melebihi Jangka Waktu Total');
            return false;
          }else if (jwf == jwt){
             alert('Jangka Waktu Fixed tidak boleh sama dengan Jangka Waktu Total');
            return false;
          }

          if(jwfloor > jwt){
            alert('Jangka Waktu Floor tidak boleh melebihi Jangka Waktu Total');
            return false;
          }else if(jwfloor == jwt){
            alert('Jangka Waktu Floor tidak boleh sama dengan Jangka Waktu Total');
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