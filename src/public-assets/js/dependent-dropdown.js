/**
 * @file
 * @author Kehinde Ladipo <ladipokenny@gmail.com>
 *
 * This script generates a set of dependent Select drop-downs given a parent drop-down
 * All parent drop-downs should be tagged with data-dependent-dropdown=true attribute
 *
 * @return {Object} The children drop-down Select HTML block
 */
$(function() {

    /**
     * Clears and reloads the child drop-down for a parent drop-down
     * @event change
     */
    $(document).on('change', 'select[data-dependent-dropdown]', function() {

        var $element = $(this);
        $element.next('.dependent-dropdown-child').remove();

        /**
         * Hides the columns containing weight and parent form elements.
         *
         * @prop url
         *  data-url attribute of the Select drop-down
         * @prop data
         *  value of the Select drop-down
         *
         *  * @return {Object} The children drop-down Select HTML block
         */
        $.ajax({
            type: 'POST',
            url: $element.data('url'),
            data: {'parent_id': $element.val()},
            beforeSend: function() {
                $element.addClass('dependent-dropdown-loading');
            },
            success: function(response) {
                $element.after('<div class="dependent-dropdown-child"></div>');
                $element.next('.dependent-dropdown-child').append(response.data);
            },
            error: function(xhr) {
                console.log(xhr.status + ': ' + xhr.message)
            },
            complete: function() {
                $element.removeClass('dependent-dropdown-loading');
            }
        });

    });

});
