$('form.ajax').on('submit', function () {

    var that = $(this),
        method = that.attr('method'),
        url = that.attr('action'),
        file = that.getElementById('pic'),
        data = file.file;

    $.ajax({
        url: url,
        type: method,
        data: date,
        success: function (response) {
            console.log(response);
        }
    });

    return false;
});