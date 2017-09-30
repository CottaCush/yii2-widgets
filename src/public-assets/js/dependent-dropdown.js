/**
 * @file
 * @author Kehinde Ladipo <ladipokenny@gmail.com>
 *
 * Make an API request to get the dependent of a parent <select>. The API should return the full <select> element.
 *
 * A parent <select> looks like the following:
 *
 *     <select data-dependent-dropdown data-url="https://example.com/api/endpoint">
 *       ...
 *     </select>
 *
 * The `data-dependent-dropdown` attribute signifies that this is a parent drop-down and attaches this functionality
 * The `data-url` attribute carries the endpoint for the url
 *
 */
$(function () {
    var dropdown_selector = 'select[data-dependent-dropdown]';

    /**
     * Clears and reloads the child drop-down for a parent drop-down
     * @event change
     */
    $(document).on('change', dropdown_selector, function () {
        var $element = $(this);

        // Remove a dependent drop-down child if it already exists
        $(dropdown_selector).slice ( $(dropdown_selector).index( $element ) + 1).remove();

        $.ajax({
            type: 'POST',
            url: $element.data('url'),
            data: { 'parent_id': $element.val() },
            beforeSend: function() {
                $element.addClass('dependent-dropdown-loading');
            },
            success: function(response) {
                $element.after('<div class="dependent-dropdown-child"></div>');
                $element.next('.dependent-dropdown-child').append(response.data);
            },
            error: function(xhr) {
                console.log(xhr.status + ': ' + xhr.message);
            },
            complete: function() {
                $element.removeClass('dependent-dropdown-loading');
            }
        });
    });
});
