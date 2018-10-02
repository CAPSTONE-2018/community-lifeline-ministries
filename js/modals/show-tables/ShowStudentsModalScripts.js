function launchEditStudentModal(studentId) {
    $.ajax({
        url: '../modals/students/EditModal.php',
        type: 'POST',
        data: {studentId: studentId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal fade');
            $('#customSize').removeClass().addClass('modal-dialog modal-lg');
            $('#customTitle').removeClass().addClass('modal-header edit-modal-header');
            $('#customIcon').removeClass().addClass('m-auto');
            $('#customModal').find('#customHeaderText').text("Edit Student Info");
            $('#titleWrapper').find('h4').addClass("large-font");
            $('#customModalBody').html(response);
            $('#customModal').modal("show");
            getmdlSelect.init(".getmdl-select");
            componentHandler.upgradeDom();

            $('#customModal').on('hidden.bs.modal', function (e) {
                $('#customModal').removeClass();
                $('#customSize').removeClass();
                $('#customIcon').removeClass();
                $('#titleWrapper').removeClass();
                // $('#customModalBody').text();
            });
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
            $('#customModal').find('#customHeaderText').text("Test Score Info");
            $('#titleWrapper').find('h4').addClass("large-font");
            $('#customModalBody').html(response);
            $('#customModal').modal("show");
            getmdlSelect.init(".getmdl-select");
            componentHandler.upgradeDom();

            $('#customModal').on('hidden.bs.modal', function (e) {
                $('#customModal').removeClass();
                $('#customSize').removeClass();
                $('#customIcon').removeClass();
                $('#titleWrapper').removeClass();
                // $('#customModalBody').text();
            });
        }
    });
}

function launchContactsModal(studentId) {
    $.ajax({
        url: '../php-files/modals/students/StudentContactsModal.php',
        type: 'post',
        data: {studentId: studentId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal right fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header contact-modal-header');
            $('#customIcon').removeClass().addClass('m-auto');
            $('#customModal').find('#customHeaderText').text("Contact Info");
            $('#titleWrapper').find('h4').addClass("large-font d-inline align-middle");
            $('#customModalBody').html(response);
            $('#customModal').modal("show");
            // getmdlSelect.init(".getmdl-select");
            // componentHandler.upgradeDom();

            $('#customModal').on('hidden.bs.modal', function (e) {
                $('#customModal').removeClass();
                $('#customSize').removeClass();
                $('#customIcon').removeClass();
                $('#titleWrapper').removeClass();
                // $('#customModalBody').text();
            });
        }
    });
}

function launchMedicalConcernsModal(studentId) {

    $.ajax({
        url: '../modals/students/MedicalConcernsModal.php',
        type: 'POST',
        data: {studentId: studentId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal right fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header medical-concern-modal-header');
            $('#customIcon').removeClass().addClass('m-auto ');
            $('#customHeaderText').text("  Medical Concerns");
            $('#titleWrapper').addClass("large-font d-inline align-middle");
            $('#customModalBody').html(response);
            $('#customModal').modal('show');

            $('#customModal').on('hidden.bs.modal', function (e) {
                $('#customModal').removeClass();
                $('#customSize').removeClass();
                $('#customIcon').removeClass();
                $('#customModalBody').text();
            });
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
            $('#customModalBody').html(response);
            $('#customModal').modal('show');

            $('#customModal').on('hidden.bs.modal', function (e) {
                $('#customModal').removeClass();
                $('#customSize').removeClass();
                $('#customIcon').removeClass();
                $('#customModalBody').text();
            });
        }
    });
}

function EditTestScores() {
    $(".testScores").prop('readonly', false);
    document.getElementById('updateButton').disabled = false;
}

function UpdateTestScores() {
    var numItems = $('.testScores').length;
    numItems /= 4;
    var studentId = document.getElementById('hdnStudentId').value;
    for (var i = 1; i < numItems + 1; i++) {
        $.ajax({
            url: "../update/UpdateTestScores.php",
            method: "POST",
            data: {
                id: document.getElementById('testId' + i).value,
                schoolYear: document.getElementById('schoolYear' + i).value,
                term: document.getElementById('term' + i).value,
                pre_Test: document.getElementById('pre_test' + i).value,
                post_Test: document.getElementById('post_test' + i).value
            },
            success: function (output) {
                $('.currentTestScores').remove();
                $('.addTestScores').remove();

                $.ajax({
                    url: '../modals/students/TestScoresModal.php',
                    type: 'post',
                    data: {studentId: studentId},
                    success: function (response) {
                        $('.modal-body').html(response);
                    }
                });
            }
        });
    }
}

function NewTestScore() {
    document.getElementById('addTestScore').style.display = "";

    var divsToHide = document.getElementsByClassName("currentTestScores");
    for (var i = 0; i < divsToHide.length; i++) {
        divsToHide[i].style.display = "none";
    }
    $('.deleteButton').remove();
}

function AddTestScore() {
    var divsToHide = document.getElementsByClassName("currentTestScores");
    var studentId = document.getElementById('hdnStudentId').value;
    var newYear = document.getElementById('newSchoolYear').value;
    var newTerm = document.getElementById('newTerm').value;
    var newpre_test = document.getElementById('newPre_test').value;
    var newpost_test = document.getElementById('newPost_test').value;

    var parsedTerm = "'" + newTerm + "'";
    $.ajax({
        url: "../new/newTestScores.php",
        method: "POST",
        data: {
            StudentId: studentId,
            NewYear: newYear,
            NewTerm: parsedTerm,
            NewPre_Test: newpre_test,
            NewPost_Test: newpost_test
        },
        success: function (output) {
            document.getElementById('addTestScore').style.display = "none";
            for (var i = 0; i < divsToHide.length; i++) {
                divsToHide[i].style.display = "";
            }


            $('.currentTestScores').remove();
            $('.addTestScores').remove();

            $.ajax({
                url: '../modals/students/TestScoresModal.php',
                type: 'post',
                data: {studentId: studentId},
                success: function (response) {
                    $('.modal-body').html(response);
                }
            });
        }
    });
}

function DeleteTestScore(TestScoreId) {
    $.ajax({
        url: "../Delete/DeleteTestScore.php",
        method: "POST",
        data: {TestScoreId: TestScoreId},
        success: function (output) {

        }
    });
}
