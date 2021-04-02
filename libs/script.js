$(document).ready(function () {
    let year = $("#date_birth").val();
    let button = $("#btn_birth");

    button.on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '../ajax/user.php',
            data: {date_birth: $("#date_birth").val()},
            success: function (data) {
                $("tbody").html(data);
                $(".count_user > strong").html($("tbody").find('tr').length);
            }
        });

    });

});