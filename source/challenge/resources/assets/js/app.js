$(document).on('click', '#newData', function(){
    $.post('refresh', function() {
        window.location.replace('/');
    });
});