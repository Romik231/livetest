$(document).ready(function () {

    $('[contenteditable="true"]')
        .mousedown(function (e) {
            var res = $('.city-column').empty();
            res.append('<td><select class="list"></select></td>>');

        $.ajax({
            type: 'get',
            url:'/models/droplist.php',
            cache: false,
            dataType: 'json',
            success: function (data) {
                $.each(data, function (k,v) {

                    // $('.list').append('<option id="'+v.id+'" value="'+v.name+'">Город не выбран</option>');
                    // city = v.name;
                    // $('#listcity').append('<option value="city"></option>>');
                });
                // var select = "<select class='listcity'><option value=>Город не выбран</option></select>";

                // $(this).val('v.name');

               // result = JSON.parse(data);
               //  console.log(result);
                // $.each(data, function (i,e) {
                //     console.log(e);
                // });
            },
            error: function (request) {
                alert(request.status);
            }
        // });
    //     $.get('/models/droplist.php',
    //         function (data) {
    //             console.log(data);
    //         // $.each(data, function (i,e) {
    //         //
    //         // });
    //         //
    //         // });

        });
    });

});