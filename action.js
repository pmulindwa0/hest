$('a.ajax').on('click', function () {

    var that = $(this),
        id = that.attr('id'),
        url = that.attr('href');

    $.ajax({
        url: url,
        success: function (response) {
            that.hide();
            console.log(response);
            switch (id) {
                case ("activate"):
                    $('#dialog').dialog();
                    break;

                case ("up_country"):
                    that.hide();
                    break;


            }
            // alert("Action successfully done....")
        }
    });

    return false;
});