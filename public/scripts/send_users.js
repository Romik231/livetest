$(document).ready(function () {
    $('#btn-send').click(function () {
       sendAjaxForm('form_add', '../models/Users.php');

    });
});

function sendAjaxForm(form_add, url) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'hmtl',
        data:$('#'+form_add).serialize(),
        success: function (response) {
            $('#result-form'.html('данные отпралены'));
        }
    });
}