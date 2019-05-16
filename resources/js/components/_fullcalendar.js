import { Calendar } from '@fullcalendar/core';
import timeGridPlugin from '@fullcalendar/timegrid';

document.addEventListener('DOMContentLoaded', function() {
    window.FullCalendar = Calendar;
    window.timeGridPlugin = timeGridPlugin;
});
