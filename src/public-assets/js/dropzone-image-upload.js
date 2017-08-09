var DropzoneImageUpload = (function ($, Notification, dropzoneOptions) {
    var params = {
        dropzoneTarget: $('#dropzone_media'),
        urlInput: $('#' + dropzoneOptions.urlInputId),
        removeImageLink: $('#remove_image_link'),
        events: ['click']
    };

    Dropzone.autoDiscover = false;

    var
        mediaUrl = params.urlInput,
        removeEditMediaLink = params.removeImageLink,
        removeEditMediaLinkParent = removeEditMediaLink.parent(),
        dropzoneTarget = params.dropzoneTarget,
        dropzoneMessageElement = dropzoneTarget.find('.dz-message');

    if (mediaUrl.val()) {
        removeEditMediaLinkParent.removeClass('hide');
        removeEditMediaLink.on(params.events.click, function (event) {
            event.preventDefault();
            mediaUrl.val('');
            activate();
        });
    }
    else {
        activate();
    }

    function activate() {
        removeEditMediaLinkParent.addClass('hide');
        dropzoneTarget.removeClass('hide');

        var options = $.extend({
            thumbnailWidth: null,
            thumbnailHeight: null,
            init: function () {
                this.on('addedfile', function (file) {
                    if (this.files.length > this.options.maxFiles) {
                        this.removeFile(file);
                    }
                    else {
                        dropzoneMessageElement.addClass('hide');
                    }
                });

                this.on('removedfile', function () {
                    if (this.files.length < this.options.maxFiles) {
                        dropzoneMessageElement.removeClass('hide');
                        mediaUrl.val('');
                    }
                });

                this.on('success', function (file, response) {
                    mediaUrl.val(response.data['url'])
                });

                this.on('error', function (file, errorMessage, xhr) {
                    if ('undefined' === typeof xhr) {
                        this.removeFile(file);
                    }

                    if (errorMessage.hasOwnProperty('message')) {
                        errorMessage = errorMessage.message;
                    }

                    Notification.error(errorMessage);
                });

                this.on('sending', function (file, xhr, formData) {
                    formData.append('_csrf', yii.getCsrfToken());
                });
            }
        }, dropzoneOptions);

        dropzoneTarget.dropzone(options);
    }

})(jQuery, Notification, window.dropzoneOptions || {});