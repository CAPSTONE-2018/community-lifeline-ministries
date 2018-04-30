$(document).ready(function () {
    var txt = "";
    $('#newContactConfirmationButton').click(function () {
        var formInputs = document.getElementById("newContactForm");
        var submitButton = document.createElement("BUTTON");
        var buttonTitle = document.createTextNode("Submit");
        submitButton.appendChild(buttonTitle);
        submitButton.setAttribute("onClick", "sendNewContactForm()");

        for (var i = 0; i < formInputs.length; i++) {
            var firstName = "First Name: " + formInputs.elements[5].value + "<br>";
            var lastName = "Last Name: " + formInputs.elements[6].value + "<br>";
            var suffix = "Primary Phone: " + formInputs.elements[7].value + "<br>";
            var dob = "Secondary Phone: " + formInputs.elements[8].value + "<br>";
            var ethnicity = "Email: " + formInputs.elements[9].value + "<br>";
            var address = "Address: " + formInputs.elements[10].value + " " + formInputs.elements[10].value + "<br>";
            var city = "City: " + formInputs.elements[11].value + "<br>";
            var state = "State: " + formInputs.elements[12].value + "<br>";
            var zipCode = "Zip Code: " + formInputs.elements[13].value + "<br>";
            var school = "School: " + formInputs.elements[14].value + "<br>";

            txt = firstName + lastName + suffix + dob + ethnicity
                + address + city + state + zipCode + school;
        }

        $('#custom-modal').removeClass().addClass('modal fade');
        $('#custom-size').removeClass().addClass('modal-dialog');
        $('#custom-title').removeClass().addClass('modal-header confirm-student-modal-header');
        $('#custom-icon').removeClass().addClass('m-auto fa fa-archive fa-2x');
        $('#dynamic-title').text("Add Contact Confirmation");
        $('.modal-body').html(txt);
        $('.modal-footer').html(submitButton);
        $('#custom-modal').modal('show');
    });
});

function sendNewContactForm() {
    var serializedForm = $('#newContactForm').serialize();
    $('#custom-modal').modal('hide');
    launchAddNewContactConfirmationModal(serializedForm);
}