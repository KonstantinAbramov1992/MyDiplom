jQuery( document ).ready(function() {
    $('#reg').click(function () {
        let email = $('#reg-email').val();
        let pass = $('#reg-pass').val();
        let login = $('#reg-login').val();

        $.ajax({
            url: '/user/reg',
            type: 'POST',
            cache : false,
            data: {
                'email' : email,
                'pass' : pass,
                'login' : login
            },
            dataType: 'html',
            success : function (data) {
                if (data == "ok") {
                    window.location.href = "/user/dashboard"
                } else {
                    $('#fail-reg').text(data);
                    $('#fail-reg').css("display", "block");
                }
            }
        });
    });
});