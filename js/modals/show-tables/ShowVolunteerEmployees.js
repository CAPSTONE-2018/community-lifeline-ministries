function launchArchiveEmployeeModal(volunteerId, volunteerName) {
    $.ajax({
        url: '../modals/employees/ArchiveVolunteerEmployee.php',
        type: 'POST',
        data: {
            volunteerId: volunteerId,
            volunteerName: volunteerName
        },
        success: function(response) {
            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header warning-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-archive fa-2x');
            $('#dynamic-title').text("Archive User");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    })
}