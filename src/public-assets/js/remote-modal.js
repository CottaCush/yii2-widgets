$("[data-toggle=modal]").click(function(ev) {
    ev.preventDefault();
    $( $(this).attr('data-target') + " .modal-content").load($(this).attr("href"), function() {
        $($(this).attr('data-target')).modal("show");
    });
});