function addMedicalConcernNameFocus() {
    $('div[id=floatingConcernName1]').addClass("is-focused");
}
function removeMedicalConcernNameFocus() {
    var input = document.getElementById("medicalConcernName1").value;

    if (input === "") {
        $('div[id=floatingConcernName1]').removeClass("is-focused");
    } else {
        $('div[id=floatingConcernName1]').removeClass("is-focused").addClass("is-dirty");
    }
}


