function launchEditProgramModal(programId) {
    $.ajax({
        url: '../modals/programs/EditProgramModalContent.php',
        type: 'POST',
        data: {programId: programId},
        success: function (response) {
            $('#editProgramModalModalBody').html(response);
            $('#showEditProgramModal').modal("show");
            componentHandler.upgradeDom();
        }
    });
}

function launchVolunteersInProgramModal(programId) {
    $.ajax({
        url: '../modals/programs/VolunteersToProgramModalContent.php',
        type: 'POST',
        data: {programId: programId},
        success: function (response) {
            $('#showVolunteersInProgramModalModalBody').html(response);
            $('#showVolunteersInProgramModal').modal('show');


        }
    });
}


function launchStudentsInProgramModal(programId) {
    $.ajax({
        url: '../modals/programs/StudentsEnrolledModalContent.php',
        type: 'POST',
        data: {programId: programId},
        success: function (response) {
            $('#showStudentsInProgramModalModalBody').html(response);
            $('#showStudentsInProgramModal').modal('show');
        }
    });
}

