function launchGenericRequiredInputsModal() {

    var requireInputText = "Please Fill Out All The Required Fields Before Submission.";

    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog modal-lg');
    $('#customTitle').removeClass().addClass('modal-header duplicate-entry-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-warning fa-2x');
    $('#customHeaderText').text("Wait!!");
    $('#customFooterActions').html('');
    $('.modal-body').addClass('text-center');
    $('.modal-body').text(requireInputText);
    $('#customModal').modal('show');

    setTimeout(function() {
        $('#customModal').modal('hide');
    }, 2000);
}
