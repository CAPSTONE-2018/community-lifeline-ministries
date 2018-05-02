function launchSuccessfulArchive() {

    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog');
    $('#customTitle').removeClass().addClass('modal-header successful-entry-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-check fa-2x');
    $('#customHeaderText').text("Archive Complete");
    $('#customFooterActions').html('');
    $('.modal-body').addClass('text-center');
    $('.modal-body').text("Has Been Archived Successfully.");
    $('#customModal').modal('show');



    // $('#custom-modal').on('hidden.bs.modal', function (e) {
    //     $('.modal-body').removeClass('text-center');
    //     window.location.href = '../../php-files/show/ShowStudents.php';
    // });
}