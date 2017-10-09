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
         * Remove element selected on a field in a dropdown
         * @param modalId
         * @param modelName
         * @param field
         * @param dropdownField
         */
        excludeFieldValueFromDropdown: function (modalId, modelName, field, dropdownField) {
            $(modalId).on('show.bs.modal', function (event) {
                var element = $(modalId + " [name='" + modelName + "[" + field + "]'");
                var dropdown = $(modalId + " select[name='" + modelName + "[" + dropdownField + "]']");
                dropdown.find('option').show();
                var optionToExclude = dropdown.find("option[value='" + element.val() + "']");
                optionToExclude.hide();
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
