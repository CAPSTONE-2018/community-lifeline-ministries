function launchGenericSuccessfulEntryModal(successfulEntryTitle, submissionType, afterDisplayRoute) {
    var successfulEntryText = "Success! the " + submissionType + ", " + successfulEntryTitle + " was submitted.";
    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog modal-lg');
    $('#customTitle').removeClass().addClass('modal-header successful-entry-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-check fa-2x');
    $('#customHeaderText').text("Successful Entry!");
    $('.modal-body').addClass('text-center');
    $('.modal-body').text(successfulEntryText);
    // $('#customFooterActions').html(footerRow);
    $('#customModal').modal('show');

    setTimeout(function() {
        $('#customModal').modal('hide');
    }, 2000);

    $('#customModal').on('hidden.bs.modal', function (e) {
        window.location.href = ''+afterDisplayRoute+'';
    });

}


function customRoutes(locationToRoute) {
    location.href = locationToRoute;
}