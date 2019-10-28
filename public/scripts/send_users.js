$(document).ready(function () {

    $('#form_user').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: 'html',
            data: $('#form_user').serialize(),
            success: function () {
                // alert('Данные сохранены');
                // console.log(data);
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



