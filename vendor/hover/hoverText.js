$('.hover').mousemove(function (e) {
    var description = $(this).attr('hovertext');

    $('#hoverdiv').text(description).show();
    $('#hoverdiv').css('top', e.clientY + 10).css('left', e.clientX + 10);
}).mouseout(function () {
    $('#hoverdiv').hide();
});