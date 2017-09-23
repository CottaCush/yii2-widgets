var Dropdown = (function ($) {

    return {
        init: function (formEl) {
            $(formEl).on('change', 'select.dep-drop',  function () {
                var $element = $(this);
                $element.parent().next('.subs').remove();
                $element.addClass('dependent-dropdown-loading');

                $.post($element.data('url'), {'parent_id': $element.val()}, function(response) {
                    $element.removeClass('dependent-dropdown-loading');

                    $element.parent().after('<div class="subs"></div>');
                    $element.parent().next('.subs').append(response.data);
                });
            });
        }

    };

})(jQuery);
