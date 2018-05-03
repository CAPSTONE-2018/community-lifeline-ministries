function launchGenericDuplicateEntryModal(duplicateEntryTitleToPassThrough, submissionType) {

    var duplicateParagraphText = "Sorry, looks like the " + submissionType + ", " + duplicateEntryTitleToPassThrough + " Already Exists.";

    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog modal-lg');
    $('#customTitle').removeClass().addClass('modal-header duplicate-entry-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-warning fa-2x');
    $('#customHeaderText').text("Duplicate Entry!");
    $('#customFooterActions').html('');
    $('.modal-body').addClass('text-center');
    $('.modal-body').text(duplicateParagraphText);
    $('#customModal').modal('show');

    setTimeout(function() {
        $('#customModal').modal('hide');
    }, 3000);

    $('#customModal').on('hidden.bs.modal', function () {
        document.getElementsByTagName('form')[0].reset();
    });
}
