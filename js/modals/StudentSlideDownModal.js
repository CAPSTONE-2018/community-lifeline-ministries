// function checkForInputs() {
//
//     var firstNameInput = document.getElementById("firstName").value;
//     var lastNameInput = document.getElementById("floatingStudentLastName");
//     var middleNameInput = document.getElementById("floatingStudentMiddleName");
//     var suffixInput = document.getElementById("floatingStudentSuffix");
//
//     //
//     // $("#floatingStudentFirstName").onload(function() {
//     //         var value = $( this ).val();
//     //         alert(value);
//     //     });
//
//     if (firstNameInput === "") {
//         $('div[id=floatingStudentFirstName]').removeClass("is-focused");
//     } else {
//         $('div[id=floatingStudentFirstName]').removeClass("is-focused").addClass("is-dirty");
//     }
//
//
// }

function checkForInputs() {
    var firstNameInputValue = $('#studentFirstName').val();
    if(firstNameInputValue === "") {
        $('div[id=floatingStudentFirstName]').removeClass("is-focused");
    } else {
        $('div[id=floatingStudentFirstName]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var lastNameInputValue = $('#studentLastName').val();
    if(lastNameInputValue === "") {
        $('div[id=floatingStudentLastName]').removeClass("is-focused");
    } else {
        $('div[id=floatingStudentLastName]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var middleNameInputValue = $('#studentMiddleName').val();
    if(middleNameInputValue === "") {
        $('div[id=floatingStudentMiddleName]').removeClass("is-focused");
    } else {
        $('div[id=floatingStudentMiddleName]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var suffixInputValue = $('#studentSuffix').val();
    if(suffixInputValue === "") {
        $('div[id=floatingStudentSuffix]').removeClass("is-focused");
    } else {
        $('div[id=floatingStudentSuffix]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var dobInputValue = $('#dob').val();
    if(dobInputValue === "") {
        $('div[id=floatingDob]').removeClass("is-focused");
    } else {
        $('div[id=floatingDob]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var ethnicityInputValue = $('#ethnicity').val();
    if(ethnicityInputValue === "") {
        $('div[id=floatingEthnicity]').removeClass("is-focused");
    } else {
        $('div[id=floatingEthnicity]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var genderInputValue = $('#gender').val();
    if(genderInputValue === "") {
        $('div[id=floatingGender]').removeClass("is-focused");
    } else {
        $('div[id=floatingGender]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var addressOneInputValue = $('#studentAddressOne').val();
    if(addressOneInputValue === "") {
        $('div[id=floatingAddressOne]').removeClass("is-focused");
    } else {
        $('div[id=floatingAddressOne]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var addressTwoInputValue = $('#studentAddressTwo').val();
    if(addressTwoInputValue === "") {
        $('div[id=floatingAddressTwo]').removeClass("is-focused");
    } else {
        $('div[id=floatingAddressTwo]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var cityInputValue = $('#studentCity').val();
    if(cityInputValue === "") {
        $('div[id=floatingCity]').removeClass("is-focused");
    } else {
        $('div[id=floatingCity]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var stateInputValue = $('#studentState').val();
    if(stateInputValue === "") {
        $('div[id=floatingState]').removeClass("is-focused");
    } else {
        $('div[id=floatingState]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var zipInputValue = $('#studentZip').val();
    if(zipInputValue === "") {
        $('div[id=floatingZip]').removeClass("is-focused");
    } else {
        $('div[id=floatingZip]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var currentSchoolInputValue = $('#studentSchool').val();
    if(currentSchoolInputValue === "") {
        $('div[id=floatingSchool]').removeClass("is-focused");
    } else {
        $('div[id=floatingSchool]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

}


//
// function addStudentFirstNameFocus() {
//     $('div[id=floatingStudentFirstName]').addClass("is-focused");
// }
// function removeStudentFirstNameFocus() {
//     var userInput = document.getElementById("studentFirstName").value;
//
//     if (userInput === "") {
//         $('div[id=floatingStudentFirstName]').removeClass("is-focused");
//     } else {
//         $('div[id=floatingStudentFirstName]').removeClass("is-focused").addClass("is-dirty");
//     }
// }