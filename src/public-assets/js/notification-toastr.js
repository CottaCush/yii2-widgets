/**
 * Notifications component
 * This component should:
 *  - provide an API to show different types of Toastr notifications; and
 *  - show flash notifications on page load.
 *
 * The flash notifications is configured as an array of objects where each object is a notification.
 * A notification object looks like:
 * {
 *     type: '',    {string} valid toastr notification types: 'success', 'error', 'info', or 'warning'
 *     message: '', {string} the notification message
 *     title: '',   {string} (optional) the notification title
 *     timeout: ''  {number} (optional) toastr timeout duration (in ms)
 * }
 */
;var Notification = (function ($, toastr, flashNotifications) {
    /* Toastr option overrides */
    var OVERRIDES = {
        closeButton: true,
        newestOnTop: true,
        preventDuplicates: true,
        timeout: 10000
    };

    /* Extend toastr.options with our defined overrides here */
    $.extend(toastr.options, OVERRIDES);

    showFlashNotifications();

    return {
        add: add,
        success: function (message, title, options) {
            add('success', message, title, options);
        },
        error: function (message, title, options) {
            add('error', message, title, options);
        },
        info: function (message, title, options) {
            add('info', message, title, options);
        },
        warning: function (message, title, options) {
            add('warning', message, title, options);
        }
    };


    /**
     * Show flash notifications on page load.
     */
    function showFlashNotifications() {
        var i = 0, l = flashNotifications.length;

        for (i; i < l; i++) {
            var item = flashNotifications[i];
            var type = item.type, message = item.message || '', title = item.title || '', timeout = item.timeout,
                options = {};

            /* Add timeout to the options object if it exists */
            if ('undefined' !== typeof timeout) {
                options.timeout = timeout;
            }

            add(type, message, title, options);
        }
    }

    /**
     * Add a new notification to Toastr
     * @param {string} type valid types for toastr: 'success', 'error', 'info', or 'warning'.
     * @param {string} message the notification message.
     * @param {string} title optional notification title
     * @param {object} options further options to pass into toastr
     */
    function add(type, message, title, options) {
        /* Call the toastr function if it exists */
        if ('function' === typeof toastr[type]) {
            toastr[type](message, title, options);
        }
    }
})(jQuery, toastr, window.notifications || []);

