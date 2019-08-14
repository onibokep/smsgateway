$(window).on('unload', function () {
    $.ajax({
        type : 'POST',
        url : 'logout.php'
    });
});