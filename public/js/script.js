let today = new Date();
/*---------- Calendar -----------*/
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridWeek',
        selectable: true,
        locale: 'fr',
        events: events,
        eventClick: function(info) {
            alert(['Info : ' + info.event.title + "\n" +
                'Début : ' + info.event.start + "\n" +
                'Fin : ' + info.event.end
            ]);   
        },
    });
    calendar.render();
});