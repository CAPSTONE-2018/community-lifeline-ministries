function addFirstNameFocus() {
    $('div[id=floatingFirstName]').addClass("is-focused");
}
function removeFirstNameFocus() {
    var input = document.getElementById("contactFirstName").value;

    if (input === "") {
        $('div[id=floatingFirstName]').removeClass("is-focused");
    } else {
        $('div[id=floatingFirstName]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addLastNameFocus() {
    $('div[id=floatingLastName]').addClass("is-focused");
}
function removeLastNameFocus() {
    var userInput = document.getElementById("contactLastName").value;

    if (userInput === "") {
        $('div[id=floatingLastName]').removeClass("is-focused");
    } else {
        $('div[id=floatingLastName]').removeClass("is-focused").addClass("is-dirty");
    }
}

function addPrimaryPhoneFocus() {
    $('div[id=floatingPrimaryPhone]').addClass("is-focused");
}
function removePrimaryPhoneFocus() {
    var userInput = document.getElementById("contactPrimaryPhone").value;

    if (userInput === "") {
        $('div[id=floatingPrimaryPhone]').removeClass("is-focused");
    } else {
        $('div[id=floatingPrimaryPhone]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addSecondaryPhoneFocus() {
    $('div[id=floatingSecondaryPhone]').addClass("is-focused");
}
function removeSecondaryPhoneFocus() {
    var userInput = document.getElementById("contactSecondaryPhone").value;

    if (userInput === "") {
        $('div[id=floatingSecondaryPhone]').removeClass("is-focused");
    } else {
        $('div[id=floatingSecondaryPhone]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addEmailFocus() {
    $('div[id=floatingEmail]').addClass("is-focused");
}

function removeEmailFocus() {
    var userInput = document.getElementById("contactEmail").value;

    if (userInput === "") {
        $('div[id=floatingEmail]').removeClass("is-focused");
    } else {
        $('div[id=floatingEmail]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addContactRelationToStudentFocus() {
    $('div[id=floatingRelationship]').addClass("is-focused");
}

function removeContactRelationToStudentFocus() {
    var userInput = document.getElementById("contactRelationToStudent").value;

    if (userInput === "") {
        $('div[id=floatingRelationship]').removeClass("is-focused");
    } else {
        $('div[id=floatingRelationship]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addAddressOneFocus() {
    $('div[id=floatingAddressOne]').addClass("is-focused");
}
function removeAddressOneFocus() {
    var userInput = document.getElementById("contactAddressOne").value;

    if (userInput === "") {
        $('div[id=floatingAddressOne]').removeClass("is-focused");
    } else {
        $('div[id=floatingAddressOne]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addAddressTwoFocus() {
    $('div[id=floatingAddressTwo]').addClass("is-focused");
}
function removeAddressTwoFocus() {
    var userInput = document.getElementById("contactAddressTwo").value;

    if (userInput === "") {
        $('div[id=floatingAddressTwo]').removeClass("is-focused");
    } else {
        $('div[id=floatingAddressTwo]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addCityFocus() {
    $('div[id=floatingCity]').addClass("is-focused");
}
function removeCityFocus() {
    var userInput = document.getElementById("contactCity").value;

    if (userInput === "") {
        $('div[id=floatingCity]').removeClass("is-focused");
    } else {
        $('div[id=floatingCity]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addZipCodeFocus() {
    $('div[id=floatingZipCode]').addClass("is-focused");
}
function removeZipCodeFocus() {
    var userInput = document.getElementById("contactZip").value;

    if (userInput === "") {
        $('div[id=floatingZipCode]').removeClass("is-focused");
    } else {
        $('div[id=floatingZipCode]').removeClass("is-focused").addClass("is-dirty");
    }
}