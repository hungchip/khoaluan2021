$(document).ready(function() {
    $("div.alert").delay(3000).slideUp();

    $('.t-datepicker').tDatePicker({
        autoClose: true,
        limitNextMonth: 2,
        iconDate: '<ion-icon name="calendar-outline"></ion-icon>',
        formatDate: 'yyyy-mm-dd',
    });


    $('#select_room_amount').on('change', function() {
        var amount = $(this).val();
        var roomItem = document.getElementsByClassName('room-item');
        for (let i = 0; i < roomItem.length; i++) {
            if (i < amount) {
                roomItem[i].style.display = 'block';
            } else {
                roomItem[i].style.display = 'none';
            }
        }
    });
    //chart

});