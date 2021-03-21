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

/*---------- Fonction empêchant l'envoie du formulaire ----------*/

function send(){
    if(document.getElementById('brand').value == "" || document.getElementById('username').value == "" || document.getElementById('status').value == "default") {
        document.getElementById('registComputer').setAttribute("disabled", "")
    }
    else {
        document.getElementById('registComputer').removeAttribute("disabled")
    }
}

function usersend(){
    if(document.getElementById('mail').value == "" || document.getElementById('name').value == "" || document.getElementById('firstname').value == "") {
        document.getElementById('registUser').setAttribute("disabled", "")
    }
    else {
        document.getElementById('registUser').removeAttribute("disabled")
    }
}

function attribute(){
    if(document.getElementById('date').value == "" || document.getElementById('timeslotstart').value == "" || document.getElementById('timeslotend').value == "" || document.getElementById('user').value == "default" || document.getElementById('computer').value == "default") {
        document.getElementById('registAttribution').setAttribute("disabled", "")
    }
    else {
        document.getElementById('registAttribution').removeAttribute("disabled")
    }
}