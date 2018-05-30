<script type="text/javascript">
!function($) {
    "use strict";
    var CalendarApp = function() {
        this.$body = $("body")
        this.$modal = $('#event-modal'),
        this.$event = ('#external-events div.external-event'),
        this.$calendar = $('#calendar-activity'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$categoryForm = $('#add-category form'),
        this.$extEvents = $('#external-events'),
        this.$calendarObj = null
    };

    var ajaxConfig = {
        dropdownParent: $('#event-modal'),
        placeholder: "Search Pemasar",
        ajax: {
            url: '/activity/pemasar',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            processResults: function (data, params) {
              console.log(data);
                var select2Data = $.map(data, function (obj) {
                    return {
                        id: obj.PERNR,
                        text: '<span>' + obj.SNAME + '</span>' + '<span class="none">' + obj.PERNR + '</span><span class="none">' + obj.PERNR + '</span>'
                    }
                });
                // select2Data = select2Data.filter(function(data) {
                //     return data.text.indexOf(params.term) !== -1
                // });
                return {
                    results: select2Data
                };
            },
            escapeMarkup: function(markup) {
                return markup;
            },
        },
        escapeMarkup: function(markup) {
            return markup;
        },
    }

    var ajaxConfigMarketing = {
        dropdownParent: $('#event-modal'),
        placeholder: "Search Marketing",
        ajax: {
            url: '/activity/marketing',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            processResults: function (data, params) {
              console.log(data);
                var select2Data = $.map(data, function (obj) {
                    return {
                        id: obj.id,
                        text: '<span>' + obj.nama + ", " + obj.activity_type + ', ' + obj.product_type + ' [' + obj.status + '] [Rp. ' + obj.target + ']' + '</span>' + '<span class="none">' + obj.name + '</span><span class="none">' + obj.id + '</span>'
                    }
                });
                // select2Data = select2Data.filter(function(data) {
                //     return data.text.indexOf(params.term) !== -1
                // });
                return {
                    results: select2Data
                };
            },
            escapeMarkup: function(markup) {
                return markup;
            },
        },
        escapeMarkup: function(markup) {
            return markup;
        },
    }

    /* on drop */
    CalendarApp.prototype.onDrop = function (eventObj, date) {
        var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
    },
    CalendarApp.prototype.buildForm = function (calEvent, disabled) {
      var $this = this;
        $this.$modal.modal({
            backdrop: 'static'
        });
        var form = $("<form></form>");
        form.append("<div class='row'></div>");
        form.find(".row")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Waktu Mulai</label><input class='form-control appointment_date'  type='text' name='date' /></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Waktu Berakhir</label><input class='form-control appointment_date'  type='text' name='date' /></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>No. Referensi</label><select class='form-control select2' " + disabled + " name='eform-id'></select></div></div>")
            .find("select[name='eform-id']");
        form.find(".select2").append("<option value='" + calEvent.eform_id + "' selected='selected'>" + calEvent.ref_number +"</option>");
        form.find(".select2").trigger('change');
        form.find(".select2").select2(ajaxConfig);
        form.find(".row")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Title</label><input class='form-control' type='text' name='title' /></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Guest</label><input class='form-control' type='text' name='guest' readonly='' value='John Doe' /></div></div>")
        form.find(".row")
            .append("<div class='col-md-12'><div class='form-group'><label class='control-label'>Deskripsi</label><textarea name='description' class='form-control' rows='3'></textarea></div></div>")
        $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').find('.form').empty().prepend(form);
        $this.$modal.find('.save-event').unbind('click').click(function () {
            form.submit();
        });
        return form;
    },
    CalendarApp.prototype.valid = function (data) {
      return data !== '' && data !== null && data !== undefined && data.length > 0;
    },
    /* Edit Event */
    CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {
        var $this = this;
        $this.$modal.modal({
            backdrop: 'static'
        });
        var form = $this.buildForm(calEvent, 'disabled');
        form.find("input[name='title']").val(calEvent.origin_title);
        form.find("input[name='guest']").val(calEvent.guest_name || '');
        form.find("textarea[name='description']").html(calEvent.desc);
        $("#event-modal input, #event-modal textarea").prop('disabled', ( userRole == 'ao' || userRole == 'fo' ? false : true ));
        initializeDatePicker($('.appointment_date'), calEvent.start.format('YYYY-MM-DD'));
        initializeMapPosition(calEvent);
        $this.$modal.find(".save-event").html("Update Jadwal").attr('type', 'submit');
        $this.$modal.find('form').on('submit', function () {
          var title = form.find("input[name='title']").val();
          var beginning = form.find("input[name='beginning']").val();
          var ending = form.find("input[name='ending']").val();
          var categoryClass = form.find("select[name='category'] option:checked").val();
          var eForm = form.find('select[name="eform-id"]');
          var desc = form.find('textarea[name="description"]').val();
          var eFormTexts = eForm.find('option:selected').text().split('</span>').map(function(text) {
            return text.replace('<span>', '').replace('<span class="none">', '');
          });

          var updateEvent = {
              id: calEvent.id,
              title: eForm.find('option:selected').text(),
              origin_title: title,
              start: moment($('.appointment_date').val()),
              // end: end,
              allDay: false,
              eform_id: eForm.val(),
              desc: desc,
              ref_number: calEvent.ref_number || undefined,
              guest_id: calEvent.guest_id || undefined,
              guest_name: calEvent.guest_name || undefined,
              address: calEvent.address,
              latitude: calEvent.latitude,
              longitude: calEvent.longitude,
              className: 'bg-primary'
          }
          if (!$this.valid(updateEvent.origin_title)) {
            form.find("input[name='title']").parent().parent().addClass('has-error');
          } else {
            var schedule = new Schedule();
            schedule.update(updateEvent, true)
              .then(function(event) {
                toastr.success('Schedule Has Been Updated');
                calEvent.origin_title = title;
                calEvent.start = moment($('.appointment_date').val());
                calEvent.latitude = event.latitude;
                calEvent.longitude = event.longitude;
                calEvent.address = event.address;
                calEvent.desc = event.desc;
                $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                // $this.$calendarObj.fullCalendar('refetchEvents');
                $this.$modal.modal('hide');
              })
              .catch(function(reason) {
                toastr.error('Fail For Update Schedule');
              });
          }
          return false;

        });
        // $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
        //     $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
        //         return (ev._id == calEvent._id);
        //     });
        //     $this.$modal.modal('hide');
        // });
        // $this.$modal.find('form').on('submit', function () {
        //     calEvent.title = form.find("input[type=text]").val();
        //     $this.$calendarObj.fullCalendar('updateEvent', calEvent);
        //     $this.$modal.modal('hide');
        //     return false;
        // });
    },
    /* Create New */
    CalendarApp.prototype.onSelect = function (start, end, allDay) {
      if ( userRole == 'ao' || userRole == 'fo' ) {
        $("#event-modal input, #event-modal textarea").prop('disabled', false);
        var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });
            var form = $("<form></form>");
            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Waktu Mulai</label><input class='form-control appointment_date'  type='text' name='startdate' /></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Waktu Berakhir</label><input class='form-control appointment_date'  type='text' name='enddate' /></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Tujuan Aktivitas</label><select class='form-control select2 tujuan' name='tujuan'></select></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Tenaga Pemasar Pendamping</label><select class='form-control select2 pemasar' name='pemasar'></select></div></div>")
                .append("<div class='col-md-12'><div class='form-group'><label class='control-label'>Rencana Marketing</label><select class='form-control select2 marketing' name='marketing'></select></div></div>")
                .find("select[name='eform-id']")
                .append("<option value=''>-- Pilih --</option>")
                .append("<option value=''>54321</option>")
                .append("<option value=''>31245</option>")
                .append("<option value=''>52341</option></div></div>");
            // form.find(".tujuan").select2(ajaxConfig);
            form.find(".pemasar").select2(ajaxConfig);
            form.find(".marketing").select2(ajaxConfigMarketing);
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Alamat</label><textarea class='form-control' type='text' name='alamat' ></textarea></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>PN</label><input class='form-control' type='text' name='guest' readonly='' value='' /></div></div>")
            form.find(".row")
                .append("<div class='col-md-12'><div class='form-group'><label class='control-label'>Deskripsi</label><textarea name='description' class='form-control' rows='3'></textarea></div></div>")
            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').find('.form').empty().prepend(form);
            $this.$modal.find('.save-event').unbind('click').click(function () {
                form.submit();
            });
            // console.log(start);
            initializeDatePicker($('.appointment_date'), start);
            form.find(".select2").on('change', function(event) {
              if ($(this).val() !== '' && $(this).val() !== null && $(this).val() !== undefined) {
                var eFormTexts = $(this).find('option:selected').text().split('</span>').map(function(text) {
                  return text.replace('<span>', '').replace('<span class="none">', '');
                });
                form.find("input[name=guest]").val(eFormTexts[1]);
              }
            });
            $this.$modal.find(".save-event").html("Simpan Jadwal");
            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='title']").val();
                var beginning = form.find("input[name='beginning']").val();
                var ending = form.find("input[name='ending']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                var eForm = form.find('select[name="eform-id"]');
                var desc = form.find('textarea[name="description"]').val();
                var eFormTexts = eForm.find('option:selected').text().split('</span>').map(function(text) {
                  return text.replace('<span>', '').replace('<span class="none">', '');
                });
                var newEvent = {
                    title: eFormTexts[0],
                    origin_title: title,
                    start: moment($('.appointment_date').val()),
                    end: end,
                    allDay: false,
                    eform_id: eForm.val(),
                    desc: desc,
                    ref_number: eFormTexts[0],
                    guest_id: eFormTexts[2],
                    guest_name: eFormTexts[1],
                    className: categoryClass
                }

                //
                //
                if (!$this.valid(newEvent.eform_id)) {
                  eForm.parent().parent().addClass('has-error');
                } else if (!$this.valid(newEvent.origin_title)) {
                  form.find("input[name='title']").parent().parent().addClass('has-error');
                } else if (!$this.valid(address.address)) {
                  toastr.error('Lokasi Kosong!');
                } else {
                  var schedule = new Schedule();
                  schedule.store(newEvent)
                    .then(function(event) {
                      $this.$modal.modal('hide');
                      $this.$calendarObj.fullCalendar('refetchEvents');
                      toastr.success('Schedule Telah Berhasil Di Buat');
                    })
                    .catch(function() {
                      toastr.error('Gagal Untuk Menambah Schedule');
                    });
                }
                return false;

            });
            $this.$calendarObj.fullCalendar('unselect');
      }
    },
    CalendarApp.prototype.enableDrag = function() {
        //init events
        $(this.$event).each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
    }

    CalendarApp.prototype.onEventDrop = function(calEvent, delta, revertFunc) {
      var event = calEvent;
      var schedule = new Schedule();
      var $this = this;
      toastr.options = {
          timeOut: 0,
          extendedTimeOut: 0,
          progressBar: true
      };
      toastr.info('<i class="fa fa-spinner fa-spin fa-fw"></i> Mengubah....');
      schedule.update(event)
        .then(function(response) {
          toastr.clear();
          toastr.options = {
              timeOut: 3000,
              extendedTimeOut: 3000
          };
          toastr.success('Schedule ' + calEvent.title + ' Telah Berhasil Di Ubah');
        })
        .catch(function(reason) {
          toastr.error('Schedule ' + calEvent.title + ' Gagal DiUbah');
        });
    }

    /* Initializing */
    CalendarApp.prototype.init = function() {
        this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());
        var $this = this;
        var _schedule = new Schedule();
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
            minTime: '08:00:00',
            maxTime: '19:00:00',
            defaultView: 'month',
            handleWindowResize: true,
            height: $(window).height() - 200,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            lang: 'id',
            eventSources: [{
              events: function (start, end, timezone, callback) {
                if ( parseInt(start.format('D')) > 1 ) {
                  start.add(7, 'days').format('YYYY-MM-DD');
                }
                // console.log(callback);
                $.ajax({
                  url: '/schedule/ao',
                  data: {
                    start: start.format('YYYY-MM-DD'),
                    end: start.add(1, 'months').format('YYYY-MM-DD')
                  },
                  type: 'GET',
                  beforeSend: function(xhr, settings) {
                    _schedule.loader(true);
                  },
                  error: function() {
                    toastr.error('Terjadi Kesalahan Ketika Mengambil Jadwal');
                    _schedule.loader(false);
                  },
                  success: function(response) {
                    console.log(response);
                    _schedule.loader(false);
                    callback(response)
                  }
                })
              }
            }],
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            drop: function(date) { $this.onDrop($(this), date); },
            select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); },
            eventDrop: function(calEvent, delta, revertFunc) { $this.onEventDrop(calEvent, delta, revertFunc); }
        }).on('click', '.fc-agendaWeek-button,.fc-agendaDay-button', function() {
            $this.$calendar.fullCalendar('refetchEvents');
        });
        // $this.$calendarObj.fullCalendar('refetchEvents', defaultEvents);

        //on new event
        this.$saveCategoryBtn.on('click', function(){
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="external-event bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>' + categoryName + '</div>')
                $this.enableDrag();
            }

        });
    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    // $.CalendarApp.init()
}(window.jQuery);

</script>
