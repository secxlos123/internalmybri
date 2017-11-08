<script type="text/javascript">
    $(document).ready(function() {
        $('#btnSave').on('click', function(e) {
            $("#form1").submit();
        });

        $('#btn-save').on('click', function(e) {
            var name = $('#name').val();
            $('#save').modal('show');
            $("#save #name").html(name);
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
    });
</script>