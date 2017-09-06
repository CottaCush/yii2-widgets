var Dropdown = (function ($) {
    return {
        init: function(formEl, className, url) {
            $(formEl).on('change', 'select' + className, function () {
                var $element = $(this);
                var $classEl = $(className);
                $classEl.slice($classEl.index($element) + 1).remove();
                $element.addClass('loading');

                $.post(url, {'parent_id': $element.val()}, function (response) {
                    $element.removeClass('loading');
                    $element.parent().next('.subs').append(response.data);
                });
            });
        }
    };


})(jQuery);
