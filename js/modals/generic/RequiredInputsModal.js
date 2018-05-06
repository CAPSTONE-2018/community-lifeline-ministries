function launchGenericRequiredInputsModal() {

    var requireInputText = "Please Fill Out All The Required Fields Before Submission.";

    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog modal-lg');
    $('#customTitle').removeClass().addClass('modal-header duplicate-entry-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-warning fa-2x');
    $('#customHeaderText').text("Wait!!");
    $('#customFooterActions').html('');
    $('#customModalBody').addClass('text-center');
    $('#customModalBody').text(requireInputText);
    $('#customModal').modal('show');

    setTimeout(function() {
        $('#customModal').modal('hide');
        $('#customModal').clear();

    }, 3000);
}
