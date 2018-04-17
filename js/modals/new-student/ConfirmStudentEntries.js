$(document).ready(function () {
    var txt = "";
    $('#confirmationButton').click(function () {

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
            var address = "Address: " + x.elements[8].value + " " + x.elements[9].value + "<br>";
            var city = "City: " + x.elements[10].value + "<br>";
            var state = "State: " + x.elements[11].value + "<br>";
            var zipCode = "Zip Code: " + x.elements[13].value + "<br>";
            var school = "School: " + x.elements[14].value + "<br>";

            if(x.elements[18].value === "On" || x.elements[18].value === 0)
            {
                var permissionSlip = "Permission Slip on File: No" + "<br>";
            } else {
                permissionSlip = "Permission Slip on File: Yes" + "<br>";
            }

            if(x.elements[19].value === "On" || x.elements[19].value === 0)
            {
                var birthCertificate = "Birth Certificate on File: No" + "<br>";
            } else {
                birthCertificate = "Birth Certificate on File: Yes" + "<br>";
            }

            if(x.elements[17].value === "On" || x.elements[17].value === 0)
            {
                var reducedLunch = "Reduced Lunch Eligible: No" + "<br>";
            } else {
                reducedLunch = "Reduced Lunch Eligible: Yes" + "<br>";
            }

            if(x.elements[20].value === "On" || x.elements[20].value === 0)
            {
                var emotionalProblems = "Immediate Emotional Problem: No" + "<br>";
            } else {
                emotionalProblems = "Immediate Emotional Problem: Yes" + "<br>";
            }

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
    launchStudentConfirmationModal(serializedForm);
}