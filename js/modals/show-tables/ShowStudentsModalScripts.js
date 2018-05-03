function launchEditStudentModal(studentId) {
    $.ajax({
        url: '../modals/students/EditModal.php',
        type: 'POST',
        data: {studentId: studentId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal fade');
            $('#customSize').removeClass().addClass('modal-dialog modal-lg');
            $('#customTitle').removeClass().addClass('modal-header edit-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-pencil ');
            $('#customHeaderText').text("Edit Student Info");
            $('#titleWrapper').find('h4').addClass("large-font");
            $('.modal-body').html(response);
            $('#customModal').modal("show");
            getmdlSelect.init(".getmdl-select");
            componentHandler.upgradeDom();
        }
    });
}


function launchTestScoresModal(studentId) {
    $.ajax({
        url: '../modals/students/TestScoresModal.php',
        type: 'post',
        data: {studentId: studentId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal right fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header test-scores-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-area-chart fa-2x');
            $('#customHeaderText').text("Test Score Info");
            $('.modal-body').html(response);
            $('#customModal').modal('show');
        }
    });
}

function launchContactsModal(studentId) {
    $.ajax({
        url: '../modals/students/DisplayStudentContactsModal.php',
        type: 'post',
        data: {studentId: studentId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal right fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header contact-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-address-card-o fa-2x');
            $('#customHeaderText').text("Contact Info");
            $('.modal-body').html(response);
            $('#customModal').modal('show');
        }
    });
}

function launchMedicalConcernsModal(studentId) {
    $.ajax({
        url: '../modals/students/MedicalConcernsModal.php',
        type: 'post',
        data: {studentId: studentId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal right fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header medical-concern-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-warning fa-2x');
            $('#customHeaderText').text("Medical Concerns");
            $('.modal-body').html(response);
            $('#customModal').modal('show');
        }
    });
}

function launchDocumentsModal(studentId) {
    $.ajax({
        url: '../modals/students/DocumentsModal.php',
        type: 'POST',
        data: {studentId: studentId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal right fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header documents-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-file fa-2x');
            $('#customHeaderText').text("Documents on File");
            $('.modal-body').html(response);
            $('#customModal').modal('show');
        }
    });
}













