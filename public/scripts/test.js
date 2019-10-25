var contentold = {};   //объявляем переменную для хранения неизменного текста

function savedata(elementidsave, contentsave, elementclass) {
    //функция для сохранения отредактированного текста с помощью ajax
    $.ajax({
        url: '/models/edit_td.php',    //url который обрабатывает и сохраняет наш текст
        type: 'POST',
        data: {
            content: contentsave,     //наш пост запрос
            id: elementidsave,
            class: elementclass,
        },
        success: function (data) {//получили ответ от сервера - обрабатываем

            if (data == contentsave) {//сервер прислал нам отредактированный текст, значит всё ok


                alert('Данные успешно сохранены: ' + data);

            }
        },
        error:function(data){
            alert("error occured");
        }
    });
}

$(document).ready(function () {
    $('[contenteditable="true"]')     //редактируемый элемент
        .mousedown(function (e)    //обрабатываем событие нажатие мышки
        {
            e.stopPropagation();
            elementid = this.id;
            elementclass = this.class;
            contentold[elementid] = $(this).html();  //текст до редактирования
            $(this).bind('keydown', function (e) {    //обработчик нажатия Escape
                if (e.keyCode == 27) {
                    e.preventDefault();
                    $(this).html(contentold[elementid]);
                    //возвращаем текст до редактирования
                }
            });

        })
        .blur(function (event)      //обрабатываем событие потери фокуса
        {
            var elementidsave = this.id;             //id элемента потерявшего фокус
            var contentsave = $(this).html();
            var elementclass = this.class;//текст для сохранения
            event.stopImmediatePropagation();
            if (elementid === elementidsave){
                if (contentsave != contentold[elementidsave])  //если текст изменился
                {
                    savedata(elementidsave, contentsave, elementclass);   //отправляем на сервер
                }
                // если id совпадает с id элемента, потерявшего фокус,


            }
            // значит фокус  в редактируемом элементе, кнопку не прячем

        });
});