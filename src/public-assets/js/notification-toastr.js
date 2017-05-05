(function (w, $, toastr) {
    /* Default properties and their values for notification items */
    var ITEM_DEFAULTS = {
            type: 'success',
            message: '',
            title: ''
        },
        /* Toastr option default overrides */
        TOASTR_DEFAULTS = {
            closeButton: true,
            newestOnTop: true,
            preventDuplicates: true,
            timeout: 10000
        };

    /* Extend toastr.options with our defined defaults here */
    $.extend(toastr.options, TOASTR_DEFAULTS);


    var items = w.notifications || [],
        i = 0, l = items.length;

    for (i; i < l; i++) {
        var item = $.extend({}, ITEM_DEFAULTS, items[i]);
        addNotification(item);
    }

    /**
     * Add a new notification to Toastr
     * @param {object} item contains info for a new toastr notification.
     * A default  item object looks like this
     * {
     *     type: '', (valid types are: "success", "error", "info", or "warning")
     *     message: '', the notification message.
     *     title: '', (the notification title. Can be left empty.)
     *     timeout: '' (number, optional and is passed into the toastr function)
     * }
     */
    function addNotification(item) {
        var type = item.type,
            title = item.title,
            message = item.message,
            timeout = item.timeout,
            options = {};

        /* Add timeout to the options object if it exists */
        if ('undefined' !== typeof timeout) {
            options.timeout = timeout;
        }

        /* Call the toastr function if it exists */
        if ('function' === typeof toastr[type]) {
            toastr[type](message, title, options);
        }
    }
})(window, jQuery, toastr);
