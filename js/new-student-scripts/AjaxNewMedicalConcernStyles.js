function addMedicalConcernNameFocus(dynamicFieldId) {
    var dynamicId = "'id=floatingConcernName" + dynamicFieldId + ";";
    $('div[dynamicId]').addClass("is-focused");
}
function removeMedicalConcernNameFocus() {
    var input = document.getElementById("medicalConcernName").value;

    if (input === "") {
        $('div[id=floatingConcernName]').removeClass("is-focused");
    } else {
        $('div[id=floatingConcernName]').removeClass("is-focused").addClass("is-dirty");
    }
}

function addMedicalConcernTypeFocus() {
    $('div[id=floatingConcernType]').addClass("is-focused");
}
function removeMedicalConcernTypeFocus() {
    var input = document.getElementById("medicalConcernType").value;

    if (input === "") {
        $('div[id=floatingConcernType]').removeClass("is-focused");
    } else {
        $('div[id=floatingConcernType]').removeClass("is-focused").addClass("is-dirty");
    }
}


function addMedicalConcernNoteFocus() {
    $('div[id=floatingConcernNote]').addClass("is-focused");
}
function removeMedicalConcernNoteFocus() {
    var input = document.getElementById("medicalConcernType").value;

    if (input === "") {
        $('div[id=floatingConcernNote]').removeClass("is-focused");
    } else {
        $('div[id=floatingConcernNote]').removeClass("is-focused").addClass("is-dirty");
    }
}
