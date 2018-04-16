function launchEditProgramModal(programId) {
    $.ajax({
        url: '../modals/EditProgramModal.php',
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
        url: '../modals/ArchiveProgramModal.php',
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


function launchVolunteersModal(studentId) {
    $.ajax({
        url: '../modals/ContactsModal.php',
        type: 'post',
        data: {studentId: studentId},
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal right fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header contact-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-address-card-o fa-2x');
            $('#dynamic-title').text("Contact Info");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    });
}
