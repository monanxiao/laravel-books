require('./bootstrap');

$('.collapsed').click(function (event) {
    var list = $(event.currentTarget).attr('aria-expanded');
    if (list == 'true') {
        $(event.currentTarget).removeClass('bi-caret-down')
        $(event.currentTarget).addClass('bi-caret-right')
    }else{
        $(event.currentTarget).removeClass('bi-caret-right')
        $(event.currentTarget).addClass('bi-caret-down')
    }
})

