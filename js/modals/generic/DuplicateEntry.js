function launchGenericDuplicateEntryModal(modalMessage) {

    var duplicateParagraphText = "Sorry, looks like the " + modalMessage;

    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog modal-lg');
    $('#customTitle').removeClass().addClass('modal-header duplicate-entry-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-warning fa-2x');
    $('#customHeaderText').text("Duplicate Entry!");
    $('.modal-body').addClass('text-center');
    $('#customModalBody').text(duplicateParagraphText);
    $('#customModal').modal('show');

    setTimeout(function() {
        $('#customModal').modal('hide');
    }, 3000);
}