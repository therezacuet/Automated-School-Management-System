

$(document).ready(function () {
    $('#calendar').eCalendar({

 weekDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        textArrows: {previous: '<', next: '>'},
        eventTitle: 'Events',
        url: '',
        events: [
            {title: '', description: 'Description 1', datetime: new Date(2016, 7, 15, 17)},
            {title: 'Event 2', description: 'Description 2', datetime: new Date(2016, 7, 14, 16)},
            {title: 'Event 3', description: 'jQueryScript.Net', datetime: new Date(2016, 8, 10, 16)},
            {title: 'Event 3', description: 'I am here', datetime: new Date(2016, 2, 10, 16)},
        ]});
});
