var Dropdown = (function ($) {
    var pub = {
        name: 'Dropdown',
        init: function (formEl, className, url) {
            alert('yex');
            $(formEl).on('change', 'select'+ className,  function () {
                var $element = $(this);
                var $classEl = $(className);
                $classEl.slice ( $classEl.index( $element ) + 1).remove();
                $element.addClass('loading');

                $.post(url, {'parent_id': $element.val()}, function(response) {
                    $element.removeClass('loading');
                    $element.parent().next('.subs').append(response.data);
                });
            });
        }
    };
    return pub;

})(jQuery);
