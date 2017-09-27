$(function() {
    $(document).on('change', 'select[data-dependent-dropdown]', function() {

        var $element = $(this);
        $element.next('.dependent-dropdown-child').remove();
        $element.addClass('dependent-dropdown-loading');

        $.post($element.data('url'), {'parent_id': $element.val()}, function(response) {
            $element.removeClass('dependent-dropdown-loading');
            $element.after('<div class="dependent-dropdown-child"></div>');
            $element.next('.dependent-dropdown-child').append(response.data);
        });
    });

});
