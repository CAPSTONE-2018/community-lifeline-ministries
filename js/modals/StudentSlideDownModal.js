function checkForInputs() {

    var firstNameInputValue = $('#studentFirstName').val();
    if(firstNameInputValue === "") {
        $('div[id=floatingStudentFirstName]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentFirstName]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var lastNameInputValue = $('#studentLastName').val();
    if(lastNameInputValue === "") {
        $('div[id=floatingStudentLastName]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentLastName]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var middleNameInputValue = $('#studentMiddleName').val();
    if(middleNameInputValue === "") {
        $('div[id=floatingStudentMiddleName]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentMiddleName]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var suffixInputValue = $('#studentSuffix').val();
    if(suffixInputValue === "") {
        $('div[id=floatingStudentSuffix]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentSuffix]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var dobInputValue = $('#dob').val();
    if(dobInputValue === "") {
        $('div[id=floatingDob]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingDob]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var ethnicityInputValue = $('#ethnicity').val();
    if(ethnicityInputValue === "") {
        $('div[id=floatingEthnicity]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingEthnicity]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var genderInputValue = $('#gender').val();
    if(genderInputValue === "") {
        $('div[id=floatingGender]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingGender]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var addressOneInputValue = $('#studentAddressOne').val();
    if(addressOneInputValue === "") {
        $('div[id=floatingStudentAddressOne]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentAddressOne]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var addressTwoInputValue = $('#studentAddressTwo').val();
    if(addressTwoInputValue === "") {
        $('div[id=floatingStudentAddressTwo]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentAddressTwo]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var cityInputValue = $('#studentCity').val();
    if(cityInputValue === "") {
        $('div[id=floatingStudentCity]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentCity]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var stateInputValue = $('#studentState').val();
    if(stateInputValue === "") {
        $('div[id=floatingStudentState]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentState]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var zipInputValue = $('#studentZip').val();
    if(zipInputValue === "") {
        $('div[id=floatingStudentZip]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentZip]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var currentSchoolInputValue = $('#studentSchool').val();
    if(currentSchoolInputValue === "") {
        $('div[id=floatingStudentSchool]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentSchool]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var programNameInputValue = $('#programName').val();
    if (programNameInputValue === "") {
        $('div[id=floatingProgramName]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingProgramName]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var programVolunteerInputValue = $('#volunteerName').val();
    if (programVolunteerInputValue === "") {
        $('div[id=floatingVolunteerName]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingVolunteerName]').removeClass("is-focused").addClass("is-focused is-dirty");
    }

    var studentsEnrolledInProgram = $('#studentsEnrolledInProgram').val();
    if (studentsEnrolledInProgram === "") {
        $('div[id=floatingStudentsEnrolledInProgram]').removeClass("is-focused is-dirty");
    } else {
        $('div[id=floatingStudentsEnrolledInProgram]').removeClass("is-focused").addClass("is-focused is-dirty");
    }
}

function addStudentFirstNameFocus() {
    $('div[id=floatingStudentFirstName]').addClass("is-focused");
}

function addStudentLastNameFocus() {
    $('div[id=floatingStudentLastName]').addClass("is-focused");
}

function addStudentMiddleNameFocus() {
    $('div[id=floatingStudentMiddleName]').addClass("is-focused");
}

function addStudentSuffixFocus() {
    $('div[id=floatingStudentSuffix]').addClass("is-focused");
}

function addStudentDobFocus() {
    $('div[id=floatingDob]').addClass("is-focused");
}

function addStudentEthnicityFocus() {
    $('div[id=floatingEthnicity]').addClass("is-focused");
}


function addStudentAddressOneFocus() {
    $('div[id=floatingStudentAddressOne]').addClass("is-focused");
}

function addStudentAddressTwoFocus() {
    $('div[id=floatingStudentAddressTwo]').addClass("is-focused");
}


function addStudentCityFocus() {
    $('div[id=floatingStudentCity]').addClass("is-focused");
}


function addStudentZipFocus() {
    $('div[id=floatingStudentZip]').addClass("is-focused");
}

function addStudentSchoolFocus() {
    $('div[id=floatingStudentSchool]').addClass("is-focused");
}

function addGenderFocus() {
    var activeId = document.getElementById("floatingGender");
    $(activeId).addClass("is-focused");
}
function removeGenderFocus() {
    var activeId = document.getElementById("floatingGender");
    var input = document.getElementById("gender").value;

    if (input === "") {
        $(activeId).removeClass("is-focused");
    } else {
        $(activeId).removeClass("is-focused").addClass("is-dirty");
    }
}

function addProgramNameFocus() {
    $('div[id=floatingProgramName]').addClass("is-focused");
}


function addVolunteerNameFocus() {
    $('div[id=floatingVolunteerName]').addClass("is-focused");
}

function addStudentsEnrolledFocus() {
    $('div[id=floatingStudentsEnrolledInProgram]').addClass("is-focused");
}