$(document).ready(function () {
    var txt = "";
    $('#newStudentConfirmationButton').click(function () {
        var formInputFields = document.getElementById("newStudentForm");
        var submitButton = document.createElement("BUTTON");
        var buttonTitle = document.createTextNode("Submit");
        submitButton.appendChild(buttonTitle);
        submitButton.setAttribute("onClick", "sendNewStudentForm()");

        for (var i = 0; i < formInputFields.length; i++) {
            var firstName = "First Name: " + formInputFields.elements[0].value + "<br>";
            var middleName = "Middle Name: " + formInputFields.elements[2].value + "<br>";
            var lastName = "Last Name: " + formInputFields.elements[1].value + "<br>";
            var suffix = "Suffix: " + formInputFields.elements[3].value + "<br>";
            var dob = "Date of Birth: " + formInputFields.elements[4].value + "<br>";
            var ethnicity = "Ethnicity: " + formInputFields.elements[5].value + "<br>";
            var gender = "Gender: " + formInputFields.elements[6].value + "<br>";
            var address = "Address: " + formInputFields.elements[8].value + " " + formInputFields.elements[9].value + "<br>";
            var city = "City: " + formInputFields.elements[10].value + "<br>";
            var state = "State: " + formInputFields.elements[11].value + "<br>";
            var zipCode = "Zip Code: " + formInputFields.elements[13].value + "<br>";
            var school = "School: " + formInputFields.elements[14].value + "<br>";


            if(formInputFields.elements[17].value === "on" || formInputFields.elements[17].value === 0)
            {
                var reducedLunch = "Reduced Lunch Eligible: No" + "<br>";
            } else {
                reducedLunch = "Reduced Lunch Eligible: Yes" + "<br>";
            }

            if(formInputFields.elements[18].value === "on" || formInputFields.elements[18].value === 0)
            {
                var permissionSlip = "Permission Slip on File: No" + "<br>";
            } else {
                permissionSlip = "Permission Slip on File: Yes" + "<br>";
            }

            if(formInputFields.elements[19].value === "on" || formInputFields.elements[19].value === 0)
            {
                var birthCertificate = "Birth Certificate on File: No" + "<br>";
            } else {
                birthCertificate = "Birth Certificate on File: Yes" + "<br>";
            }

            if(formInputFields.elements[20].value === "on" || formInputFields.elements[20].value === 0)
            {
                var emotionalProblems = "Immediate Emotional Problem: No" + "<br>";
            } else {
                emotionalProblems = "Immediate Emotional Problem: Yes" + "<br>";
            }

            txt = firstName + middleName + lastName + suffix + dob + ethnicity + gender
                + address + city + state + zipCode + school + permissionSlip + birthCertificate
                + reducedLunch + emotionalProblems;
        }

        $('#customModal').removeClass().addClass('modal fade');
        $('#customSize').removeClass().addClass('modal-dialog');
        $('#customTitle').removeClass().addClass('modal-header confirm-student-modal-header');
        $('#customIcon').removeClass().addClass('m-auto fa fa-archive fa-2x');
        $('#customHeaderText').text("Confirm Student Info");
        $('.modal-body').html(txt);
        $('.modal-footer').html(submitButton);
        $('#customModal').modal('show');
    });
});

function sendNewStudentForm() {
    var serializedForm = $('#newStudentForm').serialize();
    var serializedMedicalForm = $('#newStudentMedicalConcernsForm').serialize();
    var serializedContactForm = $('#newStudentContactForm').serialize();
    $('#customModal').modal('hide');
    launchAddNewStudentConfirmationModal(serializedForm, serializedMedicalForm, serializedContactForm);
}



