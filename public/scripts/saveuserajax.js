var contentold = {};   //объявляем переменную для хранения неизменного текста

function savedata(elementidsave, contentsave, elementclass) {//функция для сохранения отредактированного текста с помощью ajax
    $.ajax({
        url: '/models/edit_td.php',
        type: 'POST',
        data: {
            content: contentsave, //наш пост запрос
            id: elementidsave,
            class: elementclass,
        },
        success: function (data) {//получили ответ от сервера - обрабатываем

            if (data == contentsave) {//сервер прислал нам отредактированный текст, значит всё ok
                alert('Данные успешно сохранены: ' + data);
            }
        }
    });
}

$(document).ready(function () {
    $('[contenteditable="true"]')   //редактируемый элемент
        .mousedown(function (e) {   //обрабатываем событие нажатие мышки
            e.stopPropagation();
            elementid = this.id;
            elementclass = this.className;
            contentold[elementid] = $(this).html();  //текст до редактирования
            if(elementclass == 'city-column'){
                $(this).replaceWith('<select class="list"><option value=>Город</option></select>');
                $.ajax({
                    type: 'get',
                    url: '/models/droplist.php',
                    cache: false,
                    dataType: 'json',
                    success: function (data) {
                        $.each(data, function (k, v) {
                           $('.list').append('<option id="' + v.id + '" value="' + v.name + '">' + v.name + '</option>');
                        });
                    },
                });

            }
            $('.list').on('change', function () {//Здесь не понял как сохранить в базу
                // alert($('.list option:selected').text());
            });
            alert(newcity);
            $(this).bind('keydown', function (e) {    //обработчик нажатия Escape
                if (e.keyCode == 27) {
                    e.preventDefault();
                    $(this).html(contentold[elementid]);//возвращаем текст до редактирования
                }
            });

        }).blur(function (event) {//обрабатываем событие потери фокуса
        var elementidsave = this.id;//id элемента потерявшего фокус
        var contentsave = $(this).html();//текст для сохранени
        var elementclass = this.className;


        event.stopImmediatePropagation();
        if (elementid === elementidsave) {
            if (contentsave == '') {
                alert('Значение не может быть пустым');
                $(this).html(contentold[elementidsave]);
                return false;
            }
            if (contentsave != contentold[elementidsave]) {  //если текст изменился
                savedata(elementidsave, contentsave, elementclass);   //отправляем на сервер
            }
        }
    });
});