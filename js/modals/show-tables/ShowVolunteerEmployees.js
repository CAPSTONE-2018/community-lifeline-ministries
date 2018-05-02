function launchArchiveEmployeeModal(volunteerId, volunteerName) {
    $.ajax({
        url: '../modals/employees/ArchiveVolunteerEmployee.php',
        type: 'POST',
        data: {
            volunteerId: volunteerId,
            volunteerName: volunteerName
        },
        success: function(response) {
            $('#customModal').removeClass().addClass('modal fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header warning-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-archive fa-2x');
            $('#customHeaderText').text("Archive User");
            $('.modal-body').html(response);
            $('#customModal').modal('show');
        }
    })
}