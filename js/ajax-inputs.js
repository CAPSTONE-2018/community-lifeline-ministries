function addFirstNameFocus() {
    $('div[id=floatingFirstName]').addClass("is-focused");
}
function removeFirstNameFocus() {
    var firstName = document.getElementById("contactFirstName").value;

    if (firstName === "") {
        $('div[id=floatingFirstName]').removeClass("is-focused");
    } else {
        $('div[id=floatingFirstName]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addLastNameFocus() {
    $('div[id=floatingLastName]').addClass("is-focused");
}
function removeLastNameFocus() {
    var lastName = document.getElementById("contactLastName").value;

    if (lastName === "") {
        $('div[id=floatingLastName]').removeClass("is-focused");
    } else {
        $('div[id=floatingLastName]').removeClass("is-focused").addClass("is-dirty");
    }
}

function addMiddleNameFocus() {
    $('div[id=floatingMiddleName]').addClass("is-focused");
}
function removeMiddleNameFocus() {
    var lastName = document.getElementById("contactLastName").value;

    if (lastName === "") {
        $('div[id=floatingMiddleName]').removeClass("is-focused");
    } else {
        $('div[id=floatingMiddleName]').removeClass("is-focused").addClass("is-dirty");
    }
}



function addSuffixFocus() {
    $('div[id=floatingSuffix]').addClass("is-focused");
}
function removeSuffixFocus() {
    var lastName = document.getElementById("contactSuffix").value;

    if (lastName === "") {
        $('div[id=floatingSuffix]').removeClass("is-focused");
    } else {
        $('div[id=floatingSuffix]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addAddressOneFocus() {
    $('div[id=floatingAddressOne]').addClass("is-focused");
}
function removeAddressOneFocus() {
    var lastName = document.getElementById("contactAddressOne").value;

    if (lastName === "") {
        $('div[id=floatingAddressOne]').removeClass("is-focused");
    } else {
        $('div[id=floatingAddressOne]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addAddressTwoFocus() {
    $('div[id=floatingAddressTwo]').addClass("is-focused");
}
function removeAddressTwoFocus() {
    var lastName = document.getElementById("contactAddressTwo").value;

    if (lastName === "") {
        $('div[id=floatingAddressTwo]').removeClass("is-focused");
    } else {
        $('div[id=floatingAddressTwo]').removeClass("is-focused").addClass("is-dirty");
    }
}



function addCityFocus() {
    $('div[id=floatingCity]').addClass("is-focused");
}
function removeCityFocus() {
    var lastName = document.getElementById("contactCity").value;

    if (lastName === "") {
        $('div[id=floatingCity]').removeClass("is-focused");
    } else {
        $('div[id=floatingCity]').removeClass("is-focused").addClass("is-dirty");
    }
}



function addZipCodeFocus() {
    $('div[id=floatingZipCode]').addClass("is-focused");
}
function removeZipCodeFocus() {
    var lastName = document.getElementById("contactZip").value;

    if (lastName === "") {
        $('div[id=floatingZipCode]').removeClass("is-focused");
    } else {
        $('div[id=floatingZipCode]').removeClass("is-focused").addClass("is-dirty");
    }
}





