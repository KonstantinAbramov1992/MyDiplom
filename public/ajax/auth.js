jQuery( document ).ready(function() {
    $('#auth').click(function () {
        let email = $('#auth-email').val();
        let pass = $('#auth-pass').val();

        $.ajax({
            url: '/user/auth',
            type: 'POST',
            cache : false,
            data: {
                'email' : email,
                'pass' : pass
            },
            dataType: 'html',
            success : function (data) {
                if (data == "ok") {
                    window.location.href = "/user/dashboard"
                } else {
                    $('#fail-auth').text(data);
                    $('#fail-auth').css("display", "block");
                }
            }
        });
    });
});