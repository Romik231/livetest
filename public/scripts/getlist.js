$(document).ready(function () {
    $('.city-column').click(function () {
        $.ajax({
            url:'/models/droplist.php',
            dataType: 'text',
            success: function (data) {
                console.log(data);

            }
        });
    });

});