$(document).ready(function () {
    $("#btn-send").click(function () {
        $.ajax({
            type: 'POST',
            url: 'http://livetest/public/index.php?c=page&act=users',
            dataType: 'html',
            data: $('#form_user'),
            success: function (response) {



                console.log(response);
        }
        });


        // $.post(
        //     'http://livetest/public/index.php?c=page&act=users',
        //     $("#form_add").serialize(),
        //
        //     function (msg) {
        //         $("#result_form").html(msg);
        //         // console.log(msg);
        //     }
        // );
        // alert('форма успешно отправлена');
        // return false;
    });
});




//     $('#btn-send').click(
//         function () {
//             sendAjaxForm('#form_add', );
//                 return false;
//     });
// });
//
// function sendAjaxForm(form_add) {
//     $.ajax({
//         url: 'http://livetest/public/index.php?c=page&act=users',
//         type: 'POST',
//         dataType: 'hmtl',
//         success: function (response) {
//             result = $.parseJSON(response)
//             $('#result-form').html('имя'+result.name);
//         },
//         error: function (response) {
//             $('#result-form').html('Ошибка');
//
//         }
//     });
// }