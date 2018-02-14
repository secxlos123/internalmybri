<script>
    $(document).on('click', "#view-detail", function(){
        var dev_id = $('#dev_id').val();
        var prop_id = $('#prop_id').val();

        $.ajax({
            dataType: 'json',
            type: 'GET',
            url: '{{route("detailCollateral")}}',
            data: { dev_id : dev_id, prop_id : prop_id },
            success: function(result, data) {
            console.log(result);

                // step1
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

                // step2
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

                // step3
                var building_permit_number = result.data.ots_building.permit_number;
                var building_permit_date = result.data.ots_building.permit_date;
                var building_on_behalf_of = result.data.ots_building.on_behalf_of;
                    if(result.data.ots_building.type == 4){
                        var building_type = 'Properti Komersial';
                    }else{
                        var building_type = 'Tanah Dan Rumah Tinggal';
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

                // step4
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

                // step5
                var nl_all = result.data.ots_valuation.nl_all;
                var nl_building = result.data.ots_valuation.nl_building;
                var nl_land = result.data.ots_valuation.nl_land;
                var npw_all = result.data.ots_valuation.npw_all;
                var npw_building = result.data.ots_valuation.npw_building;
                var npw_land = result.data.ots_valuation.npw_land;
                var pnl_all = result.data.ots_valuation.pnl_all;
                var pnl_building = result.data.ots_valuation.pnl_building;
                var pnl_land = result.data.ots_valuation.pnl_land;
                var pnpw_all = result.data.ots_valuation.pnpw_all;
                var pnpw_building = result.data.ots_valuation.pnpw_building;
                var pnpw_land = result.data.ots_valuation.pnpw_land;
                var scoring_all_date = result.data.ots_valuation.scoring_all_date;
                var scoring_building_date = result.data.ots_valuation.scoring_building_date;
                var scoring_land_date = result.data.ots_valuation.scoring_land_date;

                // step6
                var bond_type = result.data.ots_other.bond_type;
                var use_of_building_function = result.data.ots_other.use_of_building_function;
                var optimal_building_use = result.data.ots_other.optimal_building_use;
                var building_exchange = result.data.ots_other.building_exchange;
                var things_bank_must_know = result.data.ots_other.things_bank_must_know;
                var image_condition_area = result.data.ots_other.images;

                // step7
                var collateral_status = result.data.ots_seven.collateral_status;
                var on_behalf_of = result.data.ots_seven.on_behalf_of;
                var ownership_number = result.data.ots_seven.ownership_number;
                var seven_location = result.data.ots_seven.city.name;
                var address_collateral = result.data.ots_seven.address_collateral;
                var description = result.data.ots_seven.description;
                var ownership_status = result.data.ots_seven.ownership_status;
                var date_evidence = result.data.ots_seven.date_evidence;
                var village = result.data.ots_seven.village;
                var districts = result.data.ots_seven.districts;

                // step8
                var liquidation_realization = result.data.ots_eight.liquidation_realization;
                var fair_market = result.data.ots_eight.fair_market;
                var liquidation = result.data.ots_eight.liquidation;
                var fair_market_projection = result.data.ots_eight.fair_market_projection;
                var liquidation_projection = result.data.ots_eight.liquidation_projection;
                var njop = result.data.ots_eight.njop;
                var appraisal_by = result.data.ots_eight.appraisal_by;
                var independent_appraiser = result.data.ots_eight.independent_appraiser_name;
                var date_assessment = result.data.ots_eight.date_assessment;
                var type_binding = result.data.ots_eight.type_binding_name;
                var binding_number = result.data.ots_eight.binding_number;
                var binding_value = result.data.ots_eight.binding_value;

                // step9
                var certificate_status = result.data.ots_nine.certificate_status;
                var receipt_date = result.data.ots_nine.receipt_date;
                var information = result.data.ots_nine.information;
                var notary_status = result.data.ots_nine.notary_status;
                var takeover_status = result.data.ots_nine.takeover_status;
                var credit_status = result.data.ots_nine.credit_status;
                var skmht_status = result.data.ots_nine.skmht_status;
                var imb_status = result.data.ots_nine.imb_status;
                var shgb_status = result.data.ots_nine.shgb_status;
                var receipt_date_notary = result.data.ots_nine.receipt_date_notary;
                var information_notary = result.data.ots_nine.information_notary;
                var receipt_date_takeover = result.data.ots_nine.receipt_date_takeover;
                var information_takeover = result.data.ots_nine.information_takeover;
                var receipt_date_credit = result.data.ots_nine.receipt_date_credit;
                var information_credit = result.data.ots_nine.information_credit;
                var receipt_date_skmht = result.data.ots_nine.receipt_date_skmht;
                var information_skmht = result.data.ots_nine.information_skmht;
                var receipt_date_imb = result.data.ots_nine.receipt_date_imb;
                var information_imb = result.data.ots_nine.information_imb;
                var receipt_date_shgb = result.data.ots_nine.receipt_date_shgb;
                var information_shgb = result.data.ots_nine.information_shgb;

                // step10
                var paripasu = result.data.ots_ten.paripasu;
                var paripasu_bank = result.data.ots_ten.paripasu_bank;
                var insurance = result.data.ots_ten.insurance;
                var insurance_company = result.data.ots_ten.insurance_company_name;
                var insurance_value = result.data.ots_ten.insurance_value;
                var eligibility = result.data.ots_ten.eligibility;

                // step1
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

                // step2
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

                // step3
                $("#detail-collateral-modal #building_permit_number").html(building_permit_number);
                $("#detail-collateral-modal #building_permit_date").html(building_permit_date);
                $("#detail-collateral-modal #building_on_behalf_of").html(building_on_behalf_of);
                $("#detail-collateral-modal #building_type").html(building_type);
                $("#detail-collateral-modal #building_count").html(building_count+' buah');
                $("#detail-collateral-modal #building_spacious").html(building_spacious+' M<sup>2</sup>');
                $("#detail-collateral-modal #building_year").html(building_year);
                $("#detail-collateral-modal #building_description").html(building_description);
                $("#detail-collateral-modal #building_north_limit").html(building_north_limit+' Meter dari '+building_north_limit_from);
                $("#detail-collateral-modal #building_east_limit").html(building_east_limit+' Meter dari '+building_east_limit_from);
                $("#detail-collateral-modal #building_south_limit").html(building_south_limit+' Meter dari '+building_south_limit_from);
                $("#detail-collateral-modal #building_west_limit").html(building_west_limit+' Meter dari '+building_west_limit_from);

                // step4
                $("#detail-collateral-modal #designated_land").html(designated_land);
                $("#detail-collateral-modal #designated").html(designated_phone+' '+designated_pln+' '+designated_telex+' '+designated_pam);
                $("#detail-collateral-modal #other_designated").html(other_designated);
                $("#detail-collateral-modal #transportation").html(transportation);
                $("#detail-collateral-modal #nearest_location").html(nearest_location);
                $("#detail-collateral-modal #other_guide").html(other_guide);
                $("#detail-collateral-modal #distance_from_transportation").html(distance_from_transportation+' Meter');

                // step5
                $("#detail-collateral-modal #nl_all").html(nl_all);
                $("#detail-collateral-modal #nl_building").html(nl_building);
                $("#detail-collateral-modal #nl_land").html(nl_land);
                $("#detail-collateral-modal #npw_all").html(npw_all);
                $("#detail-collateral-modal #npw_building").html(npw_building);
                $("#detail-collateral-modal #npw_land").html(npw_land);
                $("#detail-collateral-modal #pnl_all").html(pnl_all);
                $("#detail-collateral-modal #pnl_building").html(pnl_building);
                $("#detail-collateral-modal #pnl_land").html(pnl_land);
                $("#detail-collateral-modal #pnpw_all").html(pnpw_all);
                $("#detail-collateral-modal #pnpw_building").html(pnpw_building);
                $("#detail-collateral-modal #pnpw_land").html(pnpw_land);
                $("#detail-collateral-modal #scoring_all_date").html(scoring_all_date);
                $("#detail-collateral-modal #scoring_building_date").html(scoring_building_date);
                $("#detail-collateral-modal #scoring_land_date").html(scoring_land_date);

                // step6
                $("#detail-collateral-modal #bond_type").html(bond_type);
                $("#detail-collateral-modal #use_of_building_function").html(use_of_building_function);
                $("#detail-collateral-modal #optimal_building_use").html(optimal_building_use);
                $("#detail-collateral-modal #building_exchange").html(building_exchange);
                $("#detail-collateral-modal #things_bank_must_know").html(things_bank_must_know);
                $.each(result.data.ots_other.images, function( index, value ) {
                $("#detail-collateral-modal .image_condition_area").append('<div class="card-box"><img src='+value.image_data+' class="img-responsive"><br></div>');
                });

                // step7
                $("#detail-collateral-modal #collateral_status").html(collateral_status);
                $("#detail-collateral-modal #on_behalf_of").html(on_behalf_of);
                $("#detail-collateral-modal #ownership_number").html(ownership_number);
                $("#detail-collateral-modal #seven_location").html(seven_location);
                $("#detail-collateral-modal #address_collateral").html(address_collateral);
                $("#detail-collateral-modal #description").html(description);
                $("#detail-collateral-modal #ownership_status").html(ownership_status);
                $("#detail-collateral-modal #date_evidence").html(date_evidence);
                $("#detail-collateral-modal #village").html(village);
                $("#detail-collateral-modal #districts").html(districts);

                // step8
                $("#detail-collateral-modal #liquidation_realization").html(liquidation_realization);
                $("#detail-collateral-modal #fair_market").html(fair_market);
                $("#detail-collateral-modal #liquidation").html(liquidation);
                $("#detail-collateral-modal #fair_market_projection").html(fair_market_projection);
                $("#detail-collateral-modal #liquidation_projection").html(liquidation_projection);
                $("#detail-collateral-modal #njop").html(njop);
                $("#detail-collateral-modal #appraisal_by").html(appraisal_by);
                if(appraisal_by != "Bank"){
                  $("#detail-collateral-modal #independent_appraiser").html(independent_appraiser);
                }else{
                  $("#detail-collateral-modal .independent_appraiser").hide();
                }
                $("#detail-collateral-modal #date_assessment").html(date_assessment);
                $("#detail-collateral-modal #type_binding").html(type_binding);
                $("#detail-collateral-modal #binding_number").html(binding_number);
                $("#detail-collateral-modal #binding_value").html(binding_value);

                // step9
                $("#detail-collateral-modal #certificate_status").html(certificate_status);
                $("#detail-collateral-modal #receipt_date").html(receipt_date);
                if ( certificate_status == "Belum Diberikan" ) {
                    $("#detail-collateral-modal #receipt_date").hide();
                } else {
                    $("#detail-collateral-modal #receipt_date").show();
                }
                $("#detail-collateral-modal #information").html(information);

                $("#detail-collateral-modal #notary_status").html(notary_status);
                $("#detail-collateral-modal #receipt_date_notary").html(receipt_date_notary);
                if ( notary_status == "Belum Diberikan" ) {
                    $("#detail-collateral-modal #receipt_date_notary").hide();
                } else {
                    $("#detail-collateral-modal #receipt_date_notary").show();
                }
                $("#detail-collateral-modal #information_notary").html(information_notary);

                $("#detail-collateral-modal #takeover_status").html(takeover_status);
                $("#detail-collateral-modal #receipt_date_takeover").html(receipt_date_takeover);
                if ( takeover_status == "Belum Diberikan" ) {
                    $("#detail-collateral-modal #receipt_date_takeover").hide();
                } else {
                    $("#detail-collateral-modal #receipt_date_takeover").show();
                }
                $("#detail-collateral-modal #information_takeover").html(information_takeover);

                $("#detail-collateral-modal #credit_status").html(credit_status);
                $("#detail-collateral-modal #receipt_date_credit").html(receipt_date_credit);
                if ( credit_status == "Belum Diberikan" ) {
                    $("#detail-collateral-modal #receipt_date_credit").hide();
                } else {
                    $("#detail-collateral-modal #receipt_date_credit").show();
                }
                $("#detail-collateral-modal #information_credit").html(information_credit);

                $("#detail-collateral-modal #skmht_status").html(skmht_status);
                $("#detail-collateral-modal #receipt_date_skmht").html(receipt_date_skmht);
                if ( skmht_status == "Belum Diberikan" ) {
                    $("#detail-collateral-modal #receipt_date_skmht").hide();
                } else {
                    $("#detail-collateral-modal #receipt_date_skmht").show();
                }
                $("#detail-collateral-modal #information_skmht").html(information_skmht);

                $("#detail-collateral-modal #imb_status").html(imb_status);
                $("#detail-collateral-modal #receipt_date_imb").html(receipt_date_imb);
                if ( imb_status == "Belum Diberikan" ) {
                    $("#detail-collateral-modal #receipt_date_imb").hide();
                } else {
                    $("#detail-collateral-modal #receipt_date_imb").show();
                }
                $("#detail-collateral-modal #information_imb").html(information_imb);

                $("#detail-collateral-modal #shgb_status").html(shgb_status);
                $("#detail-collateral-modal #receipt_date_shgb").html(receipt_date_shgb);
                if ( shgb_status == "Belum Diberikan" ) {
                    $("#detail-collateral-modal #receipt_date_shgb").hide();
                } else {
                    $("#detail-collateral-modal #receipt_date_shgb").show();
                }
                $("#detail-collateral-modal #information_shgb").html(information_shgb);

                // step10
                $("#detail-collateral-modal #paripasu").html(paripasu);
                $("#detail-collateral-modal #paripasu_bank").html(paripasu_bank);
                if ( paripasu == "Tidak" ) {
                    $("#detail-collateral-modal #paripasu_bank").hide();
                } else {
                    $("#detail-collateral-modal #paripasu_bank").show();
                }

                $("#detail-collateral-modal #insurance").html(insurance);
                $("#detail-collateral-modal #insurance_company").html(insurance_company);
                $("#detail-collateral-modal #insurance_value").html(insurance_value);
                if ( insurance == "Tidak" ) {
                    $("#detail-collateral-modal #insurance_company").hide();
                    $("#detail-collateral-modal #insurance_value").hide();
                } else {
                    $("#detail-collateral-modal #insurance_company").show();
                    $("#detail-collateral-modal #insurance_value").show();
                }

                $("#detail-collateral-modal #eligibility").html(eligibility);

                $('.currency-rp').inputmask({ alias : "rupiah" });
            }
        });
    })
</script>