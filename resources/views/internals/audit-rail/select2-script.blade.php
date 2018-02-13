<script type="text/javascript">
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });

        $('.action_pengajuan_kredit').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/action-detail/pengajuan_kredit',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                     //   aoId: $('#fake-aoid').val(),
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.pengajuan_kredit.data,
                        pagination: {
                            more: (params.page * data.pengajuan_kredit.per_page) < data.pengajuan_kredit.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.action_admindev').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/action-detail/admindev',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                     //   aoId: $('#fake-aoid').val(),
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.admindev.data,
                        pagination: {
                            more: (params.page * data.admindev.per_page) < data.admindev.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.action_appointment').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/action-detail/appointment',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                     //   aoId: $('#fake-aoid').val(),
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.appointment.data,
                        pagination: {
                            more: (params.page * data.appointment.per_page) < data.appointment.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.action_agendev').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/action-detail/agendev',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                     //   aoId: $('#fake-aoid').val(),
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.agendev.data,
                        pagination: {
                            more: (params.page * data.agendev.per_page) < data.agendev.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.action_property').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/action-detail/property',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                     //   aoId: $('#fake-aoid').val(),
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.property.data,
                        pagination: {
                            more: (params.page * data.property.per_page) < data.property.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.action_document').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/action-detail/document',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                     //   aoId: $('#fake-aoid').val(),
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.document.data,
                        pagination: {
                            more: (params.page * data.document.per_page) < data.document.total
                        }
                    };
                },
                cache: true
            },
        });
        // $('.name').on('select2:select', function(){
        //     $('#fake-aoid').val($(this).val());
        // });
    });
</script>