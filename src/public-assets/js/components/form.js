App.extend({
    Components: {}
});

App.Components.Form = (function ($) {

    var pub = {
        name: 'app.Components.Form',
        events: ['change'],

        assignFormValue: function (element, value) {
            var isJqueryObj = element instanceof jQuery;
            if (!isJqueryObj) {
                element = $(element);
            }

            if (element.is(':checkbox')) {
                var shouldCheck = value == element.val() || indexOf(element.val(), value) > -1;
                var alreadyCheck = element.is(':checked');

                if (( shouldCheck && !alreadyCheck ) || ( !shouldCheck && alreadyCheck )) {
                    element.trigger('click');
                }
                element.attr('checked', shouldCheck);
            } else {
                if (element.is('select')) {
                    element.attr('data-selected', value);
                }
                element.val(value);
                element.trigger('change');
            }
        },

        init: function () {

        }
    };

    /**
     * Return index an element in array using loose comparison
     * @param needle
     * @param haystack
     * @returns {number}
     */
    function indexOf(needle, haystack) {
        if (haystack == null)
            return -1;

        var size = haystack.length;
        var current = 0;
        for (; current < size && haystack[current] != needle; current++) {
        }
        return (current == size) ? -1 : current;
    }

    return pub;
})(jQuery);

App.initModule(App.Components.Form);
