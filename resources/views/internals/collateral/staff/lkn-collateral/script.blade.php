<!-- <script src="{{asset('assets/js/jquery.wizard-init.js')}}" type="text/javascript"></script> -->
<!-- <script src="{{asset('assets/js/jquery.gmaps.js')}}"></script> -->
<script type="text/javascript">
  function initialize() {
    var lng = $('#lng').val();
    var lat = $('#lat').val();
    var latlng = new google.maps.LatLng(lat,lng);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13,
      disableDefaultUI: true
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true
      // anchorPoint: new google.maps.Point(0, -29)
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();
    autocomplete.addListener('place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        window.alert("Autocomplete's returned place contains no geometry");
        return;
      }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);

      });
    // this function will work on marker move event into map
    google.maps.event.addListener(marker, 'dragend', function() {
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    });
  }
  function bindDataToForm(address,lat,lng){
   document.getElementById('location').value = address;
   document.getElementById('lat').value = lat;
   document.getElementById('lng').value = lng;
 }
 google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script type="text/javascript">
  $form_container = $('#form-lkn');

  $form_container.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) {
      return currentIndex > newIndex ? true : $form_container.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex) {
            // reinit gmaps
            google.maps.event.trigger(map, 'resize');
          },
          onFinishing: function (event, currentIndex) {
            return $form_container.valid();
          },
          onFinished: function (event, currentIndex) {
            // $form_container.submit();
             //step1
            var location = $('#location').val();
            var collateral_type = $('#collateral_type').find("option:selected").text();
            var city = $('.cities').find("option:selected").text();
            var subdistrict = $('#sub_district').val();
            var rt = $('#rt').val();
            var rw = $('#rw').val();
            var zip_code = $('#zip_code').val();
            var distance = $('#distance').val();
            var unit_type = $('.unit_type').find("option:selected").text();
            var distance_from = $('.distance_from').find("option:selected").text();
            var position_from_road = $('.position_from_road').find("option:selected").text();
            var ground_type = $('.ground_type').find("option:selected").text();
            var distance_of_position = $('#distance_of_position').val();
            var north_limit = $('#north_limit').val();
            var east_limit = $('#east_limit').val();
            var south_limit = $('#south_limit').val();
            var west_limit = $('#west_limit').val();
            var another_information = $('#another_information').val();
            var ground_level = $('.ground_level').find("option:selected").text();
            var surface_area = $('#surface_area').val();
             //step2
            var letter_type = $('.letter_type').find("option:selected").text();
            var letter_authorization = $('.letter_authorization').find("option:selected").text();
            var letter_match_bpn = $('.letter_match_bpn').find("option:selected").text();
            var letter_match_area = $('.letter_match_area').find("option:selected").text();
            var letter_match_limit_in_area = $('.letter_match_limit_in_area').find("option:selected").text();
            var surface_area_by_letter = $('#surface_area_by_letter').val();
            var letter_date = $('#letter_date').val();
            var letter_on_behalf_on = $('#letter_on_behalf_on').val();
            var letter_duration = $('#letter_duration').val();
            var letter_bpn_name = $('#letter_bpn_name').val();
            var letter_number = $('#letter_number').val();

             //step3
            var building_permit_number = $('#building_permit_number').val();
            var building_permit_date = $('#building_permit_date').val();
            var building_on_behalf_of = $('#building_on_behalf_of').val();
            var building_type = $('.building_type').find("option:selected").text();
            var building_count = $('#building_count').val();
            var building_spacious = $('#building_spacious').val();
            var building_year = $('#building_year').val();
            var building_description = $('#building_description').val();
            var building_north_limit = $('#building_north_limit').val();
            var building_north_limit_from = $('#building_north_limit_from').val();
            var building_east_limit = $('#building_east_limit').val();
            var building_east_limit_from = $('#building_east_limit_from').val();
            var building_south_limit = $('#building_south_limit').val();
            var building_south_limit_from = $('#building_south_limit_from').val();
            var building_west_limit = $('#building_west_limit').val();
            var building_west_limit_from = $('#building_west_limit_from').val();

             //step4
            var designated_land = $('.designated_land').find("option:selected").text();
            var designated = $('#designated').val();
            var other_designated = $('#other_designated').val();
            var transportation = $('#transportation').val();
            var nearest_location = $('.nearest_location').find("option:selected").text();
            var other_guide = $('#other_guide').val();
            var distance_from_transportation = $('#distance_from_transportation').val();

            //step5
            var scoring_land_date = $('#scoring_land_date').val();
            var npw_land = $('#npw_land').val();
            var nl_land = $('#nl_land').val();
            var pnpw_land = $('#pnpw_land').val();
            var pnl_land = $('#pnl_land').val();
            var scoring_building_date = $('#scoring_building_date').val();
            var npw_building = $('#npw_building').val();
            var nl_building = $('#nl_building').val();
            var pnpw_building = $('#pnpw_building').val();
            var pnl_building = $('#pnl_building').val();
            var scoring_all_date = $('#scoring_all_date').val();
            var npw_all = $('#npw_all').val();
            var nl_all = $('#nl_all').val();
            var pnpw_all = $('#pnpw_all').val();
            var pnl_all = $('#pnl_all').val();

            //step6
            var bond_type = $('.bond_type').find("option:selected").text();
            var use_of_building_function = $('.use_of_building_function').find("option:selected").text();
            var optimal_building_use = $('.optimal_building_use').find("option:selected").text();
            var building_exchange = $('.building_exchange').find("option:selected").text();
            var things_bank_must_know = $('#things_bank_must_know').val();

            //step1
            $('#detail-collateral-modal').modal('show');
            $("#detail-collateral-modal #location").html(location);
            $("#detail-collateral-modal #collateral_type").html(collateral_type);
            $("#detail-collateral-modal #district").html(city);
            $("#detail-collateral-modal #subdistrict").html(subdistrict);
            $("#detail-collateral-modal #rt").html(rt+'/'+rw); 
            $("#detail-collateral-modal #zip_code").html(zip_code); 
            $("#detail-collateral-modal #distance").html(distance+' '+unit_type+' dari '+distance_from);
            $("#detail-collateral-modal #position_from_road").html(position_from_road);   
            $("#detail-collateral-modal #ground_type").html(ground_type);    
            $("#detail-collateral-modal #distance_of_position").html(distance_of_position+' meter');
            $("#detail-collateral-modal #north_limit").html(north_limit); 
            $("#detail-collateral-modal #south_limit").html(south_limit); 
            $("#detail-collateral-modal #east_limit").html(east_limit);        
            $("#detail-collateral-modal #west_limit").html(west_limit); 
            $("#detail-collateral-modal #another_information").html(another_information); 
            $("#detail-collateral-modal #ground_level").html(ground_level); 
            $("#detail-collateral-modal #surface_area").html(surface_area); 

            //step2
            $("#detail-collateral-modal #letter_type").html(letter_type); 
            $("#detail-collateral-modal #letter_authorization").html(letter_authorization); 
            $("#detail-collateral-modal #letter_match_bpn").html(letter_match_bpn);        
            $("#detail-collateral-modal #letter_match_area").html(letter_match_area); 
            $("#detail-collateral-modal #letter_match_limit_in_area").html(letter_match_limit_in_area); 
            $("#detail-collateral-modal #surface_area_by_letter").html(surface_area_by_letter); 
            $("#detail-collateral-modal #letter_date").html(letter_date); 
            $("#detail-collateral-modal #letter_on_behalf_on").html(letter_on_behalf_on);        
            $("#detail-collateral-modal #letter_duration").html(letter_duration); 
            $("#detail-collateral-modal #letter_bpn_name").html(letter_bpn_name); 
            $("#detail-collateral-modal #letter_number").html(letter_number); 

            //step3
            $("#detail-collateral-modal #building_permit_number").html(building_permit_number); 
            $("#detail-collateral-modal #building_permit_date").html(building_permit_date); 
            $("#detail-collateral-modal #building_on_behalf_of").html(building_on_behalf_of);        
            $("#detail-collateral-modal #building_type").html(building_type); 
            $("#detail-collateral-modal #building_count").html(building_count+' buah'); 
            $("#detail-collateral-modal #building_spacious").html(building_spacious+' meter'); 
            $("#detail-collateral-modal #building_year").html(building_year); 
            $("#detail-collateral-modal #building_description").html(building_description);        
            $("#detail-collateral-modal #building_north_limit").html(building_north_limit+' dari '+building_north_limit_from); 
            $("#detail-collateral-modal #building_north_limit_from").html(building_north_limit_from); 
            $("#detail-collateral-modal #building_east_limit").html(building_east_limit+' dari '+building_east_limit_from); 
            $("#detail-collateral-modal #building_east_limit_from").html(building_east_limit_from); 
            $("#detail-collateral-modal #building_south_limit").html(building_south_limit+' dari '+building_south_limit_from); 
            $("#detail-collateral-modal #building_south_limit_from").html(building_south_limit_from);        
            $("#detail-collateral-modal #building_west_limit").html(building_west_limit+' dari '+building_west_limit_from); 
            $("#detail-collateral-modal #building_west_limit_from").html(building_west_limit_from);

            //step4
            $("#detail-collateral-modal #designated_land").html(designated_land); 
            $("#detail-collateral-modal #designated").html(designated); 
            $("#detail-collateral-modal #other_designated").html(other_designated);        
            $("#detail-collateral-modal #transportation").html(transportation); 
            $("#detail-collateral-modal #nearest_location").html(nearest_location); 
            $("#detail-collateral-modal #other_guide").html(other_guide); 
            $("#detail-collateral-modal #distance_from_transportation").html(distance_from_transportation); 
            //step5
            $("#detail-collateral-modal #scoring_land_date").html(scoring_land_date); 
            $("#detail-collateral-modal #npw_land").html('Rp'+npw_land); 
            $("#detail-collateral-modal #nl_land").html('Rp'+nl_land);        
            $("#detail-collateral-modal #pnpw_land").html('Rp'+pnpw_land); 
            $("#detail-collateral-modal #pnl_land").html('Rp'+pnl_land); 
            $("#detail-collateral-modal #scoring_building_date").html(scoring_building_date); 
            $("#detail-collateral-modal #npw_building").html('Rp'+npw_building); 
            $("#detail-collateral-modal #nl_building").html('Rp'+nl_building); 
            $("#detail-collateral-modal #pnpw_building").html('Rp'+pnpw_building);        
            $("#detail-collateral-modal #pnl_building").html('Rp'+pnl_building); 
            $("#detail-collateral-modal #scoring_all_date").html(scoring_all_date); 
            $("#detail-collateral-modal #npw_all").html('Rp'+npw_all);
            $("#detail-collateral-modal #nl_all").html('Rp'+nl_all); 
            $("#detail-collateral-modal #pnpw_all").html('Rp'+pnpw_all); 
            $("#detail-collateral-modal #pnl_all").html('Rp'+pnl_all);

             //step6
            $("#detail-collateral-modal #bond_type").html(bond_type); 
            $("#detail-collateral-modal #use_of_building_function").html(use_of_building_function);
            $("#detail-collateral-modal #optimal_building_use").html(optimal_building_use); 
            $("#detail-collateral-modal #building_exchange").html(building_exchange); 
            $("#detail-collateral-modal #things_bank_must_know").html(things_bank_must_know);
          }
        });

  $('.select2').select2({width: '100%'});

  //calculate npw
    $('#npw_land')
        .on('input', function() {
          var val1 = parseInt($('#npw_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#npw_all');
          counting(this, val1, all);
        })
        .on('change', function() {
          var val1 = parseInt($('#npw_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#npw_all');
          counting(this, val1, all);
        })
        .on('blur', function() {
          var val1 = parseInt($('#npw_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#npw_all');
          counting(this, val1, all);
        });

    $('#npw_building')
      .on('input', function() {
        var val1 = parseInt($('#npw_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#npw_all');
        counting(this, val1, all);
      })
      .on('change', function() {
        var val1 = parseInt($('#npw_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#npw_all');
        counting(this, val1, all);
      })
      .on('blur', function() {
        var val1 = parseInt($('#npw_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#npw_all');
        counting(this, val1, all);
      });

    //calculate pnpw
    $('#pnpw_land')
        .on('input', function() {
          var val1 = parseInt($('#pnpw_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#pnpw_all');
          counting(this, val1, all);
        })
        .on('change', function() {
          var val1 = parseInt($('#pnpw_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#pnpw_all');
          counting(this, val1, all);
        })
        .on('blur', function() {
          var val1 = parseInt($('#pnpw_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#pnpw_all');
          counting(this, val1, all);
        });

    $('#pnpw_building')
      .on('input', function() {
        var val1 = parseInt($('#pnpw_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#pnpw_all');
        counting(this, val1, all);
      })
      .on('change', function() {
        var val1 = parseInt($('#pnpw_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#pnpw_all');
        counting(this, val1, all);
      })
      .on('blur', function() {
        var val1 = parseInt($('#pnpw_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#pnpw_all');
        counting(this, val1, all);
      });

      //calculate nl
    $('#nl_land')
        .on('input', function() {
          var val1 = parseInt($('#nl_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#nl_all');
          counting(this, val1, all);
        })
        .on('change', function() {
          var val1 = parseInt($('#nl_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#nl_all');
          counting(this, val1, all);
        })
        .on('blur', function() {
          var val1 = parseInt($('#nl_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#nl_all');
          counting(this, val1, all);
        });

    $('#nl_building')
      .on('input', function() {
        var val1 = parseInt($('#nl_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#nl_all');
        counting(this, val1, all);
      })
      .on('change', function() {
        var val1 = parseInt($('#nl_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#nl_all');
        counting(this, val1, all);
      })
      .on('blur', function() {
        var val1 = parseInt($('#nl_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#nl_all');
        counting(this, val1, all);
      });

      //calculate pnl
    $('#pnl_land')
        .on('input', function() {
          var val1 = parseInt($('#pnl_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#pnl_all');
          counting(this, val1, all);
        })
        .on('change', function() {
          var val1 = parseInt($('#pnl_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#pnl_all');
          counting(this, val1, all);
        })
        .on('blur', function() {
          var val1 = parseInt($('#pnl_building').val().replace(',00', '').replace(/\./g, ''));
          var all = $('#pnl_all');
          counting(this, val1, all);
        });

    $('#pnl_building')
      .on('input', function() {
        var val1 = parseInt($('#pnl_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#pnl_all');
        counting(this, val1, all);
      })
      .on('change', function() {
        var val1 = parseInt($('#pnl_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#pnl_all');
        counting(this, val1, all);
      })
      .on('blur', function() {
        var val1 = parseInt($('#pnl_land').val().replace(',00', '').replace(/\./g, ''));
        var all = $('#pnpw_all');
        counting(this, val1, all);
      });

    function counting(element, val1, all) {
      var val = parseInt($(element).val().replace(',00', '').replace(/\./g, ''));      
      npw_all = (val1) + (val);
      if(isNaN(parseInt(npw_all))){
        all.val(val);
      }else{
        all.val(npw_all);
      }
    }

    $('.collateral_type').on('change', function () {
      var id = $(this).val();
      var text = $(this).find("option:selected").text();
      $('#area_collateral_type').val(text);
    })
</script>