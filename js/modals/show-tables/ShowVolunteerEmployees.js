function launchProgramsForVolunteerModal(volunteerId) {
    $.ajax({
        url: '../modals/employees/ProgramsForEmployeeModal.php',
        type: 'POST',
        data: {volunteerId: volunteerId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal right fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header contact-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-pencil-square-o fa-2x');
            $('#customHeaderText').text("Programs");
            $('#customModalBody').html(response);
            $('#customModal').modal('show');

            $('#customModal').on('hidden.bs.modal', function (e) {
                $('#customModal').removeClass();
                $('#customIcon').removeClass();
                $('#customModalBody').text();
            });
        }
    });
}