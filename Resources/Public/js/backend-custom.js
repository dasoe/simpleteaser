jQuery(document).ready(function () {

    jQuery(document).on('click', '.delete', function (e) {
        jQuery('.objectId').val(jQuery(this).attr('data-id'));
    });
});
