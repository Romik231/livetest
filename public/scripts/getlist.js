$(document).ready(function () {

    $('.city-column').mousedown(function (e) {
        e.preventDefault();
        $(this).empty().append('<select class="list"><option value=></option></select>');

        $.ajax({
            type: 'get',
            url: '/models/droplist.php',
            cache: false,
            dataType: 'json',
            success: function (data) {
                $.each(data, function (k, v) {
                    // console.log(v.name);

                    $('.list').append('<option id="' + v.id + '" value="' + v.name + '">' + v.name + '</option>');
                    // city = v.name;

                    // $('#listcity').append('<option value="city"></option>>');
                });
            },
        });
    }).blur(function () {
        alert('ФОкус потерян');
    });

});