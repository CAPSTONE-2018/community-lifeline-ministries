function launchEditProgramModal(programId) {
    $.ajax({
        url: '/community-lifeline-ministries/php-files/modals/modals/programs/EditModal.php',
        type: 'POST',
        data: {programId: programId},
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog modal-lg');
            $('#custom-title').removeClass().addClass('modal-header edit-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-pencil ');
            $('#dynamic-title').text("Edit Program Info");
            $('#title-wrapper').find('h4').addClass("large-font");
            $('.modal-body').html(response);
            $('#custom-modal').modal("show");
            componentHandler.upgradeDom();
        }
    });
}

function launchVolunteersInProgramModal(programId) {
    $.ajax({
        url: '/community-lifeline-ministries/php-files/modals/programs/VolunteersToProgramModal.php',
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
        url: '/community-lifeline-ministries/php-files/modals/programs/StudentsEnrolledModal.php',
        type: 'POST',
        data: {programId: programId},
        success: function (response) {
            $('#showStudentsInProgramModalModalBody').html(response);
            $('#showStudentsInProgramModal').modal('show');
        }
    });
}

