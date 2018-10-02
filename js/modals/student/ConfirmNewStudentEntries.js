function launchConfirmStudentEntriesModal(serializedStudentInfoForm) {

    $.ajax({
        url: "../modals/students/VerifyNewStudent.php",
        method: "POST",
        data: serializedStudentInfoForm,
        success: function (response) {
            $('#placeHolderForVerifyStudentInfo').html(response);
            $('#showStudentModal').modal({show: true});
        }
    })
}

function launchConfirmEditStudentEntriesModal(serializedStudentInfoForm) {

    $.ajax({
        url: "../modals/students/VerifyNewStudent.php",
        method: "POST",
        data: serializedStudentInfoForm,
        success: function (response) {
            $('#placeHolderForVerifyEditStudentInfo').html(response);
            $('#showEditStudentModal').modal({show: true});
        }
    })
}

function launchVerifyMedicalInfoForStudent(serializedMedicalConcernsForm) {

    $.ajax({
        url: "../modals/students/VerifyNewMedicalConcerns.php",
        method: "POST",
        data: serializedMedicalConcernsForm,
        success: function (response) {
            $('#placeHolderForVerifyMedicalConcernsInfo').html(response);
        }
    })
}

function launchVerifyContactInfoForStudent(serializedStudentContactForm) {

    $.ajax({
        url: "../modals/students/VerifyNewContact.php",
        method: "POST",
        data: serializedStudentContactForm,
        success: function (response) {
            $('#placeHolderForStudentContactsInfo').html(response);
        }
    })
}


