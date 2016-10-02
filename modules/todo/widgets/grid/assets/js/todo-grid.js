$(document).on('keypress', '.newTask', function (event) {
    var input = $(this);
    if (event.which == 13 && input.val()) {
        $.post($(this).data('url'), {title: $(this).val()}, function (parent) {
            input.val('');
            $.pjax.reload({container: '#todo-grid-' + parent});
        });
        event.preventDefault();
    }
});

$(document).on('click', '.deleteTask', function (event) {
    $.post($(this).attr('href'), function (parent) {
        $.pjax.reload({container: '#todo-grid-' + parent});
    });
    event.preventDefault();
});

$(document).on('keypress', 'input[type=text].updateTask', function (event) {
    if (event.which == 13 && $(this).val()) {
        $.post($(this).data('url'), {name: $(this).attr('name'), value: $(this).val()});
        event.preventDefault();
    }
});

$(document).on('change', 'input[type=checkbox].updateTask', function (event) {
    $.post($(this).data('url'), {name: $(this).attr('name'), value: this.checked ? 1 : 0}, function (parent) {
        if (parent)
            $.pjax.reload({container: '#todo-grid-' + parent});
    });
    event.preventDefault();
});
