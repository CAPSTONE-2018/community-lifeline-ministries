function launchEditProgramModal(programId) {
    $.ajax({
        url: '../modals/programs/EditModal.php',
        type: 'POST',
        data: {programId: programId},
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog modal-lg');
            $('#custom-title').removeClass().addClass('modal-header edit-student-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-pencil ');
            $('#dynamic-title').text("Edit Program Info");
            $('#title-wrapper').find('h4').addClass("large-font");
            $('.modal-body').html(response);
            checkForInputs();
            $('#custom-modal').modal("show");
        }
    });
}

function launchArchiveProgramModal(programIdToArchive, tableToLookUp, nameToDisplay) {
    $.ajax({
        url: '../modals/programs/ArchiveModal.php',
        type: 'POST',
        data: {
            programIdToArchive: programIdToArchive,
            tableToLookUp: tableToLookUp,
            nameToDisplay: nameToDisplay
        },
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header warning-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-archive fa-2x');
            $('#dynamic-title').text("Archive Program");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    });
}


function launchVolunteersInProgramModal(volunteerId) {
    alert(volunteerId);
    $.ajax({
        url: '../modals/programs/VolunteersToProgramModal.php',
        type: 'post',
        data: {volunteerId: volunteerId},
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal right fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header test-scores-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-star fa-2x');
            $('#dynamic-title').text("Volunteer Info");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    });
}


function launchStudentsInProgramModal(studentId) {
    $.ajax({
        url: '../modals/programs/StudentsEnrolledModal.php',
        type: 'post',
        data: {studentId: studentId},
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal right fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header contact-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-graduation-cap fa-2x');
            $('#dynamic-title').text("Students Enrolled In Program");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    });
}

