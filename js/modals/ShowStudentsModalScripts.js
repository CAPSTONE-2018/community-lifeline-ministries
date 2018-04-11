function launchEditStudentModal(studentId) {
    $.ajax({
        url: '../modals/EditStudentModal.php',
        type: 'POST',
        data: {studentId: studentId},
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog modal-lg');
            $('#custom-title').removeClass().addClass('modal-header edit-student-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-pencil ');
            $('#dynamic-title').text("Edit Student Info");
            $('#title-wrapper').find('h4').addClass("large-font");
            $('.modal-body').html(response);
            checkForInputs();
            $('#custom-modal').modal("show");
        }
    });
}


function launchTestScoresModal(studentId) {
    $.ajax({
        url: '../modals/TestScoresModal.php',
        type: 'post',
        data: {studentId: studentId},
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal right fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header test-scores-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-area-chart fa-2x');
            $('#dynamic-title').text("Test Score Info");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    });
}

function launchContactsModal(studentId) {
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

function launchMedicalConcernsModal(studentId) {
    $.ajax({
        url: '../modals/MedicalConcernsModal.php',
        type: 'post',
        data: {studentId: studentId},
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal right fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header medical-concern-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-warning fa-2x');
            $('#dynamic-title').text("Medical Concerns");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    });
}