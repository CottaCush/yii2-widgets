var DropzoneImageUpload = (function ($, Notification, dropzoneOptions) {
    var params = {
        dropzoneTarget: $('#dropzone_media'),
        urlInput: $('#' + dropzoneOptions.urlInputId),
        removeImageLink: $('#remove_image_link'),
        uploadInfoHolder: $('#dropzone_upload_info'),
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

        var defaultOptions = {
            thumbnailWidth: null,
            thumbnailHeight: null,

            onFileAdded: function () {
                if (this.files.length > this.options.maxFiles) {
                    this.removeFile(file);
                }
                else {
                    dropzoneMessageElement.addClass('hide');
                }
            },

            onFileRemoved: function () {
                if (this.files.length < this.options.maxFiles) {
                    dropzoneMessageElement.removeClass('hide');
                    mediaUrl.val('');
                }
            },

            onSuccess: function (file, response) {
                mediaUrl.val(response.data[dropzoneOptions.urlKey])
            },

            onError: function (file, errorMessage, xhr) {
                if ('undefined' === typeof xhr) {
                    this.removeFile(file);
                }

                if (errorMessage.hasOwnProperty(dropzoneOptions.errorMessageKey)) {
                    errorMessage = errorMessage.message;
                }

                Notification.error(errorMessage);

                $('#dropzone_upload_info').val("");
            },

            onSending: function (file, xhr, formData) {
                formData.append('_csrf', yii.getCsrfToken());
            },

            onTotalUploadProgress: function (progress) {
                $('#dropzone_upload_info').html('Uploading... ' + Math.floor(progress) + '%');
            },

            onQueueCompleted: function (progress) {
                $('#dropzone_upload_info').html('');
            },

            init: function () {
                this.on('addedfile', defaultOptions.onFileAdded);

                this.on('removedfile', defaultOptions.onFileRemoved);

                this.on('success', defaultOptions.onSuccess);

                this.on('error', defaultOptions.onError);

                this.on('sending', defaultOptions.onSending);

                this.on('totaluploadprogress', defaultOptions.onTotalUploadProgress);

                this.on('queuecomplete', defaultOptions.onQueueCompleted);
            }
        };

        var options = $.extend(defaultOptions, dropzoneOptions);

        dropzoneTarget.dropzone(options);
    }

})(jQuery, Notification, window.dropzoneOptions || {});