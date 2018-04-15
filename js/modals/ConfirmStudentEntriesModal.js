$(document).ready(function () {
    var txt = "";
    $('#buttonTrigger').click(function () {

        // var submitButton = document.createElement("BUTTON");
        // var buttonTitle = document.createTextNode("Submit");
        // submitButton.appendChild(buttonTitle);
        // submitButton.onclick(sendNewStudentForm());
        var x = document.getElementById("newStudentForm");
        var submitButton = document.createElement("BUTTON");
        var buttonTitle = document.createTextNode("Submit");
        submitButton.appendChild(buttonTitle);
        submitButton.setAttribute("onClick", "sendNewStudentForm()");

        var i;
        for (i = 0; i < x.length; i++) {
//                txt = txt + x.elements[i].value + "<br>";
            var firstName = "First Name: " + x.elements[0].value + "<br>";
            var middleName = "Middle Name: " + x.elements[2].value + "<br>";
            var lastName = "Last Name: " + x.elements[1].value + "<br>";
            var suffix = "Suffix: " + x.elements[3].value + "<br>";
            var dob = "Date of Birth: " + x.elements[4].value + "<br>";
            var ethnicity = "Ethnicity: " + x.elements[5].value + "<br>";
            var gender = "Gender: " + x.elements[6].value + "<br>";
            var address = "Address: " + x.elements[7].value + "<br>";
            var city = "City: " + x.elements[8].value + "<br>";
            var state = "State: " + x.elements[9].value + "<br>";
            var zipCode = "Zip Code: " + x.elements[10].value + "<br>";
            var school = "School: " + x.elements[11].value + "<br>";
            var permissionSlip = "Permission Slip on File: " + x.elements[12].value + "<br>";
            var birthCertificate = "Birth Certificate on File: " + x.elements[13].value + "<br>";
            var reducedLunch = "Reduced Lunch Eligible: " + x.elements[14].value + "<br>";
            var emotionalProblems = "Immediate Emotional Problem: " + x.elements[15].value + "<br>";

            txt = firstName + middleName + lastName + suffix + dob + ethnicity + gender
                + address + city + state + zipCode + school + permissionSlip + birthCertificate
                + reducedLunch + emotionalProblems;
        }

        $('#custom-modal').removeClass().addClass('modal fade');
        $('#custom-size').removeClass().addClass('modal-dialog');
        $('#custom-title').removeClass().addClass('modal-header confirm-student-modal-header');
        $('#custom-icon').removeClass().addClass('m-auto fa fa-archive fa-2x');
        $('#dynamic-title').text("Add User Confirmation");
        $('.modal-body').html(txt);
        $('.modal-footer').html(submitButton);
        $('#custom-modal').modal('show');
    });
});

function sendNewStudentForm() {
    var serializedForm = $('#newStudentForm').serialize();
    $('#custom-modal').modal('hide');
    launchConfirmationModal(serializedForm);
}