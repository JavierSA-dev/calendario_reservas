import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $('span[data-modal-target="staticModal"]').click(function (e) { 
        $('#day_month_year').val( $('.year').text() + '-' + $('#monthNumber').text() + '-' + $(this).children('span').text());         
    });

    $('#prevMonthButtom').click(function (e) {
        $('#prevMonth').submit();
    });

    $('#nextMonthButtom').click(function (e) {
        $('#nextMonth').submit();
    });

});