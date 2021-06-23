jQuery( document ).ready(function() {
    $('#send-message').click(function () {
        let login = $('#contact-login').val();
        let email = $('#contact-email').val();
        let age = $('#age').val();
        let message = $('#contact-message').val();

        $.ajax({
            url: '/contact/',
            type: 'POST',
            cache : false,
            data: {
                'login' : login,
                'email' : email,
                'age' : age,
                'message' : message
            },
            dataType: 'html',
            success : function (data) {
                if (data == "Сообщение отправлено!") {
                    $('#success-send-message').text(data);
                    $('#success-send-message').css("display", "block");
                } else {
                    $('#fail-send-message').text(data);
                    $('#fail-send-message').css("display", "block");
                }
            }
        });
    });
});