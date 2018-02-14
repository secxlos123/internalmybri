jQuery(document).ready(function () {
    // Date Picker
    jQuery('#datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        format: "dd-MM-yyyy",
        clearBtn: true,
        autoclose: true,
        todayHighlight: true
    });
    jQuery('.datepicker-autoclose').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#datepicker-year').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years",
        clearBtn: true,
        autoclose: true
    });
    jQuery('#datepicker-inline').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        multidate: false,
        multidateSeparator: ","
    });
    jQuery('.datepicker-inline').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        multidateSeparator: ",",
        todayHighlight: true
    });
    jQuery('#datepicker-multiple-date').datepicker({
        format: "mm/dd/yyyy",
        clearBtn: true,
        multidate: true,
        multidateSeparator: ","
    });
    jQuery('#datepicker-mindate').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        multidate: false,
        startDate: new Date(),
        multidateSeparator: ","
    });
    jQuery('.datepicker-maxdate').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        multidate: false,
        endDate: new Date(),
        multidateSeparator: ","
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
});