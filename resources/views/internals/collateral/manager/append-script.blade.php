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
                var letter_type = result.data.ots_letter.type;
                var authorization_land = result.data.ots_letter.authorization_land;
                var match_bpn = result.data.ots_letter.match_bpn;
                var match_area = result.data.ots_letter.match_area;
                var match_limit_in_area = result.data.ots_letter.match_limit_in_area;

                $('#detail-collateral-modal').modal('show');
                $("#detail-collateral-modal #letter_type").html(letter_type);
                $("#detail-collateral-modal #letter_authorization").html(authorization_land);
                $("#detail-collateral-modal #letter_match_bpn").html(match_bpn);
                $("#detail-collateral-modal #letter_match_area").html(match_area);

            }
        });
    })
</script>