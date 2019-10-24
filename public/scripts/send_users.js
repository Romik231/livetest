$(document).ready(function () {

    //Редактирование таблицы
    $(".column").click(function (e) {
        var t = e.target;
        var elm_name = t.tagName;
        if(elm_name == 'input'){
            return false;
        }
        var val = $(this).html();
        var code = '<input type="text" id="edit" value="'+val+'" />';

        console.log(code);
        $(this).empty().append(code);
        $('#edit').focus();
        $('#edit').blur(function()	{	//устанавливаем обработчик
            var val = $(this).val();
            // console.log(val);
            $(this).parent().empty().html(val);
        });
    });

    $('.city-column').click(function () {
        var select = "<select><option value=></option></select>";
        $(this).empty().append(select);
    });

    $('#form_user').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {

                console.log(response);
            }
        });
    });


        // $('')

});

//При нажатии на Enter убираем фокус
$(window).keydown(function(event){
    //ловим событие нажатия клавиши
    if(event.keyCode == 13) {	//если это Enter
        $('#edit').blur();	//снимаем фокус с поля ввода
    }
});


