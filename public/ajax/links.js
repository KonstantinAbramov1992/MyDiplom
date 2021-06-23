jQuery( document ).ready(function() {
    $('#make-short-link').click(function () {
        let link = $('#link').val();
        let shortLink = $('#short-link').val();

        $.ajax({
            url: '/home/',
            type: 'POST',
            cache : false,
            data: {
                'link' : link,
                'shortLink' : shortLink
            },
            dataType: 'html',
            success : function (data) {
                if (data == "ok") {
                    document.location.reload();
                } else {
                    $('#fail-short-link').text(data);
                    $('#fail-short-link').css("display", "block");
                }
            }
        });
    });

    $('#delete-link').click(function () {
        let id = $('#link-id').val();

        $.ajax({
            url: '/home/',
            type: 'POST',
            cache : false,
            data: {
                'id' : id,
            },
            dataType: 'html',
            success : function (data) {
                if (data == "ok")
                    document.location.reload();
            }
        });
    });
});