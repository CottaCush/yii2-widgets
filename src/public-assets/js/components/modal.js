App.extend({
    Components: {}
});

App.Components.Modal = (function ($, document) {
    var pub = {
        name: 'App.Components.Modal',
        depends: ['App.Components.Form'], /** Form's assignFormValue method used in populateModal */
        events: ['click'],

        submitFormButtonSelector: '[data-submit-modal-form]',
        submitForm: function (modal, form) {
            form = form || 'form';
            $(modal).find(form).submit();
        },

        /**
         * Populate the fields in the modal from the data attributes on the modal trigger button
         * @param modalId
         * @param modelName
         */
        populateModal: function (modalId, modelName) {
            var assignFormValue = App.Components.Form.assignFormValue;

            $("[data-target='" + modalId + "']").on('click', function (event) {
                var data = this.dataset;
                for (var field in data) {
                    var element = $(modalId + " [name='" + modelName + "[" + field + "]'");

                    if (element.length == 0 && field.indexOf('[]') > -1) {
                        element = $(modalId + " [name='" + modelName + "[" + (field.replace('[]', '')) + "][]'");
                    }

                    if (element.length > 0) {
                        var value = $(this).data(field);

                        if (element.length == 1) {
                            assignFormValue(element, value);
                        }
                        else if (element.length > 1) {
                            element.each(function () {
                                assignFormValue($(this), value);
                            });
                        }
                    }
                }
            });
        },

        /**
         * Hide option in a dropdown based on the value of a field
         * @param modalSelector selector to select modal
         * @param modelName name of model used in modal
         * @param fieldName name of field with value
         * @param dropdownFieldName name of dropdown
         */
        hideDropdownOptionWithFieldValue: function (modalSelector, modelName, fieldName, dropdownFieldName) {
            $(modalSelector).on('show.bs.modal', function (event) {
                var field = $(modalSelector + " [name='" + modelName + "[" + fieldName + "]'");
                var dropdown = $(modalSelector + " select[name='" + modelName + "[" + dropdownFieldName + "]']");

                // show all dropdown options
                dropdown.find('option').show();

                // get option with value correlating to field value
                var optionToHide = dropdown.find("option[value='" + field.val() + "']");

                // hide option
                optionToHide.hide();
            });
        },

        $genericModal: $('[data-generic-modal]'),
        modalIdSelector: '[data-id]',
        modalTitleSelector: 'h4.modal-title',
        modalMsgSelector: '[data-msg]',
        modalFormSelector: 'form',

        genericPrefillModal: function () {
            var modal = this.$genericModal;
            modal.on('show.bs.modal', function (event) {

                var src = $(event.relatedTarget),
                    id = src.data('id'),
                    title = src.data('title'),
                    msg = src.data('msg'),
                    url = src.data('url');

                modal.find(pub.modalTitleSelector).text(title);
                modal.find(pub.modalMsgSelector).html(msg);
                modal.find(pub.modalFormSelector).prop('action', url)
                    .find(pub.modalIdSelector).val(id);
            });
        },

        init: function () {
            submitModalForm();
            this.genericPrefillModal();
        },
        close: function () {
            $('.modal:visible').modal('hide');
        }
    };

    function submitModalForm() {
        $(document).on(pub.events.click, pub.submitFormButtonSelector, function () {
            $(this).closest('.modal-content').find('form').submit();

            var $submitBtn = $(pub.submitFormButtonSelector);
            $submitBtn.attr("disabled", true);
            setTimeout(function () {
                $submitBtn.removeAttr("disabled");
            }, 5000);
        });
    }

    return pub;
})(jQuery, document);

App.initModule(App.Components.Modal);
