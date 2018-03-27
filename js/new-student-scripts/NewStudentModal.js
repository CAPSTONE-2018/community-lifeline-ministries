$(document).ready(function () {
    $('#buttonTrigger').click(function () {
        var x = document.getElementById("newStudentForm");

        var birthCertificateCheckbox = x[13];

        if (birthCertificateCheckbox.valid) {

        }

        var txt = "";
        var i;
        for (i = 0; i < x.length; i++) {
//                txt = txt + x.elements[i].value + "<br>";
            var firstName = "First Name: " + x.elements[0].value + "<br>";
            var lastName = "Last Name: " + x.elements[1].value + "<br>";
            var middleName = "Middle Name: " + x.elements[2].value + "<br>";
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

            txt = firstName + lastName + middleName + suffix + dob + ethnicity + gender
                + address + city + state + zipCode + school + permissionSlip + birthCertificate
                + reducedLunch + emotionalProblems;
        }
        document.getElementById("modalBody").innerHTML = txt;
    });
});