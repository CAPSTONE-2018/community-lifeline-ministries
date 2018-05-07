function launchGenericSuccessfulEntryModal(modalMessageToDisplay, afterDisplayRoute) {

    var successfulEntryText = "Success! " + modalMessageToDisplay;

    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog modal-lg');
    $('#customTitle').removeClass().addClass('modal-header successful-entry-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-check fa-2x');
    $('#customModal').find('#customHeaderText').text("Successful Entry!");
    $('#modalBody').addClass('text-center');
    $('#customModalBody').text(successfulEntryText);
    $('#customModal').modal('show');

    setTimeout(function () {
        $('#customModal').modal('hide').clear();
    }, 3000);

    $('#customModal').on('hidden.bs.modal', function () {
        window.location.href = '' + afterDisplayRoute + '';
    });
}
