/*---------- Calendar -----------*/
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridWeek',
        selectable: true,
        locale: 'fr',
        /* dateClick: function(info) {
            alert('Date: ' + info.dateStr);
            alert('Resource ID: ' + info.resource.id);
        } */
        events: [{
            id: '1',
            title: 'Test',
            start: '2021-04-03T10:00:00',
            end: '2021-04-04T03:00:00',
        }]
    });
    calendar.render();
});