$(document).on('click', '#newData', function(){
    $.post('refresh', function() {
        window.location.replace('/');
    });
});
//# sourceMappingURL=app.js.map
