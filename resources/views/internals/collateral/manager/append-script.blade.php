<script>
    $(document).on('click', "#view-detail", function(){
        var dev_id = $('#dev_id').val();
        var prop_id = $('#prop_id').val();

        $.ajax({
            dataType: 'json',
            type: 'GET',
            url: '/collateral/detailCollateral',
            data: { dev_id : dev_id, prop_id : prop_id },
            success: function(result, data) {  
            console.log(result); 

            //step1
                var location = result.data.ots_in_area.location;
                var collateral_type = result.data.ots_in_area.collateral_type;
                var district = result.data.ots_in_area.district;
                var sub_district = result.data.ots_in_area.sub_district;
                var rt = result.data.ots_in_area.rt;
                var rw = result.data.ots_in_area.rw;
                var zip_code = result.data.ots_in_area.zip_code;
                var distance = Math.floor(result.data.ots_in_area.distance);
                var unit_type = (result.data.ots_in_area.unit_type == 2 ? 'Meter' : 'Kilometer');
                var distance_from = result.data.ots_in_area.distance_from;
                var position_from_road = result.data.ots_in_area.position_from_road;
                var ground_type = result.data.ots_in_area.ground_type;
                var distance_of_position = Math.floor(result.data.ots_in_area.distance_of_position);
                var north_limit = result.data.ots_in_area.north_limit;
                var east_limit = result.data.ots_in_area.east_limit;
                var north_limit = result.data.ots_in_area.north_limit;
                var south_limit = result.data.ots_in_area.south_limit;
                var west_limit = result.data.ots_in_area.west_limit;
                var another_information = result.data.ots_in_area.another_information;
                var ground_level = result.data.ots_in_area.ground_level;
                var surface_area = Math.floor(result.data.ots_in_area.surface_area);

            //step2 
                var letter_type = result.data.ots_letter.type;
                var authorization_land = result.data.ots_letter.authorization_land;
                var match_bpn = result.data.ots_letter.match_bpn;
                var match_area = result.data.ots_letter.match_area;
                var match_limit_in_area = result.data.ots_letter.match_limit_in_area;
                var letter_match_limit_in_area = result.data.ots_letter.match_limit_in_area;
                var surface_area_by_letter = Math.floor(result.data.ots_letter.surface_area_by_letter);
                var letter_number = result.data.ots_letter.number;
                var letter_date = result.data.ots_letter.date;
                var letter_on_behalf_of = result.data.ots_letter.on_behalf_of;
                var letter_duration = result.data.ots_letter.duration_land_authorization;
                var letter_bpn_name = result.data.ots_letter.bpn_name;

            //step3
                var building_permit_number = result.data.ots_building.permit_number;
                var building_permit_date = result.data.ots_building.permit_date;
                var building_on_behalf_of = result.data.ots_building.on_behalf_of;
                    if(result.data.ots_building.type == 0){
                        var building_type = 'Rumah Tapak';
                    }else if(result.data.ots_building.type == 1){
                        var building_type = 'Rumah Susun/Apartment';
                    }else{
                        var building_type = 'Rumah Toko';
                    };
                var building_count = result.data.ots_building.count;
                var building_spacious = result.data.ots_building.spacious;
                var building_year = result.data.ots_building.year;
                var building_description = result.data.ots_building.description;
                var building_north_limit = Math.floor(result.data.ots_building.north_limit);
                var building_north_limit_from = result.data.ots_building.north_limit_from;
                var building_east_limit = Math.floor(result.data.ots_building.east_limit);
                var building_east_limit_from = result.data.ots_building.east_limit_from;
                var building_south_limit = Math.floor(result.data.ots_building.south_limit);
                var building_south_limit_from = result.data.ots_building.south_limit_from;
                var building_west_limit = Math.floor(result.data.ots_building.west_limit);
                var building_west_limit_from = result.data.ots_building.west_limit_from;

            //step4
                var designated_land = result.data.ots_environment.designated_land;
                var designated_pln = (result.data.ots_environment.designated_pln == 1 ? 'PLN,' : '');
                var designated_pam = (result.data.ots_environment.designated_pam == 1 ? 'PAM' : '');
                var designated_phone = (result.data.ots_environment.designated_phone == 1 ? 'Telepon Umum,' : '');
                var designated_telex = (result.data.ots_environment.designated_telex == 1 ? 'Telex,' : '');
                var other_designated = result.data.ots_environment.other_designated;
                var transportation = result.data.ots_environment.transportation;
                var nearest_location = result.data.ots_environment.nearest_location;
                var other_guide = result.data.ots_environment.other_guide;
                var distance_from_transportation = Math.floor(result.data.ots_environment.distance_from_transportation);

            //step5
                var bond_type = result.data.ots_other.bond_type;
                var use_of_building_function = result.data.ots_other.use_of_building_function;
                var optimal_building_use = result.data.ots_other.optimal_building_use;
                var building_exchange = result.data.ots_other.building_exchange;
                var things_bank_must_know = result.data.ots_other.things_bank_must_know;
                var image_condition_area = result.data.ots_other.image_condition_area;

            //step1
                $('#detail-collateral-modal').modal('show');
                $("#detail-collateral-modal #location").html(location);
                $("#detail-collateral-modal #collateral_type").html(collateral_type);
                $("#detail-collateral-modal #district").html(district);
                $("#detail-collateral-modal #sub_district").html(sub_district);
                $("#detail-collateral-modal #rt").html(rt+'/'+rw);
                $("#detail-collateral-modal #zip_code").html(zip_code);
                $("#detail-collateral-modal #distance").html(distance+' '+unit_type+' dari '+distance_from);
                $("#detail-collateral-modal #position_from_road").html(position_from_road);
                $("#detail-collateral-modal #ground_type").html(ground_type);
                $("#detail-collateral-modal #distance_of_position").html(distance_of_position+' Meter');
                $("#detail-collateral-modal #north_limit").html(north_limit);
                $("#detail-collateral-modal #east_limit").html(east_limit);
                $("#detail-collateral-modal #south_limit").html(south_limit);
                $("#detail-collateral-modal #west_limit").html(west_limit);
                $("#detail-collateral-modal #another_information").html(another_information);
                $("#detail-collateral-modal #ground_level").html(ground_level);
                $("#detail-collateral-modal #surface_area").html(surface_area+' M<sup>2</sup>');

            //step2
                $("#detail-collateral-modal #letter_type").html(letter_type);
                $("#detail-collateral-modal #letter_authorization").html(authorization_land);
                $("#detail-collateral-modal #letter_match_bpn").html(match_bpn);
                $("#detail-collateral-modal #letter_match_area").html(match_area);
                $("#detail-collateral-modal #letter_match_limit_in_area").html(letter_match_limit_in_area);
                $("#detail-collateral-modal #surface_area_by_letter").html(surface_area_by_letter+' M<sup>2</sup>');
                $("#detail-collateral-modal #letter_number").html(letter_number);
                $("#detail-collateral-modal #letter_date").html(letter_date);
                $("#detail-collateral-modal #letter_on_behalf_of").html(letter_on_behalf_of);
                $("#detail-collateral-modal #letter_duration").html(letter_duration);
                $("#detail-collateral-modal #letter_bpn_name").html(letter_bpn_name);

            //step3
                $("#detail-collateral-modal #building_permit_number").html(building_permit_number);
                $("#detail-collateral-modal #building_permit_date").html(building_permit_date);
                $("#detail-collateral-modal #building_on_behalf_of").html(match_bpn);
                $("#detail-collateral-modal #building_type").html(building_type);
                $("#detail-collateral-modal #building_count").html(building_count+' buah');
                $("#detail-collateral-modal #building_spacious").html(building_spacious+' M<sup>2</sup>');
                $("#detail-collateral-modal #building_year").html(building_year);
                $("#detail-collateral-modal #building_description").html(building_description);
                $("#detail-collateral-modal #building_north_limit").html(building_north_limit+' Meter dari '+building_north_limit_from);
                $("#detail-collateral-modal #building_east_limit").html(building_east_limit+' Meter dari '+building_east_limit_from);
                $("#detail-collateral-modal #building_south_limit").html(building_south_limit+' Meter dari '+building_south_limit_from);
                $("#detail-collateral-modal #building_west_limit").html(building_west_limit+' Meter dari '+building_west_limit_from);

            //step4
                $("#detail-collateral-modal #designated_land").html(designated_land);
                $("#detail-collateral-modal #designated").html(designated_phone+' '+designated_pln+' '+designated_telex+' '+designated_pam);
                $("#detail-collateral-modal #other_designated").html(other_designated);
                $("#detail-collateral-modal #transportation").html(transportation);
                $("#detail-collateral-modal #nearest_location").html(nearest_location);
                $("#detail-collateral-modal #other_guide").html(other_guide);
                $("#detail-collateral-modal #distance_from_transportation").html(distance_from_transportation+' Meter');

             //step5
                $("#detail-collateral-modal #bond_type").html(bond_type);
                $("#detail-collateral-modal #use_of_building_function").html(use_of_building_function);
                $("#detail-collateral-modal #optimal_building_use").html(optimal_building_use);
                $("#detail-collateral-modal #building_exchange").html(building_exchange);
                $("#detail-collateral-modal #things_bank_must_know").html(things_bank_must_know);
                $("#detail-collateral-modal #image_condition_area").html('<img src='+image_condition_area+' class="img-responsive">');

            }
        });
    })
</script>