$(document).ready(function () {
    $('.city-column').click(function () {
        var select = "<select><option value=>Город не выбран</option></select>";
        $(this).empty().append(select);
    });

    $('#form_user').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: 'html',
            data: $('#form_user').serialize(),
            success: function (data) {
                // console.log(data);
                // result = $.parseJSON(data);
            }
        });
    });


    $(window).keydown(function (event) {
        //ловим событие нажатия клавиши
        if (event.keyCode == 13) {	//если это Enter
            $('#edit').blur();	//снимаем фокус с поля ввода
        }
    });
});

//При нажатии на Enter убираем фокус



