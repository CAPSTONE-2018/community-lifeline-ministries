function addMedicalConcernNameFocus(dynamicFieldId) {
    var activeId = document.getElementById("floatingConcernName" + dynamicFieldId);
    $(activeId).addClass("is-focused");
}

function removeMedicalConcernNameFocus(dynamicFieldId) {
    var activeId = document.getElementById("floatingConcernName" + dynamicFieldId);

    var input = document.getElementById("medicalConcernName").value;

    if (input === "") {
        $(activeId).removeClass("is-focused");
    } else {
        $(activeId).removeClass("is-focused").addClass("is-dirty");
    }
}

function addMedicalConcernTypeFocus(dynamicFieldId) {
    var activeId = document.getElementById("floatingConcernType" + dynamicFieldId);
    $(activeId).addClass("is-focused");
}
function removeMedicalConcernTypeFocus(dynamicFieldId) {
    var activeId = document.getElementById("floatingConcernType" + dynamicFieldId);
    var input = document.getElementById("medicalConcernType").value;

    if (input === "") {
        $(activeId).removeClass("is-focused");
    } else {
        $(activeId).removeClass("is-focused").addClass("is-dirty");
    }
}


function addMedicalConcernNoteFocus(dynamicFieldId) {
    var activeId = document.getElementById("floatingConcernNote" + dynamicFieldId);
    $(activeId).addClass("is-focused");
}
function removeMedicalConcernNoteFocus(dynamicFieldId) {
    var activeId = document.getElementById("floatingConcernNote" + dynamicFieldId);
    var input = document.getElementById("medicalConcernType").value;

    if (input === "") {
        $(activeId).removeClass("is-focused");
    } else {
        $(activeId).removeClass("is-focused").addClass("is-dirty");
    }
}
