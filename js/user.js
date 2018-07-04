$('#email').keyup(function () {
    var email = $(this).val();

    /*$('#email_status').text('Seaching...');
     */
    if (email != '') {
        $.post('email_check.php', {email: email}, function (data) {
            $('#email_status').text(data);
        });
    } else {
        $('#email_status').text('');
    }
});