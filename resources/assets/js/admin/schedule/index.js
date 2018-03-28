import ScheduleService from './../services/schedule'
import toastr from 'toastr'
loader(true)
$(document).ready(() => {
    getSchedule()
})

/**
 * get schedules
 */
function getSchedule() {
    ScheduleService.all()
        .then(response => {
            var events = [{
                title: 'Jadwal 1',
                start: new Date($.now() + 158000000),
                className: 'bg-primary'
            }]
            $.CalendarApp.init(events)
            loader(false)
        })
        .catch(errors => {
            toastr.error(errors)
        })
}

function storeSchedule() {
}

function loader(show) {
    if (show) {
        HoldOn.open(options)
    } else {
        HoldOn.close()
    }
}