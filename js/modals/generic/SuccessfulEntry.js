function launchGenericSuccessfulEntryModal(modalMessageToDisplay, afterDisplayRoute) {

    var successfulEntryText = "Success! " + modalMessageToDisplay;

    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog modal-lg');
    $('#customTitle').removeClass().addClass('modal-header successful-entry-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-check fa-2x');
    $('#customHeaderText').text("Successful Entry!");
    $('.modal-body').addClass('text-center');
    $('.modal-body').text(successfulEntryText);
    $('#customModal').modal('show');

    setTimeout(function() {
        $('#customModal').modal('hide');
    }, 4000);

    $('#customModal').on('hidden.bs.modal', function () {
        document.getElementsByTagName('form')[0].reset();
        window.location.href = ''+afterDisplayRoute+'';
    });
}
