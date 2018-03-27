$(document).ready(function () {
    $dropdown = $('select').prettyDropdown({
        height: 40,
        classic: true
    });
});
// When <select> state changes...
$dropdown.refresh();