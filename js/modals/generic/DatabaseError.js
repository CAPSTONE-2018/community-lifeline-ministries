function launchGenericDatabaseErrorModal() {

    var errorParagraphText = "Whoops!, looks like the there was an error submitting to the database.  Please try again.";

    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog modal-lg');
    $('#customTitle').removeClass().addClass('modal-header warning-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-warning fa-2x');
    $('#customHeaderText').text("Database Error!");
    $('#customFooterActions').html('');
    $('.modal-body').addClass('text-center');
    $('#customModalBody').text(errorParagraphText);
    $('#customModal').modal('show');

    setTimeout(function() {
        $('#customModal').on('hidden.bs.modal', function (e) {
            $('#customModal').modal('hide').clear();
        });
    }, 3000);
}
